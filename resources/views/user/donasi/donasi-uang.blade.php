@extends('layouts.user')
@section('head-script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .donation-selection {
            color: black !important;
            padding: 10px;
            border: 2px solid #f86f2d;
            border-radius: 10px;
            background: #f86f2d;
            cursor: pointer;
        }

        .donation-selection:hover {
            color: #f86f2d !important;
            background: #fff;
            border: 2px solid black;
        }

        .good-donation-add {
            color: black !important;
            border: 2px solid #f86f2d;
            border-radius: 10px;
            background: #f86f2d;
            cursor: pointer;
        }

        .good-donation-add:hover {
            color: #f86f2d !important;
            background: #fff;
            border: 2px solid black;
        }

        .selected {
            color: #f86f2d !important;
            background: #fff;
            border: 2px solid black;
        }

        .none {
            display: none !important;
        }

        .capacity-status {
            border: #f86f2d 2px solid;
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('images/dharma-jati-2-donation.jpeg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Donations</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-5 heading-section text-center">
                    <h2 class="mb-4">Donasi Kepada Panti Asuhan</h2>
                    <p>Tunjukan kebaikan hati anda dengan memberikan donasi untuk mendukung anak-anak di Panti Asuhan Dharma
                        Jati II</p>
                </div>
            </div>
            <div class="row justify-content-center mb-5 pb-3 d-md text-center">
                <div class="col-md-4">
                    <p class="breadcrumbs "><span class="mr-2"><a href="#" class="donation-selection selected"
                                id="moneyDonation">Donasi
                                Uang</a></span>
                    </p>
                </div>
                <div class="col-md-4">
                    <p class="breadcrumbs"><span class="mr-2"><a href="#" class="donation-selection"
                                id="goodDonation">Donasi
                                Barang</a></span></p>
                </div>
                <div class="col-md-4">
                    <p class="breadcrumbs"><span class="mr-2"><a href="#" class="donation-selection"
                                id="scholarshipDonation">Donasi
                                Beasiswa</a></span></p>
                </div>
            </div>
            <div class="row
                    d-md-flex form-donation" id="moneyDonationForm">
                <div class="col-md-12 donation pl-md-5">
                    <h3 class="mb-3">Form Donasi Uang</h3>
                    <p>Pengisian form di bawah dilakukan untuk melakukan donasi uang secara online, uang yang didonasikan
                        akan digunakan untuk pengoprasian Panti Asuhan Dharma Jati II. <br> <span class="text-danger">
                            *Lakukan pengisian form dengan
                            data
                            yang benar agar tidak terjadi miss
                            informasi
                        </span></p>
                    @isset($donate)
                        <form id="payment-form" action="{{ route('user-donasi-uang.success') }}" method="POST" hidden>
                            @csrf
                            <input type="text" name="type_donation" value="donate_money">
                        </form>
                        <div class="col-md-12 text-center">
                            <button class="donasi-btn donasi-text" id="pay-button">
                                Bayar Donasi Sekarang
                            </button>
                        </div>
                    @endisset
                    @empty($donate)
                        <form action="{{ route('user-donasi-uang.store') }}" id="donateForm" class="donation-form"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Nama ...">
                            </div>
                            <div class="form-group">
                                <input name="address" type="text" class="form-control" placeholder="Alamat ...">
                            </div>
                            <div class="form-group">
                                <input id="phone" type="tel" name="phone_number" class="form-control"
                                    placeholder="Nomer Telepon ..." />
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email ...">
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="" cols="30" rows="3" class="form-control" placeholder="Pesan ..."></textarea>
                            </div>
                            <div class="mb-3" id="totalAmountInput">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" style="background-color:transparent;">Rp</span>
                                    <input type="text" class="form-control" id="total_amount" name="total_amount"
                                        placeholder="1,000,000" oninput="formatAmount(this)" style="border-left: 0px" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="w-100 py-3 px-5 donasi-btn">
                                    DONASI
                                </button>
                            </div>
                        </form>
                    @endempty
                </div>
            </div>
            <div class="row d-md-flex form-donation none" id="goodDonationForm">
                <div class="col-md-12 donation pl-md-5">
                    <h3 class="mb-3">Form Donasi Barang</h3>
                    <p>Pengisian form dilakukan untuk memboking tanggal donasi barang, setelah mengisi form maka donatur
                        akan dihubungi via WhatsApp. <br> <span class="text-danger">*Lakukan pengisian form dengan data
                            yang
                            benar agar tidak terjadi
                            miss
                            informasi
                        </span></p>
                    <form action="{{ route('user-donasi-barang.store') }}" id="donateFormGoods" class="donation-form"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Nama ..."
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="address" type="text" class="form-control" placeholder="Alamat ..."
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="phone" type="tel" name="phone_number" class="form-control"
                                placeholder="Nomer Telepon ..." value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="text" class="form-control" placeholder="Email ..."
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="form-label fw-bold fs-5" style="color: black">Tanggal Donasi Ke Panti</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="description" cols="30" rows="3" class="form-control" placeholder="Pesan ...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="good-form my-3">
                            <div class="item-donasi">
                                @if (old('goods'))
                                    @foreach (old('goods') as $index => $goodId)
                                        <div class="donasi-item">
                                            <div class="row my-2">
                                                <div class="col-md-8">
                                                    <select name="goods[]"
                                                        class="form-select form-select-lg w-100 h-100 goods-select"
                                                        aria-label=".form-select-lg example"
                                                        style="border: 2px solid black">
                                                        <option value="" hidden>Pilih Barang Yang Ingin diDonasikan
                                                        </option>
                                                        @foreach ($goods as $good)
                                                            <option value="{{ $good->id }}"
                                                                data-percentage="{{ $good->percentage_available }}"
                                                                data-stock="{{ $good->stock }}"
                                                                data-capacity="{{ $good->capacity }}"
                                                                {{ $good->id == $goodId ? 'selected' : '' }}>
                                                                {{ $good->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input name="quantities[]" type="number" class="form-control"
                                                        placeholder="Jumlah ..."
                                                        value="{{ old('quantities.' . $index) }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button"
                                                        class="delete-product-button btn btn-sm btn-danger w-100 h-100"
                                                        style="border-radius: 10px"><i
                                                            class="bx bx-trash me-1"></i></button>
                                                </div>
                                            </div>
                                            <div id="errorGoods">
                                                @error('goods.' . $index)
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                @error('quantities.' . $index)
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="capacity-status">
                                                <div class="text-center"
                                                    style="width: 20%; color:black; background:#f86f2d; border-radius:5px">
                                                    Jumlah Tersisa</div>
                                            </div>
                                            <p class="text-center stock-text">Sisa Stock: -</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="donasi-item" id="template-donasi">
                                        <div class="row my-2">
                                            <div class="col-md-8">
                                                <select name="goods[]"
                                                    class="form-select form-select-lg w-100 h-100 goods-select"
                                                    aria-label=".form-select-lg example" style="border: 2px solid black">
                                                    <option value="" hidden>Pilih Barang Yang Ingin diDonasikan
                                                    </option>
                                                    @foreach ($goods as $good)
                                                        <option value="{{ $good->id }}"
                                                            data-percentage="{{ $good->percentage_available }}"
                                                            data-stock="{{ $good->stock }}"
                                                            data-capacity="{{ $good->capacity }}">
                                                            {{ $good->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('goods.*')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <input name="quantities[]" type="number" class="form-control"
                                                    placeholder="Jumlah ...">
                                                @error('quantities.*')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="capacity-status">
                                            <div class="text-center"
                                                style="width: 20%; color:black; background:#f86f2d; border-radius:5px">
                                                Jumlah Tersisa</div>
                                        </div>
                                        <p class="text-center stock-text">Sisa Stock: -</p>
                                    </div>
                                @endif
                            </div>
                            <div class="my-3">
                                <button id="tambah-donasi-barang" class="good-donation-add col-md-12"
                                    type="button">Tambah Barang Donasi</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="w-100 py-3 px-5 donasi-btn">DONASI</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row
                    d-md-flex form-donation none" id="scholarshipDonationForm">
                <div class="col-md-12 donation pl-md-5">
                    <h3 class="mb-3">Form Donasi Beasiswa</h3>
                    <p>Pengisian form di bawah dilakukan untuk melakukan donasi beasiswa secara online, uang yang
                        didonasikan
                        akan digunakan untuk kepentingan pendidikan anak Panti Asuhan Dharma Jati II.
                        <br> <span class="text-danger">*Lakukan pengisian form dengan data
                            yang benar agar tidak terjadi miss
                            informasi
                        </span>
                    </p>
                    @isset($schoolarship)
                        <form id="payment-form" action="{{ route('user-donasi-uang.success') }}" method="POST" hidden>
                            @csrf
                            <input type="text" name="type_donation" value="schoolarship">
                        </form>
                        <div class="col-md-12 text-center">
                            <button class="donasi-btn donasi-text" id="pay-buttonSchoolarship">
                                Bayar Donasi Sekarang
                            </button>
                        </div>
                    @endisset
                    @empty($schoolarship)
                        <form action="{{ route('user-donasi-beasiswa.store') }}" id="donateFormScholarship"
                            class="donation-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Nama ...">
                            </div>
                            <div class="form-group">
                                <input name="address" type="text" class="form-control" placeholder="Alamat ...">
                            </div>
                            <div class="form-group">
                                <input id="phone" type="tel" name="phone_number" class="form-control"
                                    placeholder="Nomer Telepon ..." />
                            </div>
                            <div class="form-group">
                                <input name="email" type="text" class="form-control" placeholder="Email ...">
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="" cols="30" rows="3" class="form-control"
                                    placeholder="Pesan ..."></textarea>
                            </div>
                            <div class="mb-3" id="totalAmountInput">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" style="background-color:transparent;">Rp</span>
                                    <input type="text" class="form-control" id="total_amount" name="total_amount"
                                        placeholder="1,000,000" oninput="formatAmount(this)" style="border-left: 0px" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="w-100 py-3 px-5 donasi-btn">
                                    DONASI
                                </button>
                            </div>
                        </form>
                    @endempty
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<Set your ClientKey here>"></script>
    @isset($schoolarship)
        <script type="text/javascript">
            document.getElementById('pay-buttonSchoolarship').onclick = function() {
                snap.pay('{{ $schoolarship->snap_token }}', {
                    onSuccess: function(result) {
                        document.getElementById('payment-form').submit();
                    },
                    onPending: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    @endisset
    @isset($donate)
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                snap.pay('{{ $donate->snap_token }}', {
                    onSuccess: function(result) {
                        document.getElementById('payment-form').submit();
                    },
                    onPending: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    @endisset
    @if (isset($_GET['success']) && $_GET['success'])
        <script>
            Swal.fire({
                title: "Berhasil Melakukan Pembayaran!",
                icon: "success",
                showCancelButton: false,
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Me-refresh halaman atau mengarahkan ulang ke halaman yang sama tanpa parameter success
                    window.location.href = window.location.href.split('?')[0]; // Menghapus parameter query
                }
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen dengan kelas 'donation-selection'
            const donationSelections = document.querySelectorAll('.donation-selection');
            const forms = {
                moneyDonation: document.getElementById('moneyDonationForm'),
                goodDonation: document.getElementById('goodDonationForm'),
                scholarshipDonation: document.getElementById('scholarshipDonationForm')
            };

            // Fungsi untuk menyembunyikan semua formulir
            function hideAllForms() {
                Object.values(forms).forEach(form => form.classList.add('none'));
            }

            // Fungsi untuk menampilkan form sesuai id
            function showForm(selectedId) {
                const formToShow = forms[selectedId];
                if (formToShow) {
                    formToShow.classList.remove('none');
                }
            }

            // Fungsi untuk menghandle klik pada donation selection
            function handleSelectionClick(event) {
                event.preventDefault();

                // Hapus kelas 'selected' dari semua elemen
                donationSelections.forEach(item => item.classList.remove('selected'));

                // Tambahkan kelas 'selected' ke elemen yang diklik
                this.classList.add('selected');

                // Sembunyikan semua formulir
                hideAllForms();

                // Tampilkan formulir yang sesuai
                const selectedId = this.id;
                showForm(selectedId);
            }

            // Tambahkan event listener ke setiap elemen
            donationSelections.forEach(selection => {
                selection.addEventListener('click', handleSelectionClick);
            });

            // Set default ke moneyDonationForm
            document.getElementById('moneyDonation').classList.add('selected');
            showForm('moneyDonation');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectedGoods = [];

            function updateCapacityStatus(selectElement) {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                var percentage = selectedOption.getAttribute('data-percentage');
                var row = selectElement.closest('.row');
                if (!row) return;
                var nextElement = row.nextElementSibling;
                if (!nextElement) return;
                var capacityStatus = nextElement.querySelector('.capacity-status .text-center');
                if (!capacityStatus) return;
                capacityStatus.style.width = percentage + '%';
                capacityStatus.textContent = percentage + '% Terkumpul';
            }

            function updateStockInfo(selectElement) {
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const stock = selectedOption.getAttribute('data-stock');
                const capacity = selectedOption.getAttribute('data-capacity');
                const stockTextElement = selectElement.closest('.donasi-item').querySelector('.stock-text');
                stockTextElement.textContent = `Sisa Stock: ${stock}/${capacity}`;
            }

            function updateSelectOptions() {
                document.querySelectorAll('.goods-select').forEach(function(selectElement) {
                    var currentValue = selectElement.value;
                    selectElement.querySelectorAll('option').forEach(function(option) {
                        if (selectedGoods.includes(option.value) && option.value !== currentValue) {
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
                document.querySelectorAll('.delete-product-button').forEach(function(deleteButton) {
                    deleteButton.removeEventListener('click', deleteButtonHandler);
                    deleteButton.addEventListener('click', deleteButtonHandler);
                });
            }

            function deleteButtonHandler(event) {
                var deleteButton = event.target.closest('.delete-product-button');
                var template = deleteButton.closest('.donasi-item');
                if (!template) return;
                var selectElement = template.querySelector('select');
                if (!selectElement) return;
                selectedGoods = selectedGoods.filter(value => value !== selectElement.value);
                template.remove();
                updateSelectOptions();
            }

            function reattachEventListeners() {
                document.querySelectorAll('.goods-select').forEach(function(selectElement) {
                    selectElement.previousValue = selectElement.value;
                    selectElement.removeEventListener('change', handleSelectChange);
                    selectElement.addEventListener('change', handleSelectChange);
                });
                attachDeleteEventListeners();
            }

            function initializeOldValues() {
                document.querySelectorAll('.goods-select').forEach(function(selectElement) {
                    updateCapacityStatus(selectElement);
                    updateStockInfo(selectElement);
                    if (selectElement.value) {
                        selectedGoods.push(selectElement.value);
                    }
                });
                updateSelectOptions();
            }

            document.querySelectorAll('.goods-select').forEach(function(selectElement) {
                selectElement.previousValue = selectElement.value;
                selectElement.addEventListener('change', handleSelectChange);
            });

            document.getElementById('tambah-donasi-barang').addEventListener('click', function() {
                var template = document.getElementById('template-donasi').cloneNode(true);
                template.classList.add('donasi-item');
                template.id = "";
                var inputs = template.querySelectorAll('input');
                inputs.forEach(function(input) {
                    input.value = '';
                });
                var selects = template.querySelectorAll('select');
                selects.forEach(function(select) {
                    select.selectedIndex = 0;
                    select.previousValue = '';
                    select.addEventListener('change', handleSelectChange);
                });
                var deleteButton = template.querySelector('.delete-product-button');
                if (deleteButton) {
                    deleteButton.addEventListener('click', deleteButtonHandler);
                } else {
                    console.error('Delete button not found in template');
                }
                document.querySelector('.item-donasi').appendChild(template);
                updateSelectOptions();
                attachDeleteEventListeners();
            });

            reattachEventListeners();
            initializeOldValues();

            // Hide the "Tambah Barang Donasi" button if there are validation errors
            if (document.querySelector('.alert-danger')) {
                document.getElementById('tambah-donasi-barang').style.display = 'none';
            }

            // Handle form submission with AJAX
            document.getElementById('donateFormGoods').addEventListener('submit', function(event) {
                event.preventDefault();
                var form = event.target;
                var formData = new FormData(form);
                var url = form.action;

                // Clear previous errors
                document.querySelectorAll('.alert-danger').forEach(function(alert) {
                    alert.remove();
                });

                fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    }).then(response => response.json())
                    .then(data => {
                        if (data.errors) {
                            let firstErrorMessage = null;
                            Object.keys(data.errors).forEach(function(key) {
                                var errorMessage = data.errors[key][0];
                                var inputElement = document.querySelector(`[name="${key}"]`);
                                if (inputElement) {
                                    var errorDiv = document.createElement('div');
                                    errorDiv.classList.add('alert', 'alert-danger');
                                    errorDiv.textContent = errorMessage;
                                    inputElement.parentElement.appendChild(errorDiv);
                                }
                                // Capture the first error message
                                if (!firstErrorMessage) {
                                    firstErrorMessage = errorMessage;
                                }
                            });
                            if (firstErrorMessage) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: firstErrorMessage
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Donation successfully saved!'
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong. Please try again later.'
                        });
                    });
            });
        });
    </script>
@endsection
