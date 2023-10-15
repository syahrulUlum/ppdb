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

            @if (Session::has('gagal'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('gagal') }}
                </div>
            @endif
            <table id="pendaftar" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">No Pendaftaran</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftars as $key => $pendaftar)
                        <tr>
                            <td align="center" width="5%">{{ $key + 1 }}</td>
                            <td width="20%">{{ $pendaftar->no_pendaftaran }}</td>
                            <td>{{ $pendaftar->data_siswa->nama_lengkap }}</td>
                            <td width="15%">{{ $pendaftar->status }}</td>
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

                                @if ($pendaftar->status != 'Belum Lengkap')
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-success dropdown-toggle" type="button" id="data"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Ubah Status
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="data">
                                            <li>
                                                <form action="/pendaftar/terima/{{ $pendaftar->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="dropdown-item"
                                                        onclick="return confirm('No pendaftaran {{ $pendaftar->no_pendaftaran }} akan diterima ?')">Terima</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="/pendaftar/cadangkan/{{ $pendaftar->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="dropdown-item"
                                                        onclick="return confirm('No pendaftaran {{ $pendaftar->no_pendaftaran }} akan dicadangkan ?')">Cadangkan
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#tolakModal" data-no="{{ $pendaftar->no_pendaftaran }}"
                                                    data-nama="{{ $pendaftar->data_siswa->nama_lengkap }}"
                                                    data-id="{{ $pendaftar->id }}">
                                                    Tolak
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                @endif

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

    <!-- Modal -->
    <div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tolakModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="tolakForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label>Alasan ditolak</label>
                        <input type="text" class="form-control" name="pesan_tolak">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tolak</button>
                    </div>
                </form>
            </div>
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
                    'pageLength'
                ],
            });
        });
    </script>
    <script>
        const tolakModal = document.getElementById('tolakModal')
        if (tolakModal) {
            tolakModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget

                // ambil data dari button
                const no = button.getAttribute('data-no')
                const nama = button.getAttribute('data-nama')
                const id = button.getAttribute('data-id')

                // Dapatkan elemen untuk diisi judul
                var h1Element = document.getElementById('tolakModalLabel');

                // isi judul
                h1Element.textContent = `Tolak Pendaftaran - ${no} - ${nama}`;

                var form = document.getElementById('tolakForm');
                form.action = '/pendaftar/tolak/' + id;

            })
        }
    </script>
@endsection
