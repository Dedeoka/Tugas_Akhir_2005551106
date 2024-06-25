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
                    <h2 class="mb-4">Program Donatur</h2>
                    <p>Daftar program terbaru donatur di panti asuhan Dharma Jati II</p>
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
                                style="background-image: url('{{ asset('storage/' . $data->thumbnail) }}');">
                            </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    <div>
                                        <a
                                            href="#">{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</a>
                                    </div>
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

    <section class="ftco-section-3 img" style="background-image: url(images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="volunteer pl-md-5 ftco-animate">
                <h3 class="mb-5 text-center">Formulir Pembuatan Program di Panti Asuhan</h3>
            </div>
            <form action="{{ route('user-program.store') }}" enctype="multipart/form-data" class="volunter-form"
                method="POST">
                @csrf
                <div class="row d-md-flex">
                    <div class="col-md-6 volunteer pl-md-5 ftco-animate">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama..." name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Alamat..." name="address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email..." name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nomer Telepon..." name="phone_number">
                        </div>
                    </div>
                    <div class="col-md-6 volunteer pl-md-5 ftco-animate">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Judul Program..." name="title">
                        </div>
                        <div class="form-group">
                            <select class="form-select w-100" name="event_type_id" aria-label="Default select example">
                                <option value="" hidden>
                                    Pilih Jenis Program
                                </option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="form-label fw-bold fs-5" style="color: black">Tanggal Program Dilaksanakan</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="form-group">
                            <textarea name="description" cols="30" rows="3" class="form-control" placeholder="Deskripsi ...">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="volunteer col-md-12 pl-md-5 ftco-animate">
                        <div class="form-group">
                            <label for="form-label fw-bold fs-5 text-center" style="color: black">Foto Program (Foto
                                default akan digunakan jika tidak diisi)</label>
                            <input class="form-control" type="file" name="thumbnail">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-white py-3 px-5 w-100">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <!-- Modal -->
    @foreach ($datas as $data)
        <div class="modal fade" id="largeModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">{{ $data->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Foto-Foto Program Kegiatan</h5>
                        <p class="text-center px-2">
                            {{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</p>
                        <div class="row border-bottom border-2">
                            <div class="col-md-12 ftco-animate">
                                <div class="carousel-cause owl-carousel">
                                    <div class="item">
                                        <div class="cause-entry">
                                            <a href="#" class="img"
                                                style="background-image: url('{{ asset('storage/' . $data->thumbnail) }}');"></a>
                                        </div>
                                    </div>
                                    @foreach ($data->donaturEventImages as $image)
                                        <div class="item">
                                            <div class="cause-entry">
                                                @if ($data->donaturEventImages->isNotEmpty())
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
