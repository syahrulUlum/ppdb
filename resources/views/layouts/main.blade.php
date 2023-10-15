<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template-free">

<head>
    @include('layouts.header')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar">
                                        @auth('web')
                                            <img src="{{ asset('assets/img/profile-default.png') }}"
                                                class="w-px-40 h-auto rounded-circle" />
                                        @endauth
                                        @auth('siswa')
                                            @if (auth()->user()->foto)
                                                <img src="{{ asset('storage/foto/' . auth()->user()->foto) }}"
                                                    class="w-px-40 rounded-circle" />
                                            @else
                                                <img src="{{ asset('assets/img/profile-default.png') }}"
                                                    class="w-px-40 h-auto rounded-circle" />
                                            @endif
                                        @endauth
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        @auth('web')
                                                            <img src="{{ asset('assets/img/profile-default.png') }}"
                                                                class="w-px-40 h-auto rounded-circle" />
                                                        @endauth
                                                        @auth('siswa')
                                                            @if (auth()->user()->foto)
                                                                <img src="{{ asset('storage/foto/' . auth()->user()->foto) }}"
                                                                    class="w-px-40  rounded-circle" />
                                                            @else
                                                                <img src="{{ asset('assets/img/profile-default.png') }}"
                                                                    class="w-px-40 h-auto rounded-circle" />
                                                            @endif
                                                        @endauth
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    @auth('web')
                                                        <span
                                                            class="fw-semibold d-block">{{ auth()->user()->nama ? auth()->user()->nama : auth()->user()->email }}
                                                        </span>
                                                        <small class="text-muted">{{ auth()->user()->level }}</small>
                                                    @endauth
                                                    @auth('siswa')
                                                        <span
                                                            class="fw-semibold d-block">{{ auth()->user()->data_siswa->nama_lengkap ? auth()->user()->data_siswa->nama_lengkap : auth()->user()->email }}
                                                        </span>
                                                        <small class="text-muted">Calon Siswa</small>
                                                    @endauth
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/change-password">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Ubah Password</span>
                                        </a>
                                    </li>

                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Yakin ingin keluar ?')"
                                                class="btn dropdown-item">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Keluar</span>
                                            </button>
                                        </form>

                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')

                    </div>

                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('layouts.footer')
    @yield('js')
</body>

</html>
