@extends('layouts.admin')

@section('header')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <style>
        .imageUpdate {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Dashboard /</span> <b>Gallery Panti</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Daftar Gallery Panti
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                <i class='bx bx-plus m-1'></i>
                                Tambah Data
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Gallery Panti
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="galleryForm" action="#" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="title" class="form-label">Judul Gallery</label>
                                                    <input type="text" id="title" name="title" class="form-control"
                                                        placeholder="Enter Title" />
                                                    <div id="titleError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="date" class="form-label">Tanggal Gallery</label>
                                                    <input type="date" id="date" name="date" class="form-control"
                                                        placeholder="Enter date" />
                                                    <div id="dateError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="description" class="form-label">Deskripsi
                                                        Gallery</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                                    <div id="descriptionError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="images" class="form-label">Foto Gallery (Dapat Mengisi
                                                        Banyak Foto)</label>
                                                    <input class="form-control" type="file" id="images"
                                                        name="images[]" multiple />
                                                    <div id="imagesError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="btn" id="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-3 text-center fw-bold">Judul</th>
                                <th class="col-md-3 text-center fw-bold">Deskripsi</th>
                                <th class="col-md-3 text-center fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $initialNumber = $datas->firstItem() - 1;
                            @endphp
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration + $initialNumber }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ strip_tags($data->description) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $data->id }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                </a>
                                                <a class="dropdown-item storeImage" href="javascript:void(0);"
                                                    data-id="{{ $data->id }}">
                                                    <i class='bx bxs-image-add'></i> Tambah Foto
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $data->id }}">
                                                    <i class="bx bx-detail me-1"></i> Detail
                                                </a>
                                                <a class="dropdown-item delete-data" href="javascript:void(0);"
                                                    data-id="{{ $data->id }}">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">Data Tidak Ditemukan</h3>
                @endif
                <div class="d-flex mt-4">
                    <div class="pagination-side-content"></div>
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
                            <li
                                class="page-item last {{ $datas->currentPage() == $datas->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $datas->url($lastPage) }}">
                                    <i class="tf-icon bx bx-chevrons-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Modal Edit -->
            @foreach ($datas as $data)
                <div class="modal fade editModal" id="editModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Gallery Panti</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="galleryEditForm{{ $data->id }}" action="#" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="title" class="form-label">Judul Gallery</label>
                                            <input type="text" id="titleEdit{{ $data->id }}" name="title"
                                                class="form-control" placeholder="Enter Title"
                                                value="{{ $data->title }}" />
                                            <div id="titleEditError{{ $data->id }}" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="dateEdit" class="form-label">Tanggal Gallery</label>
                                            <input type="date" id="dateEdit{{ $data->id }}" name="date"
                                                class="form-control" placeholder="Enter date" />
                                            <div id="dateErrorEdit{{ $data->id }}" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="description" class="form-label">Deskripsi
                                                Gallery</label>
                                            <textarea class="form-control ckeditor" name="description" id="descriptionEdit{{ $data->id }}" rows="3">{{ $data->description }}</textarea>
                                            <div id="descriptionEditError{{ $data->id }}" class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4 border-top">
                                        <div class="px-3">
                                            <h5 class="px-2">Edit Foto-Foto Gallery</h5>
                                            <p class="px-2">
                                                *Klik foto yang ingin diedit
                                            </p>
                                            <div class="row px-3">
                                                @foreach ($data->galleryImages as $image)
                                                    <div class="col-6 col-sm-4 py-2">
                                                        <img width="100px" height="100px"
                                                            src="{{ asset('storage/' . $image->image) }}"
                                                            class="imageUpdate" data-id="{{ $image->id }}"
                                                            alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" id="{{ $data->id }}"
                                        class="btn btn-primary submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="modal fade" id="imageUpdateModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Ganti Foto Gallery
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="imageUpdateForm" action="#" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="image" class="form-label">Gallery</label>
                                        <input class="form-control" type="file" id="imageEdit{{ $data->id }}"
                                            name="image" />
                                        <div id="imageEditError{{ $data->id }}" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary imageUpdateSubmit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="imageStoreModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Ganti Foto Gallery
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="imageStoreForm" action="#" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="images" class="form-label">Foto Gallery (Dapat Mengisi
                                            Banyak Foto)</label>
                                        <input class="form-control" type="file" id="imagesStore" name="images[]"
                                            multiple />
                                        <div id="imagesStoreError" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary imageStoreSubmit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach ($datas as $data)
                <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-m" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h3 class="text-center">Detail Data Donasi
                                </h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="pb-3 border-bottom">
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Judul Gallery
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $data->title }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Tanggal
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $data->date }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Deskripsi
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ strip_tags($data->description) }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="pb-2 border-bottom">
                                <div class="px-3">
                                    <h5 class="px-2">Foto-Foto Gallery</h5>
                                    <div class="row px-3">
                                        @foreach ($data->galleryImages as $image)
                                            <div class="col-6 col-sm-4 py-2">
                                                <img width="100px" height="100px"
                                                    src="{{ asset('storage/' . $image->image) }}" alt="">
                                            </div>
                                        @endforeach
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
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.dashboard.gallery.js.index');
@endsection
