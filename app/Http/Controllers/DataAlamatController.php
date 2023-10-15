<?php

namespace App\Http\Controllers;

use App\Models\DataAlamat;
use App\Models\Pengaturan;
use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataAlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alamat = UserSiswa::with('data_alamat')->where('id', Auth::user()->id)->first();
        $data_alamat = $alamat->data_alamat;

        $kelengkapan = $this->cek_kelengkapan();
        return view('dataalamat', compact('data_alamat', 'kelengkapan'));
    }

    public function update(Request $request)
    {
        // Cek pendaftaran udah dibuka atau belum
        $pengaturan = Pengaturan::first();
        $now = time();

        $buka_pendaftaran = strtotime($pengaturan->buka_pendaftaran);
        $tutup_pendaftaran = strtotime($pengaturan->tutup_pendaftaran);

        if ($now < $buka_pendaftaran) {
            return redirect('berkas')->with('gagal', "Pendaftaran belum dibuka");
        } elseif ($now > $tutup_pendaftaran) {
            return redirect('berkas')->with('gagal', "Pendaftaran sudah ditutup");
        }
        // End cek pendaftaran

        $data_alamat = DataAlamat::where('user_siswa_id', Auth::user()->id)->first();

        $cek_status = UserSiswa::find(Auth::user()->id);

        if ($cek_status->status == "Diterima") {
            return redirect('/dataalamat')->with('gagal', 'Tidak dapat merubah data dikarenakan sudah diterima');
        }

        $data_alamat->update($request->all());

        // cek jika sudah lengkap ganti status menjadi Lengkap
        $kelengkapan = $this->cek_kelengkapan();
        if (
            empty($kelengkapan['berkas_kosong']) &&
            empty($kelengkapan['data_diri_kosong']) &&
            empty($kelengkapan['data_alamat_kosong']) &&
            empty($kelengkapan['data_ortu_kosong'])
        ) {
            UserSiswa::find(Auth::user()->id)->update([
                "status" => "Lengkap"
            ]);
        } else {
            UserSiswa::find(Auth::user()->id)->update([
                "status" => "Belum Lengkap"
            ]);
        }

        return redirect('/dataalamat')->with('berhasil', 'Data berhasil diperbarui');
    }
}
