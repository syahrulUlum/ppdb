<table width="100%">
    <tr style="height: 100px">
        <td bgcolor="gainsboro" valign="middle" align="center">
            <h2>{{ env('APP_NAME') }}</h2>
        </td>
    </tr>
    <tr align="center">
        <td style="padding: 10px"><img src="{{ asset('assets') }}/img/logo.png" width="100px"></td>
    </tr>
    <tr>
        <td>Selamat anda telah berhasil mendaftar di {{ env('APP_NAME') }}. Klik tombol dibawah ini untuk memverifikasi
            akun</td>
    </tr>
    <tr>
        <td align="center" style="padding: 20px">
            <a href="{{ env('APP_URL') }}/verifikasi/{{ $kode }}"
                style="background-color: cyan; padding:10px; border-radius:10%; color:black; font-weight:bold; text-decoration: none">Verifikasi
                Email</a>
        </td>
    </tr>
    <tr>
        <td>Tombol bermasalah ?, klik atau copas link dibawah ini</td>
    </tr>
    <tr>
        <td style="padding: 10px">
            <a
                href="{{ env('APP_URL') }}/verifikasi/{{ $kode }}">{{ env('APP_URL') }}/verifikasi/{{ $kode }}</a>
        </td>
    </tr>
    <tr>
        <td bgcolor="wheat" valign="middle">
            <h3 style="margin-left: 30px">Kode verifikasi ini hanya berlaku selama 12 jam</h3>
        </td>
    </tr>
    <tr style="height: 60px">
        <td bgcolor="gainsboro" valign="middle" align="center">
            <p>{{ env('APP_ALAMAT') }}</p>
        </td>
    </tr>
</table>
