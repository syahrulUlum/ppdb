<?php

namespace App\Http\Controllers;

use App\Models\DataAlamat;
use App\Models\DataOrtu;
use App\Models\DataSiswa;
use App\Models\Pengaturan;
use App\Models\User;
use App\Models\UserSiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->with([
            'gagal' => 'Email / password salah atau tidak ditemukan',
        ]);
    }


    public function register()
    {
        $pengaturan = Pengaturan::first();

        $now = time();

        $buka_pendaftaran = strtotime($pengaturan->buka_pendaftaran);
        $tutup_pendaftaran = strtotime($pengaturan->tutup_pendaftaran);

        if ($now < $buka_pendaftaran) {
            $waktu = [
                "status" => 2,
                "pesan" => "dibuka",
                "waktu" => $pengaturan->buka_pendaftaran
            ];
        } elseif ($now >= $buka_pendaftaran && $now <= $tutup_pendaftaran) {
            $waktu = [
                "status" => 1,
                "pesan" => "akan ditutup",
                "waktu" => $pengaturan->tutup_pendaftaran
            ];
        } elseif ($now > $tutup_pendaftaran) {
            $waktu = [
                "status" => 0,
                "pesan" => "",
                "waktu" => 0
            ];
        }

        return view('register', compact('waktu'));
    }

    public function handleRegister(Request $request)
    {
        if (!$request->email && !$request->password && !$request->konfirmasi_password) {
            return redirect('/register')->with("gagal", "Data yang diberikan tidak lengkap");
        }

        if (strlen($request->password) < 8) {
            return redirect('/register')->with("gagal", "Password minimal 8 karakter");
        }

        if ($request->password != $request->konfirmasi_password) {
            return redirect('/register')->with("gagal", "Konfrimasi password tidak sesuai");
        }

        if (
            UserSiswa::where('email', $request->email)->first() ||
            User::where('email', $request->email)->first()
        ) {
            return redirect('/register')->with("gagal", "Email sudah terdaftar");
        }

        // Mendapatkan tahun saat ini
        $tahunDaftar = now()->year;

        // Mencari nomor pendaftaran terakhir di tahun ini
        $lastUserSiswa = UserSiswa::whereYear('created_at', $tahunDaftar)->latest()->first();

        // Menghasilkan nomor pendaftaran baru
        if ($lastUserSiswa) {
            $sequence = (int) substr($lastUserSiswa->no_pendaftaran, -4) + 1;
        } else {
            $sequence = 1;
        }

        $noPendaftaran = 'PPDB' . $tahunDaftar . str_pad($sequence, 4, '0', STR_PAD_LEFT);


        $userSiswa = UserSiswa::create([
            "no_pendaftaran" => $noPendaftaran,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "kode_verifikasi" => $this->generateRandomString()
        ]);

        DataSiswa::create([
            "user_siswa_id" => $userSiswa->id
        ]);

        DataAlamat::create([
            "user_siswa_id" => $userSiswa->id
        ]);

        DataOrtu::create([
            "user_siswa_id" => $userSiswa->id
        ]);

        if (Auth::guard('siswa')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            $this->kirimVerifikasi($userSiswa->email, $userSiswa->kode_verifikasi);
            return redirect()->intended('/dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function halamanVerifikasi()
    {
        $email = auth()->user()->email;
        return view('verify_email', compact('email'));
    }

    public function handleVerifikasi($kode)
    {
        $siswa = UserSiswa::where('kode_verifikasi', $kode)->first();
        // jika kode tidak ada alihkan ke halaman not found 404
        if (!$siswa) {
            return abort(404);
        }

        $tanggalKode = Carbon::parse($siswa->updated_at)->addHour(12);

        // jika siswa sudah diverifikasi alihkan ke dashboard
        if ($siswa->verifikasi) {
            return redirect('/dashboard');
        }

        // check kode kadaluarsa
        $kadaluarsa = 1;
        $diverifikasi = 0;
        if ($tanggalKode > Carbon::now()) {
            $kadaluarsa = 0;
            $siswa->update([
                "verifikasi" => 1
            ]);
            $diverifikasi = 1;
        }

        return view('verify_email', compact('diverifikasi', 'kadaluarsa'));
    }

    public function kirimVerifikasi($email, $kode)
    {
        $data['email'] = $email;
        $data['title'] = "Verifikasi PPDB";
        $data['kode'] = $kode;

        Mail::send('email.verifikasi', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['title']);
        });
    }

    public function kirimUlangVerifikasi()
    {
        // cek udah lewat 5 menit ?
        $waktuKirim = Carbon::parse(auth()->user()->updated_at)->addMinute(5);
        if ($waktuKirim > Carbon::now()) {
            return back()->with('gagal', 'Hanya bisa digunakan kembali setelah 5 menit');
        }

        // update kode baru
        $email = auth()->user()->email;
        $siswa = UserSiswa::where('email', $email)->first();
        $siswa->update([
            "kode_verifikasi" => $this->generateRandomString()
        ]);

        $data['email'] = $email;
        $data['title'] = "Verifikasi PPDB";
        $data['kode'] = $siswa->kode_verifikasi;

        Mail::send('email.verifikasi', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['title']);
        });

        return redirect('/verifikasi')->with('berhasil', 'Kode verifikasi berhasil dikirim');
    }

    private function generateRandomString($length = 60)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
