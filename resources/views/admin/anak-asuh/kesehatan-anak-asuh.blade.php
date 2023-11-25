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
        <li class="menu-item">
            <a href="{{ route('pendidikan-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Documentation">Pendidikan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{ route('kesehatan-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-heart"></i>
                <div data-i18n="Documentation">Kesehatan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('prestasi-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-medal"></i>
                <div data-i18n="Documentation">Prestasi Anak Asuh</div>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Kesehatan Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Kesehatan Anak Asuh
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
                            <div class="">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exLargeModal">
                                    <i class='bx bx-plus m-1'></i>
                                    Tambah Data
                                </button>
                                <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-center">Tambah Data Anak Asuh</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-header">
                                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-home" class="nav-link"
                                                            role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-home"
                                                            aria-controls="navs-justified-home" aria-selected="true"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Kesehatan Anak</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <form id="dataAnakForm" action="{{ route('kesehatan-anak.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="nav-align-top mb-4">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active"
                                                                        id="navs-justified-home" role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <div class="mb-3">
                                                                                    <label for="children_id"
                                                                                        class="form-label">Nama
                                                                                        Anak</label>
                                                                                    <select class="form-select"
                                                                                        id="children_id"
                                                                                        name="children_id"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Nama Anak Asuh
                                                                                        </option>
                                                                                        @foreach ($childs as $child)
                                                                                            <option
                                                                                                value="{{ $child->id }}">
                                                                                                {{ $child->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div id="childrenError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="disease_id"
                                                                                        class="form-label">Nama
                                                                                        Penyakit</label>
                                                                                    <select class="form-select"
                                                                                        id="disease_id" name="disease_id"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Nama Penyakit
                                                                                        </option>
                                                                                        @foreach ($diseases as $disease)
                                                                                            <option
                                                                                                value="{{ $disease->id }}">
                                                                                                {{ $disease->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div id="diseaseError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="medicine"
                                                                                        class="form-label">Nama
                                                                                        Obat</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="medicine" name="medicine"
                                                                                        placeholder="Nama Obat..." />
                                                                                    <div id="medicineError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label d-block">Status
                                                                                        Kesehatan</label>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio" name="status"
                                                                                            id="sedangSakit"
                                                                                            value="Sedang Sakit" />
                                                                                        <label class="form-check-label"
                                                                                            for="sedangSakit">Sedang
                                                                                            Sakit</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio" name="status"
                                                                                            id="sudahSembuh"
                                                                                            value="Sudah Sembuh" />
                                                                                        <label class="form-check-label"
                                                                                            for="sudahSembuh">Sudah
                                                                                            Sembuh</label>
                                                                                    </div>
                                                                                    <div id="statusError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="date_of_illness"
                                                                                        class="form-label">Tanggal
                                                                                        Sakit</label>
                                                                                    <input class="form-control"
                                                                                        type="date"
                                                                                        id="date_of_illness"
                                                                                        name="date_of_illness" />
                                                                                    <div id="date_of_illnessError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3"
                                                                                    id="recoveryDateInput">
                                                                                    <label for="recovery_date"
                                                                                        class="form-label">Tanggal
                                                                                        Sembuh</label>
                                                                                    <input class="form-control"
                                                                                        type="date" id="recovery_date"
                                                                                        name="recovery_date" />
                                                                                    <div id="recovery_dateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label d-block">Pembayaran
                                                                                        Pemeriksaan dan Obat
                                                                                        Menggunakan</label>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="payment_method"
                                                                                            id="biayaPanti"
                                                                                            value="Biaya Panti Asuhan"
                                                                                            onchange="handlePaymentMethodChange()" />
                                                                                        <label class="form-check-label"
                                                                                            for="biayaPanti">Biaya Panti
                                                                                            Asuhan</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="payment_method"
                                                                                            id="bpjs"
                                                                                            value="KIS/BPJS"
                                                                                            onchange="handlePaymentMethodChange()" />
                                                                                        <label class="form-check-label"
                                                                                            for="bpjs">KIS/BPJS</label>
                                                                                    </div>
                                                                                    <div id="paymentError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3" id="medicalCostInput">
                                                                                    <label for="medical_check_cost"
                                                                                        class="form-label">Biaya
                                                                                        Pemeriksaan</label>
                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <span
                                                                                            class="input-group-text">Rp</span>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="medical_check_cost"
                                                                                            name="medical_check_cost"
                                                                                            placeholder="5,000"
                                                                                            oninput="formatAmount(this)" />
                                                                                        <div id="medicalCostError"
                                                                                            class="invalid-feedback"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3" id="drugCostInput">
                                                                                    <label for="drug_cost"
                                                                                        class="form-label">Biaya
                                                                                        Obat</label>
                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <span
                                                                                            class="input-group-text">Rp</span>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="drug_cost"
                                                                                            name="drug_cost"
                                                                                            placeholder="5,000"
                                                                                            oninput="formatAmount(this)" />
                                                                                        <div id="drugCostError"
                                                                                            class="invalid-feedback"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="form-label">Deskripsi
                                                                                        Kesehatan</label>
                                                                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                                                    <div id="descriptionError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" id="btnNextProfile"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
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
                                <th class="col-md-1 text-center fw-bold">Nama Penyakit</th>
                                <th class="col-md-1 text-center fw-bold">Obat Penyakit</th>
                                <th class="col-md-1 text-center fw-bold">Tanggal Sakit</th>
                                <th class="col-md-1 text-center fw-bold">Deskripsi</th>
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
                                    <td>{{ $data->childrens->name }}</td>
                                    <td>{{ $data->diseases->name }}</td>
                                    <td>{{ $data->medicine }}</td>
                                    <td>{{ $data->date_of_illness }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>
                                        @if ($data->status == 'Sudah Sembuh')
                                            <button type="button" class="btn rounded-pill btn-success"
                                                style="width: 100px;">
                                                Sembuh</button>
                                        @else
                                            <button type="button" class="btn rounded-pill btn-danger sakitBtn"
                                                style="width: 100px;" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                Sakit</button>
                                        @endif
                                    </td>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Data Data Anak Asuh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('kesehatan-anak.update', $data->id) }}" data-id="{{ $data->id }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="recovery_date{{ $data->id }}"
                                                        class="form-label">Tanggal
                                                        Sembuh</label>
                                                    <input class="form-control" type="date"
                                                        id="recovery_date{{ $data->id }}" name="recovery_date" />
                                                    <div id="recovery_dateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="medicine{{ $data->id }}" class="form-label">
                                                        Obat Tambahan</label>
                                                    <input type="text" class="form-control"
                                                        id="medicine{{ $data->id }}" name="medicine"
                                                        placeholder="Obat Tambahan..." />
                                                    <div id="medicineError{{ $data->id }}" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label d-block">Pembayaran
                                                        Pemeriksaan dan Obat
                                                        Tambahan Menggunakan</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" id="biayaPanti{{ $data->id }}"
                                                            value="Biaya Panti Asuhan"
                                                            onchange="handlePaymentEditChange({{ $data->id }})" />
                                                        <label class="form-check-label"
                                                            for="biayaPanti{{ $data->id }}">Biaya Panti
                                                            Asuhan</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" id="bpjs{{ $data->id }}"
                                                            value="KIS/BPJS"
                                                            onchange="handlePaymentEditChange({{ $data->id }})" />
                                                        <label class="form-check-label"
                                                            for="bpjs{{ $data->id }}">KIS/BPJS/Tidak Ada Biaya
                                                            Tambahan</label>
                                                    </div>
                                                    <div id="paymentError" class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3" id="medicalCostInput{{ $data->id }}">
                                                    <label for="medical_check_cost{{ $data->id }}"
                                                        class="form-label">Biaya
                                                        Tambahan Pemeriksaan</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="text" class="form-control"
                                                            id="medical_check_cost{{ $data->id }}"
                                                            name="medical_check_cost" placeholder="5,000"
                                                            oninput="formatAmount(this)" />
                                                        <div id="medicalCostError{{ $data->id }}"
                                                            class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3" id="drugCostInput{{ $data->id }}">
                                                    <label for="drug_cost{{ $data->id }}" class="form-label">Biaya
                                                        Tambahan
                                                        Obat</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="text" class="form-control"
                                                            id="drug_cost{{ $data->id }}" name="drug_cost"
                                                            placeholder="5,000" oninput="formatAmount(this)" />
                                                        <div id="drugCostError{{ $data->id }}"
                                                            class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary updateSubmit"
                                        data-id="{{ $data->id }}">Save Changes</button>
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
        function handlePaymentEditChange(id) {
            // Mendapatkan nilai radio button yang dipilih
            const selectedPaymentMethod = document.querySelector(`input[name="payment_method"]:checked`);

            // Mendapatkan elemen form input cost
            const medicalCheckCostInput = document.getElementById(`medicalCostInput` + id);
            const drugCostInput = document.getElementById(`drugCostInput` + id);

            // Memeriksa nilai radio button yang dipilih
            if (selectedPaymentMethod && selectedPaymentMethod.value === 'KIS/BPJS') {
                // Jika memilih BPJS, menyembunyikan form input cost dan mengatur nilainya menjadi 0
                medicalCheckCostInput.style.display = 'none';
                drugCostInput.style.display = 'none';

            } else {
                // Jika memilih Biaya Panti, menampilkan kembali form input cost
                medicalCheckCostInput.style.display = 'block';
                drugCostInput.style.display = 'block';
            }
        }
    </script>

    <script>
        function handlePaymentMethodChange() {
            // Mendapatkan nilai radio button yang dipilih
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');

            // Mendapatkan elemen form input cost
            const medicalCheckCostInput = document.getElementById('medicalCostInput');
            const drugCostInput = document.getElementById('drugCostInput');
            const medicalCost = document.getElementById('medical_cost');
            const drugCost = document.getElementById('drug_cost');

            // Memeriksa nilai radio button yang dipilih
            if (selectedPaymentMethod && selectedPaymentMethod.value === 'KIS/BPJS') {
                // Jika memilih BPJS, menyembunyikan form input cost dan mengatur nilainya menjadi 0
                medicalCheckCostInput.style.display = 'none';
                drugCostInput.style.display = 'none';
            } else {
                // Jika memilih Biaya Panti, menampilkan kembali form input cost
                medicalCheckCostInput.style.display = 'block';
                drugCostInput.style.display = 'block';
            }
        }
    </script>

    <script>
        function formatAmount(inputElement) {
            // Mendapatkan nilai input
            let inputValue = inputElement.value;

            // Menghapus karakter selain digit (misalnya, strip, titik, dll.)
            inputValue = inputValue.replace(/[^\d]/g, '');

            // Memformat angka dengan menambahkan titik sebagai pemisah ribuan
            inputValue = new Intl.NumberFormat().format(inputValue);

            // Menetapkan kembali nilai input yang sudah diformat
            inputElement.value = inputValue;
        }
    </script>

    <script>
        // Mendapatkan elemen radio button dan input tanggal
        const sedangSakitRadio = document.getElementById('sedangSakit');
        const sudahSembuhRadio = document.getElementById('sudahSembuh');
        const recoveryDateInput = document.getElementById('recoveryDateInput');

        // Menambahkan event listener untuk mendeteksi perubahan pada radio button
        sedangSakitRadio.addEventListener('change', function() {
            // Menonaktifkan input recovery_date dan mengatur nilai null jika sedangSakit dipilih
            if (sedangSakitRadio.checked) {
                recoveryDateInput.style.display = 'none';
                recoveryDateInput.value = null;
            }
        });

        sudahSembuhRadio.addEventListener('change', function() {
            // Mengaktifkan input recovery_date jika sudahSembuh dipilih
            if (sudahSembuhRadio.checked) {
                recoveryDateInput.style.display = 'block';
            }
        });
    </script>

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
                $('#disease_id').val('');
                $('#medicine').val('');
                $('#date_of_illness').val('');
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
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('children_id', $('#children_id').val());
                formData.append('disease_id', $('#disease_id').val());
                formData.append('medicine', $('#medicine').val());
                formData.append('date_of_illness', $('#date_of_illness').val());
                formData.append('recovery_date', $('#recovery_date').val());
                const status = $('input[name="status"]:checked').val();
                formData.append('status', status);
                formData.append('description', $('#description').val());
                const paymentMethod = $('input[name="payment_method"]:checked').val();
                formData.append('payment_method', paymentMethod);

                const drugCost = $('#drug_cost').val();
                const medicalCheckCost = $('#medical_check_cost').val();

                if (paymentMethod === 'KIS/BPJS') {
                    formData.append('drug_cost', '0');
                    formData.append('medical_check_cost', '0');
                } else {
                    formData.append('drug_cost', drugCost);
                    formData.append('medical_check_cost', medicalCheckCost);
                }

                console.log("Data yang dikirim:", Object.fromEntries(formData.entries()));

                $.ajax({
                    url: "{{ route('kesehatan-anak.store') }}",
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
                            $('#exLargeModal').modal('hide');
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle the case where the server returns an error status code
                        console.error(xhr.responseText);
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
                    $('#childrenError').text(errors.children_id[0]);
                }
                if (errors.disease_id) {
                    $('#disease_id').addClass('is-invalid');
                    $('#diseaseError').text(errors.disease_id[0]);
                }
                if (errors.medicine) {
                    $('#medicine').addClass('is-invalid');
                    $('#medicineError').text(errors.medicine[0]);
                }
                if (errors.date_of_illness) {
                    $('#date_of_illness').addClass('is-invalid');
                    $('#dateOfIllnessError').text(errors.date_of_illness[0]);
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
                formData.append('recovery_date', $('#recovery_date' + id).val());
                formData.append('medicine', $('#medicine' + id).val());
                const paymentMethod = $('input[name="payment_method"]:checked').val();
                formData.append('payment_method', paymentMethod);
                var medicalCheckCost = $('#medical_check_cost' + id).val() || '0';
                var drugCost = $('#drug_cost' + id).val() || '0';
                formData.append('medical_check_cost', medicalCheckCost);
                formData.append('drug_cost', drugCost);
                formData.append('_method', 'patch');

                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }

                var url = "{{ url('anak-asuh/kesehatan-anak') }}" + '/' + id;

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false, // Set this to false to prevent jQuery from processing the data
                    cache: false,
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

            // Function to format date to 'YYYY-MM-DD'
            function formatDate(dateString) {
                var date = new Date(dateString);
                var year = date.getFullYear();
                var month = (date.getMonth() + 1).toString().padStart(2, '0');
                var day = date.getDate().toString().padStart(2, '0');
                return year + '-' + month + '-' + day;
            }


            function handleUpdateErrors(errors, id) {
                // Clear previous errors
                clearUpdateErrors(id);

                // Menambahkan kelas is-invalid hanya untuk elemen input yang memiliki error
                if (errors.children_id) {
                    $('#editChildren_id' + id).addClass('is-invalid');
                    $('#editChildrenError' + id).text(errors.children_id[0]);
                }
                if (errors.disease_id) {
                    $('#editDisease_id' + id).addClass('is-invalid');
                    $('#editDiseaseError' + id).text(errors.disease_id[0]);
                }
                if (errors.medicine) {
                    $('#editMedicine' + id).addClass('is-invalid');
                    $('#editMedicineError' + id).text(errors.medicine[0]);
                }
                if (errors.date_of_illness) {
                    $('#editDate_of_illness' + id).addClass('is-invalid');
                    $('#editDateOfIllnessError' + id).text(errors.date_of_illness[0]);
                }
                if (errors.description) {
                    $('#editDescription' + id).addClass('is-invalid');
                    $('#editDescriptionError' + id).text(errors.description[0]);
                }
            }

            function clearUpdateErrors(id) {
                // Clear previous errors
                $('#editChildren_id' + id).removeClass('is-invalid');
                $('#editDisease_id' + id).removeClass('is-invalid');
                $('#editMedicine' + id).removeClass('is-invalid');
                $('#editDate_of_illness' + id).removeClass('is-invalid');
                $('#editDescription' + id).removeClass('is-invalid');

                // Clear error messages
                $('#editChildrenError' + id).text('');
                $('#editDiseaseError' + id).text('');
                $('#editMedicineError' + id).text('');
                $('#editDateOfIllnessError' + id).text('');
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
                fetch(`/anak-asuh/kesehatan-anak/${dataId}`, {
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


{{-- <div class="">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
        aria-controls="offcanvasEnd">
        <i class='bx bx-plus m-1'></i>
        Tambah Data
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Tambah Data Kesehatan Anak Asuh
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <form id="dataAnakForm" action="{{ route('kesehatan-anak.store') }}" method="POST">
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
                            <label for="disease_id" class="form-label">Nama Penyakit</label>
                            <select class="form-select" id="disease_id" name="disease_id"
                                aria-label="Default select example">
                                <option value="" hidden>Pilih Nama Penyakit
                                </option>
                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease->id }}">{{ $disease->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="diseaseError" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="medicine" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="medicine" name="medicine"
                                placeholder="Nama Obat..." />
                            <div id="medicineError" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_illness" class="form-label">Tanggal
                                Sakit</label>
                            <input class="form-control" type="date" id="date_of_illness"
                                name="date_of_illness" />
                            <div id="dateOfIllnessError" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi
                                Kesehatan</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                            <div id="descriptionError" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                <button type="button" class="btn btn-outline-secondary d-grid w-100"
                    data-bs-dismiss="offcanvas">Cancel</button>
            </form>
        </div>
    </div>
</div> --}}
