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
        var currentPage = 1;
        var pageSize = 10;
        var totalItems = 0;
        var totalPages = 0;
        var currentDataUrl = '';
        var currentSearchQuery = '';

        function loadDataWithSearch(page, dataUrl, searchQuery = '') {
            $.ajax({
                url: dataUrl,
                type: 'GET',
                data: {
                    page: page,
                    search: searchQuery
                },
                success: function(response) {
                    totalItems = response.total;
                    totalPages = response.last_page;
                    currentDataUrl = dataUrl;
                    currentSearchQuery = searchQuery;

                    renderData(dataUrl, response.data);
                    renderPagination();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function renderData(dataUrl, response) {
            var html = '';
            if (dataUrl == '{{ route('kesehatan-anak.data') }}') {
                $('#titleModal').html('Pilih Data Kesehatan Anak');
                $('#modalHead').html('Tabel Data Kesehatan Anak');
                var theadHtml = '<tr>' +
                    '<th class="col-md-1 text-center fw-bold">No</th>' +
                    '<th class="col-md-1 text-center fw-bold">Nama Anak</th>' +
                    '<th class="col-md-1 text-center fw-bold">Nama Penyakit</th>' +
                    '<th class="col-md-1 text-center fw-bold">Tanggal Sakit</th>' +
                    '<th class="col-md-1 text-center fw-bold">Tanggal Sembuh</th>' +
                    '<th class="col-md-1 text-center fw-bold">Status</th>' +
                    '<th class="col-md-1 text-center fw-bold">Action</th>' +
                    '</tr>';

                $('#headTable').html(theadHtml);

                for (var i = 0; i < response.length; i++) {
                    var item = response[i];
                    var statusHtml = '';
                    if (item.status === 'Sudah Sembuh') {
                        statusHtml =
                            '<button type="button" class="btn rounded-pill btn-success" style="width: 100px;">Sembuh</button>';
                    } else {
                        statusHtml =
                            '<button type="button" class="btn rounded-pill btn-danger" style="width: 100px;" >Sakit</button>';
                    }
                    var pageNumber = (currentPage - 1) * pageSize;
                    var itemNumber = pageNumber + i + 1;
                    html += '<tr>' +
                        '<td>' + itemNumber + '</td>' +
                        '<td>' + item.childrens.name + '</td>' +
                        '<td>' + item.diseases.name + '</td>' +
                        '<td>' + item.date_of_illness + '</td>' +
                        '<td>' + item.recovery_date + '</td>' +
                        '<td>' + statusHtml + '</td>' +
                        '<td><button class="btn btn-outline-success pilihKesehatan" data-id="' + item.id +
                        '">Pilih</button></td>' +
                        '</tr>';
                }
            } else if (dataUrl == '{{ route('pendidikan-anak.data') }}') {
                $('#titleModal').html('Pilih Data Pendidikan Anak');
                $('#modalHead').html('Tabel Data Pendidikan Anak');
                var theadHtml = '<tr>' +
                    '<th class="col-md-1 text-center fw-bold">No</th>' +
                    '<th class="col-md-1 text-center fw-bold">Nama Anak</th>' +
                    '<th class="col-md-1 text-center fw-bold">Jenjang Pendidikan</th>' +
                    '<th class="col-md-1 text-center fw-bold">Nama Sekolah</th>' +
                    '<th class="col-md-1 text-center fw-bold">Kelas</th>' +
                    '<th class="col-md-2 text-center fw-bold">Tanggal Mulai</th>' +
                    '<th class="col-md-2 text-center fw-bold">Tanggal Berakhir</th>' +
                    '<th class="col-md-4 text-center fw-bold">Status</th>' +
                    '<th class="col-md-1 text-center fw-bold">Action</th>' +
                    '</tr>';

                $('#headTable').html(theadHtml);

                // Render tbody manually
                for (var i = 0; i < response.length; i++) {
                    var item = response[i];
                    var statusHtml = '';
                    if (item.status === 'Aktif') {
                        statusHtml =
                            '<button type="button" class="btn rounded-pill btn-success">Aktif</button>';
                    } else if (item.status === 'Lulus') {
                        statusHtml =
                            '<button type="button" class="btn rounded-pill btn-warning">Lulus</button>';
                    } else {
                        statusHtml =
                            '<button type="button" class="btn rounded-pill btn-danger">Tidak Lulus</button>';
                    }
                    var pageNumber = (currentPage - 1) * pageSize; // Nomor urut pada halaman saat ini
                    var itemNumber = pageNumber + i + 1; // Nomor urut absolut dari data
                    html += '<tr>' +
                        '<td>' + itemNumber + '</td>' +
                        '<td>' + item.childrens.name + '</td>' +
                        '<td>' + item.education_level + '</td>' +
                        '<td>' + item.schools.name + '</td>' +
                        '<td>' + item.class + '</td>' +
                        '<td>' + item.start_date + '</td>' +
                        '<td>' + item.end_date + '</td>' +
                        '<td>' + statusHtml + '</td>' +
                        '<td><button class="btn btn-outline-success pilihPendidikan" data-id="' + item.id +
                        '">Pilih</button></td>' +
                        '</tr>';
                }
            } else if (dataUrl == '{{ route('prestasi-anak.data') }}') {
                $('#titleModal').html('Pilih Data Prestasi Anak');
                $('#modalHead').html('Tabel Data Prestasi Anak');
                var theadHtml = '<tr>' +
                    '<th class="col-md-1 text-center fw-bold">No</th>' +
                    '<th class="col-md-1 text-center fw-bold">Nama Anak</th>' +
                    '<th class="col-md-2 text-center fw-bold">Judul Perlombaan</th>' +
                    '<th class="col-md-2 text-center fw-bold">Tanggal Perlombaan</th>' +
                    '<th class="col-md-2 text-center fw-bold">Tingkat Perlombaan </th>' +
                    '<th class="col-md-1 text-center fw-bold">Peringkat</th>' +
                    '<th class="col-md-2 text-center fw-bold">Action</th>' +
                    '</tr>';

                $('#headTable').html(theadHtml);

                // Render tbody manually
                for (var i = 0; i < response.length; i++) {
                    var item = response[i];
                    var pageNumber = (currentPage - 1) * pageSize; // Nomor urut pada halaman saat ini
                    var itemNumber = pageNumber + i + 1; // Nomor urut absolut dari data
                    html += '<tr>' +
                        '<td>' + itemNumber + '</td>' +
                        '<td>' + item.childrens.name + '</td>' +
                        '<td>' + item.title + '</td>' +
                        '<td>' + item.competition_date + '</td>' +
                        '<td>' + item.competition_level + '</td>' +
                        '<td>' + item.ranking + '</td>' +
                        '<td><button class="btn btn-outline-success pilihPrestasi" data-id="' + item.id +
                        '">Pilih</button></td>' +
                        '</tr>';
                }
            } else if (dataUrl == '{{ route('prestasi-akademik.data') }}') {
                $('#titleModal').html('Pilih Data Prestasi Akademik Anak');
                $('#modalHead').html('Tabel Data Prestasi Akademik Anak');
                var theadHtml = '<tr>' +
                    '<th class="col-md-1 text-center fw-bold">No</th>' +
                    '<th class="col-md-1 text-center fw-bold">Nama Anak</th>' +
                    '<th class="col-md-2 text-center fw-bold">Nama Sekolah</th>' +
                    '<th class="col-md-3 text-center fw-bold">Jenjang Dan Kelas</th>' +
                    '<th class="col-md-2 text-center fw-bold">Judul Perlombaan</th>' +
                    '<th class="col-md-2 text-center fw-bold">Tanggal Perlombaan</th>' +
                    '<th class="col-md-2 text-center fw-bold">Tingkat Perlombaan </th>' +
                    '<th class="col-md-1 text-center fw-bold">Peringkat</th>' +
                    '<th class="col-md-2 text-center fw-bold">Action</th>' +
                    '</tr>';

                $('#headTable').html(theadHtml);

                // Render tbody manually
                for (var i = 0; i < response.length; i++) {
                    var item = response[i];
                    var pageNumber = (currentPage - 1) * pageSize; // Nomor urut pada halaman saat ini
                    var itemNumber = pageNumber + i + 1; // Nomor urut absolut dari data
                    html += '<tr>' +
                        '<td>' + itemNumber + '</td>' +
                        '<td>' + item.child_name + '</td>' +
                        '<td>' + item.school_name + '</td>' +
                        '<td>' + item.education_level + ' ( Kelas' + item.class + ' )' + '</td>' +
                        '<td>' + item.title + '</td>' +
                        '<td>' + item.competition_date + '</td>' +
                        '<td>' + item.competition_level + '</td>' +
                        '<td>' + item.ranking + '</td>' +
                        '<td><button class="btn btn-outline-success pilihPrestasiAkademik" data-id="' + item
                        .id +
                        '">Pilih</button></td>' +
                        '</tr>';
                }
            }
            $('#bodyTable').html(html);
        }

        function renderPagination() {
            var html = '';
            // Tombol First Page
            html += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="1">&laquo;</a></li>';

            // Tombol Previous Page
            html += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="' + (currentPage - 1) +
                '">&lsaquo;</a></li>';

            // Menampilkan nomor halaman
            for (var i = 1; i <= totalPages; i++) {
                html += '<li class="page-item ' + (currentPage == i ? 'active' : '') + '">';
                html += '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
            }

            // Tombol Next Page
            html += '<li class="page-item ' + (currentPage == totalPages ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="' + (currentPage + 1) +
                '">&rsaquo;</a></li>';

            // Tombol Last Page
            html += '<li class="page-item ' + (currentPage == totalPages ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="' + totalPages + '">&raquo;</a></li>';

            $('#pagination').html(html);
        }

        function handleSearch() {
            var searchInput = $('#searchInput').val(); // Mendapatkan nilai input pencarian
            loadDataWithSearch(currentPage, currentDataUrl, searchInput);
        }

        $('#searchButton').on('click', function() {
            handleSearch();
        });

        // Menambahkan event listener untuk input pencarian
        $('#searchInput').on('keyup', function(event) {
            // Menjalankan pencarian hanya jika tombol Enter ditekan
            if (event.keyCode === 13) {
                handleSearch();
            }
        });

        $(document).on('click', '#pagination .page-link', function(e) {
            e.preventDefault();
            currentPage = parseInt($(this).data('page'));
            loadDataWithSearch(currentPage, currentDataUrl, currentSearchQuery);
        });

        $(document).on('click', '.pilihKesehatan', function(e) {
            let id = $(this).data('id');

            const costType = document.getElementById('costType');
            costType.value = 'Kesehatan';
            console.log(costType.value);

            const costId = document.getElementById('costId');
            costId.value = id;
            console.log(costId.value);
            $('#dataModal').modal('hide');
            $('#modalPengeluaranAnak').modal('show');
        });

        $(document).on('click', '.pilihPendidikan', function(e) {
            let id = $(this).data('id');

            const costType = document.getElementById('costType');
            costType.value = 'Pendidikan';
            console.log(costType.value);

            const costId = document.getElementById('costId');
            costId.value = id;
            console.log(costId.value);
            $('#dataModal').modal('hide');
            $('#modalPengeluaranAnak').modal('show');
        });

        $(document).on('click', '.pilihPrestasi', function(e) {
            let id = $(this).data('id');

            const costType = document.getElementById('costType');
            costType.value = 'Prestasi';
            console.log(costType.value);

            const costId = document.getElementById('costId');
            costId.value = id;
            console.log(costId.value);
            $('#dataModal').modal('hide');
            $('#modalPengeluaranAnak').modal('show');
        });

        $(document).on('click', '.pilihPrestasiAkademik', function(e) {
            let id = $(this).data('id');

            const costType = document.getElementById('costType');
            costType.value = 'Prestasi Akademik';
            console.log(costType.value);

            const costId = document.getElementById('costId');
            costId.value = id;
            console.log(costId.value);
            $('#dataModal').modal('hide');
            $('#modalPengeluaranAnak').modal('show');
        });

        $('.dropdown-item').click(function() {
            var id = $(this).attr('id');

            // Cek id dan panggil fungsi showModal dengan parameter yang sesuai
            if (id === 'childHealth') {
                showModal('#dataModal', '{{ route('kesehatan-anak.data') }}');
            } else if (id === 'childEducation') {
                showModal('#dataModal', '{{ route('pendidikan-anak.data') }}');
            } else if (id === 'childAchievements') {
                showModal('#dataModal', '{{ route('prestasi-anak.data') }}');
            } else if (id === 'childAcademicAchievements') {
                showModal('#dataModal', '{{ route('prestasi-akademik.data') }}');
            }
        });

        function showModal(modalId, dataUrl) {
            $(modalId).data('url', dataUrl);
            loadDataWithSearch(currentPage, dataUrl, currentSearchQuery);
            $(modalId).modal('show');
        }
    });
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

        $('.modalPengeluaranAnak').on('hidden.bs.modal', function() {
            clearForm();
        });

        $('.simpan').click(function(e) {
            e.preventDefault();
            simpan();
            return false;
        });

        function clearErrors() {
            // Hapus kelas is-invalid dari semua elemen input
            document.querySelectorAll('.form-control', ).forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            document.querySelectorAll('.form-select', ).forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            // Sembunyikan pesan error
            document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                element.innerHTML = '';
            });
        }

        function handleErrors(errors) {
            clearErrors();

            // Menambahkan kelas is-invalid hanya untuk elemen input yang memiliki error
            if (errors.title) {
                $('#title').addClass('is-invalid');
                $('#titleError').text(errors.title[0]);
            }
            if (errors.total_cost) {
                $('#total_cost').addClass('is-invalid');
                $('#total_costError').text(errors.total_cost[0]);
            }
            if (errors.proof_of_payment) {
                $('#proof_of_payment').addClass('is-invalid');
                $('#proof_of_paymentError').text(errors.proof_of_payment[0]);
            }
        }

        function simpan() {
            var formData = new FormData($('#pengeluaranAnakForm')[0]);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{ route('pengeluaran-anak.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                    } else {
                        showSuccessMessage(response.success);
                        $('#modalPengeluaranAnak').modal('hide');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    handleErrors(xhr.responseJSON.errors);
                }
            });
        }
    });
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
            let url = "{{ route('pengeluaran-anak-chart.chartTahunan') }}";
            if (selectedYear) {
                url += "?year=" + selectedYear;
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

                    percentage.innerHTML = `<i class="bx bx-transfer-alt"></i> 0,00%`;

                    percentage.classList.remove('text-danger', 'text-success');
                    const numericPercentage = parseFloat(data.percentage.replace(',', '.'));

                    const arrowIcon = numericPercentage >= 0 ? 'bx-up-arrow-alt' :
                        'bx-down-arrow-alt';
                    const textColor = numericPercentage >= 0 ? 'text-success' : 'text-danger';

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
            let url = "{{ route('pengeluaran-anak-chart.chartBulanan') }}";
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

                    percentage.innerHTML = `<i class="bx bx-transfer-alt"></i> 0,00%`;

                    percentage.classList.remove('text-danger', 'text-success');
                    const numericPercentage = parseFloat(data.percentage.replace(',', '.'));

                    const arrowIcon = numericPercentage >= 0 ? 'bx-up-arrow-alt' :
                        'bx-down-arrow-alt';
                    const textColor = numericPercentage >= 0 ? 'text-success' : 'text-danger';

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
