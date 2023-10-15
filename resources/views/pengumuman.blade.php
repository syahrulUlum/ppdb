@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4>Pengumuman</h4>
                </div>
                @if (auth()->user()->status == 'Belum Lengkap')
                    <div class="container">
                        <div class="alert alert-warning text-black" role="alert">
                            <h4>Harap untuk melengkapi berkas terlebih dahulu</h4>
                        </div>
                    </div>
                @elseif (auth()->user()->status == 'Lengkap')
                    <div class="container">
                        <div class="alert alert-primary text-black" role="alert">
                            <h4>Pendaftaran anda sedang diproses</h4>
                        </div>
                    </div>
                @elseif (auth()->user()->status == 'Dicadangkan')
                    <div class="container">
                        <div class="alert alert-warning text-black" role="alert">
                            <h4>Status anda dicadangkan, mohon menunggu info selanjutnya</h4>
                        </div>
                    </div>
                @elseif (auth()->user()->status == 'Ditolak')
                    <div class="container">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="text-danger">Mohon maaf anda ditolak</h4>
                            <p class="text-black">{{ auth()->user()->pesan_tolak }}</p>
                        </div>
                    </div>
                @elseif (auth()->user()->status == 'Diterima')
                    <div class="container">
                        <div class="alert alert-success" role="alert">
                            <h4 class="text-info">Selamat anda diterima</h4>
                            <p class="text-black">Silahkan anda melakukan pendaftaran ulang, dengan cara datang ke sekolah,
                                print tanda bukti diterima dan bawa berkas-berkas yang disebutkan pada tanda bukti diterima
                            </p>
                            <a href="/print" target="_blank" class="btn btn-primary">Print</a>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
