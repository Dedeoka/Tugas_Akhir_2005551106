@extends('layouts.user')
@section('head-script')
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
@endsection
@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('images/contact.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="index.html">Home</a></span> <span>Gallery</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Galleries</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-5 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Foto-Foto Panti Asuhan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-cause owl-carousel">
                        @foreach ($datas as $data)
                            <div class="item">
                                <div class="cause-entry">
                                    @if ($data->galleryImages->isNotEmpty())
                                        <a href="#" class="img"
                                            style="background-image: url('{{ asset('storage/' . $data->galleryImages->last()->image) }}');"></a>
                                    @else
                                        <!-- Tambahkan fallback image atau pesan untuk kasus di mana tidak ada gambar -->
                                        <a href="#" class="img" style="background-color: #ccc;">No Image</a>
                                    @endif
                                    <div class="text p-3 p-md-4">
                                        <h3><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $data->id }}">{{ $data->title }}</a>
                                        </h3>
                                        <p>{{ Illuminate\Support\Str::limit(strip_tags($data->description), 100) }}</p>
                                        <span
                                            class="donation-time mb-3 d-block">{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    @foreach ($datas as $data)
        <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFullTitle">{{ $data->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Gallery Foto</h5>
                        <p class="text-center px-2">
                            {{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</p>
                        <div class="row border-bottom border-2">
                            <div class="col-md-12 ftco-animate">
                                <div class="carousel-cause owl-carousel">
                                    @foreach ($data->galleryImages as $image)
                                        <div class="item">
                                            <div class="cause-entry">
                                                @if ($data->galleryImages->isNotEmpty())
                                                    <a href="#" class="img"
                                                        style="background-image: url('{{ asset('storage/' . $image->image) }}');"></a>
                                                @else
                                                    <!-- Tambahkan fallback image atau pesan untuk kasus di mana tidak ada gambar -->
                                                    <a href="#" class="img" style="background-color: #ccc;">No
                                                        Image</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <p>{{ $data->description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
@endsection
