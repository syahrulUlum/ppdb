<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\UserSiswa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function cek_kelengkapan($id = 0)
    {
        $mapping = [
            "akta_kelahiran" => "Akta Kelahiran",
            "kartu_keluarga" => "Kartu Keluarga",
            "ijazah_tk" => "Ijazah TK",
            "kip_pkh" => "KIP atau PKH",
            "ktp" => "KTP Orang Tua",
            "foto" => "Foto diri",
            "jenis_pendaftaran" => "Jenis Pendaftaran",
            "jalur_pendaftaran" => "Jalur Pendaftaran",
            "asal_sekolah" => "Asal Sekolah",
            "nama_lengkap" => "Nama Lengkap",
            "jenis_kelamin" => "Jenis Kelamin",
            "nisn" => "NISN",
            "nik" => "No NIK",
            "no_kk" => "No KK",
            "no_akta_lahir" => "No Akta Kelahiran",
            "tempat_lahir" => "Tempat Lahir",
            "agama" => "Agama",
            "anak_ke" => "Anak Ke",
            "jumlah_saudara" => "Jumlah Saudara",
            "berat_badan" => "Berat Badan",
            "tinggi_badan" => "Tinggi Badan",
            "no_kip" => "No Kip",
            "nama_kip" => "Nama Kip",
            "status_tempat_tinggal" => "Status Tempat Tinggal",
            "alamat" => "Alamat",
            "rt_rw" => "RT RW",
            "desa" => "Desa",
            "kecamatan" => "Kecamatan",
            "kab_kota" => "Kabupaten atau Kota",
            "provinsi" => "Provinsi",
            "kode_pos" => "Kode Pos",
            "jarak" => "Jarak",
            "nama_ayah" => "Nama Ayah",
            "nik_ayah" => "NIK Ayah",
            "tempat_lahir_ayah" => "Tempat Lahir Ayah",
            "tanggal_lahir_ayah" => "Tanggal Lahir Ayah",
            "pendidikan_ayah" => "Pendidikan Ayah",
            "pekerjaan_ayah" => "Pekerjaan Ayah",
            "penghasilan_ayah" => "Penghasilan Ayah",
            "no_hp_ayah" => "No Hp Ayah",
            "nama_ibu" => "Nama Ibu",
            "nik_ibu" => "NIK Ibu",
            "tempat_lahir_ibu" => "Tempat Lahir Ibu",
            "tanggal_lahir_ibu" => "Tanggal Lahir Ibu",
            "pendidikan_ibu" => "Pendidikan Ibu",
            "pekerjaan_ibu" => "Pekerjaan Ibu",
            "penghasilan_ibu" => "Penghasilan Ibu",
            "no_hp_ibu" => "No Hp Ibu",
        ];

        $id_pendaftar = $id == 0 ? auth()->user()->id : $id;

        $data = UserSiswa::with(['data_siswa', 'data_alamat', 'data_ortu'])->where('id', $id_pendaftar)->first();
        // ----------Pengecekan Berkas

        $berkas_wajib = ['akta_kelahiran', 'kartu_keluarga', 'ijazah_tk', 'ktp', 'foto'];

        // cek apakah siswa dengan jalur afirmasi
        if ($data->data_siswa->jalur_pendaftaran == 'Afirmasi') {
            array_push($berkas_wajib, 'kip_pkh');
        }

        $berkas_kosongs = [];

        foreach ($berkas_wajib as $berkas) {
            if (empty($data->$berkas)) {
                $berkas_kosongs[] = $berkas;
            }
        }

        $berkas_kosong = array_map(function ($item) use ($mapping) {
            return $mapping[$item] ?? $item;
        }, $berkas_kosongs);
        // ----------Akhir Pengecekan Berkas

        // ----------Pengecekan Data Diri
        $data_diri_wajib = [
            "jenis_pendaftaran", "jalur_pendaftaran", "asal_sekolah", "nama_lengkap", "jenis_kelamin", "nisn", 'nik', 'no_kk', 'no_akta_lahir', 'tempat_lahir', 'agama', 'anak_ke', 'jumlah_saudara', 'berat_badan', 'tinggi_badan'
        ];

        if ($data->data_siswa->jalur_pendaftaran == 'Afirmasi') {
            array_push($data_diri_wajib, 'no_kip', 'nama_kip');
        }

        $data_diri_kosongs = [];

        foreach ($data_diri_wajib as $data_diri) {
            if (empty($data->data_siswa->$data_diri)) {
                $data_diri_kosongs[] = $data_diri;
            }
        }

        $data_diri_kosong = array_map(function ($item) use ($mapping) {
            return $mapping[$item] ?? $item;
        }, $data_diri_kosongs);
        // ----------Akhir Pengecekan Data Diri

        // ----------Pengecekan Data Alamat
        $data_alamat_wajib = [
            "status_tempat_tinggal", "alamat", "rt_rw", "desa", "kecamatan", "kab_kota", "provinsi", "kode_pos"
        ];

        if ($data->data_siswa->jalur_pendaftaran == 'Zonasi') {
            array_push($data_alamat_wajib, 'jarak');
        }

        $data_alamat_kosongs = [];

        foreach ($data_alamat_wajib as $data_alamat) {
            if (empty($data->data_alamat->$data_alamat)) {
                $data_alamat_kosongs[] = $data_alamat;
            }
        }

        $data_alamat_kosong = array_map(function ($item) use ($mapping) {
            return $mapping[$item] ?? $item;
        }, $data_alamat_kosongs);
        // ----------Akhir Pengecekan Data Alamat


        // ----------Pengecekan Data Ortu
        $data_ortu_wajib = [
            "nama_ayah", "nik_ayah", "tempat_lahir_ayah", "tanggal_lahir_ayah", "pendidikan_ayah", "pekerjaan_ayah", "penghasilan_ayah", "no_hp_ayah", "nama_ibu", "nik_ibu", "tempat_lahir_ibu", "tanggal_lahir_ibu", "pendidikan_ibu", "pekerjaan_ibu", "penghasilan_ibu", "no_hp_ibu"
        ];


        $data_ortu_kosongs = [];

        foreach ($data_ortu_wajib as $data_ortu) {
            if (empty($data->data_ortu->$data_ortu)) {
                $data_ortu_kosongs[] = $data_ortu;
            }
        }

        $data_ortu_kosong = array_map(function ($item) use ($mapping) {
            return $mapping[$item] ?? $item;
        }, $data_ortu_kosongs);
        // ----------Akhir Pengecekan Data Ortu

        return [
            "berkas_kosong" => $berkas_kosong,
            "data_diri_kosong" => $data_diri_kosong,
            "data_alamat_kosong" => $data_alamat_kosong,
            "data_ortu_kosong" => $data_ortu_kosong,
        ];
    }
}
