<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('assets') }}/img/logo.png" style="width: 50px">
            <div class="ms-2" style="font-size: 
                    17px">
                <span class="demo menu-text fw-bolder">
                    {{ env('APP_NAME') }}
                </span>
            </div>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @auth('web')
            <li class="menu-item {{ request()->is('pendaftar*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-rectangle"></i>
                    <div data-i18n="Student Register">Data Pendaftar</div>
                </a>
                <ul class="menu-sub">
                    <li
                        class="menu-item {{ request()->is('pendaftar') || request()->is('pendaftar/berkas*') ? 'active' : '' }}">
                        <a href="/pendaftar" class="menu-link">
                            <div data-i18n="Registered">Pendaftar</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('pendaftar/diterima') ? 'active' : '' }}">
                        <a href="/pendaftar/diterima" class="menu-link">
                            <div data-i18n="Accepted">Diterima</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('pendaftar/dicadangkan') ? 'active' : '' }}">
                        <a href="/pendaftar/dicadangkan" class="menu-link">
                            <div data-i18n="Reserved">Dicadangkan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('pendaftar/ditolak') ? 'active' : '' }}">
                        <a href="/pendaftar/ditolak" class="menu-link">
                            <div data-i18n="Rejected">Ditolak</div>
                        </a>
                    </li>
                </ul>
            </li>
            @if (auth()->user()->level == 'admin')
                <li class="menu-item {{ request()->is('petugas*') ? 'active' : '' }}">
                    <a href="/petugas" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-user"></i>
                        <div data-i18n="Officer">Petugas</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('pengaturan*') ? 'active' : '' }}">
                    <a href="/pengaturan" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-book-content"></i>
                        <div data-i18n="Officer">Pengaturan</div>
                    </a>
                </li>
            @endif
        @endauth

        @auth('siswa')
            <li class="menu-item {{ request()->is('datadiri') ? 'active' : '' }}">
                <a href="/datadiri" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                    <div data-i18n="My Profile" class="d-flex justify-content-between w-100">
                        Data Diri

                        @empty($kelengkapan['data_diri_kosong'])
                            <span class="badge bg-success ms-1">&#10004</span>
                        @else
                            <span class="badge bg-danger ms-1">&#128473;</span>
                        @endempty
                    </div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('dataalamat') ? 'active' : '' }}">
                <a href="/dataalamat" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-map"></i>
                    <div data-i18n="Address" class="d-flex justify-content-between w-100">
                        Data Alamat

                        @empty($kelengkapan['data_alamat_kosong'])
                            <span class="badge bg-success ms-1">&#10004</span>
                        @else
                            <span class="badge bg-danger ms-1">&#128473;</span>
                        @endempty
                    </div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('dataorangtua') ? 'active' : '' }}">
                <a href="/dataorangtua" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Parent" class="w-100 d-flex justify-content-between">
                        Data Orang Tua

                        @empty($kelengkapan['data_ortu_kosong'])
                            <span class="badge bg-success ms-1">&#10004</span>
                        @else
                            <span class="badge bg-danger ms-1">&#128473;</span>
                        @endempty
                    </div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('berkas') ? 'active' : '' }}">
                <a href="/berkas" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-file-blank"></i>
                    <div data-i18n="file" class="w-100 d-flex justify-content-between">
                        Data Berkas
                        @if (empty($kelengkapan['berkas_kosong']))
                            <span class="badge bg-success ms-1">&#10004</span>
                        @else
                            <span class="badge bg-danger ms-1">&#128473;</span>
                        @endif
                    </div>
                </a>
            </li>

            <li class="menu-item {{ request()->is('pengumuman') ? 'active' : '' }}">
                <a href="/pengumuman" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-megaphone"></i>
                    <div data-i18n="file" class="w-100 d-flex justify-content-between">
                        Pengumuman
                    </div>
                </a>
            </li>
        @endauth


        <li class="menu-item {{ request()->is('change-password') ? 'active' : '' }}">
            <a href="/change-password" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Change Password" class="w-100 d-flex justify-content-between">
                    Ubah Password
                </div>
            </a>
        </li>
    </ul>
</aside>
