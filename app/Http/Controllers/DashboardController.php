<?php

namespace App\Http\Controllers;

use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('siswa')->check()) {
            $kelengkapan = $this->cek_kelengkapan();
            return view('dashboard', compact('kelengkapan'));
        }

        $pendaftar = UserSiswa::count();
        $diterima = UserSiswa::where('status', 'Diterima')->count();
        $dicadangkan = UserSiswa::Where('status', 'Dicadangkan')->count();
        $ditolak = UserSiswa::Where('status', 'Ditolak')->count();

        return view('dashboard', compact('pendaftar', 'diterima', 'dicadangkan', 'ditolak'));
    }
}
