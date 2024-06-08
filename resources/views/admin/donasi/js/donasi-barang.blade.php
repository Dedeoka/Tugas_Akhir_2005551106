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
                    if (response.errors) {
                        $('#name').addClass('is-invalid');
                        $('#nameError').text(response.errors.name[0]);
                        $('#address').addClass('is-invalid');
                        $('#addressError').text(response.errors.address[0]);
                        $('#phone_number').addClass('is-invalid');
                        $('#phone_numberError').text(response.errors.phone_number[0]);
                        $('#email').addClass('is-invalid');
                        $('#emailError').text(response.errors.email[0]);
                        $('#total_amount').addClass('is-invalid');
                        $('#total_amountError').text(response.errors.total_amount[0]);
                    } else {
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
            var url = "{{ route('donasi-barang.update', ':id') }}".replace(':id', id);

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
            var url = "{{ route('donasi-barang.update', ':id') }}".replace(':id', id);

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
