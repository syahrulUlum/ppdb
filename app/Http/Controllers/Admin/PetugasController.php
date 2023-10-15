<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class PetugasController extends Controller
{
    public function index()
    {
        $petugass = User::where('level', 'petugas')->get();

        return view('admin.petugas.index', compact('petugass'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->where(function ($query) use ($request) {
                        $query->where('email', $request->email);
                    }),
                Rule::unique('user_siswa', 'email')
                    ->where(function ($query) use ($request) {
                        $query->where('email', $request->email);
                    }),
            ],
            'password' => ['required', 'min:8'],
        ]);

        User::create([
            "email" => $request->email,
            "nama" => $request->nama,
            "password" => Hash::make($request->password),
            "level" => "petugas",
        ]);

        return redirect('/petugas')->with('berhasil', 'Petugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = User::where('id', $id)->first();

        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = User::find($id);

        $dataValidasi = [
            'nama' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->where(function ($query) use ($request) {
                        $query->where('email', $request->email);
                    })->ignore($pengguna->id),
                Rule::unique('user_siswa', 'email')
                    ->where(function ($query) use ($request) {
                        $query->where('email', $request->email);
                    }),
            ]
        ];


        if ($request->password) {
            $dataValidasi['password'] = ['required', 'min:8'];
        }

        // validasi data
        $request->validate($dataValidasi);

        // cek request password, jika tidak ada maka gunakan yang lama
        if ($request->password == null) {
            unset($request['password']);
        } else {
            // enkripsi password biar aman
            $request['password'] = Hash::make($request['password']);
        }

        $pengguna->update($request->all());

        return redirect('petugas')->with('berhasil', "Petugas berhasil diubah");
    }

    public function destroy($id)
    {
        $cek = UserSiswa::where('user_id', $id)->first();
        if ($cek) {
            return redirect('petugas')->with('gagal', "Data petugas masih digunakan pada terima, tolak atau cadangkan pendaftar");
        }

        $petugas = User::where('id', $id)->first();
        $petugas->delete();

        return redirect('petugas')->with('berhasil', "Petugas berhasil dihapus");
    }
}
