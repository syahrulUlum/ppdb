@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Tambah Petugas</h3>
                    <a href="/petugas" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="/petugas" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" placeholder="Masukan Nama" name="nama"
                                value="{{ old('nama') }}" required>
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" placeholder="Masukan Email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input class="form-control" type="text" placeholder="Masukan Password" name="password"
                                value="{{ old('password') }}" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info">Tambah Petugas</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
