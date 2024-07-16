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
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function clearForm() {
            $('#name').val('');
            $('#address').val('');
            $('#phone_number').val('');
            $('#total_amount').val('');
            $('#email').val('');
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

        $('#basicModal').on('hidden.bs.modal', function() {
            clearForm();
        });

        $('#postSubmit').click(function(e) {
            e.preventDefault();
            simpan();
            return false;
        });

        $('#pending').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            pending(id);
            return false;
        });

        $('#success').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            success(id);
            return false;
        });

        function simpan() {
            $.ajax({
                url: "{{ route('donasi-uang.store') }}",
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    address: $('#address').val(),
                    phone_number: $('#phone_number').val(),
                    email: $('#email').val(),
                    total_amount: $('#total_amount').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Clear previous error states
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').text('');

                    if (response.errors) {
                        // Handle validation errors
                        if (response.errors.name) {
                            $('#name').addClass('is-invalid');
                            $('#nameError').text(response.errors.name[0]);
                        }
                        if (response.errors.address) {
                            $('#address').addClass('is-invalid');
                            $('#addressError').text(response.errors.address[0]);
                        }
                        if (response.errors.phone_number) {
                            $('#phone_number').addClass('is-invalid');
                            $('#phone_numberError').text(response.errors.phone_number[0]);
                        }
                        if (response.errors.email) {
                            $('#email').addClass('is-invalid');
                            $('#emailError').text(response.errors.email[0]);
                        }
                        if (response.errors.total_amount) {
                            $('#total_amount').addClass('is-invalid');
                            $('#total_amountError').text(response.errors.total_amount[0]);
                        }
                    } else {
                        // Success handling here
                        showSuccessMessage(response.success);
                        $('#basicModal').modal('hide');
                    }
                }
            });
        }

        function pending(id) {
            var formData = new FormData();
            formData.append('pending', 'true');
            formData.append('_method', 'PATCH');

            // Pastikan Anda menyertakan parameter yang diperlukan dalam rute
            var url = "{{ route('donasi-uang.update', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.errors) {
                        // Tangani error
                    } else {
                        showSuccessMessage(response.success);
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani error
                    console.error('Error:', error);
                }
            });
        }

        function success(id) {
            var formData = new FormData();
            formData.append('success', 'true');
            formData.append('_method', 'PATCH');

            // Pastikan Anda menyertakan parameter yang diperlukan dalam rute
            var url = "{{ route('donasi-uang.update', ':id') }}".replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.errors) {
                        // Tangani error
                    } else {
                        showSuccessMessage(response.success);
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani error
                    console.error('Error:', error);
                }
            });
        }

    });
</script>

<script>
    $("#export-button").on('click', function(e) {
        e.preventDefault(); // Mencegah aksi default tombol

        // Ambil nilai dari input tanggal
        var startDate = $('#startInput').val();
        var endDate = $('#endInput').val();

        // Log untuk memeriksa nilai yang diambil
        console.log("Start Date: ", startDate);
        console.log("End Date: ", endDate);

        // Buat URL dengan parameter tanggal
        var url = "{{ route('donasi-uang.export') }}?startDate=" + startDate + "&endDate=" + endDate;

        // Arahkan browser ke URL tersebut
        window.location.href = url;
    });

    $("#search-button").on('click', function(e) {
        // Set nilai input startDate dan endDate di dalam #search-form
        $('#startDateSearch').val($('#startInput').val());
        $('#endDateSearch').val($('#endInput').val());

        // Submit form #search-form untuk melakukan pencarian
        $('#search-form').submit();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function getQueryParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        const startDate = getQueryParameter('startDate');
        const endDate = getQueryParameter('endDate');

        if (startDate) {
            document.getElementById('startInput').value = startDate;
        }
        if (endDate) {
            document.getElementById('endInput').value = endDate;
        }
    });
</script>
