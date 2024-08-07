@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Master Data /</span> <b>Kategori Donasi Barang</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex justify-content-between">
                <div class="m-3 quick-sand">
                    <h3>
                        Tabel Data Kategori Donasi Barang
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
                                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Kategori Donasi Barang
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="categoryBarangForm" action="{{ route('kategori-barang.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Nama Kategori Donasi
                                                        Barang</label>
                                                    <input type="text" id="nameBasic" name="name" class="form-control"
                                                        placeholder="Nama Barang" />
                                                    <div id="nameError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="kapasitasInput" class="form-label">Kapasitas
                                                        Penerimaan</label>
                                                    <div class="input-group">
                                                        <input type="text" id="kapasitasInput" class="form-control"
                                                            placeholder="Kapasitas Penerimaan" />
                                                        <button id="satuanDropdown"
                                                            class="btn btn-outline-primary dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false"
                                                            data-value="0">Pilih Satuan</button>
                                                        <ul id="dropdown-menu" class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"
                                                                    data-value="Kg">Kg</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"
                                                                    data-value="Liter">Liter</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"
                                                                    data-value="Buah">Buah</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"
                                                                    data-value="Pasang">Pasang</a></li>
                                                        </ul>
                                                        <div id="unitError" class="invalid-feedback"></div>
                                                        <div id="capacityError" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" id="postSubmit" class="btn btn-primary">Simpan</button>
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
                                <th class="col-md-3 text-center fw-bold">Nama</th>
                                <th class="col-md-3 text-center fw-bold">Kapasitas Total</th>
                                <th class="col-md-3 text-center fw-bold">Kapasitas Sisa</th>
                                <th class="col-md-3 text-center fw-bold">Ditampilkan</th>
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
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->capacity }} {{ $data->unit }}</td>
                                    <td>{{ $data->stock }}</td>
                                    <td>
                                        @if ($data->is_hide)
                                            Disembunyikan
                                        @else
                                            Ditampilkan
                                        @endif
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
                                                @if ($data->is_hide == true)
                                                    <a class="dropdown-item" href="javascript:void(0);" id="false"
                                                        data-id="{{ $data->id }}">
                                                        <i class='bx bx-checkbox-minus'></i> Tampilkan
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="javascript:void(0);" id="true"
                                                        data-id="{{ $data->id }}">
                                                        <i class='bx bx-check-square'></i> Sembunyikan
                                                    </a>
                                                @endif
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
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kategori Donasi Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('kategori-barang.update', $data->id) }}"
                                id="categoryBarangFormEdit{{ $data->id }}" data-id="{{ $data->id }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="editName{{ $data->id }}" class="form-label">Nama Kategori
                                                Donasi Barang</label>
                                            <input type="text" id="editName{{ $data->id }}" name="name"
                                                class="form-control" value="{{ $data->name }}" />
                                            <div id="nameErrorEdit{{ $data->id }}" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="kapasitasInputEdit{{ $data->id }}"
                                                class="form-label">Kapasitas
                                                Penerimaan</label>
                                            <div class="input-group">
                                                <input type="text" id="kapasitasInputEdit{{ $data->id }}"
                                                    name="capacity" class="form-control"
                                                    placeholder="Kapasitas Penerimaan" value="{{ $data->capacity }}" />
                                                <button id="satuanDropdownEdit{{ $data->id }}"
                                                    class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-value="{{ $data->unit }}"
                                                    data-selected="{{ $data->unit }}">
                                                    {{ $data->unit }}
                                                </button>
                                                <ul id="dropdown-menuEdit{{ $data->id }}" class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"
                                                            data-value="Kg">Kg</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"
                                                            data-value="Liter">Liter</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"
                                                            data-value="Buah">Buah</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"
                                                            data-value="Pasang">Pasang</a></li>
                                                </ul>
                                                <div id="unitErrorEdit{{ $data->id }}" class="invalid-feedback">
                                                </div>
                                                <div id="capacityErrorEdit{{ $data->id }}" class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary updateSubmit"
                                        data-id="{{ $data->id }}">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.master-data.js.kategori-barang')
@endsection
