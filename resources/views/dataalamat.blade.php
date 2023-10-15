@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4>Data Alamat</h4>
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

                @if ($kelengkapan['data_alamat_kosong'])
                    <div class="container">
                        <div class="alert alert-info text-danger" role="alert">
                            <p>Data yang belum lengkap :</p>
                            <ol>
                                @foreach ($kelengkapan['data_alamat_kosong'] as $kelengkapan_kosong)
                                    <li>
                                        {{ $kelengkapan_kosong }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @endif

                <form action="/dataalamat" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="status_tempat_tinggal">Status Tempat Tinggal</label>
                            <br>
                            <div class="d-inline me-4">
                                <input class="form-check-input" type="radio" name="status_tempat_tinggal" id="milik"
                                    value="Milik Sendiri"
                                    {{ $data_alamat->status_tempat_tinggal == 'Milik Sendiri' ? 'checked' : '' }}>
                                <label class="form-check-label" for="milik">
                                    Milik Sendiri
                                </label>
                            </div>
                            <div class="d-inline me-4">
                                <input class="form-check-input" type="radio" name="status_tempat_tinggal" id="sewa"
                                    value="Sewa" {{ $data_alamat->status_tempat_tinggal == 'Sewa' ? 'checked' : '' }}>
                                <label class="form-check-label" for="sewa">
                                    Sewa
                                </label>
                            </div>
                            <div class="d-inline">
                                <input class="form-check-input" type="radio" name="status_tempat_tinggal" id="menumpang"
                                    value="Menumpang"
                                    {{ $data_alamat->status_tempat_tinggal == 'Menumpang' ? 'checked' : '' }}>
                                <label class="form-check-label" for="menumpang">
                                    Menumpang
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" placeholder="Alamat" class="form-control" name="alamat" id="alamat"
                                value="{{ $data_alamat->alamat }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="rt_rw">RT / RW</label>
                            <input type="text" placeholder="RT / RW" class="form-control" name="rt_rw" id="rt_rw"
                                value="{{ $data_alamat->rt_rw }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="desa">Desa</label>
                            <input type="text" placeholder="Desa" class="form-control" name="desa" id="desa"
                                value="{{ $data_alamat->desa }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" placeholder="Kecamatan" class="form-control" name="kecamatan"
                                id="kecamatan" value="{{ $data_alamat->kecamatan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kab_kota">Kabupaten / Kota</label>
                            <input type="text" placeholder="Kabupaten / Kota" class="form-control" name="kab_kota"
                                id="kab_kota" value="{{ $data_alamat->kab_kota }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" placeholder="Provinsi" class="form-control" name="provinsi" id="provinsi"
                                value="{{ $data_alamat->provinsi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="number" placeholder="Kode Pos" class="form-control" name="kode_pos" id="kode_pos"
                                value="{{ $data_alamat->kode_pos }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jarak">Jarak Tempat Tinggal Ke Sekolah (*km)</label>
                            <input type="number" placeholder="Jarak Tempat Tinggal Ke Sekolah (*km)"
                                class="form-control" name="jarak" id="jarak" value="{{ $data_alamat->jarak }}">
                        </div>

                        <button type="submit" class="btn btn-success">Perbarui</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
