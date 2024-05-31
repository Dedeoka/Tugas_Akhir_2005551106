@extends('layouts.admin')

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
                                                <ul class="nav nav-pills nav-fill w-100" role="tablist">
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
                                            <button type="button" class="btn rounded-pill btn-primary"
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
                    <ul class="nav nav-pills nav-fill w-100" role="tablist">
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
                        <h3 class="text-center">Detail Data Pendidikan {{ $data->childrens->name }}
                            ({{ $data->education_level }} / Kelas {{ $data->class }})
                        </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <li class="list-group-item"><strong>Nama Siswa</strong>:
                                            {{ $data->childrens->name }}</li>
                                        <li class="list-group-item"><strong>Nama Sekolah</strong>:
                                            {{ $data->schools->name }}
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
                            <div class="">
                            </div>
                        </div>
                        <div class="pb-3 border-bottom mb-4">
                            <div class="px-3">
                                @foreach ($data->childEducationDetails as $detail)
                                    <h5>Data Wali Kelas</h5>
                                    <div class="d-flex py-2">
                                        <div class="w-25 d-flex">
                                            <div class="w-75">
                                                Nama Wali
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $detail->guardian_name }}
                                        </div>
                                        <div class="w-25"></div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-25 d-flex">
                                            <div class="w-75">
                                                Alamat Wali
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $detail->guardian_address }}
                                        </div>
                                        <div class="w-25"></div>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="w-25 d-flex">
                                            <div class="w-75">
                                                Nomor Telepon
                                            </div>
                                            <div class="w-25">
                                                :
                                            </div>
                                        </div>
                                        <div class="w-50">
                                            {{ $detail->guardian_phone }}
                                        </div>
                                        <div class="w-25"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pb-3 border-bottom">
                            <div class="px-3">
                                <h5>Data Sekolah</h5>
                                <div class="d-flex py-2">
                                    <div class="w-25 d-flex">
                                        <div class="w-75">
                                            Nama Sekolah
                                        </div>
                                        <div class="w-25">
                                            :
                                        </div>
                                    </div>
                                    <div class="w-50">
                                        {{ $data->schools->name }}
                                    </div>
                                    <div class="w-25"></div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="w-25 d-flex">
                                        <div class="w-75">
                                            Alamat Sekolah
                                        </div>
                                        <div class="w-25">
                                            :
                                        </div>
                                    </div>
                                    <div class="w-50">
                                        {{ $data->schools->address }}
                                    </div>
                                    <div class="w-25"></div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="w-25 d-flex">
                                        <div class="w-75">
                                            Nomor Telepon
                                        </div>
                                        <div class="w-25">
                                            :
                                        </div>
                                    </div>
                                    <div class="w-50">
                                        {{ $data->schools->phone }}
                                    </div>
                                    <div class="w-25"></div>
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
    @include('admin.anak-asuh.js.pendidikan-anak-asuh')
@endsection
