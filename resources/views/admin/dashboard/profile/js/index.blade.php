<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('thumbnailImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<script>
    $('.ckeditor').each(function() {
        CKEDITOR.replace($(this).attr('id'));
    });
    CKEDITOR.replace('description');

    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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

        $('#submit').click(function(e) {
            e.preventDefault();
            simpan();
            return false;
        });

        function clearErrors() {
            // Hapus kelas is-invalid dari semua elemen input
            document.querySelectorAll('.form-control').forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            document.querySelectorAll('.form-select').forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            // Sembunyikan pesan error
            document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                element.innerHTML = '';
            });
        }

        function handleErrors(errors) {
            clearErrors();

            if (errors.name) {
                $('#name').addClass('is-invalid');
                $('#nameError').text(errors.name[0]);
            }
            if (errors.description) {
                $('#description').addClass('is-invalid');
                $('#descriptionError').text(errors.description[0]);
            }
            if (errors.thumbnail) {
                $('#thumbnail').addClass('is-invalid');
                $('#thumbnailError').text(errors.thumbnail[0]);
            }
        }

        function simpan() {
            // Update textarea with CKEditor content
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            const formData = new FormData($('#profileForm')[0]);
            formData.append('_method', 'patch');

            $.ajax({
                url: "{{ route('profile-panti.update') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                        showErrorMessage(
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                    } else {
                        clearErrors();
                        Swal.fire({
                            icon: 'success',
                            title: response.success,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        handleErrors(xhr.responseJSON.errors);
                        showErrorMessage(
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                    } else {
                        console.error('AJAX Error:', xhr);
                        showErrorMessage(
                            'Terjadi kesalahan pada server. Silahkan coba lagi nanti.');
                    }
                }
            });
        }
    });
</script>
