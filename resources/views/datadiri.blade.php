@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4>Data Diri</h4>
                </div>
                @if (Session::has('berhasil'))
                    <div class="container">
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('berhasil') }}
                        </div>
                    </div>
                @endif
                @if (Session::has('gagal'))
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('gagal') }}
                        </div>
                    </div>
                @endif

                @if ($kelengkapan['data_diri_kosong'])
                    <div class="container">
                        <div class="alert alert-info text-danger" role="alert">
                            <p>Data yang belum lengkap :</p>
                            <ol>
                                @foreach ($kelengkapan['data_diri_kosong'] as $kelengkapan_kosong)
                                    <li>
                                        {{ $kelengkapan_kosong }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @endif
                <form action="/datadiri" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="no_pendaftaran">No Pendaftaran</label>
                            <input type="text" disabled placeholder="No Pendaftaran" class="form-control"
                                value="{{ auth()->user()->no_pendaftaran }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_pendaftaran">Jenis Pendaftaran</label>
                            <br>
                            <div class="d-inline me-4">
                                <input class="form-check-input" type="radio" name="jenis_pendaftaran" id="baru"
                                    value="Siswa Baru"
                                    {{ $data_siswa->jenis_pendaftaran == 'Siswa Baru' ? 'checked' : '' }}>
                                <label class="form-check-label" for="baru">
                                    Siswa Baru
                                </label>
                            </div>
                            <div class="d-inline">
                                <input class="form-check-input" type="radio" name="jenis_pendaftaran" id="pindahan"
                                    value="Siswa Pindahan"
                                    {{ $data_siswa->jenis_pendaftaran == 'Siswa Pindahan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="pindahan">
                                    Siswa Pindahan
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jalur_pendaftaran">Jalur Pendaftaran</label>
                            <br>
                            <div class="d-inline me-4">
                                <input class="form-check-input" type="radio" name="jalur_pendaftaran" id="zonasi"
                                    value="Zonasi" {{ $data_siswa->jalur_pendaftaran == 'Zonasi' ? 'checked' : '' }}>
                                <label class="form-check-label" for="zonasi">
                                    Zonasi
                                </label>
                            </div>
                            <div class="d-inline me-4">
                                <input class="form-check-input" type="radio" name="jalur_pendaftaran" id="afirmasi"
                                    value="Afirmasi" {{ $data_siswa->jalur_pendaftaran == 'Afirmasi' ? 'checked' : '' }}>
                                <label class="form-check-label" for="afirmasi">
                                    Afirmasi (KIP / PKH)
                                </label>
                            </div>
                            <div class="d-inline">
                                <input class="form-check-input" type="radio" name="jalur_pendaftaran" id="perpindahan"
                                    value="Perpindahan Tugas"
                                    {{ $data_siswa->jalur_pendaftaran == 'Perpindahan Tugas' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perpindahan">
                                    Perpindahan Tugas Orang Tua (TNI / POLRI)
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" placeholder="Asal Sekolah" class="form-control" name="asal_sekolah"
                                id="asal_sekolah" value="{{ $data_siswa->asal_sekolah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" placeholder="Nama Lengkap" class="form-control" name="nama_lengkap"
                                id="nama_lengkap" value="{{ $data_siswa->nama_lengkap }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ $data_siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki -
                                    laki
                                </option>
                                <option value="P" {{ $data_siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nisn">NISN</label>
                            <input type="number" placeholder="NISN" class="form-control" name="nisn" id="nisn"
                                value="{{ $data_siswa->nisn }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_kk">No KK</label>
                            <input type="number" placeholder="No KK" class="form-control" name="no_kk" id="no_kk"
                                value="{{ $data_siswa->no_kk }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="number" placeholder="NIK" class="form-control" name="nik" id="nik"
                                value="{{ $data_siswa->nik }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_akta_lahir">No Akta Kelahiran</label>
                            <input type="text" placeholder="No Akta Kelahiran" class="form-control"
                                name="no_akta_lahir" id="no_akta_lahir" value="{{ $data_siswa->no_akta_lahir }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" placeholder="Tempat Lahir" class="form-control" name="tempat_lahir"
                                id="tempat_lahir" value="{{ $data_siswa->tempat_lahir }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" placeholder="Tanggal Lahir" class="form-control" name="tanggal_lahir"
                                id="tanggal_lahir" value="{{ $data_siswa->tanggal_lahir }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" {{ $data_siswa->agama == 'Islam' ? 'selected' : '' }}>Islam
                                </option>
                                <option value="Kristen Katholik"
                                    {{ $data_siswa->agama == 'Kristen Katholik' ? 'selected' : '' }}>Kristen Katholik
                                </option>
                                <option value="Kristen Protestan"
                                    {{ $data_siswa->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan
                                </option>
                                <option value="Hindu" {{ $data_siswa->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                </option>
                                <option value="Buddha" {{ $data_siswa->agama == 'Buddha' ? 'selected' : '' }}>Buddha
                                </option>
                                <option value="Konghucu" {{ $data_siswa->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="anak_ke">Anak ke-</label>
                            <input type="number" placeholder="Anak ke-" class="form-control" name="anak_ke"
                                id="anak_ke" value="{{ $data_siswa->anak_ke }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah_saudara">Jumlah Saudara Kandung</label>
                            <input type="number" placeholder="Jumlah Saudara Kandung" class="form-control"
                                name="jumlah_saudara" id="jumlah_saudara" value="{{ $data_siswa->jumlah_saudara }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="berat_badan">Berat Badan (*kg)</label>
                            <input type="number" placeholder="Berat Badan" class="form-control" name="berat_badan"
                                id="berat_badan" value="{{ $data_siswa->berat_badan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tinggi_badan">Tinggi Badan (*cm)</label>
                            <input type="number" placeholder="Tinggi Badan" class="form-control" name="tinggi_badan"
                                id="tinggi_badan" value="{{ $data_siswa->tinggi_badan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_kip">No KIP/PKH (*khusus jalur afirmasi KIP/PKH)</label>
                            <input type="text" placeholder="No KIP/PKH" class="form-control" name="no_kip"
                                id="no_kip" value="{{ $data_siswa->no_kip }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_kip">Nama yg tertera di KIP/PKH (*khusus jalur afirmasi KIP/PKH)</label>
                            <input type="text" placeholder="Nama yg tertera di KIP/PKH" class="form-control"
                                name="nama_kip" id="nama_kip" value="{{ $data_siswa->nama_kip }}">
                        </div>
                        <button type="submit" class="btn btn-success">Perbarui</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
