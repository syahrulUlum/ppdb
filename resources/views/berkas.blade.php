@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4>Data Berkas</h4>
                </div>
                <div class="container">
                    <div class="alert alert-warning text-black" role="alert">
                        Pastikan bahwa berkas yang diupload berekstensi jpg, jpeg, png atau pdf
                    </div>
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

                @if ($kelengkapan['berkas_kosong'])
                    <div class="container">
                        <div class="alert alert-info text-danger" role="alert">
                            <p>Data yang belum lengkap :</p>
                            <ol>
                                @foreach ($kelengkapan['berkas_kosong'] as $kelengkapan_kosong)
                                    <li>
                                        {{ $kelengkapan_kosong }}
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                @endif

                <form action="/berkas" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="akta_kelahiran">Akta Kelahiran</label>

                            @if ($berkas->akta_kelahiran)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                    data-berkas="{{ asset('uploads/akta/' . $berkas->akta_kelahiran) }}"
                                    data-judul="Akta Kelahiran">
                                    Data sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="akta_kelahiran"
                                accept=".pdf, .jpg, .jpeg, .png">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kartu_keluarga">Kartu Keluarga</label>

                            @if ($berkas->kartu_keluarga)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                    data-berkas="{{ asset('uploads/kartu_keluarga/' . $berkas->kartu_keluarga) }}"
                                    data-judul="Kartu Keluarga">
                                    Data sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="kartu_keluarga"
                                accept=".pdf, .jpg, .jpeg, .png">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ijazah_tk">Ijazah TK</label>

                            @if ($berkas->ijazah_tk)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                    data-berkas="{{ asset('uploads/ijazah/' . $berkas->ijazah_tk) }}"
                                    data-judul="Ijazah TK">
                                    Data sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="ijazah_tk"
                                accept=".pdf, .jpg, .jpeg, .png">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kip_pkh">KIP / PKH (Untuk Jalur Afirmasi)</label>

                            @if ($berkas->kip_pkh)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                    data-berkas="{{ asset('uploads/kip/' . $berkas->kip_pkh) }}" data-judul="KIP / PKH">
                                    Data sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="kip_pkh" accept=".pdf, .jpg, .jpeg, .png">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ktp">KTP Orang Tua</label>

                            @if ($berkas->ktp)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-berkas="{{ asset('uploads/ktp/' . $berkas->ktp) }}"
                                    data-judul="KIP / PKH">
                                    Data sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="ktp" accept=".pdf, .jpg, .jpeg, .png">
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto">Foto diri</label>

                            @if ($berkas->foto)
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-berkas="{{ asset('uploads/foto/' . $berkas->foto) }}"
                                    data-judul="Foto Diri">
                                    Data sebelumnya
                                </button>
                            @endif

                            <input type="file" class="form-control mt-2" name="foto" accept=".pdf, .jpg, .jpeg, .png">
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
                        <a href=""></a>
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

                if (berkas.endsWith(".pdf")) {

                    // Buat elemen <iframe>
                    var iframeElement = document.createElement('iframe');

                    // Setel atribut src, width, dan height
                    iframeElement.src = `https://docs.google.com/viewer?url=${berkas}&embedded=true`;
                    iframeElement.width = '100%';
                    iframeElement.height = '500px';

                    // Buat elemen <a> di dalam elemen <p>
                    var aElement = document.createElement('a');
                    aElement.href = berkas;
                    aElement.textContent = 'Download';
                    aElement.classList.add('btn', 'btn-primary', 'mb-2');
                    aElement.setAttribute('download',
                        `${judul} - {{ auth()->user()->data_siswa->nama_lengkap ?? auth()->user()->no_pendaftaran }}.pdf`
                    );

                    // Tambahkan elemen <a href> ke dalam div modal-body
                    modalBody.appendChild(aElement);

                    // Tambahkan elemen <iframe> ke dalam div modal-body
                    modalBody.appendChild(iframeElement);
                } else {
                    // Buat elemen <a> di dalam elemen <p>
                    var aElement = document.createElement('a');
                    aElement.href = berkas;
                    aElement.textContent = 'Download';
                    aElement.classList.add('btn', 'btn-primary', 'mb-2');
                    aElement.setAttribute('download',
                        `${judul} - {{ auth()->user()->data_siswa->nama_lengkap ?? auth()->user()->no_pendaftaran }}`
                    );

                    // Tambahkan elemen <a href> ke dalam div modal-body
                    modalBody.appendChild(aElement);


                    // Buat elemen <img>
                    var imgElement = document.createElement('img');

                    // Setel atribut src gambar
                    imgElement.src = berkas;
                    imgElement.style.width = '100%';

                    // Tambahkan elemen <img> ke dalam div modal-body
                    modalBody.appendChild(imgElement);


                }

            })
        }
    </script>
@endsection
