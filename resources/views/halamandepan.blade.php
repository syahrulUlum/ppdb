<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>PPDB</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/logo.png" />
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/preloader.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/meanmenu.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/swiper-bundle.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/backToTop.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/fontAwesome5Pro.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/elegantFont.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/default.css" />
    <link rel="stylesheet" href="{{ asset('halaman/assets') }}/css/style.css" />
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two" style="left: 20px"></div>
                <div class="object" id="object_three" style="left: 40px"></div>
                <div class="object" id="object_four" style="left: 60px"></div>
                <div class="object" id="object_five" style="left: 80px"></div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- back to top end -->

    <!-- header area start -->
    <header>
        <div id="header-sticky" class="header__area header__transparent header__padding-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-2 col-sm-4 col-6">
                        <div class="header__left d-flex">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets') }}/img/logo.png" alt="logo" style="width:60px" />
                                </a>
                            </div>
                            <div class="header__category d-none d-lg-block"></div>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-10 col-sm-8 col-6">
                        <div class="header__right d-flex justify-content-end align-items-center">
                            <div class="main-menu main-menu-2">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="has-dropdown" style="visibility: hidden">
                                            <a href=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            @auth
                                <div class="header__btn header__btn-2 d-none d-sm-block">
                                    <a href="/dashboard" class="e-btn">Dashboard</a>
                                </div>
                            @else
                                @if ($waktu['status'] == 1)
                                    <div class="header__btn header__btn-2 d-none d-sm-block">
                                        <a href="/register" class="e-btn">Daftar</a>
                                    </div>
                                @else
                                    <div class="header__btn header__btn-2 ml-10 d-none d-sm-block">
                                        <span class="e-btn">Pendaftaran Tutup</span>
                                    </div>
                                @endif
                                <div class="header__btn header__btn-2 ml-10 d-none d-sm-block">
                                    <a href="/login" class="e-btn">Login</a>
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <main>
        <!-- hero area start -->
        <section class="hero__area hero__height hero__height-2 d-flex align-items-center blue-bg-3 p-relative fix">
            <div class="hero__shape">
                <img class="hero-1-circle" src="{{ asset('halaman/assets') }}/img/shape/hero/hero-1-circle.png"
                    alt="" />
                <img class="hero-1-circle-2" src="{{ asset('halaman/assets') }}/img/shape/hero/hero-1-circle-2.png"
                    alt="" />
                <img class="hero-1-dot-2" src="{{ asset('halaman/assets') }}/img/shape/hero/hero-1-dot-2.png"
                    alt="" />
            </div>
            <div class="container">
                <div class="hero__content-wrapper mt-90">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hero__content hero__content-2 p-relative z-index-1">
                                @if ($waktu['status'] == 1)
                                    <h3 class="hero__title hero__title-2">
                                        Kami menantikan kehadiranmu di sekolah. Ayo daftar segera!
                                    </h3>

                                    <div class="hero__search">
                                        <h4>Pendaftaran {{ $waktu['pesan'] }} pada</h4>
                                        <h2 id="countdown"></h2>
                                        <hr style="margin: 0; width: 130px; border: 2px solid black" />
                                        <h4 class="mt-2">
                                            {{ date('d M Y', strtotime($waktu['waktu'])) }}</h4>
                                    </div>
                                @else
                                    <h3 class="hero__title hero__title-2">
                                        Pendaftaran sudah ditutup
                                    </h3>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__thumb-wrapper">
                                <div class="hero__thumb-2 scene">
                                    <div class="gambaran-sekolah">
                                        <img class="gambarnya"
                                            src="https://okinafitriani.files.wordpress.com/2018/10/image.png?w=640">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero area end -->

        <!-- about area start -->
        <section class="about__area pt-90 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6">
                        <div class="about__thumb-wrapper">
                            <div class="about__thumb ">
                                <div style="width:440px; height:440px; background-color:grey;  ">
                                    <img src="https://blog.amartha.com/wp-content/uploads/2022/03/ilustrasi-orang-tajir.jpg"
                                        style="height:100%; width:100%" alt="" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="about__content pl-70 pr-60 pt-25">
                            <div class="section__title-wrapper mb-25">
                                <h2 class="section__title">
                                    Syahrul Ulum
                                    <hr style="margin: 0; width: 150px" />
                                    <p style="font-size: 20px; font-weight: bold">
                                        Kepala Sekolah
                                    </p>
                                </h2>
                                <p>Haloooooooooooooooo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <section class="services__area pt-115 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                        <div class="section__title-wrapper section-padding mb-60 text-center">
                            <h2 class="section__title">Pilihan Jalur Pendaftaran</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg mb-4">
                        <div class="services__item blue-bg-4">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Zonasi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg mb-4">
                        <div class="services__item blue-bg-4">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Afirmasi (KIP / PKH)</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg mb-4">
                        <div class="services__item blue-bg-4">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Perpindahan Tugas Orang Tua (TNI / POLRI)
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- course area start -->
        <section class="course__area pt-115 pb-120 grey-bg">
            <div class="container text-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-xxl-3 offset-xxl-1 col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="counter__item mb-30">
                            <div class="counter__content">
                                <h4>
                                    <span class="counter" style="font-size: 60px">{{ $pendaftar }}</span>
                                </h4>
                                <p style="font-size: 20px">Calon Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 offset-xxl-1 col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="counter__item mb-30">
                            <div class="counter__content">
                                <h4>
                                    <span class="counter" style="font-size: 60px">{{ $diproses }}</span>
                                </h4>
                                <p style="font-size: 20px">Calon Siswa diproses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 offset-xxl-1 col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="counter__item mb-30">
                            <div class="counter__content">
                                <h4>
                                    <span class="counter" style="font-size: 60px">{{ $diterima }}</span>
                                </h4>
                                <p style="font-size: 20px">Calon Siswa diterima</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- course area end -->

        <section class="services__area pt-115 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                        <div class="section__title-wrapper section-padding mb-60 text-center">
                            <h2 class="section__title">Syarat Pendaftaran</h2>
                        </div>
                    </div>
                </div>
                <div class="row  d-flex justify-content-center">
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Ijazah TK</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Akta Kelahiran</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Kartu Keluarga</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">KTP Orangtua</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Calon Peserta Didik berusia 7-12 tahun</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">Pas Foto 4x6 Calon Peserta Didik</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="services__item green-bg">
                            <div class="services__content d-flex justify-content-center">
                                <h3 class="services__title my-auto">KIP / PKH Untuk Jalur Afirmasi</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="events__area pt-115 pb-120 p-relative">
            <div class="events__shape">
                <img class="events-1-shape" src="{{ asset('halaman/assets') }}/img/events/events-shape.png"
                    alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 offset-xxl-4">
                        <div class="section__title-wrapper mb-60 text-center">
                            <h2 class="section__title">
                                Alur
                                <span class="yellow-bg yellow-bg-big">Pendaftaran<img
                                        src="{{ asset('halaman/assets') }}/img/shape/yellow-bg.png"
                                        alt="" /></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                        <div class="events__item mb-10 hover__active">
                            <div
                                class="events__item-inner d-sm-flex align-items-center justify-content-between white-bg">
                                <div class="events__content">
                                    <h3 class="events__title">Buat Akun</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                        <div class="events__item mb-10 hover__active">
                            <div
                                class="events__item-inner d-sm-flex align-items-center justify-content-between white-bg">
                                <div class="events__content">
                                    <h3 class="events__title">
                                        Lengkapi Data (Data Diri, Data Alamat, Data Orang Tua,
                                        Data Berkas)
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                        <div class="events__item mb-10 hover__active">
                            <div
                                class="events__item-inner d-sm-flex align-items-center justify-content-between white-bg">
                                <div class="events__content">
                                    <h3 class="events__title">Tunggu Pengumuman</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                        <div class="events__item mb-10 hover__active">
                            <div
                                class="events__item-inner d-sm-flex align-items-center justify-content-between white-bg">
                                <div class="events__content">
                                    <h3 class="events__title">Daftar Ulang</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- footer area start -->
    <footer>
        <div class="footer__area grey-bg-2">
            <div class="footer__top pt-190 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer__widget mb-50">
                                <div class="footer__widget-head mb-22">
                                    <div class="footer__logo">
                                        <a href="index.html">
                                            <img src="{{ asset('assets') }}/img/logo.png" alt=""
                                                style="width: 90px" />
                                        </a>
                                    </div>
                                </div>
                                <div class="footer__widget-body footer__widget-body-2">
                                    <p>{{ env('APP_ALAMAT') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom footer__bottom-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="footer__copyright footer__copyright-2 text-center">
                                <p>©2023 {{ env('APP_SEKOLAH') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
    <!-- JS here -->
    <script src="{{ asset('halaman/assets') }}/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/vendor/waypoints.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/jquery.meanmenu.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/swiper-bundle.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/parallax.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/backToTop.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/ajax-form.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('halaman/assets') }}/js/main.js"></script>
    <script>
        // Fungsi untuk menambahkan 0 di depan angka jika kurang dari 10
        function formatNumber(number) {
            return number < 10 ? "0" + number : number;
        }

        // Tentukan tanggal dan waktu akhir untuk countdown
        var countDownDate = new Date("{{ $waktu['waktu'] }}").getTime();

        // Perbarui countdown setiap 1 detik
        var x = setInterval(function() {
            // Dapatkan tanggal dan waktu saat ini
            var now = new Date().getTime();

            // Hitung selisih antara waktu sekarang dan waktu akhir
            var distance = countDownDate - now;

            // Hitung hari, jam, menit, dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor(
                (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Format angka dengan tambahan 0 di depan jika kurang dari 10
            days = formatNumber(days);
            hours = formatNumber(hours);
            minutes = formatNumber(minutes);
            seconds = formatNumber(seconds);

            // Tampilkan hasil countdown di elemen HTML
            document.getElementById("countdown").innerHTML =
                days + "h " + hours + "j " + minutes + "m " + seconds + "d ";

            // Jika waktu countdown berakhir, tampilkan pesan
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML =
                    "";
            }
        }, 1000);
    </script>
</body>

</html>
