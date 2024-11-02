<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo/Logo UNRAM.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo/Logo UNRAM.png') }}" alt="" height="24">
                        <span class="logo-txt">Molah Click</span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo/Logo UNRAM.png') }}" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo/Logo UNRAM.png') }}" alt="" height="44">
                        <span class="logo-txt">Molah Click
                        </span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="search" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i
                            class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->name }}
                        {{-- {{ Auth::guard('users')->user()->name }}</span> --}}
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="apps-contacts-profile.html"><i
                            class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="auth-lock-screen.html"><i
                            class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                @if (auth()->user()->role == 'Admin')
                    <li>
                        <a href="{{ url('admin/dashboard') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'Mahasiswa')
                    <li>
                        <a href="{{ route('mahasiswa.dashboard') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'Admin')
                    <li class="menu-title" data-key="t-apps">User</li>

                    <li>
                        <a href="{{ route('admin.user') }}">
                            <i data-feather="users"></i>
                            <span data-key="t-chat">User Operator</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="users"></i>
                            <span data-key="t-ecommerce">User Mahasiswa</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.mahasiwa') }}" key="t-products">Mahasiswa Aktif</a></li>
                            <li><a href="{{ route('admin.alumni') }}" key="t-products">Alumni</a></li>
                        </ul>
                    </li>
                @endif


                <li class="menu-title" data-key="t-apps">Data Pengajuan </li>

                @if (auth()->user()->role == 'Admin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-text"></i>
                            <span data-key="t-ecommerce">Pengajuan </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.pengajuan.khs') }}" key="t-products">Kartu Hasil Studi</a>
                            </li>
                            <li><a href="{{ route('admin.pengajuan.skl') }}" data-key="t-product-detail">Surat
                                    Keterangan Lulus</a></li>
                            <li><a href="{{ route('admin.pengajuan.sertifikat-akreditasi') }}"
                                    data-key="t-product-detail">Sertifikat
                                    Akreditasi</a></li>
                            <li><a href="{{ route('admin.pengajuan.transkip-nilai') }}"
                                    data-key="t-product-detail">Transkrip
                                    Nilai</a></li>
                            <li><a href="{{ route('admin.pengajuan.surat-rekomendasi') }}"
                                    data-key="t-product-detail">Surat
                                    Rekomendasi Jurusan</a></li>
                            <li><a href="{{ route('admin.pengajuan.dokumen-lainnya') }}"
                                    data-key="t-product-detail">Dokumen
                                    Lainnya</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-text"></i>
                            <span data-key="t-ecommerce">Pengajuan Lainnya </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.pengajuan.ditolak') }}" key="t-products">Pengajuan
                                    Ditolak</a>
                            </li>
                            <li><a href="{{ route('admin.pengajuan.diterima') }}"
                                    data-key="t-product-detail">Pengajuan
                                    Diterima</a></li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role == 'Mahasiswa' || auth()->user()->role == 'Alumni')
                    <li>
                        <a href="{{ route('mahasiswa.pengajuan') }}">
                            <i data-feather="file-text"></i>
                            <span data-key="t-dashboard">Pengajuan</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'Admin')
                    <li class="menu-title" data-key="t-apps">Survei </li>
                    <li>
                        <a href="{{ route('admin.form-survei') }}">
                            <i data-feather="file-text"></i>
                            <span data-key="t-chat">Form Survei</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-text"></i>
                            <span data-key="t-ecommerce">Hasil Survei</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ecommerce-products.html" key="t-products">Survei Mahasiswa Aktif</a></li>
                            <li><a href="ecommerce-products.html" key="t-products">Survei Alumni</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
