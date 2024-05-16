@extends('layouts.user')
@section('head-script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                <div class="row
                    d-md-flex">
                    <div class="col-md-6 d-flex ftco-animate">
                        <div class="img img-2 align-self-stretch" style="background-image: url(images/bg_4.jpg);"></div>
                    </div>
                    <div class="col-md-6 donation pl-md-5 ftco-animate">
                        <h3 class="mb-3">Form Donasi</h3>
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
@endsection
