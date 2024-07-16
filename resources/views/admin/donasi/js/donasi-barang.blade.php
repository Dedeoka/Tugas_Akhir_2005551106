<script>
    $(document).ready(function() {
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectedGoods = [];

        function updateCapacityStatus(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var percentage = selectedOption.getAttribute('data-percentage');
            var capacityStatus = selectElement.closest('.item-wrapper').querySelector(
                '.capacity-status .text-center');
            if (capacityStatus) {
                capacityStatus.style.width = percentage + '%';
                capacityStatus.textContent = percentage + '% Terkumpul';
            }
        }

        function updateStockInfo(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const stock = selectedOption.getAttribute('data-stock');
            const capacity = selectedOption.getAttribute('data-capacity');
            const stockTextElement = selectElement.closest('.item-wrapper').querySelector(
                '.stock-text');
            if (stockTextElement) {
                stockTextElement.textContent = `Sisa Stock: ${stock}/${capacity}`;
            }
        }

        function updateSelectOptions() {
            document.querySelectorAll('.form-select').forEach(function(selectElement) {
                var currentValue = selectElement.value;
                selectElement.querySelectorAll('option').forEach(function(option) {
                    if (selectedGoods.includes(option.value) && option.value !==
                        currentValue) {
                        option.style.display = 'none';
                    } else {
                        option.style.display = 'block';
                    }
                });
            });
        }

        function handleSelectChange(event) {
            var selectElement = event.target;
            var selectedOptionValue = selectElement.value;
            selectedGoods = selectedGoods.filter(value => value !== selectElement.previousValue);
            if (selectedOptionValue) {
                selectedGoods.push(selectedOptionValue);
            }
            selectElement.previousValue = selectedOptionValue;
            updateCapacityStatus(selectElement);
            updateStockInfo(selectElement);
            updateSelectOptions();
        }

        function attachDeleteEventListeners() {
            var deleteButtons = document.querySelectorAll('.delete-product-button');
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.removeEventListener('click', deleteButtonHandler);
                deleteButton.addEventListener('click', deleteButtonHandler);
            });

            if (deleteButtons.length === 1) {
                deleteButtons[0].disabled = true;
            } else {
                deleteButtons.forEach(function(button) {
                    button.disabled = false;
                });
            }
        }

        function deleteButtonHandler(event) {
            var deleteButton = event.target.closest('.delete-product-button');
            var template = deleteButton.closest('.item-wrapper');
            if (!template) return;
            var selectElement = template.querySelector('.form-select');
            if (!selectElement) return;
            selectedGoods = selectedGoods.filter(value => value !== selectElement.value);
            template.remove();
            updateSelectOptions();
            attachDeleteEventListeners();
        }

        function reattachEventListeners() {
            document.querySelectorAll('.form-select').forEach(function(selectElement) {
                selectElement.previousValue = selectElement.value;
                selectElement.removeEventListener('change', handleSelectChange);
                selectElement.addEventListener('change', handleSelectChange);
            });
            attachDeleteEventListeners();
        }

        function initializeOldValues() {
            document.querySelectorAll('.form-select').forEach(function(selectElement) {
                updateCapacityStatus(selectElement);
                updateStockInfo(selectElement);
                if (selectElement.value) {
                    selectedGoods.push(selectElement.value);
                }
            });
            updateSelectOptions();
        }

        function getSelectedGoods() {
            return Array.from(document.querySelectorAll('select[name="goods[]"]')).map(function(
                select) {
                return select.value;
            });
        }

        function getQuantities() {
            return Array.from(document.querySelectorAll('input[name="quantities[]"]')).map(function(
                input) {
                return input.value;
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

        function showErrorMessage(message) {
            Swal.fire({
                icon: 'error',
                title: message,
            });
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

        function handleErrors(errors) {
            clearErrors();
            if (errors.name) {
                $('#name').addClass('is-invalid');
                $('#nameError').text(errors.name[0]);
            }
            if (errors.address) {
                $('#address').addClass('is-invalid');
                $('#addressError').text(errors.address[0]);
            }
            if (errors.phone_number) {
                $('#phone_number').addClass('is-invalid');
                $('#phone_numberError').text(errors.phone_number[0]);
            }
            if (errors.email) {
                $('#email').addClass('is-invalid');
                $('#emailError').text(errors.email[0]);
            }
            if (errors.date) {
                $('#date').addClass('is-invalid');
                $('#dateError').text(errors.date[0]);
            }
            if (errors.description) {
                $('#description').addClass('is-invalid');
                $('#descriptionError').text(errors.description[0]);
            }
        }

        document.getElementById('tambahBarang').addEventListener('click', function() {
            var newItem = document.querySelector('.item-wrapper').cloneNode(true);

            newItem.querySelector('.form-select').value = '';
            newItem.querySelector('input').value = '';

            // Reset capacity status and stock text
            var capacityStatusElement = newItem.querySelector('.capacity-status .text-center');
            var originalCapacityStatus = document.querySelector('.capacity-status .text-center');

            capacityStatusElement.removeAttribute('style');
            capacityStatusElement.textContent = originalCapacityStatus.textContent;

            capacityStatusElement.style.width = originalCapacityStatus.style.width;
            capacityStatusElement.style.color = originalCapacityStatus.style.color;
            capacityStatusElement.style.background = originalCapacityStatus.style.background;
            capacityStatusElement.style.borderRadius = originalCapacityStatus.style.borderRadius;

            var stockTextElement = newItem.querySelector('.stock-text');
            stockTextElement.textContent = 'Sisa Stock: -';

            newItem.querySelector('.form-select').addEventListener('change', handleSelectChange);
            newItem.querySelector('.delete-product-button').addEventListener('click',
                deleteButtonHandler);

            document.getElementById('item-container').appendChild(newItem);

            // Reattach event listeners and update options after adding new item
            reattachEventListeners();
            updateSelectOptions();
            updateCapacityStatus(newItem.querySelector(
                '.form-select')); // Update capacity status for the new item
        });


        reattachEventListeners();
        initializeOldValues();

        document.getElementById('donasiBarangForm').addEventListener('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('donasi-barang.store') }}",
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    address: $('#address').val(),
                    phone_number: $('#phone_number').val(),
                    email: $('#email').val(),
                    date: $('input[name="date"]').val(),
                    goods: getSelectedGoods(),
                    quantities: getQuantities(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.errors) {
                        for (const [field, messages] of Object.entries(response
                                .errors)) {
                            const inputElement = $(`[name="${field}"]`);
                            const errorElement = $(`#${field}Error`);
                            inputElement.addClass('is-invalid');
                            errorElement.text(messages.join(', ')).show();
                        }
                    } else {
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
                            'Terjadi kesalahan pada server. Silahkan coba lagi nanti.');
                    }
                }
            });
        });
    });
</script>
<script>
    $("#export-button").on('click', function(e) {
        e.preventDefault(); // Mencegah aksi default tombol

        // Ambil nilai dari input tanggal
        var startDate = $('#startInput').val();
        var endDate = $('#endInput').val();

        // Log untuk memeriksa nilai yang diambil
        console.log("Start Date: ", startDate);
        console.log("End Date: ", endDate);

        // Buat URL dengan parameter tanggal
        var url = "{{ route('donasi-barang.export') }}?startDate=" + startDate + "&endDate=" + endDate;

        // Arahkan browser ke URL tersebut
        window.location.href = url;
    });

    $("#search-button").on('click', function(e) {
        // Set nilai input startDate dan endDate di dalam #search-form
        $('#startDateSearch').val($('#startInput').val());
        $('#endDateSearch').val($('#endInput').val());

        // Submit form #search-form untuk melakukan pencarian
        $('#search-form').submit();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function getQueryParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        const startDate = getQueryParameter('startDate');
        const endDate = getQueryParameter('endDate');

        if (startDate) {
            document.getElementById('startInput').value = startDate;
        }
        if (endDate) {
            document.getElementById('endInput').value = endDate;
        }
    });
</script>
