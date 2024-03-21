@extends('layouts.admin')

@section('style')
    <style>
        .list-group-item {
            border: none;
            /* Menghilangkan border */
        }

        .list-group-item strong {
            display: inline-block;
            width: 150px;
            /* Atur lebar label sesuai kebutuhan */
            margin-right: 10px;
            /* Atur jarak antara label dan isinya */
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Pendidikan Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Pendidikan Anak Asuh
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
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
                                                <h3 class="text-center">Tambah Data Pendidikan Anak</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-header">
                                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-home"
                                                            class="nav-link active" role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-home"
                                                            aria-controls="navs-justified-home" aria-selected="true"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Pendidikan Anak</span>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-profile" class="nav-link"
                                                            role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-profile"
                                                            aria-controls="navs-justified-profile" aria-selected="false"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Wali Kelas</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <form id="dataAnakForm" action="{{ route('pendidikan-anak.store') }}"
                                                    method="POST" enctype="multipart/form-data">
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
                                                                                    <div id="children_idError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label d-block">Jenjang
                                                                                        Pendidikan</label>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="education_level"
                                                                                            id="tk" value="TK" />
                                                                                        <label class="form-check-label"
                                                                                            for="tk">TK</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="education_level"
                                                                                            id="sd" value="SD" />
                                                                                        <label class="form-check-label"
                                                                                            for="sd">SD</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="education_level"
                                                                                            id="smp"
                                                                                            value="SMP" />
                                                                                        <label class="form-check-label"
                                                                                            for="smp">SMP</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-check form-check-inline">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="education_level"
                                                                                            id="sma"
                                                                                            value="SMA/SMK" />
                                                                                        <label class="form-check-label"
                                                                                            for="sma">SMA/SMK</label>
                                                                                    </div>
                                                                                    <div id="education_levelError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="school_id"
                                                                                        class="form-label">Nama
                                                                                        Sekolah</label>
                                                                                    <select class="form-select"
                                                                                        id="school_id" name="school_id"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Nama Sekolah
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="schoold_idError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="class"
                                                                                        class="form-label">Kelas
                                                                                    </label>
                                                                                    <select class="form-select"
                                                                                        id="class" name="class"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Kelas
                                                                                        </option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                        <option value="6">6</option>
                                                                                        <option value="7">7</option>
                                                                                        <option value="8">8</option>
                                                                                        <option value="9">9</option>
                                                                                        <option value="10">10</option>
                                                                                        <option value="11">11</option>
                                                                                        <option value="12">12</option>
                                                                                    </select>
                                                                                    <div id="classError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="class_name"
                                                                                        class="form-label">Nama
                                                                                        Kelas(Contoh : A)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="class_name" name="class_name"
                                                                                        placeholder="Nama Kelas..." />
                                                                                    <div id="class_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="start_date"
                                                                                        class="form-label">Tanggal
                                                                                        Mulai</label>
                                                                                    <input class="form-control"
                                                                                        type="date" id="start_date"
                                                                                        name="start_date" />
                                                                                    <div id="start_dateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="end_date"
                                                                                        class="form-label">Tanggal
                                                                                        Berakhir</label>
                                                                                    <input class="form-control"
                                                                                        type="date" id="end_date"
                                                                                        name="end_date" />
                                                                                    <div id="end_dateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="status"
                                                                                        class="form-label">Status</label>
                                                                                    <select class="form-select"
                                                                                        id="status" name="status"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Status Pendidikan</option>
                                                                                        <option value="Aktif">Aktif
                                                                                        </option>
                                                                                        <option value="Lulus">Lulus
                                                                                        </option>
                                                                                        <option value="Tidak Lulus">Tidak
                                                                                            Lulus
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="statusError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" id="btnNextProfile"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Berikutnya</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">Cancel</button>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="navs-justified-profile"
                                                                        role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_name"
                                                                                        class="form-label">Nama
                                                                                        Wali Kelas</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_name"
                                                                                        name="guardian_name"
                                                                                        placeholder="Nama Wali Kelas..." />
                                                                                    <div id="guardian_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_address"
                                                                                        class="form-label">Alamat Wali
                                                                                        Kelas</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_address"
                                                                                        name="guardian_address"
                                                                                        placeholder="Alamat Wali Kelas..." />
                                                                                    <div id="guardian_addressError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_phone"
                                                                                        class="form-label">Nomor Wali
                                                                                        Kelas</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_phone"
                                                                                        name="guardian_phone"
                                                                                        placeholder="Nomor Wali Kelas..." />
                                                                                    <div id="guardian_phoneError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            id="btnPrevHome">Sebelumnya</button>
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
                                <th class="col-md-1 text-center fw-bold">Jenjang Pendidikan</th>
                                <th class="col-md-1 text-center fw-bold">Nama Sekolah</th>
                                <th class="col-md-1 text-center fw-bold">Kelas</th>
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
                                    <td>{{ $data->education_level }}</td>
                                    <td>{{ $data->schools->name }}</td>
                                    <td>{{ $data->class }} ({{ $data->class_name }})</td>
                                    <td>
                                        @if ($data->status == 'Aktif')
                                            <button type="button" class="btn rounded-pill btn-success"
                                                style="width: 100px;">
                                                Aktif</button>
                                        @elseif ($data->status == 'Lulus')
                                            <button type="button" class="btn rounded-pill btn-warning"
                                                style="width: 100px;">
                                                Lulus</button>
                                        @else
                                            <button type="button" class="btn rounded-pill btn-danger"
                                                style="width: 100px;">
                                                Tidak Lulus</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item editBtnEducation" href="javascript:void(0);"
                                                    data-id="{{ $data->id }}">
                                                    <i
                                                        class="bx
                                                    bx-edit-alt me-1"></i>
                                                    Edit
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
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-center">Edit Data Pendidikan Anak</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-header">
                    <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                        <li class="nav-item">
                            <button type="button" id="tab-justified-home-edit" class="nav-link active" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                aria-controls="navs-justified-home" aria-selected="true" disabled>
                                <span class="d-none d-sm-block">
                                    Data Pendidikan Anak</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="tab-justified-profile-edit" class="nav-link" role="tab"
                                data-bs-toggle="tab" data-bs-target="#navs-justified-profile"
                                aria-controls="navs-justified-profile" aria-selected="false" disabled>
                                <span class="d-none d-sm-block">
                                    Data Wali Kelas</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <form id="updateDataEducation" action="#" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden id="updateForm">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="">
                                <div class="nav-align-top mb-4">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-justified-home-edit"
                                            role="tabpanel">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="children_id" class="form-label">Nama
                                                            Anak</label>
                                                        <input type="text" class="form-control" id="child_name_edit"
                                                            disabled />
                                                        <div id="children_idError" class="invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <input type="text" name="children_idEdit" id="children_idEdit"
                                                        hidden>
                                                    <div class="mb-3">
                                                        <label class="form-label d-block">Jenjang
                                                            Pendidikan</label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="education_levelEdit" id="tkEdit"
                                                                value="TK" />
                                                            <label class="form-check-label" for="tk">TK</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="education_levelEdit" id="sdEdit"
                                                                value="SD" />
                                                            <label class="form-check-label" for="sd">SD</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="education_levelEdit" id="smpEdit"
                                                                value="SMP" />
                                                            <label class="form-check-label" for="smp">SMP</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="education_levelEdit" id="smaEdit"
                                                                value="SMA/SMK" />
                                                            <label class="form-check-label" for="sma">SMA/SMK</label>
                                                        </div>
                                                        <div id="education_levelEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="school_idEdit" class="form-label">Nama
                                                            Sekolah</label>
                                                        <select class="form-select" id="school_idEdit" name="school_id"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>
                                                                Pilih Nama Sekolah
                                                            </option>
                                                        </select>
                                                        <div id="school_idEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="class" class="form-label">Kelas
                                                        </label>
                                                        <select class="form-select" id="classEdit" name="class"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>
                                                                Pilih Kelas
                                                            </option>
                                                        </select>
                                                        <div id="classEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="class_name" class="form-label">Nama
                                                            Kelas(Contoh : A)</label>
                                                        <input type="text" class="form-control" id="class_nameEdit"
                                                            name="class_name" placeholder="Nama Kelas..." />
                                                        <div id="class_nameEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="start_date" class="form-label">Tanggal
                                                            Mulai</label>
                                                        <input class="form-control" type="date" id="start_dateEdit"
                                                            name="start_date" />
                                                        <div id="start_dateEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="end_date" class="form-label">Tanggal
                                                            Berakhir</label>
                                                        <input class="form-control" type="date" id="end_dateEdit"
                                                            name="end_date" />
                                                        <div id="end_dateEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="statusEdit" name="status"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>
                                                                Status Pendidikan</option>
                                                            <option value="Aktif">Aktif
                                                            </option>
                                                            <option value="Lulus">Lulus
                                                            </option>
                                                            <option value="Tidak Lulus">Tidak
                                                                Lulus
                                                            </option>
                                                        </select>
                                                        <div id="statusEditError" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="btnNextProfileEdit"
                                                class="btn btn-primary mb-2 d-grid w-100">Berikutnya</button>
                                            <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                                data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                        <div class="tab-pane fade" id="navs-justified-profile-edit" role="tabpanel">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="guardian_name" class="form-label">Nama
                                                            Wali Kelas</label>
                                                        <input type="text" class="form-control" id="guardian_nameEdit"
                                                            name="guardian_name" placeholder="Nama Wali Kelas..." />
                                                        <div id="guardian_nameEditError" class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guardian_address" class="form-label">Alamat Wali
                                                            Kelas</label>
                                                        <input type="text" class="form-control"
                                                            id="guardian_addressEdit" name="guardian_address"
                                                            placeholder="Alamat Wali Kelas..." />
                                                        <div id="guardian_addressEditError" class="invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guardian_phone" class="form-label">Nomor Wali
                                                            Kelas</label>
                                                        <input type="text" class="form-control"
                                                            id="guardian_phoneEdit" name="guardian_phone"
                                                            placeholder="Nomor Wali Kelas..." />
                                                        <div id="guardian_phoneEditError" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                            <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                                id="btnPrevHomeEdit">Sebelumnya</button>
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

    @foreach ($datas as $data)
        <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h3 class="text-center">Detail Data Pendidikan {{ $data->childrens->name }}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex pb-2 mb-4 border-bottom">
                            <div class="w-25 mx-5">
                                <img src="{{ asset('storage/avatar/avatar-cowok1.jpeg') }}" alt=""
                                    class="mx-auto d-block" style="max-width: 100%; height: 100%;">
                            </div>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nama Siswa</strong>:
                                        {{ $data->childrens->name }}</li>
                                    <li class="list-group-item"><strong>Nama Sekolah</strong>: {{ $data->schools->name }}
                                    </li>
                                    <li class="list-group-item"><strong>Jenjang Pendidikan</strong>:
                                        {{ $data->education_level }}</li>
                                    <li class="list-group-item"><strong>Kelas</strong>:
                                        {{ $data->class }} ({{ $data->class_name }})</li>
                                    <li class="list-group-item"><strong>Tanggal Mulai</strong>:
                                        {{ $data->start_date }}</li>
                                    <li class="list-group-item"><strong>Tanggal Berakhir</strong>:
                                        {{ $data->end_date }}</li>
                                    <li class="list-group-item"><strong>Status</strong>:
                                        @if ($data->status == 'Aktif')
                                            <button type="button" class="btn rounded-pill btn-success">
                                                Aktif</button>
                                        @elseif ($data->status == 'Lulus')
                                            <button type="button" class="btn rounded-pill btn-warning">
                                                Lulus</button>
                                        @else
                                            <button type="button" class="btn rounded-pill btn-danger">
                                                Tidak Lulus
                                            </button>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pb-3">
                            <div class="d-flex">
                                <div class="w-50 px-2">
                                    <h5 class="px-2">Data Wali Kelas</h5>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($data->childEducationDetails as $detail)
                                            <li class="list-group-item"><strong>Nama Wali</strong>:
                                                {{ $detail->guardian_name }}</li>
                                            <li class="list-group-item"><strong>Alamat Wali</strong>:
                                                {{ $detail->guardian_address }}</li>
                                            <li class="list-group-item"><strong>Nomor Telepon</strong>:
                                                {{ $detail->guardian_phone }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="w-50 px-2">
                                    <h5 class="px-2">Data Sekolah</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Nama Sekolah</strong>:
                                            {{ $data->schools->name }}</li>
                                        <li class="list-group-item"><strong>Alamat Sekolah</strong>:
                                            {{ $data->schools->address }}</li>
                                        <li class="list-group-item"><strong>Nomor Telepon</strong>:
                                            {{ $data->schools->phone }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const allSchoolsEdit = {!! json_encode($schools) !!};


            $('.editBtnEducation').click(function() {
                var id = $(this).data('id');
                fetchEditEducation(id);
            });

            $('input[name="education_levelEdit"]').change(function() {
                handleEducationLevelChangeEdit(this.value);
            });

            function fetchEditEducation(id) {
                const nameEdit = document.getElementById('child_name_edit');
                const educationLevelRadioButtons = document.getElementsByName('education_levelEdit');
                const schoolEdit = document.getElementById('school_idEdit');
                const classEdit = document.getElementById('classEdit');
                const classNameEdit = document.getElementById('class_nameEdit');
                const startDateEdit = document.getElementById('start_dateEdit');
                const endDateEdit = document.getElementById('end_dateEdit');
                const statusEdit = document.getElementById('statusEdit');
                const guardianNameEdit = document.getElementById('guardian_nameEdit');
                const guardianAddressEdit = document.getElementById('guardian_addressEdit');
                const guardianPhoneEdit = document.getElementById('guardian_phoneEdit');
                const updateForm = document.getElementById('updateForm');
                const childrenEdit = document.getElementById('children_idEdit');

                $.ajax({
                    url: "{{ route('pendidikan-anak.show', ':id') }}".replace(':id', id),
                    type: 'GET',
                    success: function(response) {
                        $('#editModal').modal('show');
                        console.log(response);
                        nameEdit.value = response.childrens.name;

                        // Set education level radio button
                        educationLevelRadioButtons.forEach(function(radioButton) {
                            if (radioButton.value === response.education_level) {
                                radioButton.checked = true;
                                handleEducationLevelChangeEdit(response
                                    .education_level);
                            }
                        });

                        updateForm.value = id;

                        childrenEdit.value = response.children_id;

                        schoolEdit.value = response.school_id;

                        // Set class select
                        classEdit.value = response.class;

                        // Set class name input
                        classNameEdit.value = response.class_name;

                        // Set start date input
                        startDateEdit.value = response.start_date;

                        // Set end date input
                        endDateEdit.value = response.end_date;

                        // Set status select
                        statusEdit.value = response.status;
                        console.log(response.child_education_details[0].guardian_name);
                        guardianNameEdit.value = response.child_education_details[0].guardian_name;
                        guardianAddressEdit.value = response.child_education_details[0]
                            .guardian_address;
                        guardianPhoneEdit.value = response.child_education_details[0].guardian_phone;
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle errors
                        handleErrors(xhr.responseJSON.errors, id);
                    }
                });
            }

            // Function to handle education level change
            function handleEducationLevelChangeEdit(selectedEducationLevel) {
                // Reset options
                $('#school_idEdit').empty().append('<option value="" hidden>Pilih Nama Sekolah</option>');
                $('#classEdit').empty().append('<option value="" hidden>Pilih Kelas</option>');

                // Filter schools based on selected education level
                var filteredSchoolsEdit = allSchoolsEdit.filter(function(school) {
                    if (selectedEducationLevel === 'TK' && school.name.includes('TK')) {
                        return true;
                    } else if (selectedEducationLevel === 'SD' && school.name.includes('SD')) {
                        return true;
                    } else if (selectedEducationLevel === 'SMP' && school.name.includes('SMP')) {
                        return true;
                    } else if (selectedEducationLevel === 'SMA/SMK' && (school.name.includes('SMA') ||
                            school.name.includes('SMK'))) {
                        return true;
                    }
                    return false;
                });

                filteredSchoolsEdit.forEach(function(school) {
                    $('#school_idEdit').append('<option value="' + school.id + '">' + school.name +
                        '</option>');
                });

                if (selectedEducationLevel === 'TK') {
                    setTKOptionsEdit();
                } else if (selectedEducationLevel === 'SD') {
                    setClassOptionsEdit(1, 6);
                } else if (selectedEducationLevel === 'SMP') {
                    setClassOptionsEdit(7, 9);
                } else if (selectedEducationLevel === 'SMA/SMK') {
                    setClassOptionsEdit(10, 12);
                }
            }

            function setTKOptionsEdit() {
                $('#classEdit').empty().append('<option value="" hidden>Pilih Kelas</option>');

                // Add TK options
                $('#classEdit').append('<option value="TK Kecil">TK Kecil</option>');
                $('#classEdit').append('<option value="TK Besar">TK Besar</option>');
            }

            // Function to set class options based on selected education level
            function setClassOptionsEdit(start, end) {
                var classEdit = $('#classEdit');
                for (var i = start; i <= end; i++) {
                    classEdit.append('<option value="' + i + '">' + i + '</option>');
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#updateDataEducation').on('submit', function(e) {
                e.preventDefault();
                const updateId = document.getElementById('updateForm').value;
                update(updateId);
            });

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

            function update(id) {
                var formData = new FormData($('#updateDataEducation')[0]);

                formData.append('_method', 'patch');

                var url = "{{ url('anak-asuh/pendidikan-anak') }}" + '/' + id;

                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            handleErrors(response.errors);
                            showErrorMessage(
                                'Terdapat kesalahan pada inputan. Silahkan cek kembali semua form.');
                            console.log('Error Response:', response);
                        } else {
                            showSuccessMessage(response.success);
                            $('#editModal').modal('hide');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('XHR Response:', xhr.responseText);
                        showErrorMessage("An error occurred while updating data.");
                    }
                });
            }


            function handleErrors(errors) {
                clearErrors();
                if (errors.education_level) {
                    $('input[name="education_levelEdit"]').addClass('is-invalid');
                    $('#education_levelEditError').text(errors.education_level[0]);
                }
                if (errors.school_id) {
                    $('#school_idEdit').addClass('is-invalid');
                    $('#school_idEditError').text(errors.school_id[0]);
                }
                if (errors.start_date) {
                    $('#start_dateEdit').addClass('is-invalid');
                    $('#start_dateEditError').text(errors.start_date[0]);
                }
                if (errors.end_date) {
                    $('#end_dateEdit').addClass('is-invalid');
                    $('#end_dateEditError').text(errors.end_date[0]);
                }
                if (errors.class_name) {
                    $('#class_nameEdit').addClass('is-invalid');
                    $('#class_nameEditError').text(errors.class_name[0]);
                }
                if (errors.class) {
                    $('#classEdit').addClass('is-invalid');
                    $('#classEditError').text(errors.class[0]);
                }
                if (errors.status) {
                    $('#statusEdit').addClass('is-invalid');
                    $('#statusEditError').text(errors.status[0]);
                }
                if (errors.guardian_name) {
                    $('#guardian_nameEdit').addClass('is-invalid');
                    $('#guardian_nameEditError').text(errors.guardian_name[0]);
                }
                if (errors.guardian_address) {
                    $('#guardian_addressEdit').addClass('is-invalid');
                    $('#guardian_addressEditError').text(errors.guardian_address[0]);
                }
                if (errors.guardian_phone) {
                    $('#guardian_phoneEdit').addClass('is-invalid');
                    $('#guardian_phoneEditError').text(errors.guardian_phone[0]);
                }
            }

            function clearErrors() {
                document.querySelectorAll('.form-control', ).forEach(function(element) {
                    element.classList.remove('is-invalid');
                });

                document.querySelectorAll('.form-select', ).forEach(function(element) {
                    element.classList.remove('is-invalid');
                });

                document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                    element.innerHTML = '';
                });
            }
        });
    </script>

    @include('admin.anak-asuh.js.pendidikan-anak-asuh')
@endsection
