<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function formatAmount(inputElement) {
        let inputValue = inputElement.value;
        inputValue = inputValue.replace(/[^\d]/g, '');
        inputValue = new Intl.NumberFormat().format(inputValue);
        inputElement.value = inputValue;
    }
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function clearForm() {
            $('#title').val('');
            $('#total_cost').val('');
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

        $('.modal-pengeluaran').on('hidden.bs.modal', function() {
            clearForm();
        });

        $('.submitKesehatan').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            simpanKesehatan(id);
            return false;
        });

        $('.submitPendidikan').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            simpanPendidikan(id);
            return false;
        });

        function simpanKesehatan(id) {
            var formData = new FormData($('#formPengeluaranKesehatan' + id)[0]);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{ route('pengeluaran-anak.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        console.log('Error Response:', response);
                    } else {
                        showSuccessMessage(response.success);
                        $('#dataPengeluaranKesehatan').modal('hide');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                    console.log("Response:", jqXHR.responseText);
                }
            });
        }

        function simpanPendidikan(id) {
            var formData = new FormData($('#pengeluaranPendidikan' + id)[0]);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{ route('pengeluaran-anak.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        console.log('Error Response:', response);
                    } else {
                        showSuccessMessage(response.success);
                        $('#dataPengeluaranPendidikan').modal('hide');
                    }
                }
            });
        }

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
                    } else {
                        showSuccessMessage(response.success);
                        $('#editModal' + id).modal('hide');
                    }
                }
            });
        }
    });
</script>

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

<script>
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
            fetch(`/keuangan/pengeluaran-anak/${dataId}`, {
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
