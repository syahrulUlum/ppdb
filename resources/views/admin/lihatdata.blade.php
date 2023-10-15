<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ env('APP_NAME') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css" />

</head>

<body>
    <div>
        <div class="text-center" id="tombol" onclick="cetakForm()">
            <button class="btn btn-primary m-2">Print</button>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-borderless">
            <tr>
                <td colspan="1" rowspan="2" width="20px">
                    <img src="{{ asset('assets') }}/img/logo.png" style="width: 80px">
                </td>
            </tr>
            <tr>
                <td colspan="1" align="center">
                    <span style="font-size: 30px; font-weight: bold">
                        {{ env('APP_SEKOLAH') }}
                    </span>
                    <br>
                    <span>
                        {{ env('APP_ALAMAT') }}
                    </span>
                </td>
            </tr>
        </table>
        <hr style="border: 0; border-top: 2px solid #000">

        <table class="table table-borderless">
            <tr>
                <td colspan="3" align="center">
                    <b style="font-size: 18px"><u>Formulir Pendaftaran</u></b>
                </td>
            </tr>
            <tr>
                <td>
                    <span>
                        <b>Data Diri</b>
                    </span>

                    <br>
                    <span>
                        <table>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">No Pendaftaran</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->no_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Asal Sekolah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Jenis Pendaftaran</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->jenis_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Jalur Pendaftaran</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->jalur_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Nama Lengkap</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Jenis Kelamin</span>
                                </td>
                                <td width="10px">:</td>
                                <td>
                                    @if ($data->data_siswa->jenis_kelamin == 'P')
                                        {{ 'Perempuan' }}
                                    @elseif ($data->data_siswa->jenis_kelamin == 'L')
                                        {{ 'Laki-Laki' }}
                                    @else
                                        {{ '' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">NISN</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">NIK</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->nik }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Tempat Lahir</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Tanggal Lahir</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->tanggal_lahir ? date('d M Y', strtotime($data->data_siswa->tanggal_lahir)) : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">No Akta Kelahiran</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->no_akta_lahir }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">No Kartu Keluarga</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->no_kk }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Agama</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->agama }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Anak ke</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->anak_ke }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-4">Jumlah Saudara Kandung</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->jumlah_saudara }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Berat Badan</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->berat_badan }} Kg</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Tinggi Badan</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->tinggi_badan }} Cm</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Nama di KIP / PKH</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->nama_kip }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">No KIP / PKH</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_siswa->no_kip }}</td>
                            </tr>
                        </table>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>
                        <b>Data Alamat</b>
                    </span>

                    <br>
                    <span>
                        <table>
                            <tr>
                                <td width="240px">
                                    <span class="ms-4">Status Tempat Tinggal</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->status_tempat_tinggal }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Alamat</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->alamat }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">RT / RW</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->rt_rw }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Desa</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->desa }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Kecamatan</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Kabupaten / Kota</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->kab_kota }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Provinsi</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->provinsi }}</td>
                            </tr>
                            <tr>
                                <td width="180px">
                                    <span class="ms-4">Kode Pos</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->kode_pos }}</td>
                            </tr>
                            <tr>
                                <td width="280px">
                                    <span class="ms-4">Jarak Tempat Tinggal ke Sekolah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_alamat->jarak }} Km</td>
                            </tr>
                        </table>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>
                        <b>Data Orang Tua / Wali</b>
                    </span>

                    <br>
                    <span class="ms-4">
                        <b>I. Data Orang Tua</b>
                    </span>
                    <span>
                        <table>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Nama Ayah Kandung</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">NIK Ayah </span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->nik_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Tempat Lahir Ayah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->tempat_lahir_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Tanggal Lahir Ayah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->tanggal_lahir_ayah ? date('d M Y', strtotime($data->data_ortu->tanggal_lahir_ayah)) : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Pendidikan Ayah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->pendidikan_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Pekerjaan Ayah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->pekerjaan_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Penghasilan Ayah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->penghasilan_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">No Hp Ayah</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->no_hp_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Nama Ibu Kandung</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">NIK Ibu </span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->nik_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Tempat Lahir Ibu</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->tempat_lahir_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Tanggal Lahir Ibu</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->tanggal_lahir_ibu ? date('d M Y', strtotime($data->data_ortu->tanggal_lahir_ibu)) : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Pendidikan Ibu</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->pendidikan_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Pekerjaan Ibu</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Penghasilan ibu</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->penghasilan_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">No Hp Ibu</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->no_hp_ibu }}</td>
                            </tr>
                        </table>
                    </span>
                    <span class="ms-4">
                        <b>II. Data Wali</b>
                    </span>
                    <span>
                        <table>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Nama Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->nama_wali }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">NIK Wali </span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->nik_wali }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Tempat Lahir Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->tempat_lahir_wali }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Tanggal Lahir Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->tanggal_lahir_wali ? date('d M Y', strtotime($data->data_ortu->tanggal_lahir_wali)) : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Pendidikan Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->pendidikan_wali }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Pekerjaan Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->pekerjaan_wali }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">Penghasilan Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->penghasilan_wali }}</td>
                            </tr>
                            <tr>
                                <td width="240px">
                                    <span class="ms-5">No Hp Wali</span>
                                </td>
                                <td width="10px">:</td>
                                <td>{{ $data->data_ortu->no_hp_wali }}</td>
                            </tr>
                        </table>
                    </span>
                </td>
            </tr>
        </table>
    </div>


    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script>
        function cetakForm() {
            // Sembunyikan elemen tombol sebelum mencetak
            document.getElementById("tombol").style.display = "none";

            window.print();

            // Kembalikan tampilan elemen tombol setelah pencetakan
            document.getElementById("tombol").style.display = "block";
        }
    </script>
</body>

</html>
