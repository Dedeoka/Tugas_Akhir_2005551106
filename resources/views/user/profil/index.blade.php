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
                            class="mr-2"><a href="index.html">Home</a></span> <span>Profil</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Profil</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Profil Panti Asuhan</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $data->thumbnail) }}" alt="" class="w-100 h-100">
                </div>
                <div class="col-md-6 text-justify">
                    {!! $data->description !!}
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Program Donatur</h2>
                    <p>Daftar program terbaru donatur di panti asuhan Dharma Jati II</p>
                </div>
            </div>
            <div class="row d-flex">
                @php
                    $initialNumber = $events->firstItem() - 1;
                @endphp
                @foreach ($events as $event)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="#" class="block-20"
                                style="background-image: url('{{ asset('storage/' . $event->thumbnail) }}');">
                            </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    <div>
                                        <a
                                            href="#">{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</a>
                                    </div>
                                </div>
                                <h3 class="heading mt-3"><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#largeModal{{ $event->id }}">{{ $event->title }}</a></h3>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-round pagination-primary">
                        <!-- First Page -->
                        <li class="page-item first {{ $events->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $events->url(1) }}">
                                <i class="tf-icon bx bx-chevrons-left"></i>
                            </a>
                        </li>
                        <!-- Previous Page -->
                        <li class="page-item prev {{ $events->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $events->previousPageUrl() }}">
                                <i class="tf-icon bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <!-- Pagination Pages -->
                        @php
                            $currentPage = $events->currentPage();
                            $lastPage = $events->lastPage();
                            $startPage = max(1, $currentPage - 1);
                            $endPage = min($lastPage, $startPage + 3);

                            if ($endPage - $startPage < 3) {
                                $startPage = max(1, $lastPage - 3);
                                $endPage = $lastPage;
                            }
                        @endphp
                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <li class="page-item {{ $events->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $events->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <!-- Next Page -->
                        <li class="page-item next {{ $events->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $events->nextPageUrl() }}">
                                <i class="tf-icon bx bx-chevron-right"></i>
                            </a>
                        </li>
                        <!-- Last Page -->
                        <li class="page-item last {{ $events->currentPage() == $events->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $events->url($lastPage) }}">
                                <i class="tf-icon bx bx-chevrons-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </section>


    <!-- Modal -->
    @foreach ($events as $event)
        <div class="modal fade" id="largeModal{{ $event->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">{{ $event->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Foto-Foto Program Kegiatan</h5>
                        <p class="text-center px-2">
                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                        <div class="row border-bottom border-2">
                            <div class="col-md-12 ftco-animate">
                                <div class="carousel-cause owl-carousel">
                                    <div class="item">
                                        <div class="cause-entry">
                                            <a href="#" class="img"
                                                style="background-image: url('{{ asset('storage/' . $event->thumbnail) }}');"></a>
                                        </div>
                                    </div>
                                    @foreach ($event->eventImages as $image)
                                        <div class="item">
                                            <div class="cause-entry">
                                                @if ($event->eventImages->isNotEmpty())
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
                            Tutup
                        </button>
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
