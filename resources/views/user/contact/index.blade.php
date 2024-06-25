@extends('layouts.user')
@section('head-script')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        
    <style>
        .map {
            height: 400px;
            width: 100%;
            position: relative;
            /* Pastikan elemen ini memiliki posisi */
            z-index: 1;
            /* Letakkan di belakang elemen lain */
        }

        .leaflet-control-attribution {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('images/contact.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Contact Information</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-6">
                    <p><span>Address:</span> Jl. Trengguli No.80, Penatih, Kec. Denpasar Tim., Kota Denpasar, Bali 80237</p>
                </div>
                <div class="col-md-3">
                    <p><span>Phone:</span> <a href="tel://1234567920">(0361) 461781</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Website</span> <a href="#">www.panti-asuhan-dharma-jatiII.com</a></p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-12 pr-md-5">
                    <div class="map" id="map">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map', {
            center: [-8.6262812, 115.238539],
            zoom: 16,
            zoomControl: true // Pastikan kontrol zoom diaktifkan
        });

        // Tambahkan tile layer ke peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);

        // Tambahkan marker ke peta
        var marker = L.marker([-8.6262812, 115.238539]).addTo(map);
    </script>
@endsection
