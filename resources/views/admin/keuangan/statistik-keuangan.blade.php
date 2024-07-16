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
                            <span class="text-{{ $percentageMonthTotalIncome >= 0 ? 'success' : 'danger' }} fw-medium">
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
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class='bx bx-building-house fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthTotalCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Total Pengeluaran Panti Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageMonthTotalCost >= 0 ? 'success' : 'danger' }} fw-medium">
                                <i
                                    class="bx {{ $percentageMonthTotalCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageMonthTotalCost }}%
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
                            <h4 class="ms-1 mb-0">{{ $currentYearTotalCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Panti Tahun Ini </p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageYearTotalCost >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageYearTotalCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageYearTotalCost }}%
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
                        <h5 class="card-title mb-0">Statistik Keuangan</h5>
                        <small class="text-muted">Statistik Keuangan Panti Asuhan</small>
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
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" class="chartjs mx-auto"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.keuangan.js.statistik-keuangan')
@endsection
