@extends('layouts.admin')

@section('header')
    <style>
        .item-donasi {
            /* Add necessary styles to ensure consistent appearance */
            width: 100%;
            /* Other styles as needed */
        }

        .capacity-status {
            border: #f86f2d 2px solid;
            border-radius: 20px;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Donasi</span> <b>Donasi Barang</b>
        </h4>

        <div class="card">
            <div class="d-flex justify-content-between">
                <div class="m-3 quick-sand">
                    <h3>
                        Tabel Data Donasi Barang
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
                                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Data Donasi Barang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="donasiBarangForm" action="{{ route('donasi-barang.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="name" class="form-label">Nama Donatur</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        placeholder="Nama Donatur ..." />
                                                    <div id="nameError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="address" class="form-label">Alamat Donatur</label>
                                                    <input type="text" id="address" name="address" class="form-control"
                                                        placeholder="Alamat Donatur ..." />
                                                    <div id="addressError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="phone_number" class="form-label">No Telepon</label>
                                                    <input type="text" id="phone_number" name="phone_number"
                                                        class="form-control" placeholder="Nomer Telepon ..." />
                                                    <div id="phone_numberError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" id="email" name="email" class="form-control"
                                                        placeholder="Email Donatur ..." />
                                                    <div id="emailError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="date" class="form-label">Tanggal Program</label>
                                                    <input type="date" id="date" name="date"
                                                        class="form-control">
                                                    <div id="dateError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div id="item-container">
                                                <div class="item-wrapper">
                                                    <div class="row my-3 item-donasi">
                                                        <div class="col-6">
                                                            <select class="form-select" name="goods[]"
                                                                aria-label="Default select example">
                                                                <option value="" hidden>Pilih Barang Yang Ingin
                                                                    diDonasikan</option>
                                                                @foreach ($goods as $good)
                                                                    <option value="{{ $good->id }}"
                                                                        data-percentage="{{ $good->percentage_available }}"
                                                                        data-stock="{{ $good->stock }}"
                                                                        data-capacity="{{ $good->capacity }}">
                                                                        {{ $good->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-3">
                                                            <input name="quantities[]" type="number" class="form-control"
                                                                placeholder="Jumlah ...">
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="button"
                                                                class="delete-product-button btn btn-sm btn-danger w-100 h-100"
                                                                style="border-radius: 10px"><i
                                                                    class="bx bx-trash me-1"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="capacity-status">
                                                            <div class="text-center"
                                                                style="width: 20%; color:black; background:#f86f2d; border-radius:10px">
                                                                Jumlah Tersisa</div>
                                                        </div>
                                                        <p class="text-center stock-text">Sisa Stock: -</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <button type="button" id="tambahBarang" class="btn btn-success">Tambah
                                                    Barang</button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" id="postSubmit"
                                                class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('donasi-barang.export') }}" hidden id="export-form">
                <input type="text" name="startDate" id="startDate">
                <input type="text" name="endDate" id="endDate">
            </form>
            <form action="{{ route('donasi-barang.index') }}" hidden id="search-form">
                <input type="text" name="startDate" id="startDateSearch">
                <input type="text" name="endDate" id="endDateSearch">
            </form>
            <div class="row pt-3 pb-5">
                <div class="d-flex col-md-10 px-4">
                    <input type="date" class="form-control" id="startInput">
                    <span class="px-1">__</span>
                    <input type="date" class="form-control" id="endInput">
                </div>
                <div class="d-flex col-md-2">
                    <button type="button" id="search-button" class="btn btn-success mx-2">
                        <i class='bx bx-search'></i>
                    </button>
                    <button type="button" id="export-button" class="btn btn-primary">
                        <i class='bx bx-export'></i>
                    </button>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-2 text-center fw-bold">Nama</th>
                                <th class="col-md-2 text-center fw-bold">Alamat</th>
                                <th class="col-md-2 text-center fw-bold">No Telepon</th>
                                <th class="col-md-3 text-center fw-bold">Barang yang diDonasikan</th>
                                <th class="col-md-5 text-center fw-bold">Status</th>
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
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->phone_number }}</td>
                                    <td>
                                        @foreach ($data->donateGoodDetails as $index => $detail)
                                            {{ $detail->goodsCategory->name }}{{ $index < $data->donateGoodDetails->count() - 1 ? ', ' : '' }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($data->status == 'success')
                                            <button type="button" class="btn rounded-pill btn-success"
                                                style="width: 100px;">
                                                Success</button>
                                        @else
                                            <button type="button" class="btn rounded-pill btn-danger"
                                                style="width: 100px;">
                                                Pending</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $data->id }}">
                                                    <i class="bx bx-detail me-1"></i> Detail
                                                </a>
                                                @if ($data->status == 'success')
                                                    <a class="dropdown-item" href="javascript:void(0);" id="pending"
                                                        data-id="{{ $data->id }}">
                                                        <i class='bx bx-checkbox-minus'></i> Pending
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="javascript:void(0);" id="success"
                                                        data-id="{{ $data->id }}">
                                                        <i class='bx bx-check-square'></i> Success
                                                    </a>
                                                @endif
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
                                                Nama Donatur
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $data->name }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Alamat Donatur
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $data->address }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Nomer Telepon Donatur
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $data->phone_number }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Email Donatur
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $data->email }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Total Donasi
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ 'Rp ' . number_format($data->total_amount, 0, ',', '.') }}
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
                                            {{ $data->description }}
                                        </div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-50 d-flex fw-bold">
                                            <div class="w-75">
                                                Status
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            @if ($data->status == 'success')
                                                <button type="button" class="btn rounded-pill btn-success"
                                                    style="width: 100px;">
                                                    Success</button>
                                            @else
                                                <button type="button" class="btn rounded-pill btn-danger"
                                                    style="width: 100px;">
                                                    Pending</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-2 border-bottom">
                                <div class="px-3">
                                    <h5 class="px-2">Data Detail Donasi Barang</h5>
                                    <div class="row py-2 px-4">
                                        <div class="col fw-bold">
                                            Nama Barang
                                        </div>
                                        <div class="col fw-bold">
                                            Jumlah
                                        </div>
                                        <div class="col fw-bold">
                                            Satuan
                                        </div>
                                    </div>
                                    @foreach ($data->donateGoodDetails as $detail)
                                        <div class="row py-2 px-4">
                                            <div class="col">
                                                {{ $loop->iteration + $initialNumber }}.
                                                {{ $detail->goodsCategory->name }}
                                            </div>
                                            <div class="col">
                                                x {{ $detail->quantity }}
                                            </div>
                                            <div class="col">
                                                {{ $detail->goodsCategory->unit }}
                                            </div>
                                        </div>
                                    @endforeach
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
    @include('admin.donasi.js.donasi-barang');
@endsection
