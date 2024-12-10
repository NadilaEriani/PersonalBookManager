<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} :: {{ env('APP_NAME') }}</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/png" href="/Modern/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/Modern/src/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="/Modern/src/assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/home" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#dataPasienSubmenu" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="dataPasienSubmenu">
                                <span>
                                    <i class="bi bi-file-medical icon-large"></i>
                                </span>
                                <span class="hide-menu">Data buku</span>
                            </a>
                            <!-- Submenu untuk Data Pasien -->
                            <ul class="collapse list-unstyled ms-3" id="dataPasienSubmenu">
                                <li class="sidebar-subitem">
                                    <a class="sidebar-sublink" href="/books" onclick="setActive(this)">
                                        <i class="bi bi-clipboard-data"></i> Lihat daftar buku
                                    </a>
                                </li>
                                <li class="sidebar-subitem">
                                    <a class="sidebar-sublink" href="/books/create" onclick="setActive(this)">
                                        <i class="bi bi-plus-circle"></i> Tambah daftar buku
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#dataPoliSubmenu" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="dataPoliSubmenu">
                                <span>
                                    <i class="bi bi-heart-pulse"></i>
                                </span>
                                <span class="hide-menu">Data Poli</span>
                            </a>
                            <!--Submenu untuk Data Poli-->
                            <ul class="collapse list-unstyled ms-3" id="dataPoliSubmenu">
                                <li class="sidebar-subitem">
                                    <a class="sidebar-sublink" href="/poli" onclick="setActive(this)">
                                        <i class="bi bi-clipboard-data"></i> Lihat Data Poli
                                    </a>
                                </li>
                                <li class="sidebar-subitem">
                                    <a class="sidebar-sublink" href="/poli/create" onclick="setActive(this)">
                                        <i class="bi bi-plus-circle"></i> Tambah Data Poli
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#dataDaftarSubmenu" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="dataDaftarSubmenu">
                                <span>
                                    <i class="bi bi-clipboard"></i>
                                </span>
                                <span class="hide-menu">Data Pendaftaran</span>
                            </a>
                            <!--Submenu untuk Data Pendaftaran-->
                            <ul class="collapse list-unstyled ms-3" id="dataDaftarSubmenu">
                                <li class="sidebar-subitem">
                                    <a class="sidebar-sublink" href="/daftar" onclick="setActive(this)">
                                        <i class="bi bi-clipboard-data"></i> Lihat Data Pendaftaran
                                    </a>
                                </li>
                                <li class="sidebar-subitem">
                                    <a class="sidebar-sublink" href="/daftar/create" onclick="setActive(this)">
                                        <i class="bi bi-plus-circle"></i> Tambah Data Pendaftaran
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('laporan-pasien') ? 'active' : '' }}"
                                href="/laporan-pasien/create" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Laporan Data Pasien</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('laporan-daftar') ? 'active' : '' }}"
                                href="/laporan-daftar/create" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-report icon-style"></i>
                                </span>
                                <span class="hide-menu">Laporan Data Pendaftaran</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/logout" aria-expanded="false">
                                <span>
                                    <i class="ti ti-logout"></i>
                                </span>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/"
                                target="_blank" class="btn btn-primary">Download Free</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/Modern/src/assets/images/profile/user-1.jpg" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @include('flash::message')
                @yield('content')
            </div>
        </div>
    </div>
    {{-- JQuery --}}
    <script src="/Modern/src/assets/libs/jquery/dist/jquery.min.js"></script>
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/Modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Modern/src/assets/js/sidebarmenu.js"></script>
    <script src="/Modern/src/assets/js/app.min.js"></script>
    <script src="/Modern/src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: function() {
                    $(this).data('placeholder');
                },
                allowClear: true,
                width: 'resolve' //Mengatur lebar otomatis mengikuti elemen
            });
        });
    </script>
</body>
<style>
    /* Warna dan ukuran umum untuk sidebar */
    .sidebar-item .sidebar-link {
        display: flex;
        align-items: center;
        color: #000;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .sidebar-item .sidebar-link:hover {
        background-color: #d0e1ff;
        /* Warna hover */
    }

    /* Warna aktif untuk item utama */
    .sidebar-item.active>.sidebar-link {
        background-color: #5a8dee;
        /* Warna biru sesuai tema */
        color: #fff;
    }

    /* Styling untuk submenu */
    .sidebar-subitem {
        padding-left: 20px;
    }

    .sidebar-subitem .sidebar-sublink {
        display: flex;
        align-items: center;
        color: #5a8dee;
        /* Warna lebih soft dari menu utama */
        text-decoration: none;
        padding: 8px;
        border-radius: 5px;
        font-size: 0.9rem;
        transition: background-color 0.3s;
    }

    .sidebar-subitem .sidebar-sublink:hover {
        background-color: #c5dbff;
        /* Warna background saat hover */
        color: #3a6fb0;
        /* Warna teks saat hover */
    }

    /* Warna untuk item submenu yang aktif */
    .sidebar-subitem .sidebar-sublink.active {
        background-color: #a8c9ff;
        /* Warna lebih soft dari warna utama */
        color: #000;
        font-weight: bold;
    }

    /* Menambah ikon di submenu */
    .sidebar-subitem .sidebar-sublink i {
        margin-right: 8px;
    }
</style>


</style>

</html>
