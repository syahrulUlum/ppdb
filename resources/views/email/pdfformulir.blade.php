<table width="100%">
    <tr>
        <td colspan="1" rowspan="2" width="20px" valign="bottom">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(base_path('public/assets/img/logo.png'))) }}"
                width="80px">
        </td>
    </tr>
    <tr>
        <td colspan="1" align="center" valign="middle" style=" line-height: 40px;">
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

<table width="100%">
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
                            <span style="margin-left: 1.5rem">No Pendaftaran</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Asal Sekolah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->asal_sekolah }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Jenis Pendaftaran</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->jenis_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Jalur Pendaftaran</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->jalur_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Nama Lengkap</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Jenis Kelamin</span>
                        </td>
                        <td width="10px">:</td>
                        <td>
                            @if ($siswa->data_siswa->jenis_kelamin == 'P')
                                {{ 'Perempuan' }}
                            @elseif ($siswa->data_siswa->jenis_kelamin == 'L')
                                {{ 'Laki-Laki' }}
                            @else
                                {{ '' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">NISN</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">NIK</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->nik }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Tempat Lahir</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Tanggal Lahir</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->tanggal_lahir ? date('d M Y', strtotime($siswa->data_siswa->tanggal_lahir)) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">No Akta Kelahiran</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->no_akta_lahir }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">No Kartu Keluarga</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->no_kk }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Agama</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->agama }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Anak ke</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->anak_ke }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 1.5rem">Jumlah Saudara Kandung</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->jumlah_saudara }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Berat Badan</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->berat_badan }} Kg</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Tinggi Badan</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->tinggi_badan }} Cm</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Nama di KIP / PKH</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->nama_kip }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">No KIP / PKH</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_siswa->no_kip }}</td>
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
                            <span style="margin-left: 1.5rem">Status Tempat Tinggal</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->status_tempat_tinggal }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Alamat</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->alamat }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">RT / RW</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->rt_rw }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Desa</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->desa }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Kecamatan</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->kecamatan }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Kabupaten / Kota</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->kab_kota }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Provinsi</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->provinsi }}</td>
                    </tr>
                    <tr>
                        <td width="180px">
                            <span style="margin-left: 1.5rem">Kode Pos</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->kode_pos }}</td>
                    </tr>
                    <tr>
                        <td width="280px">
                            <span style="margin-left: 1.5rem">Jarak Tempat Tinggal ke Sekolah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_alamat->jarak }} Km</td>
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
            <span style="margin-left: 1.5rem">
                <b>I. Data Orang Tua</b>
            </span>
            <span>
                <table>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Nama Ayah Kandung</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">NIK Ayah </span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->nik_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Tempat Lahir Ayah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->tempat_lahir_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Tanggal Lahir Ayah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->tanggal_lahir_ayah ? date('d M Y', strtotime($siswa->data_ortu->tanggal_lahir_ayah)) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Pendidikan Ayah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->pendidikan_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Pekerjaan Ayah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->pekerjaan_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Penghasilan Ayah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->penghasilan_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">No Hp Ayah</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->no_hp_ayah }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Nama Ibu Kandung</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">NIK Ibu </span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->nik_ibu }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Tempat Lahir Ibu</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->tempat_lahir_ibu }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Tanggal Lahir Ibu</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->tanggal_lahir_ibu ? date('d M Y', strtotime($siswa->data_ortu->tanggal_lahir_ibu)) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Pendidikan Ibu</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->pendidikan_ibu }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Pekerjaan Ibu</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->pekerjaan_ibu }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Penghasilan ibu</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->penghasilan_ibu }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">No Hp Ibu</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->no_hp_ibu }}</td>
                    </tr>
                </table>
            </span>
            <span style="margin-left: 1.5rem">
                <b>II. Data Wali</b>
            </span>
            <span>
                <table>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Nama Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->nama_wali }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">NIK Wali </span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->nik_wali }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Tempat Lahir Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->tempat_lahir_wali }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Tanggal Lahir Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->tanggal_lahir_wali ? date('d M Y', strtotime($siswa->data_ortu->tanggal_lahir_wali)) : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Pendidikan Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->pendidikan_wali }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Pekerjaan Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->pekerjaan_wali }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">Penghasilan Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->penghasilan_wali }}</td>
                    </tr>
                    <tr>
                        <td width="240px">
                            <span style="margin-left: 3rem">No Hp Wali</span>
                        </td>
                        <td width="10px">:</td>
                        <td>{{ $siswa->data_ortu->no_hp_wali }}</td>
                    </tr>
                </table>
            </span>
        </td>
    </tr>
</table>
