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
            $('#kapasitasInput').val('');
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');
        }

        $('#basicModal').on('hidden.bs.modal', function() {
            clearForm();
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

        $(document).ready(function() {
            $('#dropdown-menu a').click(function() {
                var selectedValue = $(this).attr('data-value');
                var selectedText = $(this).text();
                var dropdown = $('#satuanDropdown');
                dropdown.text(selectedText);
                dropdown.attr('data-selected', selectedValue);
            });

            $('#dropdown-menu').on('hidden.bs.dropdown', function() {
                var selectedValue = $('#satuanDropdown').attr('data-selected');
                if (!selectedValue) {
                    $('#satuanDropdown').text('Pilih Satuan');
                }
            });

            // Ganti id form menjadi sesuai dengan id form di HTML
            $('#categoryBarangForm').submit(function(e) {
                e.preventDefault();
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
                simpan();
                return false;
            });
        });

        function simpan() {
            var kapasitas = $('#kapasitasInput').val();
            var satuan = $('#satuanDropdown').attr('data-selected'); // Mengambil nilai dari data-selected
            console.log(satuan);
            if (!satuan || !['Kg', 'Liter', 'Buah', 'Pasang'].includes(satuan)) {
                satuan = '';
            }

            $.ajax({
                url: "{{ route('kategori-barang.store') }}",
                type: 'POST',
                data: {
                    name: $('#nameBasic').val(),
                    capacity: kapasitas,
                    unit: satuan,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.errors);
                    if (response.errors) {
                        if (response.errors.name) {
                            $('#nameBasic').addClass('is-invalid');
                            $('#nameError').text(response.errors.name[0]);
                        }
                        if (response.errors.capacity) {
                            $('#kapasitasInput').addClass('is-invalid');
                            $('#capacityError').text(response.errors.capacity[0]);
                        }
                        if (response.errors.unit) {
                            $('#unitError').text(response.errors.unit[0]);
                        }
                    } else {
                        showSuccessMessage(response.success);
                        $('#basicModal').modal('hide');
                    }
                }
            });
        }

        $(document).ready(function() {
            // Mengatur nilai awal dropdown pada saat dokumen dimuat
            $('[id^="dropdown-menuEdit"]').each(function() {
                var dropdownId = $(this).attr('id').replace('dropdown-menuEdit', '');
                var selectedValue = $('#satuanDropdownEdit' + dropdownId).attr('data-selected');
                if (selectedValue) {
                    $('#satuanDropdownEdit' + dropdownId).text(selectedValue);
                }
            });

            // Event click untuk pilihan dropdown
            $('[id^="dropdown-menuEdit"] a').click(function() {
                var selectedValue = $(this).attr('data-value');
                var selectedText = $(this).text();
                var dropdownId = $(this).closest('.dropdown-menu').attr('id').replace(
                    'dropdown-menuEdit', ''
                ); // Perubahan di sini untuk mencocokkan ID dengan HTML
                var dropdown = $('#satuanDropdownEdit' + dropdownId);
                dropdown.text(selectedText);
                dropdown.attr('data-selected', selectedValue);
            });

            // Event hidden dropdown untuk mereset nilai dropdown jika tidak ada yang dipilih
            $('[id^="dropdown-menuEdit"]').on('hidden.bs.dropdown', function() {
                var dropdownId = $(this).attr('id').replace('dropdown-menuEdit',
                    ''); // Perubahan di sini untuk mencocokkan ID dengan HTML
                var selectedValue = $('#satuanDropdownEdit' + dropdownId).attr('data-selected');
                if (!selectedValue) {
                    $('#satuanDropdownEdit' + dropdownId).text('Pilih Satuan');
                }
            });

            // Event submit form untuk menghandle update data
            $('[id^="categoryBarangFormEdit"]').submit(function(e) {
                e.preventDefault();
                var formId = $(this).attr('id').replace('categoryBarangFormEdit', '');
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
                updateData(formId);
                return false;
            });
        });

        function updateData(id) {
            var kapasitas = $('#kapasitasInputEdit' + id).val();
            var satuan = $('#satuanDropdownEdit' + id).attr('data-selected');
            console.log(satuan);
            if (!['Kg', 'Liter', 'Buah', 'Pasang'].includes(satuan)) {
                satuan = '';
            }

            $.ajax({
                url: "{{ url('master-data/kategori-barang') }}/" + id,
                type: 'PATCH',
                data: {
                    name: $('#editName' + id).val(),
                    capacity: kapasitas,
                    unit: satuan,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.errors);
                    if (response.errors) {
                        if (response.errors.name) {
                            $('#editName' + id).addClass('is-invalid');
                            $('#nameErrorEdit' + id).text(response.errors.name[0]);
                        }
                        if (response.errors.capacity) {
                            $('#kapasitasInputEdit' + id).addClass('is-invalid');
                            $('#capacityErrorEdit' + id).text(response.errors.capacity[0]);
                        }
                        if (response.errors.unit) {
                            $('#satuanDropdownEdit' + id).addClass(
                                'is-invalid'
                            ); // Perubahan di sini untuk menampilkan pesan kesalahan pada dropdown satuan
                            $('#unitErrorEdit' + id).text(response.errors.unit[0]);
                        }
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
            fetch(`/master-data/kategori-barang/${dataId}`, {
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
