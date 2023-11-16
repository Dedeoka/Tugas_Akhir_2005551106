@extends('layouts.admin')

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
        <li class="menu-item">
            <a href="{{ route('data-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-child"></i>
                <div data-i18n="Support">Data Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{ route('pendidikan-anak.index') }}" class="menu-link">
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
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Pendidikan Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Pendidikan Anak Asuh
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
                                        <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Data Pendidikan Anak
                                            Asuh</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <form id="dataAnakForm" action="{{ route('pendidikan-anak.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="children_id" class="form-label">Nama Anak</label>
                                                        <select class="form-select" id="children_id" name="children_id"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>Pilih Nama Anak Asuh
                                                            </option>
                                                            @foreach ($childs as $child)
                                                                <option value="{{ $child->id }}">{{ $child->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div id="childrenError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Jenjang
                                                            Pendidikan</label>
                                                        <select class="form-select" id="name" name="name"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>Pilih Jenjang Pendidikan
                                                            </option>
                                                            <option value="TK">TK</option>
                                                            <option value="SD">SD</option>
                                                            <option value="SMP">SMP</option>
                                                            <option value="SMA/K">SMA/K</option>
                                                            <option value="D1">D1</option>
                                                            <option value="D2">D2</option>
                                                            <option value="D3">D3</option>
                                                            <option value="D4">D4</option>
                                                            <option value="S1">S1</option>
                                                        </select>
                                                        <div id="nameError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="school_name" class="form-label">Nama Sekolah</label>
                                                        <input type="text" class="form-control" id="school_name"
                                                            name="school_name" placeholder="Nama Sekolah..." />
                                                        <div id="school_nameError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="graduation_date" class="form-label">Tanggal
                                                            Kelulusan</label>
                                                        <input class="form-control" type="date" id="graduation_date"
                                                            name="graduation_date" />
                                                        <div id="gradution_dateError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="certificate" class="form-label">Bukti
                                                            Kelulusan</label>
                                                        <input class="form-control" type="file" id="certificate"
                                                            name="certificate" />
                                                        <div id="certificateError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Deskripsi
                                                            Pendidikan</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                        <div id="descriptionError" class="invalid-feedback"></div>
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
                                <th class="col-md-1 text-center fw-bold">Nama Anak</th>
                                <th class="col-md-1 text-center fw-bold">Jenjang Pendidikan</th>
                                <th class="col-md-1 text-center fw-bold">Nama Sekolah</th>
                                <th class="col-md-1 text-center fw-bold">Tanggal Kelulusan</th>
                                <th class="col-md-1 text-center fw-bold">Bukti Kelulusan</th>
                                <th class="col-md-2 text-center fw-bold">Deskripsi Pendidikan</th>
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
                                    <td>{{ $data->childrens->name }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->school_name }}</td>
                                    <td>{{ $data->graduation_date }}</td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Bukti Kelulusan {{ $data->childrens->name }}">
                                                <img src="{{ asset('storage/' . $data->certificate) }}" alt=""
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterAkta_{{ $loop->index }}">
                                            </li>
                                            <div class="modal fade" id="modalCenterAkta_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Bukti Kelulusan
                                                                {{ $data->childrens->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <img src="{{ asset('storage/' . $data->certificate) }}"
                                                                    alt="" width="700px" height="450px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>{{ $data->description }}</td>
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
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Pendidikan Anak Asuh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pendidikan-anak.update', $data->id) }}"
                                data-id="{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="editChildren_id{{ $data->id }}"
                                                        class="form-label">Nama Anak</label>
                                                    <select class="form-select" id="editChildren_id{{ $data->id }}"
                                                        name="editChildren_id{{ $data->id }}"
                                                        aria-label="Default select example">
                                                        <option value="" hidden>Pilih Nama Anak Asuh</option>
                                                        @foreach ($childs as $child)
                                                            <option value="{{ $child->id }}"
                                                                {{ $child->id == $data->children_id ? 'selected' : '' }}>
                                                                {{ $child->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div id="editChildren_idError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editName{{ $data->id }}" class="form-label">Jenjang
                                                        Pendidikan</label>
                                                    <select class="form-select" id="editName{{ $data->id }}"
                                                        name="editName{{ $data->id }}"
                                                        aria-label="Default select example">
                                                        <option value="" hidden>Pilih Jenjang Pendidikan</option>
                                                        <option value="TK"
                                                            {{ $data->name == 'TK' ? 'selected' : '' }}>TK</option>
                                                        <option value="SD"
                                                            {{ $data->name == 'SD' ? 'selected' : '' }}>SD</option>
                                                        <option value="SMP"
                                                            {{ $data->name == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                        <option value="SMA/K"
                                                            {{ $data->name == 'SMA/K' ? 'selected' : '' }}>SMA/K</option>
                                                        <option value="D1"
                                                            {{ $data->name == 'D1' ? 'selected' : '' }}>D1</option>
                                                        <option value="D2"
                                                            {{ $data->name == 'D2' ? 'selected' : '' }}>D2</option>
                                                        <option value="D3"
                                                            {{ $data->name == 'D3' ? 'selected' : '' }}>D3</option>
                                                        <option value="D4"
                                                            {{ $data->name == 'D4' ? 'selected' : '' }}>D4</option>
                                                        <option value="S1"
                                                            {{ $data->name == 'S1' ? 'selected' : '' }}>S1</option>
                                                    </select>
                                                    <div id="editNameError{{ $data->id }}" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editSchool_name{{ $data->id }}"
                                                        class="form-label">Nama Sekolah</label>
                                                    <input type="text" class="form-control"
                                                        id="editSchool_name{{ $data->id }}"
                                                        name="editSchool_name{{ $data->id }}"
                                                        placeholder="Nama Sekolah..." value="{{ $data->school_name }}" />
                                                    <div id="editSchool_nameError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editGraduation_date{{ $data->id }}"
                                                        class="form-label">Tanggal
                                                        Kelulusan</label>
                                                    <input class="form-control" type="date"
                                                        id="editGraduation_date{{ $data->id }}"
                                                        name="editGraduation_date{{ $data->id }}"
                                                        value="{{ $data->graduation_date }}" />
                                                    <div id="editGraduation_dateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editCertificate{{ $data->id }}"
                                                        class="form-label">Bukti
                                                        Kelulusan</label>
                                                    <input class="form-control" type="file"
                                                        id="editCertificate{{ $data->id }}"
                                                        name="editCertificate{{ $data->id }}" />
                                                    <div id="editCertificateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editDescription{{ $data->id }}"
                                                        class="form-label">Deskripsi
                                                        Pendidikan</label>
                                                    <textarea class="form-control" id="editDescription{{ $data->id }}" name="editDescription{{ $data->id }}"
                                                        rows="3">{{ $data->description }}</textarea>
                                                    <div id="editDescriptionError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary updateSubmit"
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
                $('#children_id').val('');
                $('#name').val('');
                $('#school_name').val('');
                $('#graduation_date').val('');
                $('#certificate').val('');
                $('#description').val('');
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

                const formData = new FormData($('#dataAnakForm')[0])
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }
                $.ajax({
                    url: "{{ route('pendidikan-anak.store') }}",
                    type: 'POST',
                    data: formData,
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
                if (errors.children_id) {
                    $('#children_id').addClass('is-invalid');
                    $('#children_idError').text(errors.children_id[0]);
                }
                if (errors.name) {
                    $('#name').addClass('is-invalid');
                    $('#nameError').text(errors.name[0]);
                }
                if (errors.school_name) {
                    $('#school_name').addClass('is-invalid');
                    $('#school_nameError').text(errors.school_name[0]);
                }
                if (errors.graduation_date) {
                    $('#graduation_date').addClass('is-invalid');
                    $('#graduation_dateError').text(errors.graduation_date[0]);
                }
                if (errors.certificate) {
                    $('#certificate').addClass('is-invalid');
                    $('#certificateError').text(errors.certificate[0]);
                }
                if (errors.description) {
                    $('#description').addClass('is-invalid');
                    $('#descriptionError').text(errors.description[0]);
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

            $('.updateSubmit').click(function(e) {
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
                var formData = new FormData();

                // Add text data to FormData
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('children_id', $('#editChildren_id' + id).val());
                formData.append('name', $('#editName' + id).val());
                formData.append('school_name', $('#editSchool_name' + id).val());
                formData.append('graduation_date', $('#editGraduation_date' + id).val());
                formData.append('description', $('#editDescription' + id).val());

                // Add file data to FormData if available
                var certificate = $('#editCertificate' + id)[0].files[0];

                if (certificate) {
                    formData.append('editCertificate', certificate);
                }

                formData.append('_method', 'patch');
                var url = "{{ url('anak-asuh/pendidikan-anak') }}" + '/' + id;
                console.log('URL:', url);
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
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
                if (errors.children_id) {
                    $('#editChildren_id' + id).addClass('is-invalid');
                    $('#editChildren_idError' + id).text(errors.children_id[0]);
                }
                if (errors.name) {
                    $('#editName' + id).addClass('is-invalid');
                    $('#editNameError' + id).text(errors.name[0]);
                }
                if (errors.school_name) {
                    $('#editSchool_name' + id).addClass('is-invalid');
                    $('#editSchool_nameError' + id).text(errors.school_name[0]);
                }
                if (errors.graduation_date) {
                    $('#editGraduation_date' + id).addClass('is-invalid');
                    $('#editGraduation_dateError' + id).text(errors.graduation_date[0]);
                }
                if (errors.certificate) {
                    $('#editCertificate' + id).addClass('is-invalid');
                    $('#editCertificateError' + id).text(errors.certificate[0]);
                }
                if (errors.description) {
                    $('#editDescription' + id).addClass('is-invalid');
                    $('#editDescriptionError' + id).text(errors.description[0]);
                }
            }

            function clearUpdateErrors(id) {
                // Clear previous errors
                $('#editChildren_id' + id).removeClass('is-invalid');
                $('#editName' + id).removeClass('is-invalid');
                $('#editSchool_name' + id).removeClass('is-invalid');
                $('#editGraduation_date' + id).removeClass('is-invalid');
                $('#editCertificate' + id).removeClass('is-invalid');
                $('#editDescription' + id).removeClass('is-invalid');
                // Clear error messages
                $('#editChildren_idError' + id).text('');
                $('#editNameError' + id).text('');
                $('#editSchool_nameError' + id).text('');
                $('#editGraduation_dateError' + id).text('');
                $('#editCertificateError' + id).text('');
                $('#editDescriptionError' + id).text('');
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
                fetch(`/anak-asuh/pendidikan-anak/${dataId}`, {
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
