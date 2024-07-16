@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Pengeluaran Total Panti</b>
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
                            <h4 class="ms-1 mb-0">{{ $currentMonthPantiCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Total Pengeluaran Panti Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageMonthPantiCost >= 0 ? 'success' : 'danger' }} fw-medium">
                                <i
                                    class="bx {{ $percentageMonthPantiCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageMonthPantiCost }}%
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
                            <h4 class="ms-1 mb-0">{{ $currentYearPantiCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Panti Tahun Ini </p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageYearPantiCost >= 0 ? 'success' : 'danger' }} fw-medium">
                                <i
                                    class="bx {{ $percentageYearPantiCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageYearPantiCost }}%
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
                            <h4 class="ms-1 mb-0">{{ $currentMonthChildCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Anak Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageMonthChildCost >= 0 ? 'success' : 'danger' }} fw-medium">
                                <i
                                    class="bx {{ $percentageMonthChildCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageMonthChildCost }}%
                            </span>
                            <small class="text-muted">Dari Tahun Lalu</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-medal fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentYearChildCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Anak Tahun Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageYearChildCost >= 0 ? 'success' : 'danger' }} fw-medium">
                                <i
                                    class="bx {{ $percentageYearChildCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageYearChildCost }}%
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
                        <h5 class="card-title mb-0">Pengeluaran Total Panti</h5>
                        <small class="text-muted">Statistik Pengeluaran Total Panti</small>
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
    </div>
@endsection

@section('scripts')
    @include('admin.keuangan.js.pengeluaran-total')
@endsection
