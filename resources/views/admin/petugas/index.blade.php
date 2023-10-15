@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Data Petugas</h3>
            <a href="/petugas/create" class="btn btn-primary">Tambah Petugas</a>
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
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugass as $key => $petugas)
                        <tr>
                            <td align="center" width="5%">{{ $key + 1 }}</td>
                            <td>{{ $petugas->nama }}</td>
                            <td>{{ $petugas->email }}</td>
                            <td align="center">
                                <form action="/petugas/{{ $petugas->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="/petugas/{{ $petugas->id }}/edit" class="btn btn-primary">Edit</a>

                                    <button type="submit"
                                        onclick="return confirm('Petugas {{ $petugas->nama }} akan dihapus ?')"
                                        class="btn btn-danger">Hapus</button>
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
                    'pageLength'
                ],
            });
        });
    </script>
@endsection
