<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        if (Auth::guard('siswa')->check()) {
            if (!auth()->user()->verifikasi) {
                return redirect('/verifikasi');
            }
            $kelengkapan = $this->cek_kelengkapan();
            return view('change_password', compact('kelengkapan'));
        }
        return view('change_password');
    }

    public function update(Request $request)
    {
        // cek jika ada password baru
        if ($request->password_baru) {
            $dataValidasi = [
                "password_lama" => ['required'],
                "password_baru" => ['min:8'],
                "konfirmasi_password_baru" => ['required'],
            ];

            $pesanValidasi = [
                'password_baru.min' => 'Password minimal 8 karakter',
            ];

            // validasi data
            $request->validate($dataValidasi, $pesanValidasi);
            // jika password lama yang diinput tidak sama
            if (!Hash::check($request->password_lama, auth()->user()->password)) {
                return redirect('/change-password')->with('tidak_sama', "Password tidak sama");
            }

            // jika password baru tidak sama dengan konfirmasi password
            if ($request->password_baru != $request->konfirmasi_password_baru) {
                return redirect('/change-password')->with('konfirmasi_tidak_sama', "Konfirmasi Password tidak sesuai");
            }

            $request['password_baru'] = Hash::make($request->password_baru);

            if (Auth::guard('web')->check()) {
                $pengguna = User::find(auth()->user()->id);
            }

            if (Auth::guard('siswa')->check()) {
                $pengguna = UserSiswa::find(auth()->user()->id);
            }

            $pengguna->update([
                "password" => $request->password_baru
            ]);

            return redirect('/change-password')->with('berhasil', "Password berhasil diubah");
        }
    }
}
