<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\UserSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function siswa()
    {
        $kelengkapan = $this->cek_kelengkapan();

        $berkas = auth()->user();
        return view('berkas', compact('berkas', 'kelengkapan'));
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

        $request->validate([
            'akta_kelahiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'kartu_keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'ijazah_tk' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'kip_pkh' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'ijazah_tk' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $data_berkas = UserSiswa::where('id', Auth::user()->id)->first();

        if ($data_berkas->status == "Diterima") {
            return redirect('/berkas')->with('gagal', 'Tidak dapat merubah data dikarenakan sudah diterima');
        }

        $requestData = $request->all();

        if ($request->hasFile('akta_kelahiran')) {
            $akta_kelahiran = $request->file('akta_kelahiran');
            $nama_akta_kelahiran = $this->generateRandomString() . '.' . $akta_kelahiran->getClientOriginalExtension();
            $akta_kelahiran_path = 'akta/' . $nama_akta_kelahiran;
            $akta_kelahiran->storeAs('public', $akta_kelahiran_path);

            if (auth()->user()->akta_kelahiran) {
                $this->deleteImage(auth()->user()->akta_kelahiran, 'akta');
            }
            $requestData['akta_kelahiran'] = $nama_akta_kelahiran;
        }

        if ($request->hasFile('kartu_keluarga')) {
            $kartu_keluarga = $request->file('kartu_keluarga');
            $nama_kartu_keluarga = $this->generateRandomString() . '.' . $kartu_keluarga->getClientOriginalExtension();
            $kartu_keluarga_path = 'kartu_keluarga/' . $nama_kartu_keluarga;
            $kartu_keluarga->storeAs('public', $kartu_keluarga_path);

            if (auth()->user()->kartu_keluarga) {
                $this->deleteImage(auth()->user()->kartu_keluarga, 'kartu_keluarga');
            }
            $requestData['kartu_keluarga'] = $nama_kartu_keluarga;
        }

        if ($request->hasFile('ijazah_tk')) {
            $ijazah_tk = $request->file('ijazah_tk');
            $nama_ijazah_tk = $this->generateRandomString() . '.' . $ijazah_tk->getClientOriginalExtension();
            $ijazah_tk_path = 'ijazah/' . $nama_ijazah_tk;
            $ijazah_tk->storeAs('public', $ijazah_tk_path);

            if (auth()->user()->ijazah_tk) {
                $this->deleteImage(auth()->user()->ijazah_tk, 'ijazah');
            }
            $requestData['ijazah_tk'] = $nama_ijazah_tk;
        }

        if ($request->hasFile('kip_pkh')) {
            $kip_pkh = $request->file('kip_pkh');
            $nama_kip_pkh = $this->generateRandomString() . '.' . $kip_pkh->getClientOriginalExtension();
            $kip_pkh_path = 'kip/' . $nama_kip_pkh;
            $kip_pkh->storeAs('public', $kip_pkh_path);

            if (auth()->user()->kip_pkh) {
                $this->deleteImage(auth()->user()->kip_pkh, 'kip');
            }
            $requestData['kip_pkh'] = $nama_kip_pkh;
        }

        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp');
            $nama_ktp = $this->generateRandomString() . '.' . $ktp->getClientOriginalExtension();
            $ktp_path = 'ktp/' . $nama_ktp;
            $ktp->storeAs('public', $ktp_path);

            if (auth()->user()->ktp) {
                $this->deleteImage(auth()->user()->ktp, 'ktp');
            }
            $requestData['ktp'] = $nama_ktp;
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = $this->generateRandomString() . '.' . $foto->getClientOriginalExtension();
            $foto_path = 'foto/' . $nama_foto;
            $foto->storeAs('public', $foto_path);

            if (auth()->user()->foto) {
                $this->deleteImage(auth()->user()->foto, 'foto');
            }
            $requestData['foto'] = $nama_foto;
        }


        $data_berkas->update($requestData);

        // cek jika sudah lengkap ganti status menjadi Lengkap
        $kelengkapan = $this->cek_kelengkapan();
        if (
            empty($kelengkapan['berkas_kosong']) &&
            empty($kelengkapan['data_diri_kosong']) &&
            empty($kelengkapan['data_alamat_kosong']) &&
            empty($kelengkapan['data_ortu_kosong'])
        ) {
            $data_berkas->update([
                "status" => "Lengkap"
            ]);
        } else {
            $data_berkas->update([
                "status" => "Belum Lengkap"
            ]);
        }

        return redirect('/berkas')->with('berhasil', 'Data berhasil diperbarui');
    }


    private function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    private function deleteImage($image_name, $path)
    {
        if ($image_name && Storage::disk('public')->exists("$path/$image_name")) {
            Storage::disk('public')->delete("$path/$image_name");
        }
    }
}
