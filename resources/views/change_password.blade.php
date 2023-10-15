@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form action="/change-password" method="POST">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <h5 class="card-header">Ubah Password</h5>

                    <div class="card-body">
                        @if (Session::has('berhasil'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif
                        <div class="mt-2">
                            <div class="form-group mb-2">
                                <label for="password_lama">Password Lama</label>
                                <input type="password" class="form-control"
                                    placeholder="Masukan Password Lama (Jika ingin ubah password)" name="password_lama"
                                    id="password_lama">
                                @error('password_lama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @if (Session::has('tidak_sama'))
                                    <small class="text-danger">
                                        {{ Session::get('tidak_sama') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="password_baru">Password Baru</label>
                                <input type="password" class="form-control"
                                    placeholder="Masukan Password Baru (Jika ingin ubah password)" name="password_baru"
                                    id="password_baru">
                                @error('password_baru')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="konfirmasi_password_baru">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" placeholder="Konfirmasi Password Baru"
                                    id="konfirmasi_password_baru" name="konfirmasi_password_baru">
                                @error('konfirmasi_password_baru')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                @if (Session::has('konfirmasi_tidak_sama'))
                                    <small class="text-danger">
                                        {{ Session::get('konfirmasi_tidak_sama') }}
                                    </small>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
        </div>
    </div>
@endsection
