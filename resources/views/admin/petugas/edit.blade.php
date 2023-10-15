@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Eidt Petugas</h3>
                    <a href="/petugas" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="/petugas/{{ $petugas->id }}/update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" placeholder="Masukan Nama" name="nama"
                                value="{{ $petugas->nama }}" required>
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" placeholder="Masukan Email" name="email"
                                value="{{ $petugas->email }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input class="form-control" type="text" placeholder="Masukan Password" name="password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info">Edit Petugas</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
