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
            $('#title').val('');
            $('#description').val('');
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
            document.querySelectorAll('.form-control').forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            document.querySelectorAll('.form-select').forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                element.innerHTML = '';
            });
        }

        function handleErrors(errors, id = '') {
            clearErrors();

            if (id) {
                if (errors.title) {
                    $('#titleEdit' + id).addClass('is-invalid');
                    $('#titleEditError' + id).text(errors.title[0]);
                }
                if (errors.description) {
                    $('#descriptionEdit' + id).addClass('is-invalid');
                    $('#descriptionEditError' + id).text(errors.description[0]);
                }
                if (errors.image) {
                    $('#imageEdit' + id).addClass('is-invalid');
                    $('#imageEditError' + id).text(errors.image[0]);
                }
            } else {
                if (errors.title) {
                    $('#title').addClass('is-invalid');
                    $('#titleError').text(errors.title[0]);
                }
                if (errors.description) {
                    $('#description').addClass('is-invalid');
                    $('#descriptionError').text(errors.description[0]);
                }
                if (errors.image) {
                    $('#image').addClass('is-invalid');
                    $('#imageError').text(errors.image[0]);
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

        $('.updateSubmit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            update(id);
        });

        function simpan() {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            const formData = new FormData($('#announcementForm')[0]);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: "{{ route('pengumuman.store') }}",
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
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                    } else {
                        showErrorMessage(
                            'Terjadi kesalahan pada server. Silahkan coba lagi nanti.');
                    }
                }
            });
        }

        function update(id) {
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            var formData = new FormData($('#announcementEditForm' + id)[0]);
            var url = "{{ url('admin/dashboard/pengumuman') }}" + '/' + id;
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
            fetch(`/dashboard/pengumuman/${dataId}`, {
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
