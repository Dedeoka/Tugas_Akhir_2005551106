@extends('layouts.admin')

@section('header')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Dashboard /</span> <b>Pengumuman</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex justify-content-between">
                <div class="m-3 quick-sand">
                    <h3>
                        Tabel Data Pengumuman Panti
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3 px-5">
                        <div class="d-flex justify-content-end">
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
                                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Pengumuman Panti
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="announcementForm" action="{{ route('pengumuman.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="title" class="form-label">Judul Pengumuman</label>
                                                    <input type="text" id="title" name="title" class="form-control"
                                                        placeholder="Enter Title" />
                                                    <div id="titleError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="description" class="form-label">Deskripsi
                                                        Pengumuman</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                                    <div id="descriptionError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="image" class="form-label">Foto Pengumuman (jika kosong
                                                        maka akan diisi dengan foto default)</label>
                                                    <input class="form-control" type="file" id="image"
                                                        name="image" />
                                                    <div id="imageError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
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
                                <th class="col-md-3 text-center fw-bold">Foto</th>
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
                                    <td>{{ Str::limit(strip_tags($data->description), 50) }}</td>
                                    <td>
                                        <ul
                                            class="list-unstyled users-list m-0 avatar-group align-items-center text-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xl pull-up" title="Foto {{ $data->name }}">
                                                <img src="{{ asset('storage/' . $data->image) }}" alt=""
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterFoto_{{ $loop->index }}">
                                            </li>
                                        </ul>
                                    </td>
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
                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Pengumuman Panti</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="announcementEditForm{{ $data->id }}" action="{{ route('pengumuman.store') }}"
                                method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="title" class="form-label">Judul Pengumuman</label>
                                            <input type="text" id="titleEdit{{ $data->id }}" name="title"
                                                class="form-control" placeholder="Enter Title"
                                                value="{{ $data->title }}" />
                                            <div id="titleEditError{{ $data->id }}" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="description" class="form-label">Deskripsi
                                                Pengumuman</label>
                                            <textarea class="form-control ckeditor" name="description" id="descriptionEdit{{ $data->id }}" rows="3">{{ $data->description }}</textarea>
                                            <div id="descriptionEditError{{ $data->id }}" class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="image" class="form-label">Pengumuman</label>
                                            <input class="form-control" type="file" id="imageEdit{{ $data->id }}"
                                                name="image" />
                                            <div id="imageEditError{{ $data->id }}" class="invalid-feedback"></div>
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
                                                Judul Pengumuman
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
                                                Deskripsi
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            <td>{{ strip_tags($data->description) }}</td>
                                        </div>
                                    </div>
                                    <div class="d-flex py-3">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Foto Pengumuman
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">

                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-25">

                                        </div>
                                        <div class="w-50 d-flex fw-bold">
                                            <img width="200px" height="200px"
                                                src="{{ asset('storage/' . $data->image) }}" alt="">
                                        </div>
                                        <div class="w-25">

                                        </div>
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
    @include('admin.dashboard.pengumuman.js.index');
@endsection
