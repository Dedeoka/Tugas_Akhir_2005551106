@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Kesehatan Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex justify-content-between">
                <div class="m-3 quick-sand">
                    <h3>
                        Tabel Data Kesehatan Anak Asuh
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3 px-5">
                        <div class="d-flex justify-content-end">
                            <div class="">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exLargeModal">
                                    <i class='bx bx-plus m-1'></i>
                                    Tambah Data
                                </button>
                                <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-center">Tambah Data Anak Asuh</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-header">
                                                <ul class="nav nav-pills nav-fill w-100" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-home"
                                                            class="nav-link active" role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-home"
                                                            aria-controls="navs-justified-home" aria-selected="true"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Kesehatan Anak</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <form id="dataAnakForm" action="{{ route('kesehatan-anak.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="nav-align-top mb-4">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active"
                                                                        id="navs-justified-home" role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <div class="mb-3">
                                                                                    <label for="children_id"
                                                                                        class="form-label">Nama
                                                                                        Anak</label>
                                                                                    <select class="form-select"
                                                                                        id="children_id" name="children_id"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Nama Anak Asuh
                                                                                        </option>
                                                                                        @foreach ($childs as $child)
                                                                                            <option
                                                                                                value="{{ $child->id }}">
                                                                                                {{ $child->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div id="childrenError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="disease_id"
                                                                                        class="form-label">Nama
                                                                                        Penyakit</label>
                                                                                    <select class="form-select"
                                                                                        id="disease_id" name="disease_id"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Nama Penyakit
                                                                                        </option>
                                                                                        @foreach ($diseases as $disease)
                                                                                            <option
                                                                                                value="{{ $disease->id }}">
                                                                                                {{ $disease->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div id="diseaseError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="medicine"
                                                                                        class="form-label">Nama
                                                                                        Obat</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="medicine"
                                                                                        name="medicine"
                                                                                        placeholder="Nama Obat..." />
                                                                                    <div id="medicineError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label class="form-label d-block">Status
                                                                                        Kesehatan</label>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio" name="status"
                                                                                            id="sedangSakit"
                                                                                            value="Sedang Sakit" />
                                                                                        <label class="form-check-label"
                                                                                            for="sedangSakit">Sedang
                                                                                            Sakit</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio" name="status"
                                                                                            id="sudahSembuh"
                                                                                            value="Sudah Sembuh" />
                                                                                        <label class="form-check-label"
                                                                                            for="sudahSembuh">Sudah
                                                                                            Sembuh</label>
                                                                                    </div>
                                                                                    <div id="statusError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="date_of_illness"
                                                                                        class="form-label">Tanggal
                                                                                        Sakit</label>
                                                                                    <input class="form-control"
                                                                                        type="date"
                                                                                        id="date_of_illness"
                                                                                        name="date_of_illness" />
                                                                                    <div id="date_of_illnessError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3"
                                                                                    id="recoveryDateInput">
                                                                                    <label for="recovery_date"
                                                                                        class="form-label">Tanggal
                                                                                        Sembuh</label>
                                                                                    <input class="form-control"
                                                                                        type="date" id="recovery_date"
                                                                                        name="recovery_date" />
                                                                                    <div id="recovery_dateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label d-block">Pembayaran
                                                                                        Pemeriksaan dan Obat
                                                                                        Menggunakan</label>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="payment_method"
                                                                                            id="biayaPanti"
                                                                                            value="Biaya Panti Asuhan"
                                                                                            onchange="handlePaymentMethodChange()" />
                                                                                        <label class="form-check-label"
                                                                                            for="biayaPanti">Biaya Panti
                                                                                            Asuhan</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="payment_method"
                                                                                            id="bpjs"
                                                                                            value="KIS/BPJS"
                                                                                            onchange="handlePaymentMethodChange()" />
                                                                                        <label class="form-check-label"
                                                                                            for="bpjs">KIS/BPJS</label>
                                                                                    </div>
                                                                                    <div id="paymentError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3" id="medicalCostInput">
                                                                                    <label for="medical_check_cost"
                                                                                        class="form-label">Biaya
                                                                                        Pemeriksaan</label>
                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <span
                                                                                            class="input-group-text">Rp</span>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="medical_check_cost"
                                                                                            name="medical_check_cost"
                                                                                            placeholder="5,000"
                                                                                            oninput="formatAmount(this)" />
                                                                                        <div id="medicalCostError"
                                                                                            class="invalid-feedback"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3" id="drugCostInput">
                                                                                    <label for="drug_cost"
                                                                                        class="form-label">Biaya
                                                                                        Obat</label>
                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <span
                                                                                            class="input-group-text">Rp</span>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="drug_cost"
                                                                                            name="drug_cost"
                                                                                            placeholder="5,000"
                                                                                            oninput="formatAmount(this)" />
                                                                                        <div id="drugCostError"
                                                                                            class="invalid-feedback"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="form-label">Deskripsi
                                                                                        Kesehatan</label>
                                                                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                                                    <div id="descriptionError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" id="btnNextProfile"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
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
                                <th class="col-md-1 text-center fw-bold">Nama Anak</th>
                                <th class="col-md-1 text-center fw-bold">Nama Penyakit</th>
                                <th class="col-md-1 text-center fw-bold">Obat Penyakit</th>
                                <th class="col-md-1 text-center fw-bold">Tanggal Sakit</th>
                                <th class="col-md-1 text-center fw-bold">Deskripsi</th>
                                <th class="col-md-1 text-center fw-bold">Status</th>
                                <th class="col-md-1 text-center fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $initialNumber = $datas->firstItem() - 1;
                            @endphp
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration + $initialNumber }}</td>
                                    <td>{{ $data->childrens->name }}</td>
                                    <td>{{ $data->diseases->name }}</td>
                                    <td>{{ $data->medicine }}</td>
                                    <td>{{ $data->date_of_illness }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>
                                        @if ($data->status == 'Sudah Sembuh')
                                            <button type="button" class="btn rounded-pill btn-success"
                                                style="width: 100px;">
                                                Sembuh</button>
                                        @else
                                            <button type="button" class="btn rounded-pill btn-danger sakitBtn"
                                                style="width: 100px;" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $data->id }}">
                                                Sakit</button>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Data Data Anak Asuh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('kesehatan-anak.update', $data->id) }}" data-id="{{ $data->id }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="recovery_date{{ $data->id }}"
                                                        class="form-label">Tanggal
                                                        Sembuh</label>
                                                    <input class="form-control" type="date"
                                                        id="recovery_date{{ $data->id }}" name="recovery_date" />
                                                    <div id="recovery_dateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="medicine{{ $data->id }}" class="form-label">
                                                        Obat Tambahan</label>
                                                    <input type="text" class="form-control"
                                                        id="medicine{{ $data->id }}" name="medicine"
                                                        placeholder="Obat Tambahan..." />
                                                    <div id="medicineError{{ $data->id }}" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label d-block">Pembayaran
                                                        Pemeriksaan dan Obat
                                                        Tambahan Menggunakan</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" id="biayaPanti{{ $data->id }}"
                                                            value="Biaya Panti Asuhan"
                                                            onchange="handlePaymentEditChange({{ $data->id }})" />
                                                        <label class="form-check-label"
                                                            for="biayaPanti{{ $data->id }}">Biaya Panti
                                                            Asuhan</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" id="bpjs{{ $data->id }}"
                                                            value="KIS/BPJS"
                                                            onchange="handlePaymentEditChange({{ $data->id }})" />
                                                        <label class="form-check-label"
                                                            for="bpjs{{ $data->id }}">KIS/BPJS/Tidak Ada Biaya
                                                            Tambahan</label>
                                                    </div>
                                                    <div id="paymentError" class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3" id="medicalCostInput{{ $data->id }}">
                                                    <label for="medical_check_cost{{ $data->id }}"
                                                        class="form-label">Biaya
                                                        Tambahan Pemeriksaan</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="text" class="form-control"
                                                            id="medical_check_cost{{ $data->id }}"
                                                            name="medical_check_cost" placeholder="5,000"
                                                            oninput="formatAmount(this)" />
                                                        <div id="medicalCostError{{ $data->id }}"
                                                            class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3" id="drugCostInput{{ $data->id }}">
                                                    <label for="drug_cost{{ $data->id }}" class="form-label">Biaya
                                                        Tambahan
                                                        Obat</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="text" class="form-control"
                                                            id="drug_cost{{ $data->id }}" name="drug_cost"
                                                            placeholder="5,000" oninput="formatAmount(this)" />
                                                        <div id="drugCostError{{ $data->id }}"
                                                            class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary updateSubmit"
                                        data-id="{{ $data->id }}">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($datas as $data)
                <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h3 class="text-center">Detail Data Sakit {{ $data->childrens->name }}
                                </h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between pb-2 mb-4 border-bottom">
                                    <div class="">

                                    </div>
                                    <div class="w-75 d-flex">
                                        <div class="w-50">
                                            <img src="{{ asset('storage/avatar/avatar-cowok1.jpeg') }}" alt=""
                                                class="mx-auto d-block" style="max-width: 100%; height: 100%;">
                                        </div>
                                        <div class="w-50">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Nama Anak</strong>:
                                                    {{ $data->childrens->name }}</li>
                                                <li class="list-group-item"><strong>Jenis Kelamin</strong>:
                                                    {{ $data->childrens->gender }}
                                                </li>
                                                @php
                                                    // Tanggal lahir dari $data->childrens->date_of_birth
                                                    $tanggal_lahir = $data->childrens->date_of_birth;

                                                    // Ubah format tanggal lahir menjadi objek DateTime
                                                    $tanggal_lahir_obj = new DateTime($tanggal_lahir);

                                                    // Tanggal sekarang
                                                    $tanggal_sekarang = new DateTime();

                                                    // Hitung selisih tahun antara tanggal lahir dan tanggal sekarang
                                                    $umur_tahun = $tanggal_lahir_obj->diff($tanggal_sekarang)->y;
                                                @endphp
                                                <li class="list-group-item"><strong>Umur</strong>:
                                                    {{ $umur_tahun }}
                                                </li>
                                                <li class="list-group-item"><strong>Tanggal Lahir</strong>:
                                                    {{ $data->childrens->date_of_birth }}
                                                </li>
                                                <li class="list-group-item"><strong>Penyakit Bawaan</strong>:
                                                    {{ $data->childrens->congenital_disease }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="">

                                    </div>
                                </div>
                                <div class="pb-3 border-bottom">
                                    <div class="px-3">
                                        <h5>Data Detail Penyakit</h5>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Nama Penyakit
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->diseases->name }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Nama Obat
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->medicine }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Biaya Obat
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                Rp {{ $data->drug_cost }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Biaya Pemeriksaan
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                Rp {{ $data->medical_check_cost }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        @php
                                            // Mengambil data medical_check_cost dan drug_cost dari variabel $data
                                            $medical_check_cost = $data->medical_check_cost;
                                            $drug_cost = $data->drug_cost;

                                            // Melakukan penjumlahan
                                            $total_cost = $medical_check_cost + $drug_cost;
                                        @endphp
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Biaya Total
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                Rp {{ $total_cost }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Metode Pembayaran
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->payment_method }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Tanggal Sakit
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->date_of_illness }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Tanggal Sembuh
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->recovery_date }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
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
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Status
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                @if ($data->status == 'Sudah Sembuh')
                                                    <button type="button" class="btn rounded-pill btn-success">
                                                        Sudah Sembuh</button>
                                                @elseif ($data->status == 'Sedang Sakit')
                                                    <button type="button" class="btn rounded-pill btn-warning">
                                                        Sedang Sakit</button>
                                                @endif
                                            </div>
                                            <div class="w-25"></div>
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
    @include('admin.anak-asuh.js.kesehatan-anak-asuh')
@endsection
