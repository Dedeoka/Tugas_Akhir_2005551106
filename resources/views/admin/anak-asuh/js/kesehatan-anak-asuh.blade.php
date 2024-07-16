<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function handlePaymentEditChange(id) {
        // Mendapatkan nilai radio button yang dipilih
        const selectedPaymentMethod = document.querySelector(`input[name="payment_method"]:checked`);

        // Mendapatkan elemen form input cost
        const medicalCheckCostInput = document.getElementById(`medicalCostInput` + id);
        const drugCostInput = document.getElementById(`drugCostInput` + id);

        // Memeriksa nilai radio button yang dipilih
        if (selectedPaymentMethod && selectedPaymentMethod.value === 'KIS/BPJS') {
            // Jika memilih BPJS, menyembunyikan form input cost dan mengatur nilainya menjadi 0
            medicalCheckCostInput.style.display = 'none';
            drugCostInput.style.display = 'none';

        } else {
            // Jika memilih Biaya Panti, menampilkan kembali form input cost
            medicalCheckCostInput.style.display = 'block';
            drugCostInput.style.display = 'block';
        }
    }
</script>

<script>
    function handlePaymentMethodChange() {
        // Mendapatkan nilai radio button yang dipilih
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');

        // Mendapatkan elemen form input cost
        const medicalCheckCostInput = document.getElementById('medicalCostInput');
        const drugCostInput = document.getElementById('drugCostInput');
        const medicalCost = document.getElementById('medical_cost');
        const drugCost = document.getElementById('drug_cost');

        // Memeriksa nilai radio button yang dipilih
        if (selectedPaymentMethod && selectedPaymentMethod.value === 'KIS/BPJS') {
            // Jika memilih BPJS, menyembunyikan form input cost dan mengatur nilainya menjadi 0
            medicalCheckCostInput.style.display = 'none';
            drugCostInput.style.display = 'none';
        } else {
            // Jika memilih Biaya Panti, menampilkan kembali form input cost
            medicalCheckCostInput.style.display = 'block';
            drugCostInput.style.display = 'block';
        }
    }
</script>

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
    // Mendapatkan elemen radio button dan input tanggal
    const sedangSakitRadio = document.getElementById('sedangSakit');
    const sudahSembuhRadio = document.getElementById('sudahSembuh');
    const recoveryDateInput = document.getElementById('recoveryDateInput');

    // Menambahkan event listener untuk mendeteksi perubahan pada radio button
    sedangSakitRadio.addEventListener('change', function() {
        // Menonaktifkan input recovery_date dan mengatur nilai null jika sedangSakit dipilih
        if (sedangSakitRadio.checked) {
            recoveryDateInput.style.display = 'none';
            recoveryDateInput.value = null;
        }
    });

    sudahSembuhRadio.addEventListener('change', function() {
        // Mengaktifkan input recovery_date jika sudahSembuh dipilih
        if (sudahSembuhRadio.checked) {
            recoveryDateInput.style.display = 'block';
        }
    });
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
            $('#disease_id').val('');
            $('#medicine').val('');
            $('#date_of_illness').val('');
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

        $('#dataAnakForm').on('submit', function(e) {
            e.preventDefault();
            clearErrors();
            simpan();
            return false;
        });

        function simpan() {
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('children_id', $('#children_id').val());
            formData.append('disease_id', $('#disease_id').val());
            formData.append('medicine', $('#medicine').val());
            formData.append('date_of_illness', $('#date_of_illness').val());
            formData.append('recovery_date', $('#recovery_date').val());
            const status = $('input[name="status"]:checked').val();
            formData.append('status', status);
            formData.append('description', $('#description').val());
            const paymentMethod = $('input[name="payment_method"]:checked').val();
            formData.append('payment_method', paymentMethod);

            const drugCost = $('#drug_cost').val();
            const medicalCheckCost = $('#medical_check_cost').val();

            if (paymentMethod === 'KIS/BPJS') {
                formData.append('drug_cost', '0');
                formData.append('medical_check_cost', '0');
            } else {
                formData.append('drug_cost', drugCost);
                formData.append('medical_check_cost', medicalCheckCost);
            }

            console.log("Data yang dikirim:", Object.fromEntries(formData.entries()));

            $.ajax({
                url: "{{ route('kesehatan-anak.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
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
                        $('#exLargeModal').modal('hide');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    handleErrors(xhr.responseJSON.errors);
                    showErrorMessage(
                        'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.'
                    );
                }
            });
        }


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

            $('input[name="status"]').removeClass('is-invalid');
            $('#statusError').text('');

            $('input[name="payment_method"]').removeClass('is-invalid');
            $('#paymentError').text('');
        }

        function handleErrors(errors, id) {
            clearErrors();

            if (errors.children_id) {
                $('#children_id').addClass('is-invalid');
                $('#childrenError').text(errors.children_id[0]);
            }
            if (errors.disease_id) {
                $('#disease_id').addClass('is-invalid');
                $('#diseaseError').text(errors.disease_id[0]);
            }
            if (errors.medicine) {
                $('#medicine').addClass('is-invalid');
                $('#medicineError').text(errors.medicine[0]);
            }
            if (errors.date_of_illness) {
                $('#date_of_illness').addClass('is-invalid');
                $('#date_of_illnessError').text(errors.date_of_illness[0]);
            }
            if (errors.description) {
                $('#description').addClass('is-invalid');
                $('#descriptionError').text(errors.description[0]);
            }
            const selectedStatus = $('input[name="status"]:checked').val();
            if (!selectedStatus) {
                $('input[name="status"]').addClass('is-invalid');
                $('#statusError').text('Status kesehatan wajib diisi');
            }
            const selectedpayment = $('input[name="payment_method"]:checked').val();
            if (!selectedpayment) {
                $('input[name="payment_method"]').addClass('is-invalid');
                $('#paymentError').text('payment kesehatan wajib diisi');
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
            formData.append('recovery_date', $('#recovery_date' + id).val());
            formData.append('medicine', $('#medicine' + id).val());
            const paymentMethod = $('input[name="payment_method"]:checked').val();
            formData.append('payment_method', paymentMethod);
            var medicalCheckCost = $('#medical_check_cost' + id).val() || '0';
            var drugCost = $('#drug_cost' + id).val() || '0';
            formData.append('medical_check_cost', medicalCheckCost);
            formData.append('drug_cost', drugCost);
            formData.append('_method', 'patch');

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            var url = "{{ url('admin/anak-asuh/kesehatan-anak') }}" + '/' + id;

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false, // Set this to false to prevent jQuery from processing the data
                cache: false,
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
                    handleUpdateErrors(xhr.responseJSON.errors);
                    showErrorMessage(
                        'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                }
            });
        }

        // Function to format date to 'YYYY-MM-DD'
        function formatDate(dateString) {
            var date = new Date(dateString);
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            return year + '-' + month + '-' + day;
        }


        function handleUpdateErrors(errors, id) {
            // Clear previous errors
            clearUpdateErrors(id);

            if (errors.recovery_date) {
                $('#recovery_date' + id).addClass('is-invalid');
                $('#recovery_dateError' + id).text(errors.recovery_date[0]);
            }
        }

        function clearUpdateErrors(id) {
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
            fetch(`/anak-asuh/kesehatan-anak/${dataId}`, {
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
