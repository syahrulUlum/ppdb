<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserSiswa;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = UserSiswa::with('data_siswa')
            ->whereIn('status', ['Belum Lengkap', 'Lengkap'])
            ->get();

        return view('admin.pendaftar', compact('pendaftars'));
    }

    public function lihatData($id)
    {
        $data = UserSiswa::with(['data_siswa', 'data_alamat', 'data_ortu'])->where('id', $id)->first();

        return view('admin.lihatdata', compact('data'));
    }

    public function lihatBerkas($id)
    {
        $data = UserSiswa::with(['data_siswa'])->where('id', $id)->first();

        return view('admin.lihatberkas', compact('data'));
    }

    public function halamanDiterima()
    {
        $pendaftars = UserSiswa::with(['data_siswa', 'user'])
            ->where('status', 'Diterima')
            ->get();

        return view('admin.diterima', compact('pendaftars'));
    }

    public function halamanDicadangkan()
    {
        $pendaftars = UserSiswa::with(['data_siswa', 'user'])
            ->where('status', 'Dicadangkan')
            ->get();

        return view('admin.dicadangkan', compact('pendaftars'));
    }

    public function halamanDitolak()
    {
        $pendaftars = UserSiswa::with(['data_siswa', 'user'])
            ->where('status', 'Ditolak')
            ->get();

        return view('admin.ditolak', compact('pendaftars'));
    }

    public function terimaPendaftar($id)
    {
        $pendaftar = UserSiswa::find($id);
        $kelengkapan = $this->cek_kelengkapan($id);

        if (
            $kelengkapan['berkas_kosong'] ||
            $kelengkapan['data_diri_kosong'] ||
            $kelengkapan['data_alamat_kosong'] ||
            $kelengkapan['data_ortu_kosong']
        ) {
            return redirect('/pendaftar')->with('gagal', "Data pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran tidak lengkap");
        }

        $pendaftar->update([
            "status" => "Diterima",
            "user_id" => auth()->user()->id

        ]);

        return redirect('/pendaftar')->with('berhasil', "Pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran berhasil diterima");
    }

    public function cadangkanPendaftar($id)
    {
        $pendaftar = UserSiswa::find($id);
        $pendaftar->update([
            "status" => "Dicadangkan",
            "user_id" => auth()->user()->id

        ]);

        return redirect('/pendaftar')->with('berhasil', "Pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran berhasil dicadangkan");
    }

    public function tolakPendaftar(Request $request, $id)
    {
        $pendaftar = UserSiswa::find($id);
        $pendaftar->update([
            "status" => "Ditolak",
            "pesan_tolak" => $request->pesan_tolak,
            "user_id" => auth()->user()->id
        ]);

        return redirect('/pendaftar')->with('berhasil', "Pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran berhasil ditolak");
    }

    public function hapusPendaftar($id)
    {
        $pendaftar = UserSiswa::find($id);
        $pendaftar->delete();
        return redirect('/pendaftar')->with('berhasil', "Pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran berhasil dihapus");
    }
}
