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
                        target="_blank" class="menu-link">
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
                        target="_blank" class="menu-link">
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
                        target="_blank" class="menu-link">
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
        <li class="menu-item active">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                <div data-i18n="Email">Kategori Donasi Barang</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Email">Kategori Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div data-i18n="Email">Kategori Pengeluaran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-party"></i>
                <div data-i18n="Email">Kategori Program Panti</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank" class="menu-link">
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
                <div data-i18n="Basic">Donasi Barang</div>
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
            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-child"></i>
                <div data-i18n="Support">Data Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Documentation">Pendidikan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bxs-heart"></i>
                <div data-i18n="Documentation">Kesehatan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
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
            <span class="text-muted fw-light">DataTables /</span> Basic
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75"></div>
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
                <div class="col-lg-3 col-md-6">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                                <i class='bx bx-plus m-1'></i>
                                Tambah Data
                            </button>
                        </div>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                            aria-labelledby="offcanvasEndLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasEndLabel" class="offcanvas-title">Offcanvas End</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                <p class="text-center">
                                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print,
                                    graphic or web designs. The passage is attributed to an unknown typesetter in the 15th
                                    century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                                    for use in a type specimen book.
                                </p>
                                <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
                                <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                    data-bs-dismiss="offcanvas">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-datatable table-responsive">
                <table class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                        <label class="form-label" for="basicFullname">Full Name</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" id="basicFullname" class="form-control dt-full-name"
                                name="basicFullname" placeholder="John Doe" aria-label="John Doe"
                                aria-describedby="basicFullname2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPost">Post</label>
                        <div class="input-group input-group-merge">
                            <span id="basicPost2" class="input-group-text"><i class='bx bxs-briefcase'></i></span>
                            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
                                placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicEmail">Email</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                        </div>
                        <div class="form-text">
                            You can use letters, numbers & periods
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicDate">Joining Date</label>
                        <div class="input-group input-group-merge">
                            <span id="basicDate2" class="input-group-text"><i class='bx bx-calendar'></i></span>
                            <input type="text" class="form-control dt-date" id="basicDate" name="basicDate"
                                aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicSalary">Salary</label>
                        <div class="input-group input-group-merge">
                            <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
                            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary"
                                placeholder="12000" aria-label="12000" aria-describedby="basicSalary2" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>

            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#courierTable').DataTable({
                    processing: true,
                    serverside: true,
                    ajax: "{{ url('ajaxcourier') }}",
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                    }, {
                        data: 'courier',
                        name: 'Courier',
                    }, {
                        data: 'action',
                        name: 'Action',
                        orderable: false,
                        searchable: false,
                    }]
                });
            });
        </script>
    @endsection
