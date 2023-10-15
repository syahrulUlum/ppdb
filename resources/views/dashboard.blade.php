@extends('layouts.main')
@section('content')
    @auth('web')
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="avatar">
                                <i class="bx bx-group bx-sm p-2 rounded"
                                    style="background-color: #89fd66e8; color: #409b24ef"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Pendaftar</span>
                        <h3 class="card-title mb-2">{{ $pendaftar }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="avatar">
                                <i class="bx bx-book bx-sm p-2 rounded"
                                    style="background-color: #80d6fdee; color: #295cb4b9"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Dicadangkan</span>
                        <h3 class="card-title mb-2">{{ $dicadangkan }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="avatar">
                                <i class="bx bx-line-chart bx-sm p-2 rounded"
                                    style="background-color: #f8f525ce; color: #a78712c4"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Diterima</span>
                        <h3 class="card-title mb-2">{{ $diterima }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="avatar">
                                <i class="bx bx-line-chart-down bx-sm p-2 rounded"
                                    style="background-color: #ff7c50d8; color: #b8390eab"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Ditolak</span>
                        <h3 class="card-title mb-2">{{ $ditolak }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @auth('siswa')
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h3>Selamat datang calon siswa {{ env('APP_NAME') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
