<?php

namespace App\Http\Controllers;

use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $kelengkapan = $this->cek_kelengkapan();

        return view('pengumuman', compact('kelengkapan'));
    }

    public function print()
    {
        if (Auth::guard('siswa')->check()) {
            if (auth()->user()->status == "Diterima") {
                return view('printpengumuman');
            }
            return abort(404);
        }
        return abort(404);
    }
}
