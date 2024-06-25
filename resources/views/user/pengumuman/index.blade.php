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
                            class="mr-2"><a href="index.html">Home</a></span> <span>Pengumuman</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Pengumuman</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Pengumuman Panti Asuhan</h2>
                    <p>Daftar pengumuman terbaru panti asuhan Dharma Jati II</p>
                </div>
            </div>
            <div class="row d-flex">
                @php
                    $initialNumber = $datas->firstItem() - 1;
                @endphp
                @foreach ($datas as $data)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="#" class="block-20"
                                style="background-image: url('{{ asset('storage/' . $data->image) }}');">
                            </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    <div>
                                        <a
                                            href="#">{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</a>
                                    </div>
                                    <div><a href="#">Admin</a></div>
                                </div>
                                <h3 class="heading mt-3"><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#largeModal{{ $data->id }}">{{ $data->title }}</a></h3>
                                <p>{{ $data->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-round pagination-primary">
                        <!-- First Page -->
                        <li class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $datas->url(1) }}">
                                <i class="tf-icon bx bx-chevrons-left"></i>
                            </a>
                        </li>
                        <!-- Previous Page -->
                        <li class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $datas->previousPageUrl() }}">
                                <i class="tf-icon bx bx-chevron-left"></i>
                            </a>
                        </li>
                        <!-- Pagination Pages -->
                        @php
                            $currentPage = $datas->currentPage();
                            $lastPage = $datas->lastPage();
                            $startPage = max(1, $currentPage - 1);
                            $endPage = min($lastPage, $startPage + 3);

                            if ($endPage - $startPage < 3) {
                                $startPage = max(1, $lastPage - 3);
                                $endPage = $lastPage;
                            }
                        @endphp
                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <li class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $datas->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <!-- Next Page -->
                        <li class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $datas->nextPageUrl() }}">
                                <i class="tf-icon bx bx-chevron-right"></i>
                            </a>
                        </li>
                        <!-- Last Page -->
                        <li class="page-item last {{ $datas->currentPage() == $datas->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $datas->url($lastPage) }}">
                                <i class="tf-icon bx bx-chevrons-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </section>


    <!-- Modal -->
    @foreach ($datas as $data)
        <div class="modal fade" id="largeModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">{{ $data->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $data->image) }}" alt="" width="500px" height="350px">
                        </div>
                        <p class="text-secondary text-center m-0 pt-3">dibuat :</p>
                        <p class="text-center m-0">
                            {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
                        <div class="row">
                            <div class="col-md-12 py-2 px-5">
                                <p class="text-justify">{{ $data->description }}</p>
                            </div>
                        </div>
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
