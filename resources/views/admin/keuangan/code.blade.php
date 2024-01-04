{{-- <script>
        $(document).ready(function() {
            // Inisialisasi dengan tahun saat ini
            const currentYear = new Date().getFullYear();
            fetchData(currentYear);

            // Tangani perubahan tahun (Anda dapat menggunakan dropdown atau elemen UI lainnya)
            $('#yearSelector').change(function() {
                const selectedYear = $(this).val();
                console.log(selectedYear);
                fetchData(selectedYear);
            });

            function fetchData(year) {
                // Ambil data menggunakan AJAX untuk tahun yang dipilih dari backend
                $.ajax({
                    url: "{{ route('pengeluaran-anak-chart.index') }}",
                    method: 'GET',
                    data: {
                        year: year
                    },
                    success: function(response) {
                        const monthlyData = response.monthlyData;
                        console.log(monthlyData);

                        // Perbarui grafik dengan data yang diambil
                        updateChart(monthlyData);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function updateChart(monthlyData) {
                const options = {
                    series: [{
                        name: "Total Cost",
                        data: monthlyData
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
                        text: 'Tren Total Biaya per Bulan',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
                            'Nov', 'Des'
                        ],
                    },
                    yaxis: {
                        labels: {
                            formatter: function(val) {
                                return 'Rp ' + val.toLocaleString('id-ID');
                            }
                        }
                    }
                };
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            }
        });
    </script> --}}

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
                    const percentage = document.getElementById('beforePercentage');
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
</script>

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
</script> --}}


{{-- <script>
    $(document).ready(function() {
        let myChart;
        $('#yearSelector').change(function() {
            fetchChildCostData($(this).val());
        });

        fetchChildCostData();

        function fetchChildCostData(selectedYear = null) {
            let url = "{{ route('pengeluaran-anak-chart.chartTahunan') }}";
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
