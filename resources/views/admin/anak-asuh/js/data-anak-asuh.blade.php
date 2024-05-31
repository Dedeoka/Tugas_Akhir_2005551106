<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

        function nextMessages(dataId) {
            const nextNav = document.getElementById('navs-justified-messages' + dataId);
            const nextTab = document.getElementById('tab-justified-messages' + dataId);
            const thisNav = document.getElementById('navs-justified-profile' + dataId);
            const thisTab = document.getElementById('tab-justified-profile' + dataId);

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function prevProfile(dataId) {
            const prevNav = document.getElementById('navs-justified-profile' + dataId);
            const prevTab = document.getElementById('tab-justified-profile' + dataId);
            const thisNav = document.getElementById('navs-justified-messages' + dataId);
            const thisTab = document.getElementById('tab-justified-messages' + dataId);

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
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
        $('.btnNextMessages').on('click', function() {
            var dataId = $(this).data('id');
            nextMessages(dataId);
        });
        $('.btnPrevProfile').on('click', function() {
            var dataId = $(this).data('id');
            prevProfile(dataId);
        });
        $('.btnPrevHome').on('click', function() {
            var dataId = $(this).data('id');
            prevHome(dataId);
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

        function nextMessages() {
            const nextNav = document.getElementById('navs-justified-messages');
            const nextTab = document.getElementById('tab-justified-messages');
            const thisNav = document.getElementById('navs-justified-profile');
            const thisTab = document.getElementById('tab-justified-profile');

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function prevProfile() {
            const prevNav = document.getElementById('navs-justified-profile');
            const prevTab = document.getElementById('tab-justified-profile');
            const thisNav = document.getElementById('navs-justified-messages');
            const thisTab = document.getElementById('tab-justified-messages');

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
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
        $('#btnNextMessages').on('click', function() {
            nextMessages();
        });
        $('#btnPrevProfile').on('click', function() {
            prevProfile();
        });
        $('#btnPrevHome').on('click', function() {
            prevHome();
        });
    });
</script>

<script>
    $(document).ready(function() {
        function nextEducation(dataId) {
            const nextNav = document.getElementById('navs-justified-education' + dataId);
            const nextTab = document.getElementById('tab-justified-education' + dataId);
            const thisNav = document.getElementById('navs-justified-child' + dataId);
            const thisTab = document.getElementById('tab-justified-child' + dataId);

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function nextHealth(dataId) {
            const nextNav = document.getElementById('navs-justified-health' + dataId);
            const nextTab = document.getElementById('tab-justified-health' + dataId);
            const thisNav = document.getElementById('navs-justified-education' + dataId);
            const thisTab = document.getElementById('tab-justified-education' + dataId);

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function nextAchievement(dataId) {
            const nextNav = document.getElementById('navs-justified-achievement' + dataId);
            const nextTab = document.getElementById('tab-justified-achievement' + dataId);
            const thisNav = document.getElementById('navs-justified-health' + dataId);
            const thisTab = document.getElementById('tab-justified-health' + dataId);

            thisNav.classList.remove('show', 'active');
            nextNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            nextTab.classList.add('active');
        }

        function prevHealth(dataId) {
            const prevNav = document.getElementById('navs-justified-health' + dataId);
            const prevTab = document.getElementById('tab-justified-health' + dataId);
            const thisNav = document.getElementById('navs-justified-achievement' + dataId);
            const thisTab = document.getElementById('tab-justified-achievement' + dataId);

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
        }

        function prevEducation(dataId) {
            const prevNav = document.getElementById('navs-justified-education' + dataId);
            const prevTab = document.getElementById('tab-justified-education' + dataId);
            const thisNav = document.getElementById('navs-justified-health' + dataId);
            const thisTab = document.getElementById('tab-justified-health' + dataId);

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
        }

        function prevChild(dataId) {
            const prevNav = document.getElementById('navs-justified-child' + dataId);
            const prevTab = document.getElementById('tab-justified-child' + dataId);
            const thisNav = document.getElementById('navs-justified-education' + dataId);
            const thisTab = document.getElementById('tab-justified-education' + dataId);

            thisNav.classList.remove('show', 'active');
            prevNav.classList.add('show', 'active');
            thisTab.classList.remove('active');
            prevTab.classList.add('active');
        }

        $('.btnNextEducation').on('click', function() {
            var dataId = $(this).data('id');
            nextEducation(dataId);
        });
        $('.btnNextHealth').on('click', function() {
            var dataId = $(this).data('id');
            nextHealth(dataId);
        });
        $('.btnNextAchievement').on('click', function() {
            var dataId = $(this).data('id');
            nextAchievement(dataId);
        });
        $('.btnPrevHealth').on('click', function() {
            var dataId = $(this).data('id');
            prevHealth(dataId);
        });
        $('.btnPrevEducation').on('click', function() {
            var dataId = $(this).data('id');
            prevEducation(dataId);
        });
        $('.btnPrevChild').on('click', function() {
            var dataId = $(this).data('id');
            prevChild(dataId);
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
            $('#name').val('');
            $('#place_of_birth').val('');
            $('#date_of_birth').val('');
            $('#gender').val('');
            $('#religion').val('');
            $('#congenital_disease').val('');
            $('#status').val('');
            $('#image').val('');
            $('#birth_certificate').val('');
            $('#family_card').val('');
            $('#identity_card').val('');
            $('#father_name').val('');
            $('#mother_name').val('');
            $('#guardian_name').val('');
            $('#guardian_relationship').val('');
            $('#guardian_address').val('');
            $('#guardian_phone_number').val('');
            $('#guardian_email').val('');
            $('#guardian_identity_card').val('');
            $('#reason_for_leaving').val('');
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

        function simpan() {
            const formData = new FormData($('#dataAnakForm')[0])
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            $.ajax({
                url: "{{ route('data-anak.store') }}",
                type: 'POST',
                data: new FormData($('#dataAnakForm')[0]),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.errors) {
                        handleErrors(response.errors);
                        showErrorMessage(
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                    } else {
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
            if (errors.name) {
                $('#name').addClass('is-invalid');
                $('#nameError').text(errors.name[0]);
            }
            if (errors.place_of_birth) {
                $('#place_of_birth').addClass('is-invalid');
                $('#placeOfBirthError').text(errors.place_of_birth[0]);
            }
            if (errors.date_of_birth) {
                $('#date_of_birth').addClass('is-invalid');
                $('#dateOfBirthError').text(errors.date_of_birth[0]);
            }
            if (errors.gender) {
                $('#gender').addClass('is-invalid');
                $('#genderError').text(errors.gender[0]);
            }
            if (errors.religion) {
                $('#religion').addClass('is-invalid');
                $('#religionError').text(errors.religion[0]);
            }
            if (errors.status) {
                $('#status').addClass('is-invalid');
                $('#statusError').text(errors.status[0]);
            }
            if (errors.birth_certificate) {
                $('#birth_certificate').addClass('is-invalid');
                $('#birthCertificateError').text(errors.birth_certificate[0]);
            }
            if (errors.family_card) {
                $('#family_card').addClass('is-invalid');
                $('#family_cardError').text(errors.family_card[0]);
            }
            if (errors.identity_card) {
                $('#identity_card').addClass('is-invalid');
                $('#identity_cardError').text(errors.identity_card[0]);
            }
            if (errors.guardian_identity_card) {
                $('#guardian_identity_card').addClass('is-invalid');
                $('#guardian_identity_cardError').text(errors.guardian_identity_card[0]);
            }
            if (errors.father_name) {
                $('#father_name').addClass('is-invalid');
                $('#father_nameError').text(errors.father_name[0]);
            }
            if (errors.mother_name) {
                $('#mother_name').addClass('is-invalid');
                $('#mother_nameError').text(errors.mother_name[0]);
            }
            if (errors.guardian_name) {
                $('#guardian_name').addClass('is-invalid');
                $('#guardian_nameError').text(errors.guardian_name[0]);
            }
            if (errors.guardian_relationship) {
                $('#guardian_relationship').addClass('is-invalid');
                $('#guardian_relationshipError').text(errors.guardian_relationship[0]);
            }
            if (errors.guardian_address) {
                $('#guardian_address').addClass('is-invalid');
                $('#guardian_addressError').text(errors.guardian_address[0]);
            }
            if (errors.guardian_phone_number) {
                $('#guardian_phone_number').addClass('is-invalid');
                $('#guardian_phone_numberError').text(errors.guardian_phone_number[0]);
            }
            if (errors.guardian_email) {
                $('#guardian_email').addClass('is-invalid');
                $('#guardian_emailError').text(errors.guardian_email[0]);
            }
            if (errors.reason_for_leaving) {
                $('#reason_for_leaving').addClass('is-invalid');
                $('#reason_for_leavingError').text(errors.reason_for_leaving[0]);
            }
            if (errors.image) {
                $('#image').addClass('is-invalid');
                $('#imageError').text(errors.image[0]);
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
            var formData = new FormData($('#editDataAnakForm' + id)[0]);

            formData.append('_method', 'patch');

            var url = "{{ url('anak-asuh/data-anak') }}" + '/' + id;
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
                        showErrorMessage(
                            'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                        console.log('Error Response:', response);
                    } else {
                        showSuccessMessage(response.success);
                        $('#editModal' + id).modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('XHR Response:', xhr.responseText);
                    showErrorMessage("An error occurred while updating data.");
                }
            });
        }


        function handleUpdateErrors(errors, id) {
            clearUpdateErrors(id);
            if (errors.name) {
                $('#name' + id).addClass('is-invalid');
                $('#editNameError' + id).text(errors.name[0]);
            }
            if (errors.place_of_birth) {
                $('#place_of_birth' + id).addClass('is-invalid');
                $('#editPlaceOfBirthError' + id).text(errors.place_of_birth[0]);
            }
            if (errors.date_of_birth) {
                $('#date_of_birth' + id).addClass('is-invalid');
                $('#editDateOfBirthError' + id).text(errors.date_of_birth[0]);
            }
            if (errors.gender) {
                $('#gender' + id).addClass('is-invalid');
                $('#editGenderError' + id).text(errors.gender[0]);
            }
            if (errors.religion) {
                $('#religion' + id).addClass('is-invalid');
                $('#editReligionError' + id).text(errors.religion[0]);
            }
            if (errors.status) {
                $('#status' + id).addClass('is-invalid');
                $('#editStatusError' + id).text(errors.status[0]);
            }
            if (errors.birth_certificate) {
                $('#birth_certificate' + id).addClass('is-invalid');
                $('#editBirthCertificateError' + id).text(errors.birth_certificate[0]);
            }
            if (errors.family_card) {
                $('#family_card' + id).addClass('is-invalid');
                $('#editFamily_cardError' + id).text(errors.family_card[0]);
            }
            if (errors.identity_card) {
                $('#identity_card' + id).addClass('is-invalid');
                $('#editIdentity_cardError' + id).text(errors.identity_card[0]);
            }
            if (errors.guardian_identity_card) {
                $('#guardian_identity_card' + id).addClass('is-invalid');
                $('#editGuardian_identity_cardError' + id).text(errors.guardian_identity_card[0]);
            }
            if (errors.father_name) {
                $('#father_name' + id).addClass('is-invalid');
                $('#editFather_nameError' + id).text(errors.father_name[0]);
            }
            if (errors.mother_name) {
                $('#mother_name' + id).addClass('is-invalid');
                $('#editMother_nameError' + id).text(errors.mother_name[0]);
            }
            if (errors.guardian_name) {
                $('#guardian_name' + id).addClass('is-invalid');
                $('#editGuardian_nameError' + id).text(errors.guardian_name[0]);
            }
            if (errors.guardian_relationship) {
                $('#guardian_relationship' + id).addClass('is-invalid');
                $('#editGuardian_relationshipError' + id).text(errors.guardian_relationship[0]);
            }
            if (errors.guardian_address) {
                $('#guardian_address' + id).addClass('is-invalid');
                $('#editGuardian_addressError' + id).text(errors.guardian_address[0]);
            }
            if (errors.guardian_phone_number) {
                $('#guardian_phone_number' + id).addClass('is-invalid');
                $('#editGuardian_phone_numberError' + id).text(errors.guardian_phone_number[0]);
            }
            if (errors.guardian_email) {
                $('#guardian_email' + id).addClass('is-invalid');
                $('#editGuardian_emailError' + id).text(errors.guardian_email[0]);
            }
            if (errors.reason_for_leaving) {
                $('#reason_for_leaving' + id).addClass('is-invalid');
                $('#editReason_for_leavingError' + id).text(errors.reason_for_leaving[0]);
            }
            if (errors.image) {
                $('#image' + id).addClass('is-invalid');
                $('#editImageError' + id).text(errors.image[0]);
            }
        }

        function clearUpdateErrors(id) {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            $('#editNameError' + id).text('');
            $('#editPlaceOfBirthError' + id).text('');
            $('#editDateOfBirthError' + id).text('');
            $('#editGenderError' + id).text('');
            $('#editReligionError' + id).text('');
            $('#editStatusError' + id).text('');
            $('#editBirth_certificateError' + id).text('');
            $('#editFamily_cardError' + id).text('');
            $('#editIdentity_cardError' + id).text('');
            $('#editGuardian_identity_cardError' + id).text('');
            $('#editFather_nameError' + id).text('');
            $('#editMother_nameError' + id).text('');
            $('#editGuardian_nameError' + id).text('');
            $('#editGuardian_relationshipError' + id).text('');
            $('#editGuardian_addressError' + id).text('');
            $('#editGuardian_phone_numberError' + id).text('');
            $('#editGuardian_emailError' + id).text('');
            $('#editReason_for_leavingError' + id).text('');
            $('#editImageError' + id).text('');
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
                allowOutsideClick: false,
                allowEscapeKey: false,
                backdrop: 'rgba(0,0,0,0.5)',
                clickToClose: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteData(dataId);
                }
            });
        }

        function deleteData(dataId) {
            fetch(`/anak-asuh/data-anak/${dataId}`, {
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
