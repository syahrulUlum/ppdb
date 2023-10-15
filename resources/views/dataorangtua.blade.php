@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md">
            <form action="/dataorangtua" method="POST">
                @csrf
                @method('put')
                <div class="card">
                    <div class="card-header">
                        <h4>Data Orang Tua / Wali</h4>
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

                    @if ($kelengkapan['data_ortu_kosong'])
                        <div class="container">
                            <div class="alert alert-info text-danger" role="alert">
                                <p>Data yang belum lengkap :</p>
                                <ol>
                                    @foreach ($kelengkapan['data_ortu_kosong'] as $kelengkapan_kosong)
                                        <li>
                                            {{ $kelengkapan_kosong }}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <h6>Data Orang Tua</h6>
                        <hr>
                        <div class="form-group mb-3">
                            <label for="nama_ayah">Nama Ayah Kandung </label>
                            <input type="text" placeholder="Nama Ayah Kandung" class="form-control" name="nama_ayah"
                                id="nama_ayah" value="{{ $data_ortu->nama_ayah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nik_ayah">NIK Ayah</label>
                            <input type="number" placeholder="NIK Ayah" class="form-control" name="nik_ayah" id="nik_ayah"
                                value="{{ $data_ortu->nik_ayah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                            <input type="text" placeholder="Tempat Lahir Ayah" class="form-control"
                                name="tempat_lahir_ayah" id="tempat_lahir_ayah" value="{{ $data_ortu->tempat_lahir_ayah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                            <input type="date" placeholder="Tanggal Lahir Ayah" class="form-control"
                                name="tanggal_lahir_ayah" id="tanggal_lahir_ayah"
                                value="{{ $data_ortu->tanggal_lahir_ayah }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="pendidikan_ayah">Pendidikan Ayah</label>
                            <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
                                <option value="">Pilih Pendidikan Ayah</option>
                                <option value="Tidak Sekolah"
                                    {{ $data_ortu->pendidikan_ayah == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah
                                </option>
                                <option value="SD / MI" {{ $data_ortu->pendidikan_ayah == 'SD / MI' ? 'selected' : '' }}>
                                    SD / MI</option>
                                <option value="SMP / MTs"
                                    {{ $data_ortu->pendidikan_ayah == 'SMP / MTs' ? 'selected' : '' }}>SMP
                                    / MTs</option>
                                <option value="SMA / MA" {{ $data_ortu->pendidikan_ayah == 'SMA / MA' ? 'selected' : '' }}>
                                    SMA /
                                    MA</option>
                                <option value="S1" {{ $data_ortu->pendidikan_ayah == 'S1' ? 'selected' : '' }}>S1
                                </option>
                                <option value="S2" {{ $data_ortu->pendidikan_ayah == 'S2' ? 'selected' : '' }}>S2
                                </option>
                                <option value="S3" {{ $data_ortu->pendidikan_ayah == 'S3' ? 'selected' : '' }}>S3
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" placeholder="Pekerjaan Ayah" class="form-control" name="pekerjaan_ayah"
                                id="pekerjaan_ayah" value="{{ $data_ortu->pekerjaan_ayah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="penghasilan_ayah">Penghasilan Ayah</label>
                            <input type="text" placeholder="Penghasilan Ayah" class="form-control"
                                name="penghasilan_ayah" id="penghasilan_ayah" value="{{ $data_ortu->penghasilan_ayah }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp_ayah">No HP Ayah</label>
                            <input type="text" placeholder="No HP Ayah" class="form-control" name="no_hp_ayah"
                                id="no_hp_ayah" value="{{ $data_ortu->no_hp_ayah }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_ibu">Nama Ibu Kandung </label>
                            <input type="text" placeholder="Nama Ibu Kandung" class="form-control" name="nama_ibu"
                                id="nama_ibu" value="{{ $data_ortu->nama_ibu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nik_ibu">NIK Ibu</label>
                            <input type="number" placeholder="NIK Ibu" class="form-control" name="nik_ibu" id="nik_ibu"
                                value="{{ $data_ortu->nik_ibu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                            <input type="text" placeholder="Tempat Lahir Ibu" class="form-control"
                                name="tempat_lahir_ibu" id="tempat_lahir_ibu"
                                value="{{ $data_ortu->tempat_lahir_ibu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                            <input type="date" placeholder="Tanggal Lahir Ibu" class="form-control"
                                name="tanggal_lahir_ibu" id="tanggal_lahir_ibu"
                                value="{{ $data_ortu->tanggal_lahir_ibu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pendidikan_ibu">Pendidikan Ibu</label>
                            <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
                                <option value="">Pilih Pendidikan Ibu</option>
                                <option value="Tidak Sekolah"
                                    {{ $data_ortu->pendidikan_ibu == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah
                                </option>
                                <option value="SD / MI" {{ $data_ortu->pendidikan_ibu == 'SD / MI' ? 'selected' : '' }}>
                                    SD / MI</option>
                                <option value="SMP / MTs"
                                    {{ $data_ortu->pendidikan_ibu == 'SMP / MTs' ? 'selected' : '' }}>
                                    SMP
                                    / MTs</option>
                                <option value="SMA / MA" {{ $data_ortu->pendidikan_ibu == 'SMA / MA' ? 'selected' : '' }}>
                                    SMA
                                    /
                                    MA</option>
                                <option value="S1" {{ $data_ortu->pendidikan_ibu == 'S1' ? 'selected' : '' }}>S1
                                </option>
                                <option value="S2" {{ $data_ortu->pendidikan_ibu == 'S2' ? 'selected' : '' }}>S2
                                </option>
                                <option value="S3" {{ $data_ortu->pendidikan_ibu == 'S3' ? 'selected' : '' }}>S3
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" placeholder="Pekerjaan Ibu" class="form-control" name="pekerjaan_ibu"
                                id="pekerjaan_ibu" value="{{ $data_ortu->pekerjaan_ibu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="penghasilan_ibu">Penghasilan Ibu</label>
                            <input type="text" placeholder="Penghasilan Ibu" class="form-control"
                                name="penghasilan_ibu" id="penghasilan_ibu" value="{{ $data_ortu->penghasilan_ibu }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp_ibu">No HP Ibu</label>
                            <input type="text" placeholder="No HP Ibu" class="form-control" name="no_hp_ibu"
                                id="no_hp_ibu" value="{{ $data_ortu->no_hp_ibu }}">
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h6>Data Wali</h6>
                        <hr>
                        <div class="form-group mb-3">
                            <label for="nama_wali">Nama Wali </label>
                            <input type="text" placeholder="Nama Wali" class="form-control" name="nama_wali"
                                id="nama_wali" value="{{ $data_ortu->nama_wali }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nik_wali">NIK Wali</label>
                            <input type="number" placeholder="NIK Wali" class="form-control" name="nik_wali"
                                id="nik_wali" value="{{ $data_ortu->nik_wali }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tempat_lahir_wali">Tempat Lahir Wali</label>
                            <input type="text" placeholder="Tempat Lahir Wali" class="form-control"
                                name="tempat_lahir_wali" id="tempat_lahir_wali"
                                value="{{ $data_ortu->tempat_lahir_wali }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir_wali">Tanggal Lahir Wali</label>
                            <input type="date" placeholder="Tanggal Lahir Wali" class="form-control"
                                name="tanggal_lahir_wali" id="tanggal_lahir_wali"
                                value="{{ $data_ortu->tanggal_lahir_wali }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pendidikan_wali">Pendidikan Wali</label>
                            <select name="pendidikan_wali" id="pendidikan_wali" class="form-control">
                                <option value="">Pilih Pendidikan Wali</option>
                                <option value="Tidak Sekolah"
                                    {{ $data_ortu->pendidikan_wali == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah
                                </option>
                                <option value="SD / MI" {{ $data_ortu->pendidikan_wali == 'SD / MI' ? 'selected' : '' }}>
                                    SD / MI</option>
                                <option value="SMP / MTs"
                                    {{ $data_ortu->pendidikan_wali == 'SMP / MTs' ? 'selected' : '' }}>
                                    SMP
                                    / MTs</option>
                                <option value="SMA / MA"
                                    {{ $data_ortu->pendidikan_wali == 'SMA / MA' ? 'selected' : '' }}>SMA
                                    /
                                    MA</option>
                                <option value="S1" {{ $data_ortu->pendidikan_wali == 'S1' ? 'selected' : '' }}>S1
                                </option>
                                <option value="S2" {{ $data_ortu->pendidikan_wali == 'S2' ? 'selected' : '' }}>S2
                                </option>
                                <option value="S3" {{ $data_ortu->pendidikan_wali == 'S3' ? 'selected' : '' }}>S3
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pekerjaan_wali">Pekerjaan Wali</label>
                            <input type="text" placeholder="Pekerjaan Wali" class="form-control"
                                name="pekerjaan_wali" id="pekerjaan_wali" value="{{ $data_ortu->pekerjaan_wali }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="penghasilan_wali">Penghasilan Wali</label>
                            <input type="text" placeholder="Penghasilan Wali" class="form-control"
                                name="penghasilan_wali" id="penghasilan_wali"
                                value="{{ $data_ortu->penghasilan_wali }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp_wali">No HP Wali</label>
                            <input type="text" placeholder="No HP Wali" class="form-control" name="no_hp_wali"
                                id="no_hp_wali" value="{{ $data_ortu->no_hp_wali }}">
                        </div>
                        <button type="submit" class="btn btn-success">Perbarui</button>

                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
