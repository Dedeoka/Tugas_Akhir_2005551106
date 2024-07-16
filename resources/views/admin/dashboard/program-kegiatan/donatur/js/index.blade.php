<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
    CKEDITOR.replace('description');
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function clearForm() {
            $('#name').val('');
            $('#address').val('');
            $('#email').val('');
            $('#phone_number').val('');
            $('#event_type_id').val('');
            $('#title').val('');
            $('#description').val('');
            $('#date').val('');
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

        function handleErrors(errors, id = '') {
            clearErrors();

            if (id) {
                if (errors.name) {
                    $('#name' + id).addClass('is-invalid');
                    $('#nameError' + id).text(errors.name[0]);
                }
                if (errors.address) {
                    $('#address' + id).addClass('is-invalid');
                    $('#addressError' + id).text(errors.address[0]);
                }
                if (errors.email) {
                    $('#email' + id).addClass('is-invalid');
                    $('#emailError' + id).text(errors.email[0]);
                }
                if (errors.phone_number) {
                    $('#phone_number' + id).addClass('is-invalid');
                    $('#phone_numberError' + id).text(errors.phone_number[0]);
                }
                if (errors.title) {
                    $('#title' + id).addClass('is-invalid');
                    $('#titleError' + id).text(errors.title[0]);
                }
                if (errors.location) {
                    $('#location' + id).addClass('is-invalid');
                    $('#locationError' + id).text(errors.location[0]);
                }
                if (errors.event_type_id) {
                    $('#event_type_id' + id).addClass('is-invalid');
                    $('#event_type_idError' + id).text(errors.event_type_id[0]);
                }
                if (errors.description) {
                    $('#description' + id).addClass('is-invalid');
                    $('#descriptionError' + id).text(errors.description[0]);
                }
                if (errors.title) {
                    $('#title' + id).addClass('is-invalid');
                    $('#titleError' + id).text(errors.title[0]);
                }
                if (errors.date) {
                    $('#date' + id).addClass('is-invalid');
                    $('#dateError' + id).text(errors.date[0]);
                }
            } else {
                if (errors.name) {
                    $('#name').addClass('is-invalid');
                    $('#nameError').text(errors.name[0]);
                }
                if (errors.address) {
                    $('#address').addClass('is-invalid');
                    $('#addressError').text(errors.address[0]);
                }
                if (errors.email) {
                    $('#email').addClass('is-invalid');
                    $('#emailError').text(errors.email[0]);
                }
                if (errors.phone_number) {
                    $('#phone_number').addClass('is-invalid');
                    $('#phone_numberError').text(errors.phone_number[0]);
                }
                if (errors.location) {
                    $('#location').addClass('is-invalid');
                    $('#locationError').text(errors.location[0]);
                }
                if (errors.event_type_id) {
                    $('#event_type_id').addClass('is-invalid');
                    $('#event_type_idError').text(errors.event_type_id[0]);
                }
                if (errors.title) {
                    $('#title').addClass('is-invalid');
                    $('#titleError').text(errors.title[0]);
                }
                if (errors.date) {
                    $('#date').addClass('is-invalid');
                    $('#dateError').text(errors.date[0]);
                }
                if (errors.description) {
                    $('#description').addClass('is-invalid');
                    $('#descriptionError').text(errors.description[0]);
                }
                if (errors.thumbnail) {
                    $('#thumbnail').addClass('is-invalid');
                    $('#thumbnailError').text(errors.thumbnail[0]);
                }
                if (errors.image) {
                    $('#imageEdit').addClass('is-invalid');
                    $('#imageEditError').text(errors.image[0]);
                }
                if (errors['images.0']) {
                    $('#imagesStore').addClass('is-invalid');
                    $('#imagesStoreError').text(errors['images.0'][0]);
                }
            }
        }

        $('#basicModal').on('hidden.bs.modal', function() {
            clearForm();
        });

        $('#submit').click(function(e) {
            e.preventDefault();
            simpan();
            return false;
        });

        $('.submit').click(function(e) {
            e.preventDefault();
            const id = $(this).attr('id');
            update(id);
            return false;
        });

        $('.imageUpdate').click(function(e) {
            const id = $(this).data('id');
            $('.editModal').modal('hide');
            imageUpdate(id);
            return false;
        });

        $('.storeImage').click(function(e) {
            const id = $(this).data('id');
            storeImage(id);
            return false;
        });

        function storeImage(id) {
            $('#imageStoreModal').modal('show');
            $('.imageStoreSubmit').click(function(e) {
                e.preventDefault(); // Prevent default form submission
                const formData = new FormData($('#imageStoreForm')[0]);
                var url = `/dashboard/donaturEventStoreImage/${id}`;
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            handleErrors(response.errors);
                        } else {
                            clearErrors();
                            showSuccessMessage(response.success);
                            $('#imageStoreModal').modal('hide');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            handleErrors(xhr.responseJSON.errors);
                            showErrorMessage(
                                'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.'
                            );
                        } else {
                            showErrorMessage(
                                'Terjadi kesalahan pada server. Silahkan coba lagi nanti.'
                            );
                        }
                    }
                });
            });
        }

        function imageUpdate(id) {
            $('#imageUpdateModal').modal('show');
            $('.imageUpdateSubmit').click(function(e) {
                e.preventDefault(); // Prevent default form submission
                const formData = new FormData($('#imageUpdateForm')[0]);
                var url = `/dashboard/donaturEventUpdateImage/${id}`;
                formData.append('_method', 'patch');
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            handleErrors(response.errors);
                        } else {
                            clearErrors();
                            showSuccessMessage(response.success);
                            $('#imageUpdateModal').modal('hide');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            handleErrors(xhr.responseJSON.errors);
                            showErrorMessage(
                                'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.'
                            );
                        } else {
                            showErrorMessage(
                                'Terjadi kesalahan pada server. Silahkan coba lagi nanti.'
                            );
                        }
                    }
                });
            });
        }

        function simpan() {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            const formData = new FormData($('#donaturEventForm')[0]);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            // Log the form data entries to the console
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: "{{ route('program-kegiatan-donatur.store') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                    } else {
                        clearErrors();
                        showSuccessMessage(response.success);
                        $('#basicModal').modal('hide');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        handleErrors(xhr.responseJSON.errors);
                        showErrorMessage(
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.'
                        );
                    } else {
                        showErrorMessage(
                            'Terjadi kesalahan pada server. Silahkan coba lagi nanti.'
                        );
                    }
                }
            });
        }

        function update(id) {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var formData = new FormData($('#donaturEventEditForm' + id)[0]);
            var url = "{{ url('admin/dashboard/program-kegiatan-donatur') }}" + '/' + id;
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('_method', 'patch');
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                    } else {
                        clearErrors()
                        showSuccessMessage(response.success);
                        $('#editModal' + id).modal('hide');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        handleErrors(xhr.responseJSON.errors, id);
                        showErrorMessage(
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                    } else {
                        showErrorMessage(
                            'Terjadi kesalahan pada server. Silahkan coba lagi nanti.');
                    }
                }
            });
        }

        $('#success').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            success(id);
            return false;
        });

        function success(id) {
            var formData = new FormData();
            formData.append('_method', 'PATCH');

            // Pastikan Anda menyertakan parameter yang diperlukan dalam rute
            var url = "{{ route('donaturEventStatus.update', ':id') }}".replace(':id', id);

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
            fetch(`/dashboard/program-kegiatan-donatur/${dataId}`, {
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
