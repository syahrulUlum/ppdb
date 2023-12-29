<table width="100%">
    <tr>
        <td colspan="1" rowspan="2" width="20px" valign="bottom">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(base_path('public/assets/img/logo.png'))) }}"
                width="80px">

        </td>
    </tr>
    <tr>
        <td colspan="1" valign="middle" align="center" style=" line-height: 40px;">
            <span style="font-size: 30px; font-weight: bold;">
                {{ env('APP_SEKOLAH') }}
            </span>
            <br>
            <span>
                {{ env('APP_ALAMAT') }}
            </span>
        </td>
    </tr>
</table>
<hr style="border:
                0; border-top: 2px solid #000">
<table width="100%">

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
            <span style="margin-left: 1.5rem">No Pendaftaran</span>
        </td>
        <td width="10px">:</td>
        <td>{{ $siswa->no_pendaftaran }}</td>
    </tr>
    <tr>
        <td><span style="margin-left: 1.5rem">Nama Lengkap</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->nama_lengkap }}</td>
    </tr>
    <tr>
        <td><span style="margin-left: 1.5rem">Jenis Kelamin</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->jenis_kelamin == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
    </tr>
    <tr>
        <td><span style="margin-left: 1.5rem">Asal Seklolah</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->asal_sekolah ?? '-' }}</td>
    </tr>
    <tr>
        <td><span style="margin-left: 1.5rem">NISN</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->nisn ?? '-' }}</td>
    </tr>
    <tr>
        <td><span style="margin-left: 1.5rem">Agama</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->agama }}</td>
    </tr>
    <tr>
        <td colspan="3">Telah <b>DITERIMA</b> pada {{ env('APP_NAME') }}. Oleh karena itu, diharapkan
            segera
            melakukan pendaftaran ulang disekolah {{ env('APP_SEKOLAH') }} dengan membawa :</td>
    </tr>
    <tr>
        <td colspan="3">
            <ol style="margin-left: 0.5rem">
                <li>Fotocopy Ijazah TK</li>
                <li>Fotocopy Akte Kelahiran</li>
                <li>Fotocopy Kartu keluarga</li>
                <li>Calon Peserta Didik Berusia 7-12 Tahun</li>
                <li>Pas Foto 4x6 Calon Peserta Didik</li>
                <li>Fotocopy KTP Orang Tua</li>
                <li>Tanda Bukti Diterima</li>
            </ol>
        </td>
    </tr>
    <tr>
        <td colspan="3">Demikian Tanda Bukti ini dibuat.</td>
    </tr>
    <tr>
        <td colspan="3">
            Panitia PPDB,<br>
            {{ $siswa->user->nama }}
        </td>
    </tr>
</table>
