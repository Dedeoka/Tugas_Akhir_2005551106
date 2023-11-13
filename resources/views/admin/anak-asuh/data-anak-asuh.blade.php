@extends('layouts.admin')

@section('search')
    <div class="navbar-nav align-items-center w-50">
        <form action="" onsubmit="javascript:void(0);" class="w-100">
            <div class="nav-item d-flex align-items-center w-100">
                <div class="">
                    <i class="bx bx-search fs-4 lh-0"></i>
                </div>
                <div class="w-100">
                    <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-3" width="75%" name="q"
                        placeholder="Search..." aria-label="Search..." id="search" />
                </div>
            </div>
        </form>
    </div>
@endsection

@section('menu-bar')
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Basic">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Profile">Profile Panti</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                        class="menu-link">
                        <div data-i18n="CRM">Data Profile Panti</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
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
        <!-- Apps -->
        <li class="menu-item">
            <a href="{{ route('kategori-barang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                <div data-i18n="Email">Kategori Barang</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-pemasukan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Email">Kategori Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-pengeluaran.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div data-i18n="Email">Kategori Pengeluaran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-program.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-party"></i>
                <div data-i18n="Email">Kategori Program Panti</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-penyakit.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-virus"></i>
                <div data-i18n="Email">Kategori Penyakit</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Donasi</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic">Donasi Uang</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-donate-heart"></i>
                <div data-i18n="Basic">Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Basic">Donasi Beasiswa</div>
            </a>
        </li>
        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuangan</span></li>
        <!-- Tables -->
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-wallet"></i>
                <div data-i18n="Tables">Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money-withdraw"></i>
                <div data-i18n="Tables">Pengularan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Tables">Laporan Bulanan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-food-menu"></i>
                <div data-i18n="Tables">Laporan Tahunan</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Anak Asuh</span></li>
        <li class="menu-item active">
            <a href="{{ route('data-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-child"></i>
                <div data-i18n="Support">Data Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Documentation">Pendidikan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                class="menu-link">
                <i class="menu-icon tf-icons bx bxs-heart"></i>
                <div data-i18n="Documentation">Kesehatan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-medal"></i>
                <div data-i18n="Documentation">Prestasi Anak Asuh</div>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Data Anak Asuh
                    </h3>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="mt-3 mb-3">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class='bx bx-export m-1'></i>
                                Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
                            <div class="">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                                    <i class='bx bx-plus m-1'></i>
                                    Tambah Data
                                </button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                                    aria-labelledby="offcanvasEndLabel">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Data Anak Asuh</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <form id="dataAnakForm" action="{{ route('data-anak.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nama Anak</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Nama Anak..." />
                                                        <div id="nameError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="place_of_birth" class="form-label">Tempat
                                                            Lahir</label>
                                                        <input type="text" class="form-control" id="place_of_birth"
                                                            name="place_of_birth" placeholder="Tempat Lahir..." />
                                                        <div id="placeOfBirthError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date_of_birth" class="form-label">Tanggal
                                                            Lahir</label>
                                                        <input class="form-control" type="date" id="date_of_birth"
                                                            name="date_of_birth" />
                                                        <div id="dateOfBirthError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                                        <select class="form-select" id="gender" name="gender"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>Pilih Jenis Kelamin
                                                            </option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        <div id="genderError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="religion" class="form-label">Agama</label>
                                                        <select class="form-select" id="religion" name="religion"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>Pilih Agama</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                                            <option value="Kristen Katolik">Kristen Katolik</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                        <div id="religionError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="status" name="status"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>Status Anak Asuh</option>
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Non-Aktif">Non-Aktif</option>
                                                        </select>
                                                        <div id="statusError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="birth_certificate" class="form-label">Akta
                                                            Kelahiran</label>
                                                        <input class="form-control" type="file" id="birth_certificate"
                                                            name="birth_certificate" />
                                                        <div id="birthCertificateError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="family_card" class="form-label">Kartu Keluarga</label>
                                                        <input class="form-control" type="file" id="family_card"
                                                            name="family_card" />
                                                        <div id="familyCardError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ktp" class="form-label">Kartu Tanda Pengenal (KTP
                                                            atau Tanda Pengenal Lainnya)</label>
                                                        <input class="form-control" type="file" id="ktp"
                                                            name="ktp" />
                                                        <div id="ktpError" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                            <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                                data-bs-dismiss="offcanvas">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-1 text-center fw-bold">Nama</th>
                                <th class="col-md-1 text-center fw-bold">Tanggal Lahir</th>
                                <th class="col-md-1 text-center fw-bold">Tempat Lahir</th>
                                <th class="col-md-1 text-center fw-bold">Jenis Kelamin</th>
                                <th class="col-md-1 text-center fw-bold">Agama</th>
                                <th class="col-md-2 text-center fw-bold">Akta Kelahiran</th>
                                <th class="col-md-2 text-center fw-bold">Kartu Keluarga</th>
                                <th class="col-md-2 text-center fw-bold">Kartu Pengenal</th>
                                <th class="col-md-1 text-center fw-bold">Status</th>
                                <th class="col-md-1 text-center fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $initialNumber = $datas->firstItem() - 1;
                            @endphp
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration + $initialNumber }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->date_of_birth }}</td>
                                    <td>{{ $data->place_of_birth }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->religion }}</td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Akta Kelahiran {{ $data->name }}">
                                                <img src="{{ asset('storage/' . $data->birth_certificate) }}"
                                                    alt="" data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterAkta_{{ $loop->index }}">
                                            </li>
                                            <div class="modal fade" id="modalCenterAkta_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Akta Kelahiran
                                                                {{ $data->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <img src="{{ asset('storage/' . $data->birth_certificate) }}"
                                                                    alt="" width="700px" height="450px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Kartu Keluarga {{ $data->name }}">
                                                <img src="{{ asset('storage/' . $data->family_card) }}" alt=""
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterKk_{{ $loop->index }}">
                                            </li>
                                            <div class="modal fade" id="modalCenterKk_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Kartu Keluarga
                                                                {{ $data->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <img src="{{ asset('storage/' . $data->family_card) }}"
                                                                    alt="" width="700px" height="450px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Tanda Pengenal {{ $data->name }}">
                                                <img src="{{ asset('storage/' . $data->ktp) }}" alt=""
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterKtp_{{ $loop->index }}">
                                            </li>
                                            <div class="modal fade" id="modalCenterKtp_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Tanda Pengenal
                                                                {{ $data->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <img src="{{ asset('storage/' . $data->ktp) }}"
                                                                    alt="" width="700px" height="450px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $data->id }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                                <a class="dropdown-item delete-data" href="javascript:void(0);"
                                                    data-id="{{ $data->id }}">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">Data Tidak Ditemukan</h3>
                @endif
                <div class="d-flex mt-4">
                    <div class="pagination-side-content"></div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-round pagination-primary">
                            <!-- First Page -->
                            <li class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $datas->url(1) }}">
                                    <i class="tf-icon bx bx-chevrons-left"></i>
                                </a>
                            </li>
                            <!-- Previous Page -->
                            <li class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $datas->previousPageUrl() }}">
                                    <i class="tf-icon bx bx-chevron-left"></i>
                                </a>
                            </li>
                            <!-- Pagination Pages -->
                            @php
                                $currentPage = $datas->currentPage();
                                $lastPage = $datas->lastPage();
                                $startPage = max(1, $currentPage - 1);
                                $endPage = min($lastPage, $startPage + 3);

                                if ($endPage - $startPage < 3) {
                                    $startPage = max(1, $lastPage - 3);
                                    $endPage = $lastPage;
                                }
                            @endphp
                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <li class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $datas->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <!-- Next Page -->
                            <li class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $datas->nextPageUrl() }}">
                                    <i class="tf-icon bx bx-chevron-right"></i>
                                </a>
                            </li>
                            <!-- Last Page -->
                            <li
                                class="page-item last {{ $datas->currentPage() == $datas->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $datas->url($lastPage) }}">
                                    <i class="tf-icon bx bx-chevrons-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Modal Edit -->
            @foreach ($datas as $data)
                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Data Anak Asuh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('data-anak.update', $data->id) }}" data-id="{{ $data->id }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="editName{{ $data->id }}" class="form-label">Nama
                                                        Anak</label>
                                                    <input type="text" class="form-control"
                                                        id="editName{{ $data->id }}" name="name"
                                                        value="{{ $data->name }}" placeholder="Nama Anak..." />
                                                    <div id="editNameError{{ $data->id }}" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editPlace_of_birth{{ $data->id }}"
                                                        class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control"
                                                        id="editPlace_of_birth{{ $data->id }}" name="place_of_birth"
                                                        value="{{ $data->place_of_birth }}"
                                                        placeholder="Tempat Lahir..." />
                                                    <div id="editPlaceOfBirthError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editDate_of_birth{{ $data->id }}"
                                                        class="form-label">Tanggal Lahir</label>
                                                    <input class="form-control" type="date"
                                                        id="editDate_of_birth{{ $data->id }}" name="date_of_birth"
                                                        value="{{ $data->date_of_birth }}" />
                                                    <div id="editDateOfBirthError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editGender{{ $data->id }}" class="form-label">Jenis
                                                        Kelamin</label>
                                                    <select class="form-select" id="editGender{{ $data->id }}"
                                                        name="gender" aria-label="Default select example">
                                                        <option value="" hidden>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-Laki"
                                                            {{ $data->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            {{ $data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                        </option>
                                                    </select>
                                                    <div id="editGenderError{{ $data->id }}"
                                                        class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editReligion{{ $data->id }}"
                                                        class="form-label">Agama</label>
                                                    <select class="form-select" id="editReligion{{ $data->id }}"
                                                        name="religion" aria-label="Default select example">
                                                        <option value="" hidden>Pilih Agama</option>
                                                        <option value="Islam"
                                                            {{ $data->religion == 'Islam' ? 'selected' : '' }}>Islam
                                                        </option>
                                                        <option value="Hindu"
                                                            {{ $data->religion == 'Hindu' ? 'selected' : '' }}>Hindu
                                                        </option>
                                                        <option value="Kristen Protestan"
                                                            {{ $data->religion == 'Kristen Protestan' ? 'selected' : '' }}>
                                                            Kristen Protestan</option>
                                                        <option value="Kristen Katolik"
                                                            {{ $data->religion == 'Kristen Katolik' ? 'selected' : '' }}>
                                                            Kristen Katolik</option>
                                                        <option value="Budha"
                                                            {{ $data->religion == 'Budha' ? 'selected' : '' }}>Budha
                                                        </option>
                                                        <option value="Konghucu"
                                                            {{ $data->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                                        </option>
                                                    </select>
                                                    <div id="editReligionError{{ $data->id }}"
                                                        class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editStatus{{ $data->id }}"
                                                        class="form-label">Status</label>
                                                    <select class="form-select" id="editStatus{{ $data->id }}"
                                                        name="status" aria-label="Default select example">
                                                        <option value="" hidden>Status Anak Asuh</option>
                                                        <option value="Aktif"
                                                            {{ $data->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="Non-Aktif"
                                                            {{ $data->status == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif
                                                        </option>
                                                    </select>
                                                    <div id="editStatusError{{ $data->id }}"
                                                        class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editBirth_certificate{{ $data->id }}"
                                                        class="form-label">Akta
                                                        Kelahiran</label>
                                                    <input class="form-control" type="file"
                                                        id="editBirth_certificate{{ $data->id }}"
                                                        name="birth_certificate" />
                                                    <div id="editBirthCertificateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editFamily_card{{ $data->id }}"
                                                        class="form-label">Kartu
                                                        Keluarga</label>
                                                    <input class="form-control" type="file"
                                                        id="editFamily_card{{ $data->id }}" name="family_card" />
                                                    <div id="editFamilyCardError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editKtp{{ $data->id }}" class="form-label">Kartu
                                                        Tanda
                                                        Pengenal (KTP
                                                        atau Tanda Pengenal Lainnya)</label>
                                                    <input class="form-control" type="file"
                                                        id="editKtp{{ $data->id }}" name="ktp" />
                                                    <div id="editKtpError{{ $data->id }}" class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="updateSubmit"
                                        data-id="{{ $data->id }}">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
        $(document).ready(function() {
            // Setup CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function clearForm() {
                // Ganti ID sesuai dengan form Anda
                $('#name').val('');
                $('#place_of_birth').val('');
                $('#date_of_birth').val('');
                $('#gender').val('');
                $('#religion').val('');
                $('#status').val('');
                $('#birth_certificate').val('');
                $('#family_card').val('');
                $('#ktp').val('');
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            }

            function showSuccessMessage(message) {
                Swal.fire({
                    icon: 'success',
                    title: message,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }

            function showErrorMessage(message) {
                Swal.fire({
                    icon: 'error',
                    title: message,
                });
            }

            $('#dataAnakForm').on('submit', function(e) {
                e.preventDefault();
                clearErrors();
                simpan();
                return false;
            });

            function simpan() {
                $.ajax({
                    url: "{{ route('data-anak.store') }}",
                    type: 'POST',
                    data: new FormData($('#dataAnakForm')[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.errors) {
                            handleErrors(response.errors);
                        } else {
                            // Menghapus kelas is-invalid dari semua elemen input
                            $('.form-control').removeClass('is-invalid');

                            // Menggunakan sweetalert
                            Swal.fire({
                                icon: 'success',
                                title: response.success,
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                            $('#offcanvasEnd').offcanvas('hide');
                        }
                    }
                });
            }

            function clearErrors() {
                // Hapus kelas is-invalid dari semua elemen input
                document.querySelectorAll('.form-control', ).forEach(function(element) {
                    element.classList.remove('is-invalid');
                });

                document.querySelectorAll('.form-select', ).forEach(function(element) {
                    element.classList.remove('is-invalid');
                });

                // Sembunyikan pesan error
                document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                    element.innerHTML = '';
                });
            }

            function handleErrors(errors) {
                clearErrors();

                // Menambahkan kelas is-invalid hanya untuk elemen input yang memiliki error
                if (errors.name) {
                    $('#name').addClass('is-invalid');
                    $('#nameError').text(errors.name[0]);
                }
                if (errors.place_of_birth) {
                    $('#place_of_birth').addClass('is-invalid');
                    $('#placeOfBirthError').text(errors.place_of_birth[0]);
                }
                if (errors.date_of_birth) {
                    $('#date_of_birth').addClass('is-invalid');
                    $('#dateOfBirthError').text(errors.date_of_birth[0]);
                }
                if (errors.gender) {
                    $('#gender').addClass('is-invalid');
                    $('#genderError').text(errors.gender[0]);
                }
                if (errors.religion) {
                    $('#religion').addClass('is-invalid');
                    $('#religionError').text(errors.religion[0]);
                }
                if (errors.status) {
                    $('#status').addClass('is-invalid');
                    $('#statusError').text(errors.status[0]);
                }
                if (errors.birth_certificate) {
                    $('#birth_certificate').addClass('is-invalid');
                    $('#birthCertificateError').text(errors.birth_certificate[0]);
                }
                if (errors.family_card) {
                    $('#family_card').addClass('is-invalid');
                    $('#familyCardError').text(errors.family_card[0]);
                }
                if (errors.ktp) {
                    $('#ktp').addClass('is-invalid');
                    $('#ktpError').text(errors.ktp[0]);
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#updateSubmit').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                update(id);
            });

            function showSuccessMessage(message) {
                Swal.fire({
                    icon: 'success',
                    title: message,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }

            function showErrorMessage(message) {
                Swal.fire({
                    icon: 'error',
                    title: message,
                });
            }

            function update(id) {
                var birthCertificateFile = $('#editBirth_certificate' + id)[0].files[0];
                var familyCardFile = $('#editFamily_card' + id)[0].files[0];
                var ktpFile = $('#editKtp' + id)[0].files[0];

                var url = "{{ url('anak-asuh/data-anak') }}" + '/' + id;
                console.log('URL:', url);

                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: function() {
                        var formData = new FormData();

                        // Menambahkan data teks ke FormData
                        formData.append('_token', '{{ csrf_token() }}');
                        formData.append('name', $('#editName' + id).val());
                        formData.append('place_of_birth', $('#editPlace_of_birth' + id).val());
                        formData.append('date_of_birth', $('#editDate_of_birth' + id).val());
                        formData.append('gender', $('#editGender' + id).val());
                        formData.append('religion', $('#editReligion' + id).val());
                        formData.append('status', $('#editStatus' + id).val());

                        // Menambahkan file ke FormData jika ada
                        if (birthCertificateFile) {
                            formData.append('birth_certificate', birthCertificateFile);
                        }

                        if (familyCardFile) {
                            formData.append('family_card', familyCardFile);
                        }

                        if (ktpFile) {
                            formData.append('ktp', ktpFile);
                        }

                        return formData;
                    }(),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            handleUpdateErrors(response.errors, id);
                            console.log('Error Response:', response);
                        } else {
                            // Handle success
                            showSuccessMessage(response.success);
                            $('#editModal' + id).modal('hide');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle other types of errors (e.g., server errors)
                        console.error('XHR Response:', xhr.responseText);
                        showErrorMessage("An error occurred while updating data.");
                    }
                });
            }

            function handleUpdateErrors(errors, id) {
                // Clear previous errors
                clearUpdateErrors(id);

                // Display new errors
                if (errors.name) {
                    $('#editName' + id).addClass('is-invalid');
                    $('#editNameError' + id).text(errors.name[0]);
                }
                if (errors.place_of_birth) {
                    $('#editPlace_of_birth' + id).addClass('is-invalid');
                    $('#editPlaceOfBirthError' + id).text(errors.place_of_birth[0]);
                }
                if (errors.date_of_birth) {
                    $('#editDate_of_birth' + id).addClass('is-invalid');
                    $('#editDateOfBirthError' + id).text(errors.date_of_birth[0]);
                }
                if (errors.gender) {
                    $('#editGender' + id).addClass('is-invalid');
                    $('#editGenderError' + id).text(errors.gender[0]);
                }
                if (errors.religion) {
                    $('#editReligion' + id).addClass('is-invalid');
                    $('#editReligionError' + id).text(errors.religion[0]);
                }
                if (errors.status) {
                    $('#editStatus' + id).addClass('is-invalid');
                    $('#editStatusError' + id).text(errors.status[0]);
                }
                if (errors.birth_certificate) {
                    $('#editBirth_certificate' + id).addClass('is-invalid');
                    $('#editBirthCertificateError' + id).text(errors.birth_certificate[0]);
                }
                if (errors.family_card) {
                    $('#editFamily_card' + id).addClass('is-invalid');
                    $('#editFamilyCardError' + id).text(errors.family_card[0]);
                }
                if (errors.ktp) {
                    $('#editKtp' + id).addClass('is-invalid');
                    $('#editKtpError' + id).text(errors.ktp[0]);
                }
            }

            function clearUpdateErrors(id) {
                // Clear previous errors
                $('#editName' + id).removeClass('is-invalid');
                $('#editPlace_of_birth' + id).removeClass('is-invalid');
                $('#editDate_of_birth' + id).removeClass('is-invalid');
                $('#editGender' + id).removeClass('is-invalid');
                $('#editReligion' + id).removeClass('is-invalid');
                $('#editStatus' + id).removeClass('is-invalid');
                $('#editBirth_certificate' + id).removeClass('is-invalid');
                $('#editFamily_card' + id).removeClass('is-invalid');
                $('#editKtp' + id).removeClass('is-invalid');

                // Clear error messages
                $('#editNameError' + id).text('');
                $('#editPlaceOfBirthError' + id).text('');
                $('#editDateOfBirthError' + id).text('');
                $('#editGenderError' + id).text('');
                $('#editReligionError' + id).text('');
                $('#editStatusError' + id).text('');
                $('#editBirthCertificateError' + id).text('');
                $('#editFamilyCardError' + id).text('');
                $('#editKtpError' + id).text('');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-data');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dataId = this.getAttribute('data-id');
                    if (dataId) {
                        showDeleteConfirmation(dataId);
                    }
                });
            });

            function showDeleteConfirmation(dataId) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    allowOutsideClick: false, // Menonaktifkan interaksi dengan elemen di luar popup
                    allowEscapeKey: false, // Menonaktifkan tombol escape
                    backdrop: 'rgba(0,0,0,0.5)', // Menonaktifkan klik di belakang popup
                    clickToClose: false, // Tidak mengizinkan pengguna menutup dengan mengklik
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim permintaan Ajax untuk menghapus data
                        deleteData(dataId);
                    }
                });
            }

            function deleteData(dataId) {
                // Kirim permintaan Ajax ke server
                fetch(`/anak-asuh/data-anak/${dataId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: 'Data berhasil dihapus.',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Kesalahan!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
@endsection
