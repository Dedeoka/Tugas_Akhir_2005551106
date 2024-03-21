<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var educationLevelRadios = document.querySelectorAll('input[name="education_level"]');
        var schoolSelect = document.getElementById('school_id');
        var classSelect = document.getElementById('class');
        var allSchools = {!! json_encode($schools) !!};

        educationLevelRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                handleEducationLevelChange(this.value);
            });
        });

        function handleEducationLevelChange(selectedEducationLevel) {
            // Reset options
            schoolSelect.innerHTML = '<option value="" hidden>Pilih Nama Sekolah</option>';
            classSelect.innerHTML = '<option value="" hidden>Pilih Kelas</option>';

            // Filter schools based on selected education level
            var filteredSchools = allSchools.filter(function(school) {
                if (selectedEducationLevel === 'TK' && school.name.includes('TK')) {
                    return true;
                } else if (selectedEducationLevel === 'SD' && school.name.includes('SD')) {
                    return true;
                } else if (selectedEducationLevel === 'SMP' && school.name.includes('SMP')) {
                    return true;
                } else if (selectedEducationLevel === 'SMA/SMK' && (school.name.includes('SMA') ||
                        school.name.includes('SMK'))) {
                    return true;
                }
                return false;
            });

            // Populate the school dropdown with filtered schools
            filteredSchools.forEach(function(school) {
                var option = document.createElement('option');
                option.value = school.id;
                option.textContent = school.name;
                schoolSelect.appendChild(option);
            });

            // Set class options based on selected education level
            if (selectedEducationLevel === 'TK') {
                setTKOptions();
            } else if (selectedEducationLevel === 'SD') {
                setClassOptions(1, 6);
            } else if (selectedEducationLevel === 'SMP') {
                setClassOptions(7, 9);
            } else if (selectedEducationLevel === 'SMA/SMK') {
                setClassOptions(10, 12);
            }
        }

        function setClassOptions(start, end) {
            for (var i = start; i <= end; i++) {
                var option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                classSelect.appendChild(option);
            }
        }

        function setTKOptions() {
            // Clear previous options
            classSelect.innerHTML = '<option value="" hidden>Pilih Kelas</option>';

            // Add TK options
            var option = document.createElement('option');
            option.value = 'TK Kecil';
            option.textContent = 'TK Kecil';
            classSelect.appendChild(option);

            option = document.createElement('option');
            option.value = 'TK Besar';
            option.textContent = 'TK Besar';
            classSelect.appendChild(option);
        }
    });
</script>


