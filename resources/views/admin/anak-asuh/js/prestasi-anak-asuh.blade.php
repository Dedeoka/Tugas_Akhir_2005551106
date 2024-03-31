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
            // Ganti ID sesuai dengan form Anda
            $('#children_id').val('');
            $('#title').val('');
            $('#competition_date').val('');
            $('#ranking').val('');
            $('#certificate').val('');
            $('#description').val('');
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

        $('#dataPrestasiAnakPanti').on('submit', function(e) {
            e.preventDefault();
            clearErrors();
            simpan();
            return false;
        });

        function simpan() {
            const formData = new FormData($('#dataPrestasiAnakPanti')[0]);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            $.ajax({
                url: "{{ route('prestasi-anak.store') }}",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                    } else {
                        // Menghapus kelas is-invalid dari semua elemen input
                        $('.form-control').removeClass('is-invalid');

                        // Menggunakan sweetalert
                        Swal.fire({
                            icon: 'success',
                            title: response.success,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                        $('#modalPrestasiAnakPanti').modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('XHR Response:', xhr.responseText);
                    var errorMessage = "An error occurred while updating data.";
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = "Validation error: " + JSON.stringify(xhr.responseJSON
                            .errors);
                    }
                    console.log(errorMessage);
                }
            });
        }

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
            if (errors.children_id) {
                $('#children_id').addClass('is-invalid');
                $('#children_idError').text(errors.children_id[0]);
            }
            if (errors.title) {
                $('#title').addClass('is-invalid');
                $('#titleError').text(errors.title[0]);
            }
            if (errors.competition_date) {
                $('#competition_date').addClass('is-invalid');
                $('#competition_dateError').text(errors.competition_date[0]);
            }
            if (errors.ranking) {
                $('#ranking').addClass('is-invalid');
                $('#rankingError').text(errors.ranking[0]);
            }
            if (errors.certificate) {
                $('#certificate').addClass('is-invalid');
                $('#certificateError').text(errors.certificate[0]);
            }
            if (errors.description) {
                $('#description').addClass('is-invalid');
                $('#descriptionError').text(errors.description[0]);
            }
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

        $('.updateSubmit').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            update(id);
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

        function update(id) {
            var formData = new FormData();

            // Add text data to FormData
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('title', $('#editTitle' + id).val());
            formData.append('competition_level', $('#editCompetition_level' + id).val());
            formData.append('competition_date', $('#editCompetition_date' + id).val());
            formData.append('ranking', $('#editRanking' + id).val());
            formData.append('prize_money', $('#editprize_money' + id).val());
            formData.append('prize_item', $('#editprize_item' + id).val());
            formData.append('description', $('#editDescription' + id).val());

            // Add file data to FormData if available
            var certificate = $('#editCertificate' + id)[0].files[0];

            if (certificate) {
                formData.append('certificate', certificate);
            }

            formData.append('_method', 'patch');
            var url = "{{ url('anak-asuh/prestasi-anak') }}" + '/' + id;
            console.log('URL:', url);
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
                        handleUpdateErrors(response.errors, id);
                        console.log('Error Response:', response);
                    } else {
                        // Handle success
                        showSuccessMessage(response.success);
                        $('#editModal' + id).modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle other types of errors (e.g., server errors)
                    console.error('XHR Response:', xhr.responseText);
                    showErrorMessage("An error occurred while updating data.");
                }
            });
        }

        function handleUpdateErrors(errors, id) {
            // Clear previous errors
            clearUpdateErrors(id);

            // Display new errors
            if (errors.children_id) {
                $('#editChildren_id' + id).addClass('is-invalid');
                $('#editChildren_idError' + id).text(errors.children_id[0]);
            }
            if (errors.title) {
                $('#editTitle' + id).addClass('is-invalid');
                $('#editTitleError' + id).text(errors.title[0]);
            }
            if (errors.competition_date) {
                $('#editCompetition_date' + id).addClass('is-invalid');
                $('#editCompetition_dateError' + id).text(errors.competition_date[0]);
            }
            if (errors.ranking) {
                $('#editRanking' + id).addClass('is-invalid');
                $('#editRankingError' + id).text(errors.ranking[0]);
            }
            if (errors.certificate) {
                $('#editCertificate' + id).addClass('is-invalid');
                $('#editCertificateError' + id).text(errors.certificate[0]);
            }
            if (errors.description) {
                $('#editDescription' + id).addClass('is-invalid');
                $('#editDescriptionError' + id).text(errors.description[0]);
            }
        }

        function clearUpdateErrors(id) {
            // Clear previous errors
            $('#editChildren_id' + id).removeClass('is-invalid');
            $('#editTitile' + id).removeClass('is-invalid');
            $('#editCompetition_date' + id).removeClass('is-invalid');
            $('#editGraduation_date' + id).removeClass('is-invalid');
            $('#editCertificate' + id).removeClass('is-invalid');
            $('#editDescription' + id).removeClass('is-invalid');
            // Clear error messages
            $('#editChildren_idError' + id).text('');
            $('#editTitileError' + id).text('');
            $('#editCompetition_dateError' + id).text('');
            $('#editRankingError' + id).text('');
            $('#editCertificateError' + id).text('');
            $('#editDescriptionError' + id).text('');
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
            fetch(`/anak-asuh/prestasi-anak/${dataId}`, {
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
