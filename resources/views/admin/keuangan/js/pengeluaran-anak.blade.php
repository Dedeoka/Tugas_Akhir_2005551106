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
        var pageSize = 10; // Jumlah data per halaman
        var totalItems = 0;
        var totalPages = 0;

        // Fungsi untuk memuat data untuk halaman tertentu
        function loadData(page, dataUrl) {
            $.ajax({
                url: dataUrl,
                type: 'GET',
                success: function(response) {
                    totalItems = response.length;
                    totalPages = Math.ceil(totalItems / pageSize);

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

                        // Render tbody manually
                        var html = '';
                        var startIndex = (page - 1) * pageSize;
                        var endIndex = Math.min(startIndex + pageSize, totalItems);
                        var statusHtml = '';
                        for (var i = startIndex; i < endIndex; i++) {
                            var item = response[i];
                            if (item.status === 'Sudah Sembuh') {
                                statusHtml =
                                    '<button type="button" class="btn rounded-pill btn-success" style="width: 100px;">Sembuh</button>';
                            } else {
                                statusHtml =
                                    '<button type="button" class="btn rounded-pill btn-danger" style="width: 100px;" >Sakit</button>';
                            }
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.childrens.name + '</td>' +
                                '<td>' + item.diseases.name + '</td>' +
                                '<td>' + item.date_of_illness + '</td>' +
                                '<td>' + item.recovery_date + '</td>' +
                                '<td>' + statusHtml + '</td>' +
                                '<td><button class="btn btn-outline-success pilih-id" data-id="' +
                                item
                                .id + '">Pilih</button></td>' +
                                '</tr>';
                        }
                        $('#bodyTable').html(html);
                        renderPagination();
                    } else if (dataUrl == '{{ route('pendidikan-anak.data') }}') {
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
                        var html = '';
                        var startIndex = (page - 1) * pageSize;
                        var endIndex = Math.min(startIndex + pageSize, totalItems);
                        for (var i = startIndex; i < endIndex; i++) {
                            var item = response[i];
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
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.childrens.name + '</td>' +
                                '<td>' + item.education_level + '</td>' +
                                '<td>' + item.schools.name + '</td>' +
                                '<td>' + item.class + '</td>' +
                                '<td>' + item.start_date + '</td>' +
                                '<td>' + item.end_date + '</td>' +
                                '<td>' + statusHtml + '</td>' +
                                '<td><button class="btn btn-outline-success pilih-id" data-id="' +
                                item
                                .id + '">Pilih</button></td>' +
                                '</tr>';
                        }
                        $('#bodyTable').html(html);
                        renderPagination();
                    } else if (dataUrl == '{{ route('prestasi-anak.data') }}') {
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
                        var html = '';
                        var startIndex = (page - 1) * pageSize;
                        var endIndex = Math.min(startIndex + pageSize, totalItems);
                        for (var i = startIndex; i < endIndex; i++) {
                            var item = response[i];
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.childrens.name + '</td>' +
                                '<td>' + item.title + '</td>' +
                                '<td>' + item.competition_date + '</td>' +
                                '<td>' + item.competition_level + '</td>' +
                                '<td>' + item.ranking + '</td>' +
                                '<td><button class="btn btn-outline-success pilih-id" data-id="' +
                                item
                                .id + '">Pilih</button></td>' +
                                '</tr>';
                        }
                        $('#bodyTable').html(html);
                        renderPagination();
                    } else if (dataUrl == '{{ route('prestasi-akademik.data') }}') {
                        var theadHtml = '<tr>' +
                            '<th class="col-md-1 text-center fw-bold">No</th>' +
                            '<th class="col-md-1 text-center fw-bold">Name</th>' +
                            '<th class="col-md-1 text-center fw-bold">Education Level</th>' +
                            '<th class="col-md-1 text-center fw-bold">School Name</th>' +
                            '<th class="col-md-1 text-center fw-bold">Class</th>' +
                            '<th class="col-md-1 text-center fw-bold">Status</th>' +
                            '<th class="col-md-1 text-center fw-bold">Action</th>' +
                            '</tr>';

                        $('#headTable').html(theadHtml);

                        // Render tbody manually
                        var html = '';
                        var startIndex = (page - 1) * pageSize;
                        var endIndex = Math.min(startIndex + pageSize, totalItems);
                        for (var i = startIndex; i < endIndex; i++) {
                            var item = response[i];
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.education_level + '</td>' +
                                '<td>' + item.school_name + '</td>' +
                                '<td>' + item.class + '</td>' +
                                '<td>' + item.status + '</td>' +
                                '<td><button class="btn btn-outline-success pilih-id" data-id="' +
                                item
                                .id + '">Pilih</button></td>' +
                                '</tr>';
                        }
                        $('#bodyTable').html(html);
                        renderPagination();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

        }

        function renderPagination() {
            var html = '';

            // Tombol First Page
            html += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="1">&laquo;</a></li>';

            // Tombol Previous Page
            html += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="' + (currentPage - 1) + '">&lsaquo;</a></li>';

            // Menampilkan nomor halaman
            for (var i = 1; i <= totalPages; i++) {
                html += '<li class="page-item ' + (currentPage == i ? 'active' : '') + '">';
                html += '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
            }

            // Tombol Next Page
            html += '<li class="page-item ' + (currentPage == totalPages ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="' + (currentPage + 1) + '">&rsaquo;</a></li>';

            // Tombol Last Page
            html += '<li class="page-item ' + (currentPage == totalPages ? 'disabled' : '') + '">';
            html += '<a class="page-link" href="#" data-page="' + totalPages + '">&raquo;</a></li>';

            $('#pagination').html(html);
        }

        // Ketika tombol pagination diklik
        $(document).on('click', '#pagination .page-link', function(e) {
            e.preventDefault();
            currentPage = parseInt($(this).data('page'));
            loadData(currentPage, $('#dataModal').data('url'));
        });

        $(document).on('click', '.pilih-id', function(e) {
            let id = $(this).data('id');
            const educationId = document.getElementById('educationId');
            educationId.value = id;
            $('#dataModal').modal('hide');
            $('#modalPrestasiAnakPanti').modal('show');
        });

        function showModal(modalId, dataUrl) {
            // Simpan URL ke dalam atribut data untuk modal
            $(modalId).data('url', dataUrl);
            // Panggil loadData untuk mengambil data saat modal ditampilkan
            loadData(currentPage, dataUrl);
            // Tampilkan modal
            $(modalId).modal('show');
        }

        // Ketika dropdown item diklik
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
    });
</script>

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

        function handleErrors(errors, id) {
            clearErrors();

            // Menambahkan kelas is-invalid hanya untuk elemen input yang memiliki error
            if (errors.title) {
                $('#title' + id).addClass('is-invalid');
                $('#titleError' + id).text(errors.title[0]);
            }
            if (errors.total_cost) {
                $('#total_cost' + id).addClass('is-invalid');
                $('#total_costError' + id).text(errors.total_cost[0]);
            }
        }

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
                        handleErrors(response.errors, id);
                    } else {
                        showSuccessMessage(response.success);
                        $('#dataPengeluaranKesehatan').modal('hide');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    handleErrors(xhr.responseJSON.errors, id);
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
                    const textColor = numericPercentage >= 0 ? 'text-danger' : 'text-success';

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
                    const textColor = numericPercentage >= 0 ? 'text-danger' : 'text-success';

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
