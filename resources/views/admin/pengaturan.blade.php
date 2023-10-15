@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4>Pengaturan</h4>
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

                <form action="/pengaturan" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="foto_sekolah">Foto Utama</label>

                            @if ($pengaturan->foto_sekolah)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                    data-berkas="{{ asset('uploads/halaman/' . $pengaturan->foto_sekolah) }}"
                                    data-judul="Foto Utama">
                                    Foto sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="foto_sekolah" accept=".jpg, .jpeg, .png">
                            @error('foto_sekolah')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="ajakan">Kalimat Ajakan</label>
                            <input type="text" class="form-control" placeholder="Kalimat Ajakan" name="ajakan"
                                id="ajakan" value="{{ $pengaturan->ajakan }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto_kepsek">Foto Kepala Sekolah</label>

                            @if ($pengaturan->foto_kepsek)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                    data-berkas="{{ asset('uploads/halaman/' . $pengaturan->foto_kepsek) }}"
                                    data-judul="Foto Kepala Sekolah">
                                    Foto sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="foto_kepsek" accept=".jpg, .jpeg, .png">
                            @error('foto_kepsek')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_kepsek">Nama Kepsek</label>
                            <input type="text" class="form-control" placeholder="Nama Kepsek" name="nama_kepsek"
                                id="nama_kepsek" value="{{ $pengaturan->nama_kepsek }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="pesan_kepsek">Pesan Kepsek</label>
                            <textarea name="pesan_kepsek" class="form-control" id="pesan_kepsek" cols="30">{{ $pengaturan->ajakan }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="buka_pendaftaran">Buka Pendaftaran</label>
                            <input type="datetime-local" class="form-control" placeholder="Buka Pendaftaran"
                                name="buka_pendaftaran" id="buka_pendaftaran" value="{{ $pengaturan->buka_pendaftaran }}"
                                required>
                            @error('buka_pendaftaran')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="tutup_pendaftaran">Tutup Pendaftaran</label>
                            <input type="datetime-local" class="form-control" placeholder="Tutup Pendaftaran"
                                name="tutup_pendaftaran" id="tutup_pendaftaran"
                                value="{{ $pengaturan->tutup_pendaftaran }}" required>
                            @error('tutup_pendaftaran')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="detailModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="isiData">
                        <label for=""></label>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const detailModal = document.getElementById('detailModal')
        if (detailModal) {
            detailModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget

                // ambil data dari button
                const judul = button.getAttribute('data-judul')
                const berkas = button.getAttribute('data-berkas')
                // Dapatkan elemen div modal-body
                var modalBody = document.querySelector('#isiData');

                // Dapatkan elemen untuk diisi judul
                var h1Element = document.getElementById('detailModalLabel');

                // isi judul
                h1Element.textContent = judul;

                // mengosongkan modalBody
                while (modalBody.firstChild) {
                    modalBody.removeChild(modalBody.firstChild);
                }

                var imgElement = document.createElement('img');

                // Setel atribut src gambar
                imgElement.src = berkas;
                imgElement.style.width = '100%';

                // Tambahkan elemen <img> ke dalam div modal-body
                modalBody.appendChild(imgElement);




            })
        }
    </script>
@endsection
