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
            @isset($donate)
                <form id="payment-form" action="{{ route('user-donasi-uang.success') }}" method="POST" hidden>
                    @csrf
                </form>
                <div class="col-md-12 text-center">
                    <button class="donasi-btn donasi-text" id="pay-button">
                        Bayar Donasi Sekarang
                    </button>
                </div>
            @endisset

            @empty($donate)
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
                    </div>
                </div>
                <div class="row
                    d-md-flex form-donation none" id="goodDonationForm">
                    <div class="col-md-12 donation pl-md-5">
                        <h3 class="mb-3">Form Donasi Barang</h3>
                        <form action="{{ route('user-donasi-barang.store') }}" id="donateFormGoods" class="donation-form"
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
                                <label for="form-label fw-bold fs-5" style="color: black">Tanggal Donasi Ke Panti</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="description" cols="30" rows="3" class="form-control" placeholder="Pesan ..."></textarea>
                            </div>
                            <div class="good-form my-3">
                                <div class="item-donasi">
                                    <div id="template-donasi">
                                        <div class="row my-2">
                                            <div class="col-md-8">
                                                <select name="goods[]" class="form-select form-select-lg w-100 h-100"
                                                    aria-label=".form-select-lg example" style="border: 2px solid black">
                                                    <option value="" hidden>Pilih Barang Yang Ingin diDonasikan</option>
                                                    @foreach ($goods as $good)
                                                        <option value="{{ $good->id }}"
                                                            data-percentage="{{ $good->percentage_available }}">
                                                            {{ $good->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input name="quantities[]" type="number" class="form-control"
                                                    placeholder="Jumlah ...">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button"
                                                    class="delete-product-button btn btn-sm btn-danger w-100 h-100"
                                                    style="border-radius: 10px"><i class="bx bx-trash me-1"></i> </button>
                                            </div>
                                        </div>
                                        <div class="capacity-status">
                                            <div class="text-center"
                                                style="width: 20%; color:black; background:#f86f2d; border-radius:5px">Jumlah
                                                Tersisa</div>
                                        </div>
                                    </div>
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
                        <form action="{{ route('user-donasi-uang.store') }}" id="donateFormScholarship" class="donation-form"
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
                    </div>
                </div>
            @endempty
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
            // Function to update the capacity status width based on selected option
            function updateCapacityStatus(selectElement) {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                var percentage = selectedOption.getAttribute('data-percentage');
                var capacityStatus = selectElement.closest('.row').nextElementSibling.querySelector(
                    '.capacity-status .text-center');
                capacityStatus.style.width = percentage + '%';
                capacityStatus.textContent = percentage + '% available';
            }

            // Add event listener to existing select elements
            document.querySelectorAll('select').forEach(function(selectElement) {
                selectElement.addEventListener('change', function() {
                    updateCapacityStatus(selectElement);
                });
            });

            // Add new form with event listener
            document.getElementById('tambah-donasi-barang').addEventListener('click', function() {
                // Clone the template form
                var template = document.getElementById('template-donasi');
                var clone = template.cloneNode(true);

                // Clear the values in the cloned form
                var inputs = clone.querySelectorAll('input');
                inputs.forEach(function(input) {
                    input.value = '';
                });

                var selects = clone.querySelectorAll('select');
                selects.forEach(function(select) {
                    select.selectedIndex = 0; // Reset to default option
                    select.addEventListener('change', function() {
                        updateCapacityStatus(select);
                    });
                });

                // Add an event listener to the delete button in the cloned form
                var deleteButton = clone.querySelector('.delete-product-button');
                deleteButton.addEventListener('click', function() {
                    clone.remove();
                });

                // Append the cloned form to the container
                document.querySelector('.item-donasi').appendChild(clone);
            });
        });
    </script>
@endsection
