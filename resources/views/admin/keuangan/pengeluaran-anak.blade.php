@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Pengeluaran Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Pengeluaran Anak Asuh
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content-pengeluaran">

                            </div>
                            <div class="demo-inline-spacing">
                                <div class="btn-group" id="dropdown-icon-demo">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bx bx-plus m-1"></i> Tambah Data
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#pengeluaranKesehatan"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="bx bx-plus scaleX-n1-rtl"></i>Pengeluaran Kesehatan Anak</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#pengeluaranPendidikan"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="bx bx-plus scaleX-n1-rtl"></i>Pengeluaran Pendidikan Anak</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i
                                                    class="bx bx-plus scaleX-n1-rtl"></i>Pengeluaran Prestasi Anak</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="pengeluaranKesehatan" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center">Pilih Data Kesehatan</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-header">
                                        <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" id="tab-justified-home" class="nav-link"
                                                    role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-justified-home"
                                                    aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                    <span class="d-none d-sm-block">
                                                        Tabel Data Kesehatan Anak</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-datatable table-responsive">
                                            @if ($childHealths->count() > 0)
                                                <table class="datatables-basic table border-top quick-sand"
                                                    id="kategoriBarangTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-md-1 text-center fw-bold">No</th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Anak</th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Penyakit</th>
                                                            <th class="col-md-1 text-center fw-bold">Tanggal Sakit</th>
                                                            <th class="col-md-1 text-center fw-bold">Deskripsi</th>
                                                            <th class="col-md-1 text-center fw-bold">Status</th>
                                                            <th class="col-md-1 text-center fw-bold">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php
                                                            $initialNumber = $childHealths->firstItem() - 1;
                                                        @endphp
                                                        @foreach ($childHealths as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration + $initialNumber }}</td>
                                                                <td>{{ $data->childrens->name }}</td>
                                                                <td>{{ $data->diseases->name }}</td>
                                                                <td>{{ $data->date_of_illness }}</td>
                                                                <td>{{ $data->description }}</td>
                                                                <td>
                                                                    @if ($data->status == 'Sudah Sembuh')
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-success"
                                                                            style="width: 100px;">
                                                                            Sembuh</button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-danger sakitBtn"
                                                                            style="width: 100px;">
                                                                            Sakit</button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn rounded-pill btn-warning"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#dataPengeluaranKesehatan{{ $data->id }}"
                                                                        style="width: 100px;" data-id="{{ $data->id }}">
                                                                        Pilih</button>
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
                                                        <li
                                                            class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                                            <a class="page-link" href="{{ $datas->url(1) }}">
                                                                <i class="tf-icon bx bx-chevrons-left"></i>
                                                            </a>
                                                        </li>
                                                        <!-- Previous Page -->
                                                        <li
                                                            class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
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
                                                            <li
                                                                class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $datas->url($i) }}">{{ $i }}</a>
                                                            </li>
                                                        @endfor
                                                        <!-- Next Page -->
                                                        <li
                                                            class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
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
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="pengeluaranPendidikan" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center">Pilih Data Pendidikan</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-header">
                                        <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" id="tab-justified-home" class="nav-link"
                                                    role="tab" data-bs-toggle="tab"
                                                    data-bs-target="#navs-justified-home"
                                                    aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                    <span class="d-none d-sm-block">
                                                        Tabel Data Pendidikan Anak</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-datatable table-responsive">
                                            @if ($childEducations->count() > 0)
                                                <table class="datatables-basic table border-top quick-sand"
                                                    id="kategoriBarangTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="col-md-1 text-center fw-bold">No</th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Anak</th>
                                                            <th class="col-md-1 text-center fw-bold">Jenjang Pendidikan
                                                            </th>
                                                            <th class="col-md-1 text-center fw-bold">Nama Sekolah</th>
                                                            <th class="col-md-1 text-center fw-bold">Kelas</th>
                                                            <th class="col-md-1 text-center fw-bold">Status</th>
                                                            <th class="col-md-1 text-center fw-bold">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php
                                                            $initialNumber = $childEducations->firstItem() - 1;
                                                        @endphp
                                                        @foreach ($childEducations as $data)
                                                            <tr>
                                                                <td>{{ $loop->iteration + $initialNumber }}</td>
                                                                <td>{{ $data->childrens->name }}</td>
                                                                <td>{{ $data->education_level }}</td>
                                                                <td>{{ $data->schools->name }}</td>
                                                                <td>{{ $data->class }} ({{ $data->class_name }})</td>
                                                                <td>
                                                                    @if ($data->status == 'Aktif')
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-success"
                                                                            style="width: 100px;">
                                                                            Aktif</button>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn rounded-pill btn-danger sakitBtn"
                                                                            style="width: 100px;">
                                                                            Non-aktif</button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn rounded-pill btn-warning"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#dataPengeluaranPendidikan{{ $data->id }}"
                                                                        style="width: 100px;"
                                                                        data-id="{{ $data->id }}">
                                                                        Pilih</button>
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
                                                        <li
                                                            class="page-item first {{ $datas->onFirstPage() ? 'disabled' : '' }}">
                                                            <a class="page-link" href="{{ $datas->url(1) }}">
                                                                <i class="tf-icon bx bx-chevrons-left"></i>
                                                            </a>
                                                        </li>
                                                        <!-- Previous Page -->
                                                        <li
                                                            class="page-item prev {{ $datas->onFirstPage() ? 'disabled' : '' }}">
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
                                                            <li
                                                                class="page-item {{ $datas->currentPage() == $i ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ $datas->url($i) }}">{{ $i }}</a>
                                                            </li>
                                                        @endfor
                                                        <!-- Next Page -->
                                                        <li
                                                            class="page-item next {{ $datas->hasMorePages() ? '' : 'disabled' }}">
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
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                        @foreach ($childHealths as $data)
                            <div class="modal fade modal-pengeluaran" id="dataPengeluaranKesehatan{{ $data->id }}"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Tambah Data Pengeluaran Kesehatan</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header">
                                            <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link" role="tab"
                                                        data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                        aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                        <span class="d-none d-sm-block">
                                                            Tambah Data Pengeluaran Kesehatan Anak</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pengeluaran-anak.store') }}"
                                                id="formPengeluaranKesehatan{{ $data->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <input type="text" name="type_cost" value="Kesehatan"
                                                                    hidden>
                                                                <input type="text" name="data_id"
                                                                    value="{{ $data->id }}" hidden>
                                                                <div class="mb-3">
                                                                    <label for="title{{ $data->id }}"
                                                                        class="form-label">Nama
                                                                        Pengeluaran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="title{{ $data->id }}" name="title"
                                                                        placeholder="Operasi..." />
                                                                    <div id="titleError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3" id="costInput">
                                                                    <label for="total_cost{{ $data->id }}"
                                                                        class="form-label">Biaya
                                                                        Pengeluaran</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text">Rp</span>
                                                                        <input type="text" class="form-control"
                                                                            id="total_cost{{ $data->id }}"
                                                                            name="total_cost" placeholder="5,000"
                                                                            oninput="formatAmount(this)" />
                                                                        <div id="total_costError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary submitKesehatan"
                                                        data-id="{{ $data->id }}">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($childEducations as $data)
                            <div class="modal fade modal-pengeluaran" id="dataPengeluaranPendidikan{{ $data->id }}"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="text-center">Tambah Data Pengeluaran Pendidikan</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-header">
                                            <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                <li class="nav-item">
                                                    <button type="button" class="nav-link" role="tab"
                                                        data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                        aria-controls="navs-justified-home" aria-selected="true" disabled>
                                                        <span class="d-none d-sm-block">
                                                            Tambah Data Pengeluaran Pendidikan Anak</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pengeluaran-anak.store') }}"
                                                id="pengeluaranPendidikan{{ $data->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <input type="text" name="type_cost" value="Pendidikan"
                                                                    hidden>
                                                                <input type="text" name="data_id"
                                                                    value="{{ $data->id }}" hidden>
                                                                <div class="mb-3">
                                                                    <label for="title{{ $data->id }}"
                                                                        class="form-label">Nama
                                                                        Pengeluaran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="title{{ $data->id }}" name="title"
                                                                        placeholder="Pembayaran SPP..." />
                                                                    <div id="titleError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3" id="costInput">
                                                                    <label for="total_cost{{ $data->id }}"
                                                                        class="form-label">Biaya
                                                                        Pengeluaran</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text">Rp</span>
                                                                        <input type="text" class="form-control"
                                                                            id="total_cost{{ $data->id }}"
                                                                            name="total_cost" placeholder="5,000"
                                                                            oninput="formatAmount(this)" />
                                                                        <div id="total_costError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary submitPendidikan"
                                                        data-id="{{ $data->id }}">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-2 text-center fw-bold">Jenis Pengeluaran</th>
                                <th class="col-md-5 text-center fw-bold">Judul</th>
                                <th class="col-md-3 text-center fw-bold">Total Pengeluaran</th>
                                <th class="col-md-3 text-center fw-bold">Status</th>
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
                                    <td>
                                        @if ($data->reference_table == 'child_health_table')
                                            Kesehatan
                                        @elseif($data->reference_table == 'child_education_table')
                                            Pendidikan
                                        @elseif ($data->reference_table == 'child_achievement_table')
                                            Prestasi
                                        @else
                                            Pengeluaran Lainnya
                                        @endif
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ 'RP ' . number_format($data->total_cost, 0, ',', '.') }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
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
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

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

    <script>
        $(document).ready(function() {
            // Setup CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function clearForm() {
                $('#title').val('');
                $('#total_cost').val('');
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            }

            function showSuccessMessage(message) {
                Swal.fire({
                    icon: 'success',
                    title: message,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }

            function showErrorMessage(message) {
                Swal.fire({
                    icon: 'error',
                    title: message,
                });
            }

            $('.modal-pengeluaran').on('hidden.bs.modal', function() {
                clearForm();
            });

            $('.submitKesehatan').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                simpanKesehatan(id);
                return false;
            });

            $('.submitPendidikan').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                simpanPendidikan(id);
                return false;
            });

            function simpanKesehatan(id) {
                var formData = new FormData($('#formPengeluaranKesehatan' + id)[0]);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: "{{ route('pengeluaran-anak.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            console.log('Error Response:', response);
                        } else {
                            showSuccessMessage(response.success);
                            $('#dataPengeluaranKesehatan').modal('hide');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                        console.log("Response:", jqXHR.responseText);
                    }
                });
            }

            function simpanPendidikan(id) {
                var formData = new FormData($('#pengeluaranPendidikan' + id)[0]);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: "{{ route('pengeluaran-anak.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            console.log('Error Response:', response);
                        } else {
                            showSuccessMessage(response.success);
                            $('#dataPengeluaranPendidikan').modal('hide');
                        }
                    }
                });
            }

            // Event click pada tombol "Save Changes" pada modal edit
            $('.updateSubmit').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                update(id);
            });

            function update(id) {
                $.ajax({
                    url: "{{ url('master-data/daftar-sekolah') }}/" + id,
                    type: 'PATCH',
                    data: new FormData($('#dataAnakForm')[0]),
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.name) {
                                $('#editName' + id).addClass('is-invalid');
                                $('#editNameError' + id).text(response.errors.name[0]);
                            }
                            // Penanganan error lainnya jika diperlukan
                        } else {
                            showSuccessMessage(response.success);
                            $('#editModal' + id).modal('hide');
                        }
                    }
                });
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-data');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dataId = this.getAttribute('data-id');
                    if (dataId) {
                        showDeleteConfirmation(dataId);
                    }
                });
            });

            function showDeleteConfirmation(dataId) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    allowOutsideClick: false, // Menonaktifkan interaksi dengan elemen di luar popup
                    allowEscapeKey: false, // Menonaktifkan tombol escape
                    backdrop: 'rgba(0,0,0,0.5)', // Menonaktifkan klik di belakang popup
                    clickToClose: false, // Tidak mengizinkan pengguna menutup dengan mengklik
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim permintaan Ajax untuk menghapus data
                        deleteData(dataId);
                    }
                });
            }

            function deleteData(dataId) {
                // Kirim permintaan Ajax ke server
                fetch(`/keuangan/pengeluaran-anak/${dataId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: 'Data berhasil dihapus.',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Kesalahan!',
                                text: 'Terjadi kesalahan saat menghapus data.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
@endsection
