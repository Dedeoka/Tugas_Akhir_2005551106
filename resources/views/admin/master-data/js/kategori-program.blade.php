<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function clearForm() {
            $('#nameBasic').val('');
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

        function simpan() {
            $.ajax({
                url: "{{ route('kategori-program.store') }}",
                type: 'POST',
                data: {
                    name: $('#nameBasic').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.errors) {
                        $('#nameBasic').addClass('is-invalid');
                        $('#nameError').text(response.errors.name[0]);
                    } else {
                        showSuccessMessage(response.success);
                        $('#basicModal').modal('hide');
                    }
                }
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
                url: "{{ url('admin/master-data/kategori-program') }}/" + id,
                type: 'PATCH',
                data: {
                    name: $('#editName' + id).val(),
                    _token: '{{ csrf_token() }}'
                },
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
            fetch(`/master-data/kategori-program/${dataId}`, {
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
