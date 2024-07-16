<script>
    $(document).ready(function() {
        let myChart;
        let isYearlyChart = true;

        fetchYearlyStatistikData($('#yearSelector').val());

        $('#yearSelector').change(function() {
            if (isYearlyChart) {
                fetchYearlyStatistikData($(this).val());
            } else {
                fetchMonthlyStatistikData($('#monthSelector').val(), $(this).val());
            }
        });

        $('#monthSelector, #yearSelector').change(function() {
            if (!isYearlyChart) {
                fetchMonthlyStatistikData($('#monthSelector').val(), $('#yearSelector').val());
            }
        });

        function fetchYearlyStatistikData(selectedYear = null) {
            let url = "{{ route('statistik-keuangan-chart.chartTahunan') }}";
            if (selectedYear) {
                url +=
                    "?year=" + selectedYear;
            }

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    renderChart(data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

            function renderChart(data) {
                const labels = Object.keys(data.data);
                const costValues = Object.values(data.data).map(month => month.cost);
                const incomeValues = Object.values(data.data).map(month => month.income);
                const year = data.selectedYear;
                const total = formatCurrency(data.totalIncome);
                const formattedCostValues = costValues.map(value => formatCurrency(value));
                const formattedIncomeValues = incomeValues.map(value => formatCurrency(value));

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
                                text: (ctx) => 'Statistik Keuangan Panti Tahun ' + year
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
                                    const datasetLabel = data.datasets[tooltipItem.datasetIndex]
                                        .label ||
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
                            label: 'Pemasukan',
                            data: incomeValues,
                            borderColor: 'rgb(75, 192, 192)',
                            borderWidth: 4,
                            pointBackgroundColor: 'rgb(75, 192, 192)',
                            pointBorderWidth: 5,
                            pointRadius: 3,
                            pointHoverRadius: 5,
                        }, {
                            label: 'Pengeluaran',
                            data: costValues,
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
        }

        function fetchMonthlyStatistikData(selectedMonth = null, selectedYear = null) {
            let url = "{{ route('statistik-keuangan-chart.chartBulanan') }}";
            if (selectedMonth && selectedYear) {
                url += `?month=${selectedMonth}&year=${selectedYear}`;
            }

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    renderChart(data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

            function renderChart(data) {
                const labels = data.labels.map(day => `${day}`);
                const allDays = Object.values(data.values); // Mengambil nilai dari objek values

                const monthSelector = document.getElementById("monthSelector");
                const selectedOption = monthSelector.options[monthSelector.selectedIndex];
                const selectedText = selectedOption.textContent.trim();
                const month = data.selectedMonth;
                const year = data.selectedYear;
                const totalIncome = formatCurrency(data.totalIncome);
                const totalCost = formatCurrency(data.totalCost);
                const percentageCost = data.percentageCost;
                const percentageIncome = data.percentageIncome;

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
                                text: `Statistik Keuangan Bulan Panti ${selectedText} Tahun ${year}`
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
                                    const datasetLabel = data.datasets[tooltipItem.datasetIndex]
                                        .label || '';
                                    const value = formatCurrency(tooltipItem.yLabel);
                                    return `${datasetLabel}: ${value}`;
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
                    }
                };

                const datasets = [{
                    label: 'Pemasukan',
                    data: allDays.map(day => day.income), // Mengambil nilai income dari setiap elemen
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgb(75, 192, 192)',
                    pointBorderWidth: 3,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                }, {
                    label: 'Pengeluaran',
                    data: allDays.map(day => day.cost), // Mengambil nilai cost dari setiap elemen
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderWidth: 3,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                }];

                const mergedConfig = Object.assign({}, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                }, additionalConfig);

                myChart = new Chart(ctx, mergedConfig);
            }
        }

        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }

        $('#yearChart').click(function() {
            isYearlyChart = true;
            $(this).removeClass('text-muted');
            $('#monthChart').addClass('text-muted');
            $('#monthSelector').addClass('d-none');
            fetchYearlyStatistikData($('#yearSelector').val());
        });

        $('#monthChart').click(function() {
            isYearlyChart = false;
            $(this).removeClass('text-muted');
            $('#monthSelector').removeClass('d-none');
            $('#yearChart').addClass('text-muted');
            fetchMonthlyStatistikData($('#monthSelector').val(), $('#yearSelector').val());
        });
    });
</script>
