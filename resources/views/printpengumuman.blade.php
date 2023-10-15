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
                    <b style="font-size: 18px"><u>Tanda Bukti</u></b>
                </td>
            </tr>
            <tr>
                <td colspan="3">Panitia PPDB menyatakan bahwa :</td>
            </tr>
            <tr>
                <td width="180px">
                    <span class="ms-4">No Pendaftaran</span>
                </td>
                <td width="10px">:</td>
                <td>{{ auth()->user()->no_pendaftaran }}</td>
            </tr>
            <tr>
                <td><span class="ms-4">Nama Lengkap</span></td>
                <td>:</td>
                <td>{{ auth()->user()->data_siswa->nama_lengkap }}</td>
            </tr>
            <tr>
                <td><span class="ms-4">Jenis Kelamin</span></td>
                <td>:</td>
                <td>{{ auth()->user()->data_siswa->jenis_kelamin == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td><span class="ms-4">Asal Seklolah</span></td>
                <td>:</td>
                <td>{{ auth()->user()->data_siswa->asal_sekolah ?? '-' }}</td>
            </tr>
            <tr>
                <td><span class="ms-4">NISN</span></td>
                <td>:</td>
                <td>{{ auth()->user()->data_siswa->nisn ?? '-' }}</td>
            </tr>
            <tr>
                <td><span class="ms-4">Agama</span></td>
                <td>:</td>
                <td>{{ auth()->user()->data_siswa->agama }}</td>
            </tr>
            <tr>
                <td colspan="3">Telah <b>DITERIMA</b> pada {{ env('APP_NAME') }}. Oleh karena itu, diharapkan segera
                    melakukan pendaftaran ulang disekolah {{ env('APP_SEKOLAH') }} dengan membawa :</td>
            </tr>
            <tr>
                <td colspan="3">
                    <ol class="ms-2">
                        <li>Fotocopy Ijazah TK</li>
                        <li>Fotocopy Akte Kelahiran</li>
                        <li>Fotocopy Kartu keluarga</li>
                        <li>Calon Peserta Didik Berusia 7-12 Tahun</li>
                        <li>Pas Foto 4x6 Calon Peserta Didik</li>
                        <li>Fotocopy KTP Orang Tua</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td colspan="3">Demikian Tanda Bukti ini dibuat.</td>
            </tr>
            <tr>
                <td colspan="3">
                    Panitia PPDB,<br>
                    {{ auth()->user()->user->nama }}
                </td>
            </tr>
        </table>
    </div>


    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
