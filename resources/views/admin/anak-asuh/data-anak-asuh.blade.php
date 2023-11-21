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
        <li class="menu-item active">
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
        <li class="menu-item">
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
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Anak Asuh
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
                                                        <button type="button" id="tab-justified-home"
                                                            class="nav-link active" role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-home"
                                                            aria-controls="navs-justified-home" aria-selected="true"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Anak</span>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-profile"
                                                            class="nav-link" role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-profile"
                                                            aria-controls="navs-justified-profile" aria-selected="false"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Lainnya</span>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-messages"
                                                            class="nav-link" role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#ss" aria-controls="ss" aria-selected="false"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Wali</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <form id="dataAnakForm" action="{{ route('data-anak.store') }}"
                                                    method="POST" enctype="multipart/form-data">
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
                                                                                    <label for="name"
                                                                                        class="form-label">Nama
                                                                                        Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="name" name="name"
                                                                                        placeholder="Nama Anak..." />
                                                                                    <div id="nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="place_of_birth"
                                                                                        class="form-label">Tempat
                                                                                        Lahir</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="place_of_birth"
                                                                                        name="place_of_birth"
                                                                                        placeholder="Tempat Lahir..." />
                                                                                    <div id="placeOfBirthError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="date_of_birth"
                                                                                        class="form-label">Tanggal
                                                                                        Lahir</label>
                                                                                    <input class="form-control"
                                                                                        type="date" id="date_of_birth"
                                                                                        name="date_of_birth" />
                                                                                    <div id="dateOfBirthError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="gender"
                                                                                        class="form-label">Jenis
                                                                                        Kelamin</label>
                                                                                    <select class="form-select"
                                                                                        id="gender" name="gender"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>Pilih
                                                                                            Jenis Kelamin
                                                                                        </option>
                                                                                        <option value="Laki-Laki">Laki-Laki
                                                                                        </option>
                                                                                        <option value="Perempuan">Perempuan
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="genderError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="religion"
                                                                                        class="form-label">Agama</label>
                                                                                    <select class="form-select"
                                                                                        id="religion" name="religion"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>Pilih
                                                                                            Agama</option>
                                                                                        <option value="Islam">Islam
                                                                                        </option>
                                                                                        <option value="Hindu">Hindu
                                                                                        </option>
                                                                                        <option value="Kristen Protestan">
                                                                                            Kristen Protestan</option>
                                                                                        <option value="Kristen Katolik">
                                                                                            Kristen Katolik</option>
                                                                                        <option value="Budha">Budha
                                                                                        </option>
                                                                                        <option value="Konghucu">Konghucu
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="religionError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="congenital_disease"
                                                                                        class="form-label">Penyakit
                                                                                        Bawaan (Kosongkan Bila Tidak
                                                                                        Ada)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="congenital_disease"
                                                                                        name="congenital_disease"
                                                                                        placeholder="Penaykit Bawaan..." />
                                                                                    <div id="congenital_diseaseError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="status"
                                                                                        class="form-label">Status</label>
                                                                                    <select class="form-select"
                                                                                        id="status" name="status"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Status Anak Asuh</option>
                                                                                        <option value="Aktif">Aktif
                                                                                        </option>
                                                                                        <option value="Non-Aktif">Non-Aktif
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="statusError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="image"
                                                                                        class="form-label">Foto
                                                                                        Anak</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="image"
                                                                                        name="image" />
                                                                                    <div id="imageError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="identity_card"
                                                                                        class="form-label">Kartu
                                                                                        Pengenal (KTP
                                                                                        atau Kartu Pengenal Lainnya)</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="identity_card"
                                                                                        name="identity_card" />
                                                                                    <div id="identity_cardError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" id="btnNextProfile"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Berikutnya</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">Cancel</button>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="navs-justified-profile"
                                                                        role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <div class="mb-3">
                                                                                    <label for="father_name"
                                                                                        class="form-label">Nama
                                                                                        Ayah Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="father_name"
                                                                                        name="father_name"
                                                                                        placeholder="Nama Ayah Anak..." />
                                                                                    <div id="father_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="mother_name"
                                                                                        class="form-label">Nama
                                                                                        Ibu Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="mother_name"
                                                                                        name="mother_name"
                                                                                        placeholder="Nama Ibu Anak..." />
                                                                                    <div id="mother_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="birth_certificate"
                                                                                        class="form-label">Akta
                                                                                        Kelahiran Anak</label>
                                                                                    <input class="form-control"
                                                                                        type="file"
                                                                                        id="birth_certificate"
                                                                                        name="birth_certificate" />
                                                                                    <div id="birthCertificateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="family_card"
                                                                                        class="form-label">Kartu
                                                                                        Keluarga</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="family_card"
                                                                                        name="family_card" />
                                                                                    <div id="family_cardError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="reason_for_leaving"
                                                                                        class="form-label">Alasan
                                                                                        Menitipkan</label>
                                                                                    <textarea class="form-control" id="reason_for_leaving" name="reason_for_leaving" rows="3"></textarea>
                                                                                    <div id="reason_for_leavingError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" id="btnNextMessages"
                                                                            class="btn btn-primary mb-2 next-tab d-grid w-100">Berikutnya</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            id="btnPrevHome">Sebelumnya</button>
                                                                    </div>
                                                                    <div class="tab-pane fade"
                                                                        id="navs-justified-messages" role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_name"
                                                                                        class="form-label">Nama
                                                                                        Wali Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_name"
                                                                                        name="guardian_name"
                                                                                        placeholder="Nama Wali Anak..." />
                                                                                    <div id="guardian_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_relationship"
                                                                                        class="form-label">Jenis
                                                                                        Kelamin</label>
                                                                                    <select class="form-select"
                                                                                        id="guardian_relationship"
                                                                                        name="guardian_relationship"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Hubungan Wali Dengan Anak
                                                                                        </option>
                                                                                        <option value="Ayah">Ayah
                                                                                        </option>
                                                                                        <option value="Ibu">Ibu
                                                                                        </option>
                                                                                        <option value="Kerabat">Kerabat
                                                                                        </option>
                                                                                        <option value="Teman">Teman
                                                                                        </option>
                                                                                        <option value="Lainnya">Lainnya
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="guardian_relationshipError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_address"
                                                                                        class="form-label">Alamat
                                                                                        Wali Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_address"
                                                                                        name="guardian_address"
                                                                                        placeholder="Alamat Wali Anak..." />
                                                                                    <div id="guardian_addressError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_phone_number"
                                                                                        class="form-label">Nomor Telepon
                                                                                        Wali Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_phone_number"
                                                                                        name="guardian_phone_number"
                                                                                        placeholder="Nomor Telepon Wali Anak..." />
                                                                                    <div id="guardian_phone_numberError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_email"
                                                                                        class="form-label">Email
                                                                                        Wali Anak</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="guardian_email"
                                                                                        name="guardian_email"
                                                                                        placeholder="Email Wali Anak..." />
                                                                                    <div id="guardian_emailError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_identity_card"
                                                                                        class="form-label">Kartu Pengenal
                                                                                        Wali Anak (KTP
                                                                                        atau Kartu Pengenal Lainnya)</label>
                                                                                    <input class="form-control"
                                                                                        type="file"
                                                                                        id="guardian_identity_card"
                                                                                        name="guardian_identity_card" />
                                                                                    <div id="guardian_identity_cardError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            id="btnPrevProfile">Sebelumnya</button>
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
                                <th class="col-md-1 text-center fw-bold">Foto Anak</th>
                                <th class="col-md-1 text-center fw-bold">Nama</th>
                                <th class="col-md-1 text-center fw-bold">Tanggal Lahir</th>
                                <th class="col-md-1 text-center fw-bold">Tempat Lahir</th>
                                <th class="col-md-1 text-center fw-bold">Jenis Kelamin</th>
                                <th class="col-md-1 text-center fw-bold">Agama</th>
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
                                    <td>
                                        <ul
                                            class="list-unstyled users-list m-0 avatar-group align-items-center text-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Foto {{ $data->name }}">
                                                <img src="{{ asset('storage/' . $data->image) }}" alt=""
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterFoto_{{ $loop->index }}">
                                            </li>
                                            <div class="modal fade" id="modalCenterFoto_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Foto
                                                                {{ $data->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <img src="{{ asset('storage/' . $data->image) }}"
                                                                    alt="" class="mx-auto d-block"
                                                                    style="max-width: 100%; height: auto;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>

                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->date_of_birth }}</td>
                                    <td>{{ $data->place_of_birth }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->religion }}</td>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="text-center">Edit Data Anak Asuh {{ $data->name }}</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-header">
                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-home{{ $data->id }}"
                                            class="nav-link active" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                            aria-selected="true" disabled>
                                            <span class="d-none d-sm-block">
                                                Data Anak</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-profile{{ $data->id }}"
                                            class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-justified-profile"
                                            aria-controls="navs-justified-profile" aria-selected="false" disabled>
                                            <span class="d-none d-sm-block">
                                                Data Lainnya</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-messages{{ $data->id }}"
                                            class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#ss"
                                            aria-controls="ss" aria-selected="false" disabled>
                                            <span class="d-none d-sm-block">
                                                Data Wali</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-body">
                                <form id="editDataAnakForm{{ $data->id }}"
                                    action="{{ route('data-anak.update', $data->id) }}" data-id="{{ $data->id }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="">
                                            <div class="nav-align-top mb-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active"
                                                        id="navs-justified-home{{ $data->id }}" role="tabpanel">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label for="name{{ $data->id }}"
                                                                        class="form-label">Nama
                                                                        Anak</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name{{ $data->id }}" name="name"
                                                                        placeholder="Nama Anak..."
                                                                        value="{{ $data->name }}" />
                                                                    <div id="editNameError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="place_of_birth{{ $data->id }}"
                                                                        class="form-label">Tempat
                                                                        Lahir</label>
                                                                    <input type="text" class="form-control"
                                                                        id="place_of_birth{{ $data->id }}"
                                                                        name="place_of_birth"
                                                                        placeholder="Tempat Lahir..."
                                                                        value="{{ $data->place_of_birth }}" />
                                                                    <div id="editPlaceOfBirthError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="date_of_birth{{ $data->id }}"
                                                                        class="form-label">Tanggal
                                                                        Lahir</label>
                                                                    <input class="form-control" type="date"
                                                                        id="date_of_birth{{ $data->id }}"
                                                                        name="date_of_birth"
                                                                        value="{{ $data->date_of_birth }}" />
                                                                    <div id="editDateOfBirthError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="gender{{ $data->id }}"
                                                                        class="form-label">Jenis
                                                                        Kelamin</label>
                                                                    <select class="form-select"
                                                                        id="gender{{ $data->id }}" name="gender"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Pilih Jenis Kelamin
                                                                        </option>
                                                                        <option value="Laki-Laki"
                                                                            {{ $data->gender == 'Laki-Laki' ? 'selected' : '' }}>
                                                                            Laki-Laki
                                                                        </option>
                                                                        <option value="Perempuan"
                                                                            {{ $data->gender == 'Perempuan' ? 'selected' : '' }}>
                                                                            Perempuan
                                                                        </option>
                                                                    </select>
                                                                    <div id="editGenderError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="religion{{ $data->id }}"
                                                                        class="form-label">Agama</label>
                                                                    <select class="form-select"
                                                                        id="religion{{ $data->id }}" name="religion"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Pilih Agama</option>
                                                                        <option value="Islam"
                                                                            {{ $data->religion == 'Islam' ? 'selected' : '' }}>
                                                                            Islam
                                                                        </option>
                                                                        <option value="Hindu"
                                                                            {{ $data->religion == 'Hindu' ? 'selected' : '' }}>
                                                                            Hindu
                                                                        </option>
                                                                        <option value="Kristen Protestan"
                                                                            {{ $data->religion == 'Kristen Protestan' ? 'selected' : '' }}>
                                                                            Kristen Protestan</option>
                                                                        <option value="Kristen Katolik"
                                                                            {{ $data->religion == 'Kristen Katolik' ? 'selected' : '' }}>
                                                                            Kristen Katolik</option>
                                                                        <option value="Budha"
                                                                            {{ $data->religion == 'Budha' ? 'selected' : '' }}>
                                                                            Budha
                                                                        </option>
                                                                        <option value="Konghucu"
                                                                            {{ $data->religion == 'Konghucu' ? 'selected' : '' }}>
                                                                            Konghucu
                                                                        </option>
                                                                    </select>
                                                                    <div id="editReligionError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="congenital_disease{{ $data->id }}"
                                                                        class="form-label">Penyakit
                                                                        Bawaan (Kosongkan Bila Tidak
                                                                        Ada)</label>
                                                                    <input type="text" class="form-control"
                                                                        id="congenital_disease{{ $data->id }}"
                                                                        name="congenital_disease"
                                                                        placeholder="Penaykit Bawaan..."
                                                                        value="{{ $data->congenital_disease }}" />
                                                                    <div id="editCongenital_diseaseError"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status{{ $data->id }}"
                                                                        class="form-label">Status</label>
                                                                    <select class="form-select"
                                                                        id="status{{ $data->id }}" name="status"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Status Anak Asuh
                                                                        </option>
                                                                        <option value="Aktif"
                                                                            {{ $data->status == 'Aktif' ? 'selected' : '' }}>
                                                                            Aktif</option>
                                                                        <option value="Non-Aktif"
                                                                            {{ $data->status == 'Non-Aktif' ? 'selected' : '' }}>
                                                                            Non-Aktif
                                                                        </option>
                                                                    </select>
                                                                    <div id="editStatusError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image{{ $data->id }}"
                                                                        class="form-label">Foto
                                                                        Anak</label>
                                                                    <input class="form-control" type="file"
                                                                        id="image{{ $data->id }}" name="image" />
                                                                    <div id="editImageError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="identity_card{{ $data->id }}"
                                                                        class="form-label">Kartu
                                                                        Pengenal (KTP
                                                                        atau Kartu Pengenal Lainnya)</label>
                                                                    <input class="form-control" type="file"
                                                                        id="identity_card{{ $data->id }}"
                                                                        name="identity_card" />
                                                                    <div id="editIdentity_cardError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-primary mb-2 d-grid w-100 btnNextProfile"
                                                            data-id="{{ $data->id }}">Berikutnya</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary d-grid w-100"
                                                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                    </div>
                                                    @foreach ($data->childDetails as $detail)
                                                        <div class="tab-pane fade"
                                                            id="navs-justified-profile{{ $data->id }}"
                                                            role="tabpanel">
                                                            <div class="card mb-4">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label for="father_name{{ $data->id }}"
                                                                            class="form-label">Nama
                                                                            Ayah Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="father_name {{ $data->id }}"
                                                                            name="father_name"
                                                                            placeholder="Nama Ayah Anak..."
                                                                            value="{{ $detail->father_name }}" />
                                                                        <div id="editFather_nameError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="mother_name{{ $data->id }}"
                                                                            class="form-label">Nama
                                                                            Ibu Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="mother_name{{ $data->id }}"
                                                                            name="mother_name"
                                                                            placeholder="Nama Ibu Anak..."
                                                                            value="{{ $detail->mother_name }}" />
                                                                        <div id="editMother_nameError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="birth_certificate{{ $data->id }}"
                                                                            class="form-label">Akta
                                                                            Kelahiran Anak</label>
                                                                        <input class="form-control" type="file"
                                                                            id="birth_certificate{{ $data->id }}"
                                                                            name="birth_certificate" />
                                                                        <div id="editBirthCertificateError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="family_card{{ $data->id }}"
                                                                            class="form-label">Kartu
                                                                            Keluarga</label>
                                                                        <input class="form-control" type="file"
                                                                            id="family_card{{ $data->id }}"
                                                                            name="family_card" />
                                                                        <div id="editFamily_cardError"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="reason_for_leaving{{ $data->id }}"
                                                                            class="form-label">Alasan
                                                                            Menitipkan</label>
                                                                        <textarea class="form-control" id="reason_for_leaving{{ $data->id }}" name="reason_for_leaving"
                                                                            rows="3">{{ $detail->reason_for_leaving }}</textarea>
                                                                        <div id="editReason_for_leavingError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <button type="button" data-id="{{ $data->id }}"
                                                                class="btn btn-primary mb-2 next-tab d-grid w-100 btnNextMessages">Berikutnya</button>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary d-grid w-100 btnPrevHome"
                                                                data-id="{{ $data->id }}">Sebelumnya</button>
                                                        </div>
                                                        <div class="tab-pane fade"
                                                            id="navs-justified-messages{{ $data->id }}"
                                                            role="tabpanel">
                                                            <div class="card mb-4">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label for="guardian_name{{ $data->id }}"
                                                                            class="form-label">Nama
                                                                            Wali Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="guardian_name{{ $data->id }}"
                                                                            name="guardian_name"
                                                                            placeholder="Nama Wali Anak..."
                                                                            value="{{ $detail->guardian_name }}" />
                                                                        <div id="editGuardian_nameError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="guardian_relationship{{ $data->id }}"
                                                                            class="form-label">Jenis
                                                                            Kelamin</label>
                                                                        <select class="form-select"
                                                                            id="guardian_relationship{{ $data->id }}"
                                                                            name="guardian_relationship"
                                                                            aria-label="Default select example">
                                                                            <option value="" hidden>Hubungan Wali
                                                                                Dengan Anak</option>
                                                                            <option value="Ayah"
                                                                                {{ $detail->guardian_relationship == 'Ayah' ? 'selected' : '' }}>
                                                                                Ayah</option>
                                                                            <option value="Ibu"
                                                                                {{ $detail->guardian_relationship == 'Ibu' ? 'selected' : '' }}>
                                                                                Ibu</option>
                                                                            <option value="Kerabat"
                                                                                {{ $detail->guardian_relationship == 'Kerabat' ? 'selected' : '' }}>
                                                                                Kerabat</option>
                                                                            <option value="Teman"
                                                                                {{ $detail->guardian_relationship == 'Teman' ? 'selected' : '' }}>
                                                                                Teman</option>
                                                                            <option value="Lainnya"
                                                                                {{ $detail->guardian_relationship == 'Lainnya' ? 'selected' : '' }}>
                                                                                Lainnya</option>
                                                                        </select>
                                                                        <div id="editGuardian_relationshipError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="guardian_address{{ $data->id }}"
                                                                            class="form-label">Alamat
                                                                            Wali Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="guardian_address{{ $data->id }}"
                                                                            name="guardian_address"
                                                                            placeholder="Alamat Wali Anak..."
                                                                            value="{{ $detail->guardian_address }}" />
                                                                        <div id="editGuardian_addressError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="guardian_phone_number{{ $data->id }}"
                                                                            class="form-label">Nomor
                                                                            Telepon
                                                                            Wali Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="guardian_phone_number{{ $data->id }}"
                                                                            name="guardian_phone_number"
                                                                            placeholder="Nomor Telepon Wali Anak..."
                                                                            value="{{ $detail->guardian_phone_number }}" />
                                                                        <div id="editGuardian_phone_numberError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="guardian_email{{ $data->id }}"
                                                                            class="form-label">Email
                                                                            Wali Anak</label>
                                                                        <input type="email" class="form-control"
                                                                            id="guardian_email{{ $data->id }}"
                                                                            name="guardian_email"
                                                                            placeholder="Email Wali Anak..."
                                                                            value="{{ $detail->guardian_email }}" />
                                                                        <div id="editGuardian_emailError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="guardian_identity_card{{ $data->id }}"
                                                                            class="form-label">Kartu
                                                                            Pengenal
                                                                            Wali Anak (KTP
                                                                            atau Kartu Pengenal Lainnya)</label>
                                                                        <input class="form-control" type="file"
                                                                            id="guardian_identity_card{{ $data->id }}"
                                                                            name="guardian_identity_card" />
                                                                        <div id="editGuardian_identity_cardError"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button"
                                                                class="btn btn-primary mb-2 d-grid w-100 updateSubmit"
                                                                data-id="{{ $data->id }}">Simpan</button>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary d-grid w-100 btnPrevProfile"
                                                                data-id="{{ $data->id }}">Sebelumnya</button>
                                                        </div>
                                                    @endforeach
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
            function nextProfile(dataId) {
                console.log('test');
                const nextNav = document.getElementById('navs-justified-profile' + dataId);
                const nextTab = document.getElementById('tab-justified-profile' + dataId);
                const thisNav = document.getElementById('navs-justified-home' + dataId);
                const thisTab = document.getElementById('tab-justified-home' + dataId);

                thisNav.classList.remove('show', 'active');
                nextNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                nextTab.classList.add('active');
            }

            function nextMessages(dataId) {
                const nextNav = document.getElementById('navs-justified-messages' + dataId);
                const nextTab = document.getElementById('tab-justified-messages' + dataId);
                const thisNav = document.getElementById('navs-justified-profile' + dataId);
                const thisTab = document.getElementById('tab-justified-profile' + dataId);

                thisNav.classList.remove('show', 'active');
                nextNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                nextTab.classList.add('active');
            }

            function prevProfile(dataId) {
                const prevNav = document.getElementById('navs-justified-profile' + dataId);
                const prevTab = document.getElementById('tab-justified-profile' + dataId);
                const thisNav = document.getElementById('navs-justified-messages' + dataId);
                const thisTab = document.getElementById('tab-justified-messages' + dataId);

                thisNav.classList.remove('show', 'active');
                prevNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                prevTab.classList.add('active');
            }

            function prevHome(dataId) {
                const prevNav = document.getElementById('navs-justified-home' + dataId);
                const prevTab = document.getElementById('tab-justified-home' + dataId);
                const thisNav = document.getElementById('navs-justified-profile' + dataId);
                const thisTab = document.getElementById('tab-justified-profile' + dataId);

                thisNav.classList.remove('show', 'active');
                prevNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                prevTab.classList.add('active');
            }

            // Panggil fungsi nextProfile() pada klik tombol
            $('.btnNextProfile').on('click', function() {
                var dataId = $(this).data('id');
                nextProfile(dataId);
            });
            $('.btnNextMessages').on('click', function() {
                var dataId = $(this).data('id');
                nextMessages(dataId);
            });
            $('.btnPrevProfile').on('click', function() {
                var dataId = $(this).data('id');
                prevProfile(dataId);
            });
            $('.btnPrevHome').on('click', function() {
                var dataId = $(this).data('id');
                prevHome(dataId);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function nextProfile() {
                const nextNav = document.getElementById('navs-justified-profile');
                const nextTab = document.getElementById('tab-justified-profile');
                const thisNav = document.getElementById('navs-justified-home');
                const thisTab = document.getElementById('tab-justified-home');

                thisNav.classList.remove('show', 'active');
                nextNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                nextTab.classList.add('active');
            }

            function nextMessages() {
                const nextNav = document.getElementById('navs-justified-messages');
                const nextTab = document.getElementById('tab-justified-messages');
                const thisNav = document.getElementById('navs-justified-profile');
                const thisTab = document.getElementById('tab-justified-profile');

                thisNav.classList.remove('show', 'active');
                nextNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                nextTab.classList.add('active');
            }

            function prevProfile() {
                const prevNav = document.getElementById('navs-justified-profile');
                const prevTab = document.getElementById('tab-justified-profile');
                const thisNav = document.getElementById('navs-justified-messages');
                const thisTab = document.getElementById('tab-justified-messages');

                thisNav.classList.remove('show', 'active');
                prevNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                prevTab.classList.add('active');
            }

            function prevHome() {
                const prevNav = document.getElementById('navs-justified-home');
                const prevTab = document.getElementById('tab-justified-home');
                const thisNav = document.getElementById('navs-justified-profile');
                const thisTab = document.getElementById('tab-justified-profile');

                thisNav.classList.remove('show', 'active');
                prevNav.classList.add('show', 'active');
                thisTab.classList.remove('active');
                prevTab.classList.add('active');
            }

            // Panggil fungsi nextProfile() pada klik tombol
            $('#btnNextProfile').on('click', function() {
                nextProfile();
            });
            $('#btnNextMessages').on('click', function() {
                nextMessages();
            });
            $('#btnPrevProfile').on('click', function() {
                prevProfile();
            });
            $('#btnPrevHome').on('click', function() {
                prevHome();
            });
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
                $('#name').val('');
                $('#place_of_birth').val('');
                $('#date_of_birth').val('');
                $('#gender').val('');
                $('#religion').val('');
                $('#congenital_disease').val('');
                $('#status').val('');
                $('#image').val('');
                $('#birth_certificate').val('');
                $('#family_card').val('');
                $('#identity_card').val('');
                $('#father_name').val('');
                $('#mother_name').val('');
                $('#guardian_name').val('');
                $('#guardian_relationship').val('');
                $('#guardian_address').val('');
                $('#guardian_phone_number').val('');
                $('#guardian_email').val('');
                $('#guardian_identity_card').val('');
                $('#reason_for_leaving').val('');
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
                            showErrorMessage(
                                'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                        } else {
                            $('.form-control').removeClass('is-invalid');

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
                    $('#family_cardError').text(errors.family_card[0]);
                }
                if (errors.identity_card) {
                    $('#identity_card').addClass('is-invalid');
                    $('#identity_cardError').text(errors.identity_card[0]);
                }
                if (errors.guardian_identity_card) {
                    $('#guardian_identity_card').addClass('is-invalid');
                    $('#guardian_identity_cardError').text(errors.guardian_identity_card[0]);
                }
                if (errors.father_name) {
                    $('#father_name').addClass('is-invalid');
                    $('#father_nameError').text(errors.father_name[0]);
                }
                if (errors.mother_name) {
                    $('#mother_name').addClass('is-invalid');
                    $('#mother_nameError').text(errors.mother_name[0]);
                }
                if (errors.guardian_name) {
                    $('#guardian_name').addClass('is-invalid');
                    $('#guardian_nameError').text(errors.guardian_name[0]);
                }
                if (errors.guardian_relationship) {
                    $('#guardian_relationship').addClass('is-invalid');
                    $('#guardian_relationshipError').text(errors.guardian_relationship[0]);
                }
                if (errors.guardian_address) {
                    $('#guardian_address').addClass('is-invalid');
                    $('#guardian_addressError').text(errors.guardian_address[0]);
                }
                if (errors.guardian_phone_number) {
                    $('#guardian_phone_number').addClass('is-invalid');
                    $('#guardian_phone_numberError').text(errors.guardian_phone_number[0]);
                }
                if (errors.guardian_email) {
                    $('#guardian_email').addClass('is-invalid');
                    $('#guardian_emailError').text(errors.guardian_email[0]);
                }
                if (errors.reason_for_leaving) {
                    $('#reason_for_leaving').addClass('is-invalid');
                    $('#reason_for_leavingError').text(errors.reason_for_leaving[0]);
                }
                if (errors.image) {
                    $('#image').addClass('is-invalid');
                    $('#imageError').text(errors.image[0]);
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
                // Inisialisasi FormData
                var formData = new FormData($('#editDataAnakForm' + id)[0]);

                // Tambahkan metode HTTP ke FormData
                formData.append('_method', 'patch');

                // URL untuk permintaan Ajax
                var url = "{{ url('anak-asuh/data-anak') }}" + '/' + id;
                console.log('URL:', url);

                // Tampilkan data FormData pada konsol
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }

                // Lakukan permintaan Ajax
                $.ajax({
                    url: url,
                    type: 'POST', // Tetap gunakan POST karena metode Laravel yang digunakan adalah "method spoofing"
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            handleUpdateErrors(response.errors, id);
                            showErrorMessage(
                                'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
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
                if (errors.name) {
                    $('#name' + id).addClass('is-invalid');
                    $('#editNameError' + id).text(errors.name[0]);
                }
                if (errors.place_of_birth) {
                    $('#place_of_birth' + id).addClass('is-invalid');
                    $('#editPlaceOfBirthError' + id).text(errors.place_of_birth[0]);
                }
                if (errors.date_of_birth) {
                    $('#date_of_birth' + id).addClass('is-invalid');
                    $('#editDateOfBirthError' + id).text(errors.date_of_birth[0]);
                }
                if (errors.gender) {
                    $('#gender' + id).addClass('is-invalid');
                    $('#editGenderError' + id).text(errors.gender[0]);
                }
                if (errors.religion) {
                    $('#religion' + id).addClass('is-invalid');
                    $('#editReligionError' + id).text(errors.religion[0]);
                }
                if (errors.status) {
                    $('#status' + id).addClass('is-invalid');
                    $('#editStatusError' + id).text(errors.status[0]);
                }
                if (errors.birth_certificate) {
                    $('#birth_certificate' + id).addClass('is-invalid');
                    $('#editBirthCertificateError' + id).text(errors.birth_certificate[0]);
                }
                if (errors.family_card) {
                    $('#family_card' + id).addClass('is-invalid');
                    $('#editFamily_cardError' + id).text(errors.family_card[0]);
                }
                if (errors.identity_card) {
                    $('#identity_card' + id).addClass('is-invalid');
                    $('#editIdentity_cardError' + id).text(errors.identity_card[0]);
                }
                if (errors.guardian_identity_card) {
                    $('#guardian_identity_card' + id).addClass('is-invalid');
                    $('#editGuardian_identity_cardError' + id).text(errors.guardian_identity_card[0]);
                }
                if (errors.father_name) {
                    $('#father_name' + id).addClass('is-invalid');
                    $('#editFather_nameError' + id).text(errors.father_name[0]);
                }
                if (errors.mother_name) {
                    $('#mother_name' + id).addClass('is-invalid');
                    $('#editMother_nameError' + id).text(errors.mother_name[0]);
                }
                if (errors.guardian_name) {
                    $('#guardian_name' + id).addClass('is-invalid');
                    $('#editGuardian_nameError' + id).text(errors.guardian_name[0]);
                }
                if (errors.guardian_relationship) {
                    $('#guardian_relationship' + id).addClass('is-invalid');
                    $('#editGuardian_relationshipError' + id).text(errors.guardian_relationship[0]);
                }
                if (errors.guardian_address) {
                    $('#guardian_address' + id).addClass('is-invalid');
                    $('#editGuardian_addressError' + id).text(errors.guardian_address[0]);
                }
                if (errors.guardian_phone_number) {
                    $('#guardian_phone_number' + id).addClass('is-invalid');
                    $('#editGuardian_phone_numberError' + id).text(errors.guardian_phone_number[0]);
                }
                if (errors.guardian_email) {
                    $('#guardian_email' + id).addClass('is-invalid');
                    $('#editGuardian_emailError' + id).text(errors.guardian_email[0]);
                }
                if (errors.reason_for_leaving) {
                    $('#reason_for_leaving' + id).addClass('is-invalid');
                    $('#editReason_for_leavingError' + id).text(errors.reason_for_leaving[0]);
                }
                if (errors.image) {
                    $('#image' + id).addClass('is-invalid');
                    $('#editImageError' + id).text(errors.image[0]);
                }
            }

            function clearUpdateErrors(id) {
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');

                // Clear error messages
                $('#editNameError' + id).text('');
                $('#editPlaceOfBirthError' + id).text('');
                $('#editDateOfBirthError' + id).text('');
                $('#editGenderError' + id).text('');
                $('#editReligionError' + id).text('');
                $('#editStatusError' + id).text('');
                $('#editBirth_certificateError' + id).text('');
                $('#editFamily_cardError' + id).text('');
                $('#editIdentity_cardError' + id).text('');
                $('#editGuardian_identity_cardError' + id).text('');
                $('#editFather_nameError' + id).text('');
                $('#editMother_nameError' + id).text('');
                $('#editGuardian_nameError' + id).text('');
                $('#editGuardian_relationshipError' + id).text('');
                $('#editGuardian_addressError' + id).text('');
                $('#editGuardian_phone_numberError' + id).text('');
                $('#editGuardian_emailError' + id).text('');
                $('#editReason_for_leavingError' + id).text('');
                $('#editImageError' + id).text('');
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


{{-- component --}}

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


{{-- <th class="col-md-2 text-center fw-bold">Akta Kelahiran</th>
<th class="col-md-2 text-center fw-bold">Kartu Keluarga</th>
<th class="col-md-2 text-center fw-bold">Kartu Pengenal</th> --}}


{{-- <td>
    <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
            class="avatar avatar-xl pull-up" title="Akta Kelahiran {{ $data->name }}">
            <img src="{{ asset('storage/' . $data->birth_certificate) }}" alt="" data-bs-toggle="modal"
                data-bs-target="#modalCenterAkta_{{ $loop->index }}">
        </li>
        <div class="modal fade" id="modalCenterAkta_{{ $loop->index }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Akta Kelahiran
                            {{ $data->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <img src="{{ asset('storage/' . $data->birth_certificate) }}" alt=""
                                width="700px" height="450px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</td> --}}
{{-- <td>
    <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
            class="avatar avatar-xl pull-up" title="Kartu Keluarga {{ $data->name }}">
            <img src="{{ asset('storage/' . $data->family_card) }}" alt="" data-bs-toggle="modal"
                data-bs-target="#modalCenterKk_{{ $loop->index }}">
        </li>
        <div class="modal fade" id="modalCenterKk_{{ $loop->index }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Kartu Keluarga
                            {{ $data->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <img src="{{ asset('storage/' . $data->family_card) }}" alt="" width="700px"
                                height="450px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</td>
<td>
    <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
            class="avatar avatar-xl pull-up" title="Tanda Pengenal {{ $data->name }}">
            <img src="{{ asset('storage/' . $data->ktp) }}" alt="" data-bs-toggle="modal"
                data-bs-target="#modalCenterKtp_{{ $loop->index }}">
        </li>
        <div class="modal fade" id="modalCenterKtp_{{ $loop->index }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tanda Pengenal
                            {{ $data->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <img src="{{ asset('storage/' . $data->ktp) }}" alt="" width="700px"
                                height="450px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</td> --}}

{{-- <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit Data Anak Asuh</h5>
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
                                                class="form-label">Tempat
                                                Lahir</label>
                                            <input type="text" class="form-control"
                                                id="editPlace_of_birth{{ $data->id }}" name="place_of_birth"
                                                value="{{ $data->place_of_birth }}"
                                                placeholder="Tempat Lahir..." />
                                            <div id="editPlaceOfBirthError{{ $data->id }}"
                                                class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editDate_of_birth{{ $data->id }}"
                                                class="form-label">Tanggal
                                                Lahir</label>
                                            <input class="form-control" type="date"
                                                id="editDate_of_birth{{ $data->id }}" name="date_of_birth"
                                                value="{{ $data->date_of_birth }}" />
                                            <div id="editDateOfBirthError{{ $data->id }}"
                                                class="invalid-feedback">
                                            </div>
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
                                                    {{ $data->religion == 'Islam' ? 'selected' : '' }}>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    {{ $data->religion == 'Hindu' ? 'selected' : '' }}>
                                                    Hindu
                                                </option>
                                                <option value="Kristen Protestan"
                                                    {{ $data->religion == 'Kristen Protestan' ? 'selected' : '' }}>
                                                    Kristen Protestan</option>
                                                <option value="Kristen Katolik"
                                                    {{ $data->religion == 'Kristen Katolik' ? 'selected' : '' }}>
                                                    Kristen Katolik</option>
                                                <option value="Budha"
                                                    {{ $data->religion == 'Budha' ? 'selected' : '' }}>
                                                    Budha
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
                                                    {{ $data->status == 'Aktif' ? 'selected' : '' }}>
                                                    Aktif</option>
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
                                                class="invalid-feedback">
                                            </div>
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
                            <button type="button" class="btn btn-primary updateSubmit"
                                data-id="{{ $data->id }}">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
