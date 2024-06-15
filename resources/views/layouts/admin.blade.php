<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Panti Asuhan Dharma Jati II</title>
    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.jpg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link href="https://fonts.cdnfonts.com/css/quicksand" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('assets/js/Chart.js') }}"></script>
    @yield('header')
    <style>
        .quick-sand {
            font-family: 'Quicksand Book Oblique', sans-serif;
        }

        .w-90 {
            width: 95%;
        }

        .rounded-search {
            border: black 2px solid;
            border-radius: 20px;
            padding-left: 8px;
            padding-right: 8px;
        }

        .swal2-container {
            z-index: 9999;
        }

        .table-responsive .datatables-basic td {
            max-width: 50px;
            /* Atur lebar maksimum */
            white-space: nowrap;
            /* Tidak membuat baris baru */
            overflow: hidden;
            /* Menyembunyikan konten yang tidak muat */
            text-overflow: ellipsis;
            /* Menampilkan titik-titik elipsis jika terlalu lebar */
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="#" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/logo.jpg') }}" alt="" width="50px" height="50px">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">Admin Panel</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>
                    <li
                        class="menu-item {{ request()->is('home') || request()->is('dashboard/') ? 'active open' : '' }}">
                        <a href="{{ route('home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Basic">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('dashboard/profile') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-building-house"></i>
                            <div data-i18n="Profile">Profile Panti</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('dashboard/profile') ? 'active' : '' }}">
                                <a href="{{ route('profile-panti.index') }}" class="menu-link">
                                    <div data-i18n="CRM">Data Profile Panti</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('dashboard/pengumuman') ? 'active' : '' }}">
                                <a href="{{ route('pengumuman.index') }}" class="menu-link">
                                    <div data-i18n="Analytics">Pengumuman</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="index.html" class="menu-link">
                                    <div data-i18n="Analytics">Foto Panti Asuhan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-party"></i>
                            <div data-i18n="Profile">Program Kegiatan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                                    class="menu-link">
                                    <div data-i18n="CRM">Data Program Kegiatan Panti Asuhan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="index.html" class="menu-link">
                                    <div data-i18n="Analytics">Foto Program Kegiatan Panti Asuhan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                                    class="menu-link">
                                    <div data-i18n="CRM">Data Program Kegiatan Donatur</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="index.html" class="menu-link">
                                    <div data-i18n="Analytics">Foto Program Kegiatan Donatur</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Master Data</span>
                    </li>
                    <li class="menu-item {{ request()->is('master-data/daftar-sekolah') ? 'active' : '' }}">
                        <a href="{{ route('daftar-sekolah.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-school"></i>
                            <div data-i18n="Email">Daftar Sekolah</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('master-data/kategori-barang') ? 'active' : '' }}">
                        <a href="{{ route('kategori-barang.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                            <div data-i18n="Email">Kategori Barang</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('master-data/kategori-pemasukan') ? 'active' : '' }}">
                        <a href="{{ route('kategori-pemasukan.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category-alt"></i>
                            <div data-i18n="Email">Kategori Pemasukan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('master-data/kategori-pengeluaran') ? 'active' : '' }}">
                        <a href="{{ route('kategori-pengeluaran.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                            <div data-i18n="Email">Kategori Pengeluaran</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('master-data/kategori-penyakit') ? 'active' : '' }}">
                        <a href="{{ route('kategori-penyakit.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-virus"></i>
                            <div data-i18n="Email">Kategori Penyakit</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('master-data/kategori-program') ? 'active' : '' }}">
                        <a href="{{ route('kategori-program.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-party"></i>
                            <div data-i18n="Email">Kategori Program Panti</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Donasi</span></li>
                    <li class="menu-item {{ request()->is('donasi/donasi-uang') ? 'active' : '' }}">
                        <a href="{{ route('donasi-uang.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-money"></i>
                            <div data-i18n="Basic">Donasi Uang</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('donasi/donasi-barang') ? 'active' : '' }}">
                        <a href="{{ route('donasi-barang.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-donate-heart"></i>
                            <div data-i18n="Basic">Donasi Barang</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="cards-basic.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-graduation"></i>
                            <div data-i18n="Basic">Donasi Beasiswa</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuangan</span></li>
                    <li class="menu-item {{ request()->is('keuangan/statistik-keuangan') ? 'active' : '' }}">
                        <a href="{{ route('pemasukan-panti.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bar-chart"></i>
                            <div data-i18n="Tables">Statistik Keuangan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('keuangan/pemasukan-panti') ? 'active' : '' }}">
                        <a href="{{ route('pemasukan-panti.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-wallet"></i>
                            <div data-i18n="Tables">Pemasukan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('keuangan/pengeluaran*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-money-withdraw"></i>
                            <div data-i18n="Profile">Pengularan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('keuangan/pengeluaran-total') ? 'active' : '' }}">
                                <a href="{{ route('pengeluaran-total.index') }}" class="menu-link">
                                    <div data-i18n="CRM">Data Pengeluaran Total</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('keuangan/pengeluaran-anak') ? 'active' : '' }}">
                                <a href="{{ route('pengeluaran-anak.index') }}" class="menu-link">
                                    <div data-i18n="CRM">Pengeluaran Anak Asuh</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('keuangan/pengeluaran-panti') ? 'active' : '' }}">
                                <a href="{{ route('pengeluaran-panti.index') }}" class="menu-link">
                                    <div data-i18n="Analytics">Pengeluaran Panti Asuhan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="menu-item {{ request()->is('keuangan/laporan-keuangan*') || request()->is('keuangan/neraca-keuangan*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-food-menu"></i>
                            <div data-i18n="Profile">Laporan Keuangan</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item {{ request()->is('keuangan/laporan-keuangan-bulanan') || request()->is('keuangan/neraca-keuangan-bulanan') ? 'active' : '' }}">
                                <a href="{{ route('laporan-keuangan.bulanan') }}" class="menu-link">
                                    <div data-i18n="CRM">Laporan Bulanan</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ request()->is('keuangan/laporan-keuangan-tahunan') || request()->is('keuangan/neraca-keuangan-tahunan') ? 'active' : '' }}">
                                <a href="{{ route('laporan-keuangan.tahunan') }}" class="menu-link">
                                    <div data-i18n="CRM">Laporan Tahunan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Anak Asuh</span></li>
                    <li class="menu-item {{ request()->is('anak-asuh/data-anak') ? 'active' : '' }}">
                        <a href="{{ route('data-anak.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-child"></i>
                            <div data-i18n="Support">Data Anak Asuh</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('anak-asuh/pendidikan-anak') ? 'active' : '' }}">
                        <a href="{{ route('pendidikan-anak.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-school"></i>
                            <div data-i18n="Documentation">Pendidikan Anak Asuh</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('anak-asuh/kesehatan-anak') ? 'active' : '' }}">
                        <a href="{{ route('kesehatan-anak.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-heart"></i>
                            <div data-i18n="Documentation">Kesehatan Anak Asuh</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('anak-asuh/prestasi*') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-medal"></i>
                            <div data-i18n="Profile">Prestasi Anak</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('anak-asuh/prestasi-anak') ? 'active' : '' }}">
                                <a href="{{ route('prestasi-anak.index') }}" class="menu-link">
                                    <div data-i18n="Documentation">Prestasi Anak Asuh</div>
                                </a>
                            </li>
                            <li
                                class="menu-item {{ request()->is('anak-asuh/prestasi-akademik-anak') ? 'active' : '' }}">
                                <a href="{{ route('prestasi-akademik-anak.index') }}" class="menu-link">
                                    <div data-i18n="Documentation">Prestasi Akademik Anak Asuh</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center w-90">
                            <form class="w-100" id="searchForm">
                                <div class="nav-item d-flex align-items-center w-100 rounded-search">
                                    <div class="">
                                        <i class="bx bx-search fs-4 lh-0"></i>
                                    </div>
                                    <div class="w-90">
                                        <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-3"
                                            width="75%" name="q" placeholder="Search..."
                                            aria-label="Search..." id="search" value="{{ request('q') }}" />
                                    </div>
                                    <i class='bx bx-x' id="clearSearch" style="cursor: pointer;"></i>
                                </div>
                            </form>
                        </div>
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="content-wrapper">
                    @yield('content')
                    <footer class="content-footer footer bg-footer-theme">
                    </footer>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan elemen-elemen yang dibutuhkan
            var searchForm = document.getElementById('searchForm');
            var searchInput = document.getElementById('search');
            var clearSearch = document.getElementById('clearSearch');
            clearSearch.addEventListener('click', function() {
                searchInput.value = '';
                searchForm.submit();
            });
            searchForm.addEventListener('submit', function() {
                searchForm.submit();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    @yield('scripts')
</body>

</html>
