@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Data Pendaftar</h3>
        </div>
        <div class="card-body">
            @if (Session::has('berhasil'))
                <div class="alert alert-info" role="alert">
                    {{ Session::get('berhasil') }}
                </div>
            @endif
            <table id="pendaftar" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">No Pendaftaran</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Diterima oleh</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftars as $key => $pendaftar)
                        <tr>
                            <td align="center" width="5%">{{ $key + 1 }}</td>
                            <td width="20%">{{ $pendaftar->no_pendaftaran }}</td>
                            <td>{{ $pendaftar->data_siswa->nama_lengkap }}</td>
                            <td width="15%">{{ $pendaftar->user->nama }}</td>
                            <td width="35%" align="center">
                                <div class="dropdown d-inline">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="data"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Lihat Data
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="data">
                                        <li>
                                            <a class="dropdown-item" href="/pendaftar/data/{{ $pendaftar->id }}"
                                                target="_blank">Lihat Data</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/pendaftar/berkas/{{ $pendaftar->id }}">Lihat
                                                Berkas</a>
                                        </li>
                                    </ul>
                                </div>

                                <form action="/pendaftar/{{ $pendaftar->id }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')


                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Hapus Pendaftar dengan Nomor Pendaftaran {{ $pendaftar->no_pendaftaran }} ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#pendaftar').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength', 'print'
                ],
            });
        });
    </script>
@endsection
