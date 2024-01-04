@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Pengeluaran Anak Asuh</b>
        </h4>

        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-child fs-1'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthTotalCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Total Pengeluaran Anak Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageTotalCost >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i class="bx {{ $percentageTotalCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageTotalCost }}%
                            </span>
                            <small class="text-muted">Dari Bulan Lalu</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class='bx bxs-heart fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthHealthCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Kesehatan Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageHealthCost >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageHealthCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageHealthCost }}%
                            </span>
                            <small class="text-muted">Dari Bulan Lalu</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class='bx bxs-school fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthEducationCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Pendidikan Bulan Ini </p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageEducationCost >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageEducationCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageEducationCost }}%
                            </span>
                            <small class="text-muted">Dari Bulan Lalu</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class='bx bx-medal fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthAchievementCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Prestasi\ Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageAchievementCost >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageAchievementCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageAchievementCost }}%
                            </span>
                            <small class="text-muted">Dari Bulan Lalu</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Pengeluaran Panti</h5>
                        <small class="text-muted">Statistik Pengeluaran Panti</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                        <h5 class="me-2 mt-3 cursor-pointer" id="yearChart">Year</h5>
                        <h5 class="me-3 mt-3 cursor-pointer text-muted" id="monthChart">Month</h5>
                        <select class="form-select me-2 border-0 d-none" id="monthSelector" name="month"
                            aria-label="Default select example">
                            <option value="01">
                                Januari
                            </option>
                            <option value="02">
                                Februari
                            </option>
                            <option value="03">
                                Maret
                            </option>
                            <option value="04">
                                April
                            </option>
                            <option value="05">
                                Mei
                            </option>
                            <option value="06">
                                Juni
                            </option>
                            <option value="07">
                                Juli
                            </option>
                            <option value="08">
                                Agustus
                            </option>
                            <option value="09">
                                September
                            </option>
                            <option value="10">
                                Oktober
                            </option>
                            <option value="11">
                                November
                            </option>
                            <option value="12">
                                Desember
                            </option>
                        </select>
                        <select class="form-select me-4 border-0" id="yearSelector" name="year"
                            aria-label="Default select example">
                            @foreach ($years as $year)
                                <option value="{{ $year }}">
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                        <h5 class="mb-0 me-2" id="beforeCost"></h5>
                        <span class="badge bg-label-secondary">
                            <span class="align-middle" id="beforePercentage"></span>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" class="chartjs mx-auto"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Pengeluaran Anak Asuh
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content-30">

                            </div>
                            <div class="btn-group" id="dropdown-icon-demo">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bx bx-plus m-1"></i> Tambah Data
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#pengeluaranKesehatan"
                                            class="dropdown-item d-flex align-items-center"><i
                                                class="bx bx-plus scaleX-n1-rtl"></i>Pengeluaran Kesehatan Anak</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#pengeluaranPendidikan"
                                            class="dropdown-item d-flex align-items-center"><i
                                                class="bx bx-plus scaleX-n1-rtl"></i>Pengeluaran Pendidikan Anak</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i
                                                class="bx bx-plus scaleX-n1-rtl"></i>Pengeluaran Prestasi Anak</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="pengeluaranKesehatan" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center">Pilih Data Kesehatan</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-header">
                                        <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" id="tab-justified-home" class="nav-link"
                                                    role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-justified-home"
                                                    aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                    <span class="d-none d-sm-block">
                                                        Tabel Data Kesehatan Anak</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-datatable table-responsive">
                                            @if ($childHealths->count() > 0)
                                                <table class="datatables-basic table border-top quick-sand"
                                                    id="kategoriBarangTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-md-1 text-center fw-bold">No</th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Anak</th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Penyakit</th>
                                                            <th class="col-md-1 text-center fw-bold">Tanggal Sakit</th>
                                                            <th class="col-md-1 text-center fw-bold">Deskripsi</th>
                                                            <th class="col-md-1 text-center fw-bold">Status</th>
                                                            <th class="col-md-1 text-center fw-bold">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php
                                                            $initialNumber = $childHealths->firstItem() - 1;
                                                        @endphp
                                                        @foreach ($childHealths as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration + $initialNumber }}</td>
                                                                <td>{{ $data->childrens->name }}</td>
                                                                <td>{{ $data->diseases->name }}</td>
                                                                <td>{{ $data->date_of_illness }}</td>
                                                                <td>{{ $data->description }}</td>
                                                                <td>
                                                                    @if ($data->status == 'Sudah Sembuh')
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-success"
                                                                            style="width: 100px;">
                                                                            Sembuh</button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-danger sakitBtn"
                                                                            style="width: 100px;">
                                                                            Sakit</button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn rounded-pill btn-warning"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#dataPengeluaranKesehatan{{ $data->id }}"
                                                                        style="width: 100px;"
                                                                        data-id="{{ $data->id }}">
                                                                        Pilih</button>
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
                                                        <li
                                                            class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                                            <a class="page-link" href="{{ $datas->url(1) }}">
                                                                <i class="tf-icon bx bx-chevrons-left"></i>
                                                            </a>
                                                        </li>
                                                        <li
                                                            class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                                            <a class="page-link" href="{{ $datas->previousPageUrl() }}">
                                                                <i class="tf-icon bx bx-chevron-left"></i>
                                                            </a>
                                                        </li>
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
                                                            <li
                                                                class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $datas->url($i) }}">{{ $i }}</a>
                                                            </li>
                                                        @endfor
                                                        <li
                                                            class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
                                                            <a class="page-link" href="{{ $datas->nextPageUrl() }}">
                                                                <i class="tf-icon bx bx-chevron-right"></i>
                                                            </a>
                                                        </li>
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
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="pengeluaranPendidikan" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center">Pilih Data Pendidikan</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-header">
                                        <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" id="tab-justified-home" class="nav-link"
                                                    role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-justified-home"
                                                    aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                    <span class="d-none d-sm-block">
                                                        Tabel Data Pendidikan Anak</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-datatable table-responsive">
                                            @if ($childEducations->count() > 0)
                                                <table class="datatables-basic table border-top quick-sand"
                                                    id="kategoriBarangTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-md-1 text-center fw-bold">No</th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Anak</th>
                                                            <th class="col-md-1 text-center fw-bold">Jenjang Pendidikan
                                                            </th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Sekolah</th>
                                                            <th class="col-md-1 text-center fw-bold">Kelas</th>
                                                            <th class="col-md-1 text-center fw-bold">Status</th>
                                                            <th class="col-md-1 text-center fw-bold">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php
                                                            $initialNumber = $childEducations->firstItem() - 1;
                                                        @endphp
                                                        @foreach ($childEducations as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration + $initialNumber }}</td>
                                                                <td>{{ $data->childrens->name }}</td>
                                                                <td>{{ $data->education_level }}</td>
                                                                <td>{{ $data->schools->name }}</td>
                                                                <td>{{ $data->class }} ({{ $data->class_name }})</td>
                                                                <td>
                                                                    @if ($data->status == 'Aktif')
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-success"
                                                                            style="width: 100px;">
                                                                            Aktif</button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-danger sakitBtn"
                                                                            style="width: 100px;">
                                                                            Non-aktif</button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn rounded-pill btn-warning"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#dataPengeluaranPendidikan{{ $data->id }}"
                                                                        style="width: 100px;"
                                                                        data-id="{{ $data->id }}">
                                                                        Pilih</button>
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
                                                        <li
                                                            class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                                            <a class="page-link" href="{{ $datas->url(1) }}">
                                                                <i class="tf-icon bx bx-chevrons-left"></i>
                                                            </a>
                                                        </li>
                                                        <li
                                                            class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                                            <a class="page-link" href="{{ $datas->previousPageUrl() }}">
                                                                <i class="tf-icon bx bx-chevron-left"></i>
                                                            </a>
                                                        </li>
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
                                                            <li
                                                                class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $datas->url($i) }}">{{ $i }}</a>
                                                            </li>
                                                        @endfor
                                                        <li
                                                            class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
                                                            <a class="page-link" href="{{ $datas->nextPageUrl() }}">
                                                                <i class="tf-icon bx bx-chevron-right"></i>
                                                            </a>
                                                        </li>
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
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                        @foreach ($childHealths as $data)
                            <div class="modal fade modal-pengeluaran" id="dataPengeluaranKesehatan{{ $data->id }}"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Tambah Data Pengeluaran Kesehatan</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header">
                                            <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link" role="tab"
                                                        data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                        aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                        <span class="d-none d-sm-block">
                                                            Tambah Data Pengeluaran Kesehatan Anak</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pengeluaran-anak.store') }}"
                                                id="formPengeluaranKesehatan{{ $data->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <input type="text" name="type_cost" value="Kesehatan"
                                                                    hidden>
                                                                <input type="text" name="data_id"
                                                                    value="{{ $data->id }}" hidden>
                                                                <div class="mb-3">
                                                                    <label for="title{{ $data->id }}"
                                                                        class="form-label">Nama
                                                                        Pengeluaran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="title{{ $data->id }}" name="title"
                                                                        placeholder="Operasi..." />
                                                                    <div id="titleError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3" id="costInput">
                                                                    <label for="total_cost{{ $data->id }}"
                                                                        class="form-label">Biaya
                                                                        Pengeluaran</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text">Rp</span>
                                                                        <input type="text" class="form-control"
                                                                            id="total_cost{{ $data->id }}"
                                                                            name="total_cost" placeholder="5,000"
                                                                            oninput="formatAmount(this)" />
                                                                        <div id="total_costError{{ $data->id }}"
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
                                                    <button type="button" class="btn btn-primary submitKesehatan"
                                                        data-id="{{ $data->id }}">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($childEducations as $data)
                            <div class="modal fade modal-pengeluaran" id="dataPengeluaranPendidikan{{ $data->id }}"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Tambah Data Pengeluaran Pendidikan</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header">
                                            <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link" role="tab"
                                                        data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                        aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                        <span class="d-none d-sm-block">
                                                            Tambah Data Pengeluaran Pendidikan Anak</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pengeluaran-anak.store') }}"
                                                id="pengeluaranPendidikan{{ $data->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <input type="text" name="type_cost" value="Pendidikan"
                                                                    hidden>
                                                                <input type="text" name="data_id"
                                                                    value="{{ $data->id }}" hidden>
                                                                <div class="mb-3">
                                                                    <label for="title{{ $data->id }}"
                                                                        class="form-label">Nama
                                                                        Pengeluaran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="title{{ $data->id }}" name="title"
                                                                        placeholder="Pembayaran SPP..." />
                                                                    <div id="titleError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3" id="costInput">
                                                                    <label for="total_cost{{ $data->id }}"
                                                                        class="form-label">Biaya
                                                                        Pengeluaran</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text">Rp</span>
                                                                        <input type="text" class="form-control"
                                                                            id="total_cost{{ $data->id }}"
                                                                            name="total_cost" placeholder="5,000"
                                                                            oninput="formatAmount(this)" />
                                                                        <div id="total_costError{{ $data->id }}"
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
                                                    <button type="button" class="btn btn-primary submitPendidikan"
                                                        data-id="{{ $data->id }}">Save
                                                        Changes</button>
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
            </div>
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-2 text-center fw-bold">Jenis Pengeluaran</th>
                                <th class="col-md-5 text-center fw-bold">Judul</th>
                                <th class="col-md-3 text-center fw-bold">Total Pengeluaran</th>
                                <th class="col-md-3 text-center fw-bold">Status</th>
                                <th class="col-md-3 text-center fw-bold">Action</th>
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
                                        @if ($data->reference_table == 'child_health_table')
                                            Kesehatan
                                        @elseif($data->reference_table == 'child_education_table')
                                            Pendidikan
                                        @elseif ($data->reference_table == 'child_achievement_table')
                                            Prestasi
                                        @else
                                            Pengeluaran Lainnya
                                        @endif
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ 'RP ' . number_format($data->total_cost, 0, ',', '.') }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
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
                            <li class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $datas->url(1) }}">
                                    <i class="tf-icon bx bx-chevrons-left"></i>
                                </a>
                            </li>
                            <li class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $datas->previousPageUrl() }}">
                                    <i class="tf-icon bx bx-chevron-left"></i>
                                </a>
                            </li>
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
                            <li class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $datas->nextPageUrl() }}">
                                    <i class="tf-icon bx bx-chevron-right"></i>
                                </a>
                            </li>
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
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.keuangan.js.pengeluaran-anak')
@endsection
