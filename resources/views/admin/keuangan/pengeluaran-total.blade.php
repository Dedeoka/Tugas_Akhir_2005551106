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
                                <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-child fs-2'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">42</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Anak</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">+18.2%</span>
                            <small class="text-muted">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class='bx bx-building-house fs-3'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">8</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Panti</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">-8.7%</span>
                            <small class="text-muted">than last week</small>
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
                                        class='bx bx-git-repo-forked'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">27</h4>
                        </div>
                        <p class="mb-1">Pengeluaran </p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">+4.3%</span>
                            <small class="text-muted">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-info"><img
                                        src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                        class="rounded" /></span>
                            </div>
                            <h4 class="ms-1 mb-0">13</h4>
                        </div>
                        <p class="mb-1">Pengeluaran Total Bulan Ini</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">-2.5%</span>
                            <small class="text-muted">than last month</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Pengeluaran Total</h5>
                        <small class="text-muted">Pengeluaran Anak & Pengeluaran Panti</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                        <h5 class="mb-0 me-3">$ 100,000</h5>
                        <span class="badge bg-label-secondary">
                            <i class='bx bx-down-arrow-alt bx-xs text-danger'></i>
                            <span class="align-middle">20%</span>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateChart() {
            var selectedYear = document.getElementById("yearSelect").value;

            // Make an AJAX request to fetch data for the selected year
            axios.get('/keuangan/pengeluaran-total?year=' + selectedYear)
                .then(function(response) {
                    // Create an array to hold data for all months, initialize with zeros
                    var dataForAllMonths = Array.from({
                        length: 12
                    }, () => 0);

                    // Update data for available months
                    response.data.forEach(function(data) {
                        // Assuming data contains month and value properties
                        dataForAllMonths[data.month - 1] = data.value;
                    });

                    // Update chart data with the new data
                    chart.updateSeries([{
                        name: "Pengeluaran Anak",
                        data: dataForAllMonths,
                    }]);
                })
                .catch(function(error) {
                    console.error("Error fetching data: " + error);
                });
        }

        // Initialize data array with zeros for all months
        var initialData = Array.from({
            length: 12
        }, () => 0);

        var options = {
            series: [{
                name: "Pengeluaran Anak",
                data: initialData,
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Product Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#chartAnak"), options);
        chart.render();
    </script>
@endsection
