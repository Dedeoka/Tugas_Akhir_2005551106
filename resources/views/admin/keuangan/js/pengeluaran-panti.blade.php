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

<script>
    $(document).ready(function() {
        let myChart;
        let isYearlyChart = true;

        fetchYearlyChildCostData($('#yearSelector').val());

        $('#yearSelector').change(function() {
            if (isYearlyChart) {
                fetchYearlyChildCostData($(this).val());
            } else {
                fetchMonthlyChildCostData($('#monthSelector').val(), $(this).val());
            }
        });

        $('#monthSelector, #yearSelector').change(function() {
            if (!isYearlyChart) {
                fetchMonthlyChildCostData($('#monthSelector').val(), $('#yearSelector').val());
            }
        });

        function fetchYearlyChildCostData(selectedYear = null) {
            let url = "{{ route('pengeluaran-panti-chart.chartTahunan') }}";
            if (selectedYear) {
                url += "?year=" + selectedYear;
            }

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    renderChart(data);
                    const cost = document.getElementById('beforeCost');
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
        }


        function fetchMonthlyChildCostData(selectedMonth = null, selectedYear = null) {
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

            function renderChart(data) {
                const labels = data.labels.map(day => `${day}`);
                const values = data.values;
                const monthSelector = document.getElementById("monthSelector");
                const selectedOption = monthSelector.options[monthSelector.selectedIndex];
                const selectedText = selectedOption.textContent.trim();
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
                                text: (ctx) => 'Total Pengeluaran Anak Bulan ' + selectedText + ' Tahun ' +
                                    year +
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
            fetchYearlyChildCostData($('#yearSelector').val());
        });

        $('#monthChart').click(function() {
            isYearlyChart = false;
            $(this).removeClass('text-muted');
            $('#monthSelector').removeClass('d-none');
            $('#yearChart').addClass('text-muted');
            fetchMonthlyChildCostData($('#monthSelector').val(), $('#yearSelector').val());
        });
    });
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
