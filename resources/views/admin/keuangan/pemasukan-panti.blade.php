@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Pemasukan Panti</b>
        </h4>


        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class='bx bx-building-house fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthTotalIncomeFormatted }}</h4>
                        </div>
                        <p class="mb-1">Total Pemasukan Panti Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageMonthTotalIncome >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageMonthTotalIncome >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageMonthTotalIncome }}%
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
                            <h4 class="ms-1 mb-0">{{ $currentYearTotalIncomeFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pemasukan Panti Tahun Ini </p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageYearTotalIncome >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageYearTotalIncome >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageYearTotalIncome }}%
                            </span>
                            <small class="text-muted">Dari Tahun Lalu</small>
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
                                        class='bx bx-category-alt fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $highestTotalIncomeByTypeFormat }}</h4>
                        </div>
                        <p class="mb-1">Kategori Pemasukan Terbesar</p>
                        <small class="mb-0 text-muted">
                            Kategori {{ $highestIncomeTypeName }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class='bx bx-money-withdraw fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentYearCountIncome }} Pemasukan</h4>
                        </div>
                        <p class="mb-1">Jumlah Pemasukan Tahun Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageYearCountIncome >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageYearCountIncome >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageYearCountIncome }}%
                            </span>
                            <small class="text-muted">Dari Tahun Lalu</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Pemasukan Panti</h5>
                        <small class="text-muted">Statistik Pemasukan Panti</small>
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
                        <h5 class="mb-0 me-2" id="beforeIncome"></h5>
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
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Pemasukan Panti
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
                            <div class="">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalPemasukanPanti">
                                    <i class='bx bx-plus m-1'></i>
                                    Tambah Data
                                </button>
                            </div>
                            <div class="modal fade" id="modalPemasukanPanti" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Tambah Pemasukan Panti</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header">
                                            <ul class="nav nav-pills nav-fill w-100" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" id="tab-justified-home"
                                                        class="nav-link active" role="tab" data-bs-toggle="tab"
                                                        data-bs-target="#navs-justified-home"
                                                        aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                        <span class="d-none d-sm-block">
                                                            Tambah Data Pemasukan Panti</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body">
                                            <form id="pemasukanPantiForm" action="{{ route('pemasukan-panti.store') }}"
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
                                                                                <label for="income_type_id"
                                                                                    class="form-label">Jenis
                                                                                    Pemasukan</label>
                                                                                <select class="form-select"
                                                                                    id="income_type_id"
                                                                                    name="income_type_id"
                                                                                    aria-label="Default select example">
                                                                                    <option value="" hidden>
                                                                                        Pilih Jenis Pemasukan
                                                                                    </option>
                                                                                    @foreach ($incomeTypes as $type)
                                                                                        <option
                                                                                            value="{{ $type->id }}">
                                                                                            {{ $type->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div id="income_type_idError"
                                                                                    class="invalid-feedback"></div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="title"
                                                                                    class="form-label">Nama
                                                                                    Pemasukan</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="title" name="title"
                                                                                    placeholder="Nama Pemasukan..." />
                                                                                <div id="titleError"
                                                                                    class="invalid-feedback"></div>
                                                                            </div>
                                                                            <div class="mb-3" id="totalAmountInput">
                                                                                <label for="total_amount"
                                                                                    class="form-label">Biaya
                                                                                    Pemeriksaan</label>
                                                                                <div class="input-group input-group-merge">
                                                                                    <span
                                                                                        class="input-group-text">Rp</span>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="total_amount"
                                                                                        name="total_amount"
                                                                                        placeholder="10,000"
                                                                                        oninput="formatAmount(this)" />
                                                                                    <div id="total_amountError"
                                                                                        class="invalid-feedback">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary mb-2 d-grid w-100"
                                                                        id="submit">Simpan</button>
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary d-grid w-100"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close">Tutup</button>
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
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-2 text-center fw-bold">Jenis Pemasukan</th>
                                <th class="col-md-5 text-center fw-bold">Judul</th>
                                <th class="col-md-3 text-center fw-bold">Total Pemasukan</th>
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
                                    <td>{{ $data->incomeTypes->name }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ 'RP ' . number_format($data->total_amount, 0, ',', '.') }}</td>
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
                                                    data-bs-target="#modalEditPemasukanPanti{{ $data->id }}">
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
                <div class="modal fade" id="modalEditPemasukanPanti{{ $data->id }}" tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="text-center">Edit Pemasukan Panti</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-header">
                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-home" class="nav-link" role="tab"
                                            data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                            aria-controls="navs-justified-home" aria-selected="true" disabled>
                                            <span class="d-none d-sm-block">
                                                Edit Data Pemasukan Panti</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-body">
                                <form id="editPemasukanPantiForm{{ $data->id }}"
                                    action="{{ route('pemasukan-panti.update', $data->id) }}"
                                    data-id="{{ $data->id }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="">
                                            <div class="nav-align-top mb-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="navs-justified-home"
                                                        role="tabpanel">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label for="income_type_id" class="form-label">Jenis
                                                                        Pemasukan</label>
                                                                    <select class="form-select"
                                                                        id="income_type_id{{ $data->id }}"
                                                                        name="income_type_id"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Pilih Jenis Pemasukan
                                                                        </option>
                                                                        @foreach ($incomeTypes as $type)
                                                                            <option value="{{ $type->id }}"
                                                                                {{ $type->id == $data->income_type_id ? 'selected' : '' }}>
                                                                                {{ $type->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div id="income_type_idError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Nama
                                                                        Pemasukan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="title{{ $data->id }}" name="title"
                                                                        placeholder="Nama Pemasukan..."
                                                                        value="{{ $data->title }}" />
                                                                    <div id="titleError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="total_amount" class="form-label">Biaya
                                                                        Pemeriksaan</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text">Rp</span>
                                                                        <input type="text" class="form-control"
                                                                            id="total_amount{{ $data->id }}"
                                                                            name="total_amount" placeholder="10,000"
                                                                            oninput="formatAmount(this)"
                                                                            value="{{ $data->total_amount }}" />
                                                                        <div id="total_amountError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mb-2 d-grid w-100 updateSubmit"
                                                            data-id="{{ $data->id }}">Simpan</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary d-grid w-100"
                                                            data-bs-dismiss="modal" aria-label="Close">Tutup</button>
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
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.keuangan.js.pemasukan-panti')
@endsection
