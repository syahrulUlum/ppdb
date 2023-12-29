<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

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

        $this->kirimEmail($pendaftar->email, 1);

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

        $this->kirimEmail($pendaftar->email, 0);

        return redirect('/pendaftar')->with('berhasil', "Pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran berhasil ditolak");
    }

    public function hapusPendaftar($id)
    {
        $pendaftar = UserSiswa::find($id);
        $pendaftar->delete();
        return redirect('/pendaftar')->with('berhasil', "Pendaftar dengan nomor pendaftaran $pendaftar->no_pendaftaran berhasil dihapus");
    }

    private function kirimEmail($email, $terima)
    {
        $siswa = UserSiswa::with(['data_siswa', 'user', 'data_alamat', 'data_ortu'])->where('email', $email)->first();
        $data["email"] = $email;
        $data["title"] = "Info PPDB";
        $data["siswa"] = $siswa;
        $data["no_daftar"] = $siswa->no_pendaftaran;
        $data["terima"] = $terima;

        $pengumuman = PDF::loadView('email.pdfpengumuman', $data)->setOptions(['defaultFont' => 'sans-serif']);
        $formulir = PDF::loadView('email.pdfformulir', $data)->setOptions(['defaultFont' => 'sans-serif']);

        if ($terima) {
            Mail::send('email.pengumuman', $data, function ($message) use ($data, $pengumuman, $formulir) {
                $message->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($pengumuman->output(), "Tanda Terima - " . $data['no_daftar'] . ".pdf")
                    ->attachData($formulir->output(), "Formulir - " . $data['no_daftar'] . ".pdf");
            });
        } else {
            Mail::send('email.pengumuman', $data, function ($message) use ($data) {
                $message->to($data["email"])
                    ->subject($data["title"]);
            });
        }
    }
    private function kirimEmailTolak()
    {
    }
}
