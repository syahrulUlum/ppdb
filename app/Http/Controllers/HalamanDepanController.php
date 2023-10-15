<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\UserSiswa;
use Illuminate\Http\Request;

class HalamanDepanController extends Controller
{
    public function index()
    {
        $pendaftar = UserSiswa::count();
        $diproses = UserSiswa::where('status', 'Lengkap')->orWhere('status', 'Dicadangkan')->count();
        $diterima = UserSiswa::where('status', 'Diterima')->count();
        $pengaturan = Pengaturan::first();

        $now = time();

        $buka_pendaftaran = strtotime($pengaturan->buka_pendaftaran);
        $tutup_pendaftaran = strtotime($pengaturan->tutup_pendaftaran);

        if ($now < $buka_pendaftaran) {
            $waktu = [
                "status" => 1,
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

        return view('halamandepan', compact('pendaftar', 'diterima', 'diproses', 'pengaturan', 'waktu'));
    }
}
