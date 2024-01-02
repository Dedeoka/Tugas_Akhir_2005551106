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
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class='bx bx-building-house fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $currentMonthTotalCostFormatted }}</h4>
                        </div>
                        <p class="mb-1">Total Pengeluaran Panti Bulan Ini</p>
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
                                        class='bx bx-category-alt fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $highestTotalCostByTypeFormat }}</h4>
                        </div>
                        <p class="mb-1">Kategori Pengeluaran Terbesar</p>
                        <small class="mb-0 text-muted">
                            Kategori {{ $highestCostTypeName }}
                        </small>
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
                            <h4 class="ms-1 mb-0"></h4>
                        </div>
                        <p class="mb-1">Pengeluaran Pendidikan Bulan Ini </p>
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
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-medal fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"></h4>
                        </div>
                        <p class="mb-1">Pengeluaran Total Bulan Ini</p>
                        <p class="mb-0">
                            <span class="text-{{ $percentageTotalCost >= 0 ? 'danger' : 'success' }} fw-medium">
                                <i
                                    class="bx {{ $percentageTotalCost >= 0 ? 'bx-up-arrow-alt' : 'bx-down-arrow-alt' }}"></i>
                                {{ $percentageTotalCost }}%
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
                        <h5 class="card-title mb-0">Pengeluaran Anak</h5>
                        <small class="text-muted">Statistik Pengeluaran Anak</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                        <h5 class="me-2 mt-3 cursor-pointer" id="yearChart">Year</h5>
                        <h5 class="me-3 mt-3 cursor-pointer" id="monthChart">Month</h5>
                        <select class="form-select me-2 border-0" id="monthSelector" name="month"
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
        <!-- DataTable with Buttons -->
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
                            <div class="side-content">

                            </div>
                            <div class="">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalPengeluaranPanti">
                                    <i class='bx bx-plus m-1'></i>
                                    Tambah Data
                                </button>
                            </div>
                            <div class="modal fade" id="modalPengeluaranPanti" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Tambah Pengeluaran Panti</h3>
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
                                                            Tambah Data Pengeluaran Panti</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body">
                                            <form id="pengeluaranPantiForm"
                                                action="{{ route('pengeluaran-panti.store') }}" method="POST">
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
                                                                                <label for="cost_type_id"
                                                                                    class="form-label">Jenis
                                                                                    Pengeluaran</label>
                                                                                <select class="form-select"
                                                                                    id="cost_type_id" name="cost_type_id"
                                                                                    aria-label="Default select example">
                                                                                    <option value="" hidden>
                                                                                        Pilih Jenis Pengeluaran
                                                                                    </option>
                                                                                    @foreach ($costTypes as $type)
                                                                                        <option
                                                                                            value="{{ $type->id }}">
                                                                                            {{ $type->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div id="cost_type_idError"
                                                                                    class="invalid-feedback"></div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="title"
                                                                                    class="form-label">Nama
                                                                                    Pengeluaran</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="title" name="title"
                                                                                    placeholder="Nama Pengeluaran..." />
                                                                                <div id="titleError"
                                                                                    class="invalid-feedback"></div>
                                                                            </div>
                                                                            <div class="mb-3" id="totalAmountInput">
                                                                                <label for="total_cost"
                                                                                    class="form-label">Biaya
                                                                                    Pemeriksaan</label>
                                                                                <div class="input-group input-group-merge">
                                                                                    <span
                                                                                        class="input-group-text">Rp</span>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="total_cost" name="total_cost"
                                                                                        placeholder="10,000"
                                                                                        oninput="formatAmount(this)" />
                                                                                    <div id="total_costError"
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
                                    <td>{{ $data->costTypes->name }}</td>
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
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

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

    {{-- <script>
        $(document).ready(function() {
            let myChart;
            $('#yearSelector').change(function() {
                fetchChildCostData($(this).val());
            });

            fetchChildCostData();

            function fetchChildCostData(selectedYear = null) {
                let url = "{{ route('pengeluaran-panti-chart.chartTahunan') }}";
                if (selectedYear) {
                    url += "?year=" + selectedYear;
                }

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        renderChart(data);
                        const cost = document.getElementById('yearCost');
                        const percentage = document.getElementById('yearPercentage');
                        cost.innerHTML = formatCurrency(data.totalCost);

                        // Menambahkan ikon panah dan warna berdasarkan perubahan persentase
                        const arrowIcon = data.percentage >= 0 ? 'bx-up-arrow-alt' :
                            'bx-down-arrow-alt';
                        const textColor = data.percentage >= 0 ? 'text-danger' : 'text-success';

                        percentage.innerHTML = `<i class="bx ${arrowIcon}"></i> ${data.percentage}%`;
                        percentage.classList.add(textColor);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }


            function renderChart(data) {
                const labels = Object.keys(data.data);
                const values = Object.values(data.data);
                const year = data.selectedYear;
                const total = formatCurrency(data.totalCost);
                const formattedValues = values.map(value => formatCurrency(value));

                const ctx = document.getElementById('myChart').getContext('2d');

                // Destroy existing chart if it exists
                if (myChart && myChart instanceof Chart) {
                    myChart.destroy();
                }

                const additionalConfig = {
                    options: {
                        plugins: {
                            filler: {
                                propagate: false,
                            },
                            title: {
                                display: true,
                                text: (ctx) => 'Total Pengeluaran Anak Tahun ' + year + ' : ' + total
                            }
                        },
                        interaction: {
                            intersect: false,
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    const datasetLabel = data.datasets[tooltipItem.datasetIndex].label ||
                                        '';
                                    const value = formatCurrency(tooltipItem.yLabel);
                                    return datasetLabel + ': ' + value;
                                }
                            }
                        },
                        hover: {
                            mode: 'index',
                            intersect: false,
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Bulan'
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Value (IDR)'
                                },
                                beginAtZero: true,
                                skipNull: true,
                                ticks: {
                                    callback: function(value) {
                                        return formatCurrency(value);
                                    }
                                }
                            }
                        }
                    },
                };

                const mergedConfig = Object.assign({}, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: ' Pengeluaran',
                            data: values,
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 4,
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderWidth: 5,
                            pointRadius: 3,
                            pointHoverRadius: 5,
                        }]
                    },
                }, additionalConfig);

                myChart = new Chart(ctx, mergedConfig);
            }
        });

        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
    </script> --}}

    <script>
        $(document).ready(function() {
            let myChart;
            $('#monthSelector, #yearSelector').change(function() {
                fetchChildCostData($('#monthSelector').val(), $('#yearSelector').val());
            });

            fetchChildCostData();

            function fetchChildCostData(selectedMonth = null, selectedYear = null) {
                let url = "{{ route('pengeluaran-panti-chart.chartBulanan') }}";
                if (selectedMonth && selectedYear) {
                    url += `?month=${selectedMonth}&year=${selectedYear}`;
                }

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        renderChart(data);
                        const cost = document.getElementById('beforeCost');
                        const percentage = document.getElementById('beforePercentage');
                        cost.innerHTML = formatCurrency(data.totalCost);

                        // Adding arrow icon and color based on percentage change
                        const arrowIcon = data.percentage >= 0 ? 'bx-up-arrow-alt' :
                            'bx-down-arrow-alt';
                        const textColor = data.percentage >= 0 ? 'text-danger' : 'text-success';

                        percentage.innerHTML = `<i class="bx ${arrowIcon}"></i> ${data.percentage}%`;
                        percentage.classList.add(textColor);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }

            function renderChart(data) {
                const labels = data.labels.map(day => `${day}`);
                const values = data.values;
                const month = data.selectedMonth;
                const year = data.selectedYear;
                const total = formatCurrency(data.totalCost);
                const percentage = data.percentage;

                const ctx = document.getElementById('myChart').getContext('2d');

                // Destroy existing chart if it exists
                if (myChart && myChart instanceof Chart) {
                    myChart.destroy();
                }

                const additionalConfig = {
                    options: {
                        plugins: {
                            filler: {
                                propagate: false,
                            },
                            title: {
                                display: true,
                                text: (ctx) => 'Total Pengeluaran Anak Bulan ' + month + ' Tahun ' + year +
                                    ' : ' +
                                    total
                            },
                        },
                        interaction: {
                            intersect: false,
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                title: (tooltipItem) => `${tooltipItem[0].label}`,
                                label: (tooltipItem) =>
                                    `Total Pengeluaran: ${formatCurrency(tooltipItem.raw)}`,
                            }
                        },
                        hover: {
                            mode: 'index',
                            intersect: false,
                        },
                        scales: {
                            x: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            },
                            y: {
                                display: true,
                                title: {
                                    display: true,
                                    text: 'Value (IDR)'
                                },
                                beginAtZero: true,
                                skipNull: true,
                                ticks: {
                                    callback: function(value) {
                                        return formatCurrency(value);
                                    }
                                }
                            }
                        }
                    },
                };

                const mergedConfig = Object.assign({}, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: ' Pengeluaran',
                            data: values,
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 4,
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderWidth: 5,
                            pointRadius: 3,
                            pointHoverRadius: 5,
                        }]
                    },
                }, additionalConfig);

                myChart = new Chart(ctx, mergedConfig);
            }
        });

        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
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
                $('#title').val('');
                $('#total_cost').val('');
                $('#cost_type_id').val('');
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

            $('#modalPengeluaranPanti').on('hidden.bs.modal', function() {
                clearForm();
            });

            $('#submit').click(function(e) {
                e.preventDefault();
                simpan();
                return false;
            });

            function simpan() {
                var formData = new FormData($('#pengeluaranPantiForm')[0]);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: "{{ route('pengeluaran-panti.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            console.log('Error Response:', response);
                        } else {
                            showSuccessMessage(response.success);
                            $('#modalPengeluaranPanti').modal('hide');
                        }
                    },
                });
            }

            // Event click pada tombol "Save Changes" pada modal edit
            $('.updateSubmit').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                update(id);
            });

            function update(id) {
                $.ajax({
                    url: "{{ url('master-data/daftar-sekolah') }}/" + id,
                    type: 'PATCH',
                    data: new FormData($('#dataAnakForm')[0]),
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.name) {
                                $('#editName' + id).addClass('is-invalid');
                                $('#editNameError' + id).text(response.errors.name[0]);
                            }
                            // Penanganan error lainnya jika diperlukan
                        } else {
                            showSuccessMessage(response.success);
                            $('#editModal' + id).modal('hide');
                        }
                    }
                });
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
                fetch(`/keuangan/pengeluaran-panti/${dataId}`, {
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