<script>
    $(document).ready(function() {
        function nextProfile(dataId) {
            const nextNav = document.getElementById('navs-justified-profile' + dataId);
            const nextTab = document.getElementById('tab-justified-profile' + dataId);
            const thisNav = document.getElementById('navs-justified-home' + dataId);
            const thisTab = document.getElementById('tab-justified-home' + dataId);

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function prevHome(dataId) {
            const prevNav = document.getElementById('navs-justified-home' + dataId);
            const prevTab = document.getElementById('tab-justified-home' + dataId);
            const thisNav = document.getElementById('navs-justified-profile' + dataId);
            const thisTab = document.getElementById('tab-justified-profile' + dataId);

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
        }

        $('.btnNextProfile').on('click', function() {
            var dataId = $(this).data('id');
            nextProfile(dataId);
        });
        $('.btnPrevHome').on('click', function() {
            var dataId = $(this).data('id');
            prevHome(dataId);
        });
    });
</script>

<script>
    $(document).ready(function() {
        function nextProfileEdit() {
            const nextNavEdit = document.getElementById('navs-justified-profile-edit');
            const nextTabEdit = document.getElementById('tab-justified-profile-edit');
            const thisNavEdit = document.getElementById('navs-justified-home-edit');
            const thisTabEdit = document.getElementById('tab-justified-home-edit');

            thisNavEdit.classList.remove('show', 'active');
            nextNavEdit.classList.add('show', 'active');
            thisTabEdit.classList.remove('active');
            nextTabEdit.classList.add('active');
        }

        function prevHomeEdit() {
            const prevNavEdit = document.getElementById('navs-justified-home-edit');
            const prevTabEdit = document.getElementById('tab-justified-home-edit');
            const thisNavEdit = document.getElementById('navs-justified-profile-edit');
            const thisTabEdit = document.getElementById('tab-justified-profile-edit');

            thisNavEdit.classList.remove('show', 'active');
            prevNavEdit.classList.add('show', 'active');
            thisTabEdit.classList.remove('active');
            prevTabEdit.classList.add('active');
        }

        $('#btnNextProfileEdit').on('click', function() {
            nextProfileEdit();
        });
        $('#btnPrevHomeEdit').on('click', function() {
            prevHomeEdit();
        });
    });
</script>

<script>
    $(document).ready(function() {
        function nextProfile() {
            const nextNav = document.getElementById('navs-justified-profile');
            const nextTab = document.getElementById('tab-justified-profile');
            const thisNav = document.getElementById('navs-justified-home');
            const thisTab = document.getElementById('tab-justified-home');

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function prevHome() {
            const prevNav = document.getElementById('navs-justified-home');
            const prevTab = document.getElementById('tab-justified-home');
            const thisNav = document.getElementById('navs-justified-profile');
            const thisTab = document.getElementById('tab-justified-profile');

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
        }

        $('#btnNextProfile').on('click', function() {
            nextProfile();
        });
        $('#btnPrevHome').on('click', function() {
            prevHome();
        });
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
            $('#children_id').val('');
            $('#class_name').val('');
            $('#school_id').val('');
            $('#class').val('');
            $('#education_level').val('');
            $('#start_date').val('');
            $('#end_date').val('');
            $('#status').val('');
            $('#guardian_name').val('');
            $('#guardian_address').val('');
            $('#guardian_phone').val('');
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

        $('#dataAnakForm').on('submit', function(e) {
            e.preventDefault();
            clearErrors();
            simpan();
            return false;
        });

        function clearErrors() {
            document.querySelectorAll('.form-control', ).forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            document.querySelectorAll('.form-select', ).forEach(function(element) {
                element.classList.remove('is-invalid');
            });

            document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                element.innerHTML = '';
            });
        }

        function handleErrors(errors) {
            clearErrors();
            if (errors.children_id) {
                $('#children_id').addClass('is-invalid');
                $('#children_idError').text(errors.children_id[0]);
            }
            if (errors.education_level) {
                $('input[name="education_level"]').addClass('is-invalid');
                $('#education_levelError').text(errors.education_level[0]);
            }
            if (errors.school_id) {
                $('#school_id').addClass('is-invalid');
                $('#school_idError').text(errors.school_id[0]);
            }
            if (errors.start_date) {
                $('#start_date').addClass('is-invalid');
                $('#start_dateError').text(errors.start_date[0]);
            }
            if (errors.end_date) {
                $('#end_date').addClass('is-invalid');
                $('#end_dateError').text(errors.end_date[0]);
            }
            if (errors.class_name) {
                $('#class_name').addClass('is-invalid');
                $('#class_nameError').text(errors.class_name[0]);
            }
            if (errors.class) {
                $('#class').addClass('is-invalid');
                $('#classError').text(errors.class[0]);
            }
            if (errors.status) {
                $('#status').addClass('is-invalid');
                $('#statusError').text(errors.status[0]);
            }
            if (errors.guardian_name) {
                $('#guardian_name').addClass('is-invalid');
                $('#guardian_nameError').text(errors.guardian_name[0]);
            }
            if (errors.guardian_address) {
                $('#guardian_address').addClass('is-invalid');
                $('#guardian_addressError').text(errors.guardian_address[0]);
            }
            if (errors.guardian_phone) {
                $('#guardian_phone').addClass('is-invalid');
                $('#guardian_phoneError').text(errors.guardian_phone[0]);
            }
        }

        function simpan() {
            const formData = new FormData($('#dataAnakForm')[0]);

            $.ajax({
                url: "{{ route('pendidikan-anak.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                    } else if (response.success) {
                        $('.form-control').removeClass('is-invalid');

                        Swal.fire({
                            icon: 'success',
                            title: response.success,
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                        $('#exLargeModal').modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    handleErrors(xhr.responseJSON.errors);
                    showErrorMessage(
                        'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.'
                    );
                }
            });
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
            formData.append('children_id', $('#editChildren_id' + id).val());
            formData.append('name', $('#editName' + id).val());
            formData.append('school_name', $('#editSchool_name' + id).val());
            formData.append('graduation_date', $('#editGraduation_date' + id).val());
            formData.append('description', $('#editDescription' + id).val());

            // Add file data to FormData if available
            var certificate = $('#editCertificate' + id)[0].files[0];

            if (certificate) {
                formData.append('editCertificate', certificate);
            }

            formData.append('_method', 'patch');
            var url = "{{ url('anak-asuh/pendidikan-anak') }}" + '/' + id;
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
            if (errors.name) {
                $('#editName' + id).addClass('is-invalid');
                $('#editNameError' + id).text(errors.name[0]);
            }
            if (errors.school_name) {
                $('#editSchool_name' + id).addClass('is-invalid');
                $('#editSchool_nameError' + id).text(errors.school_name[0]);
            }
            if (errors.graduation_date) {
                $('#editGraduation_date' + id).addClass('is-invalid');
                $('#editGraduation_dateError' + id).text(errors.graduation_date[0]);
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
            $('#editName' + id).removeClass('is-invalid');
            $('#editSchool_name' + id).removeClass('is-invalid');
            $('#editGraduation_date' + id).removeClass('is-invalid');
            $('#editCertificate' + id).removeClass('is-invalid');
            $('#editDescription' + id).removeClass('is-invalid');
            // Clear error messages
            $('#editChildren_idError' + id).text('');
            $('#editNameError' + id).text('');
            $('#editSchool_nameError' + id).text('');
            $('#editGraduation_dateError' + id).text('');
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
            fetch(`/anak-asuh/pendidikan-anak/${dataId}`, {
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
