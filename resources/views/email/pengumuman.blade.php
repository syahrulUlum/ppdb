<table width="100%">
    <tr style="height: 100px">
        <td colspan="3" bgcolor="gainsboro" valign="middle" align="center">
            <h2>{{ env('APP_NAME') }}</h2>
        </td>
    </tr>
    <tr align="center">
        <td colspan="3" style="padding: 10px"><img src="{{ asset('assets') }}/img/logo.png" width="100px"></td>
    </tr>
    <tr>
        <td colspan="3">Panitia PPDB menginformasikan bahwa :</td>
    </tr>
    <tr>
        <td width="180px">
            <span class="ms-4">No Pendaftaran</span>
        </td>
        <td width="10px">:</td>
        <td>{{ $siswa->no_pendaftaran }}</td>
    </tr>
    <tr>
        <td><span class="ms-4">Nama Lengkap</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->nama_lengkap }}</td>
    </tr>
    <tr>
        <td><span class="ms-4">Jenis Kelamin</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->jenis_kelamin == 'L' ? 'Laki - laki' : 'Perempuan' }}</td>
    </tr>
    <tr>
        <td><span class="ms-4">Asal Seklolah</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->asal_sekolah ?? '-' }}</td>
    </tr>
    <tr>
        <td><span class="ms-4">NISN</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->nisn ?? '-' }}</td>
    </tr>
    <tr>
        <td><span class="ms-4">Agama</span></td>
        <td>:</td>
        <td>{{ $siswa->data_siswa->agama }}</td>
    </tr>
    <tr>
        <td colspan="3" align="center" style="padding: 15px">
            @if ($terima)
                <span style="background-color: greenyellow; padding:12px 40px; font-weight:bold;">DITERIMA</span>
            @else
                <span style="background-color: red; padding:12px 40px; font-weight:bold;">DITOLAK</span>
            @endif
        </td>
    </tr>
    @if ($terima)
        <tr>
            <td colspan="3">Pada {{ env('APP_NAME') }}. Oleh karena itu, diharapkan segera
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
                    <li>Tanda Bukti Diterima</li>
                </ol>
            </td>
        </tr>
    @else
        <tr>
            <td colspan="3">Pada {{ env('APP_NAME') }} Dikarenakan <strong>{{ $siswa->pesan_tolak }}</strong></td>
        </tr>
    @endif

    <tr style="height: 60px">
        <td colspan="3" bgcolor="gainsboro" valign="middle" align="center">
            <p>{{ env('APP_ALAMAT') }}</p>
        </td>
    </tr>
</table>
