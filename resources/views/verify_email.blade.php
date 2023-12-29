<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Verifikasi Email | {{ env('APP_NAME') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>

    <script src="{{ asset('assets') }}/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <img src="{{ asset('assets') }}/img/logo.png" width="100px">
                            </a>
                        </div>
                        @if (Session::has('berhasil'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('berhasil') }}
                            </div>
                        @endif

                        @if (Session::has('gagal'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('gagal') }}
                            </div>
                        @endif
                        <!-- /Logo -->
                        <h3 class="mb-2">Verifikasi Email ✉️</h3>
                        @if (isset($diverifikasi) && $diverifikasi)
                            <p class="text-start">
                                Berhasil Diverifikasi
                            </p>
                            <a href="/dashboard" class="btn btn-primary w-100 my-3">Lanjut Ke Dashboard</a>
                        @else
                            @if (isset($kadaluarsa) && $kadaluarsa)
                                <p class="text-start">
                                    Tautan verifikasi ini telah usang. silahkan untuk mengirim ulang kode verifikasi
                                </p>
                                <p class="text-center">
                                    <a class="btn btn-primary w-100" href="/resend-verifikasi">
                                        Kirim ulang
                                    </a>
                                </p>
                            @else
                                <p class="text-start">
                                    Tautan verifikasi email telah dikirim ke: <strong>{{ $email }}</strong> <br>
                                    Silahkan ikuti petunjuk yang tercantum dalam email yang telah dikirim tersebut
                                </p>
                                <p class="text-center">Tidak mendapatkan email ?
                                    <a href="/resend-verifikasi">
                                        Kirim ulang
                                    </a>
                                </p>
                            @endif
                        @endif
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Yakin ingin keluar ?')"
                                class="btn btn-primary w-100">
                                <i class="bx bx-power-off 2"></i>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
