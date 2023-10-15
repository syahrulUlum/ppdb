<?php

namespace App\Http\Controllers;

use App\Models\DataOrtu;
use App\Models\Pengaturan;
use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ortu = UserSiswa::with('data_ortu')->where('id', Auth::user()->id)->first();
        $data_ortu = $ortu->data_ortu;

        $kelengkapan = $this->cek_kelengkapan();

        return view('dataorangtua', compact('data_ortu', 'kelengkapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataOrtu  $dataOrtu
     * @return \Illuminate\Http\Response
     */
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

        $data_ortu = DataOrtu::where('user_siswa_id', Auth::user()->id)->first();

        $cek_status = UserSiswa::find(Auth::user()->id)->pluck('status');
        if ($cek_status[0] == "Diterima") {
            return redirect('/dataorangtua')->with('gagal', 'Tidak dapat merubah data dikarenakan sudah diterima');
        }

        $data_ortu->update($request->all());

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

        return redirect('/dataorangtua')->with("berhasil", "Data berhasil diperbarui");
    }
}
