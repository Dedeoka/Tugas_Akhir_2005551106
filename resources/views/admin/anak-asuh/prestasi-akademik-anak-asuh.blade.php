@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Prestasi Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Prestasi Anak Asuh
                    </h3>
                </div>
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content-30">

                            </div>
                            <div class="">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        id="tambahDataBtn">
                                        <i class='bx bx-plus m-1'></i>
                                        Tambah Data
                                    </button>
                                </div>
                                <div class="modal fade" id="modalDataPendidikanAnak" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-center">Pilih Data Pendidikan</h3>
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
                                                                Tabel Data Pendidikan Anak</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Cari Nama Anak..." id="searchInput">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="searchButton">Cari</button>
                                                </div>
                                                <div class="card-datatable table-responsive">
                                                    <table class="datatables-basic table border-top quick-sand"
                                                        id="kategoriBarangTable">
                                                        <thead id="headTable">
                                                        </thead>
                                                        <tbody class="text-center" id="bodyTable">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-4 justify-content-center">
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination pagination-round pagination-primary"
                                                        id="pagination"></ul>
                                                </nav>
                                            </div>

                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalPrestasiAnakPanti" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="text-center">Tambah Data Prestasi Akademik Anak Asuh</h3>
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
                                                                Tambah Data Prestasi Anak Asuh</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <form id="dataPrestasiAnakPanti" action="{{ route('prestasi-anak.store') }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="">
                                                            <div class="nav-align-top mb-4">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active"
                                                                        id="navs-justified-home" role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <input type="text" id="educationId"
                                                                                    name="child_education_id" hidden>
                                                                                <div class="mb-3">
                                                                                    <label for="title"
                                                                                        class="form-label">Nama
                                                                                        Perlombaan</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="title" name="title"
                                                                                        placeholder="Nama Perlombaan..." />
                                                                                    <div id="titleError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="competition_level"
                                                                                        class="form-label">Tingkat
                                                                                        Perlombaan</label>
                                                                                    <select class="form-select"
                                                                                        id="competition_level"
                                                                                        name="competition_level"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Tingkat Perlombaan
                                                                                        </option>
                                                                                        <option value="Tingkat Sekolah">
                                                                                            Tingkat Sekolah
                                                                                        </option>
                                                                                        <option value="Tingkat Desa">
                                                                                            Tingkat Desa
                                                                                        </option>
                                                                                        <option
                                                                                            value="Tingkat Kabupaten/Kota">
                                                                                            Tingkat Kabupaten/Kota
                                                                                        </option>
                                                                                        <option value="Tingkat Regional">
                                                                                            Tingkat Regional
                                                                                        </option>
                                                                                        <option value="Tingkat Nasional">
                                                                                            Tingkat Nasional
                                                                                        </option>
                                                                                        <option
                                                                                            value="Tingkat Internasional">
                                                                                            Tingkat Internasional
                                                                                        </option>
                                                                                        <option value="Tingkat Lainnya">
                                                                                            Tingkat Lainnya
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="competition_levelError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="competition_date"
                                                                                        class="form-label">Tanggal
                                                                                        Perlombaan</label>
                                                                                    <input class="form-control"
                                                                                        type="date"
                                                                                        id="competition_date"
                                                                                        name="competition_date" />
                                                                                    <div id="competition_dateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="ranking"
                                                                                        class="form-label">Tingkat
                                                                                        Perlombaan</label>
                                                                                    <select class="form-select"
                                                                                        id="ranking" name="ranking"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Pilih Peringkat Perlombaan
                                                                                        </option>
                                                                                        <option value="Juara 1">
                                                                                            Juara 1
                                                                                        </option>
                                                                                        <option value="Juara 2">
                                                                                            Juara 2
                                                                                        </option>
                                                                                        <option value="Juara 3">
                                                                                            Juara 3
                                                                                        </option>
                                                                                        <option value="Juara Harapan 1">
                                                                                            Juara Harapan 1
                                                                                        </option>
                                                                                        <option value="Juara Harapan 2">
                                                                                            Juara Harapan 2
                                                                                        </option>
                                                                                        <option value="Juara Harapan 3">
                                                                                            Juara Harapan 3
                                                                                        </option>
                                                                                        <option value="Juara Favorit">
                                                                                            Juara Favorit
                                                                                        </option>
                                                                                        <option value="Peserta">
                                                                                            Peserta
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="rankingError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="prize_money"
                                                                                        class="form-label">Hadiah
                                                                                        Uang (Hadiah Berupa
                                                                                        Uang,
                                                                                        Kosongkan Bila Tidak Ada)</label>
                                                                                    <div
                                                                                        class="input-group input-group-merge">
                                                                                        <span
                                                                                            class="input-group-text">Rp</span>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="prize_money"
                                                                                            name="prize_money"
                                                                                            placeholder="1,000,000"
                                                                                            oninput="formatAmount(this)" />
                                                                                        <div id="prize_moneyError"
                                                                                            class="invalid-feedback"></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="prize_item"
                                                                                        class="form-label">Nama
                                                                                        Hadiah (Hadiah Berupa Barang,
                                                                                        Kosongkan Bila Tidak Ada)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="prize_item" name="prize_item"
                                                                                        placeholder="Nama Hadiah..." />
                                                                                    <div id="prize_itemError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="form-label">Deskripsi
                                                                                        Perlombaan</label>
                                                                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                                                    <div id="descriptionError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="certificate"
                                                                                        class="form-label">Sertifikat
                                                                                        Perlombaan</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="certificate"
                                                                                        name="certificate" />
                                                                                    <div id="certificateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" id="submitForm"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">Cancel</button>
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
                                <th class="col-md-1 text-center fw-bold">Nama Perlombaan</th>
                                <th class="col-md-1 text-center fw-bold">Tanggal Perlombaan</th>
                                <th class="col-md-1 text-center fw-bold">Peringkat</th>
                                <th class="col-md-1 text-center fw-bold">Bukti Perlombaan</th>
                                <th class="col-md-2 text-center fw-bold">Deskripsi Perlombaan</th>
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
                                    <td>{{ $data->childEducations->childrens->name }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->competition_date }}</td>
                                    <td>{{ $data->ranking }}</td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Bukti Perlombaan {{ $data->childEducations->childrens->name }}">
                                                <img src="{{ asset('storage/' . $data->certificate) }}" alt=""
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalCenterAkta_{{ $loop->index }}">
                                            </li>
                                            <div class="modal fade" id="modalCenterAkta_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Bukti Perlombaan
                                                                {{ $data->childEducations->childrens->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <img src="{{ asset('storage/' . $data->certificate) }}"
                                                                    alt="" width="700px" height="450px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>
                                    <td>{{ $data->description }}</td>
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
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Prestasi Anak Asuh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('prestasi-akademik-anak.update', $data->id) }}"
                                data-id="{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="children_id" class="form-label">Nama
                                                        Anak</label>
                                                    <input type="text" class="form-control"
                                                        id="editName{{ $data->id }}"
                                                        value="{{ $data->childEducations->childrens->name }}" disabled />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editTitle{{ $data->id }}" class="form-label">Nama
                                                        Perlombaan</label>
                                                    <input type="text" class="form-control"
                                                        id="editTitle{{ $data->id }}"
                                                        name="editTitle{{ $data->id }}"
                                                        placeholder="Nama Perlombaan..." value="{{ $data->title }}" />
                                                    <div id="editTitleError{{ $data->id }}" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="competition_level" class="form-label">Tingkat
                                                        Perlombaan</label>
                                                    <select class="form-select" id="editCompetition_level"
                                                        name="competition_level" aria-label="Default select example">
                                                        <option value="" hidden>
                                                            Pilih Tingkat Perlombaan
                                                        </option>
                                                        <option value="Tingkat Sekolah"
                                                            {{ $data->competition_level == 'Tingkat Sekolah' ? 'selected' : '' }}>
                                                            Tingkat Sekolah
                                                        </option>
                                                        <option value="Tingkat Desa"
                                                            {{ $data->competition_level == 'Tingkat Desa' ? 'selected' : '' }}>
                                                            Tingkat Desa
                                                        </option>
                                                        <option value="Tingkat Kabupaten/Kota"
                                                            {{ $data->competition_level == 'Tingkat Kabupaten/Kota' ? 'selected' : '' }}>
                                                            Tingkat Kabupaten/Kota
                                                        </option>
                                                        <option value="Tingkat Regional"
                                                            {{ $data->competition_level == 'Tingkat Regional' ? 'selected' : '' }}>
                                                            Tingkat Regional
                                                        </option>
                                                        <option value="Tingkat Nasional"
                                                            {{ $data->competition_level == 'Tingkat Nasional' ? 'selected' : '' }}>
                                                            Tingkat Nasional
                                                        </option>
                                                        <option value="Tingkat Internasional"
                                                            {{ $data->competition_level == 'Tingkat Internasional' ? 'selected' : '' }}>
                                                            Tingkat Internasional
                                                        </option>
                                                        <option value="Tingkat Lainnya"
                                                            {{ $data->competition_level == 'Tingkat Lainny' ? 'selected' : '' }}>
                                                            Tingkat Lainnya
                                                        </option>
                                                    </select>
                                                    <div id="editCompetition_levelError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editCompetition_date{{ $data->id }}"
                                                        class="form-label">Tanggal
                                                        Perlombaan</label>
                                                    <input class="form-control" type="date"
                                                        id="editCompetition_date{{ $data->id }}"
                                                        name="editCompetition_date{{ $data->id }}"
                                                        value="{{ $data->competition_date }}" />
                                                    <div id="editCompetition_dateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editRanking{{ $data->id }}"
                                                        class="form-label">Peringkat</label>
                                                    <select class="form-select" id="editRanking{{ $data->id }}"
                                                        name="editRanking{{ $data->id }}"
                                                        aria-label="Default select example">
                                                        <option value="" hidden>Pilih Peringkat</option>
                                                        <option value="Juara 1"
                                                            {{ $data->ranking == 'Juara 1' ? 'selected' : '' }}>Juara 1
                                                        </option>
                                                        <option value="Juara 2"
                                                            {{ $data->ranking == 'Juara 2' ? 'selected' : '' }}>Juara 2
                                                        </option>
                                                        <option value="Juara 3"
                                                            {{ $data->ranking == 'Juara 3' ? 'selected' : '' }}>Juara 3
                                                        </option>
                                                        <option value="Juara Harapan 1"
                                                            {{ $data->ranking == 'Juara Harapan 1' ? 'selected' : '' }}>
                                                            Juara Harapan 1</option>
                                                        <option value="Juara Harapan 2"
                                                            {{ $data->ranking == 'Juara Harapan 2' ? 'selected' : '' }}>
                                                            Juara Harapan 2</option>
                                                        <option value="Juara Harapan 3"
                                                            {{ $data->ranking == 'Juara Harapan 3' ? 'selected' : '' }}>
                                                            Juara Harapan 3</option>
                                                        <option value="Juara Favorit"
                                                            {{ $data->ranking == 'Juara Favorit' ? 'selected' : '' }}>Juara
                                                            Favorit</option>
                                                        <option value="Peserta"
                                                            {{ $data->ranking == 'Peserta' ? 'selected' : '' }}>Peserta
                                                        </option>
                                                    </select>
                                                    <div id="editRankingError{{ $data->id }}"
                                                        class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="prize_money" class="form-label">Hadiah
                                                        Uang (Hadiah Berupa
                                                        Uang,
                                                        Kosongkan Bila Tidak Ada)</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="text" class="form-control"
                                                            id="editprize_money{{ $data->id }}" name="prize_money"
                                                            placeholder="1,000,000" oninput="formatAmount(this)"
                                                            value="{{ $data->prize_money }}" />
                                                        <div id="prize_moneyError{{ $data->id }}"
                                                            class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="prize_item" class="form-label">Nama
                                                        Hadiah (Hadiah Berupa Barang,
                                                        Kosongkan Bila Tidak Ada)</label>
                                                    <input type="text" class="form-control"
                                                        id="editprize_item{{ $data->id }}" name="prize_item"
                                                        placeholder="Nama Hadiah..." value="{{ $data->prize_item }}" />
                                                    <div id="prize_itemError" class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editCertificate{{ $data->id }}"
                                                        class="form-label">Bukti
                                                        Perlombaan</label>
                                                    <input class="form-control" type="file"
                                                        id="editCertificate{{ $data->id }}"
                                                        name="editCertificate{{ $data->id }}" />
                                                    <div id="editCertificateError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editDescription{{ $data->id }}"
                                                        class="form-label">Deskripsi Prestasi</label>
                                                    <textarea class="form-control" id="editDescription{{ $data->id }}" name="editDescription{{ $data->id }}"
                                                        rows="3">{{ $data->description }}</textarea>
                                                    <div id="editDescriptionError{{ $data->id }}"
                                                        class="invalid-feedback"></div>
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
                                <h3 class="text-center">Detail Data Prestasi {{ $data->childEducations->childrens->name }}
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
                                                    {{ $data->childEducations->childrens->name }}</li>
                                                <li class="list-group-item"><strong>Jenis Kelamin</strong>:
                                                    {{ $data->childEducations->childrens->gender }}
                                                </li>
                                                <li class="list-group-item"><strong>Tempat Lahir</strong>:
                                                    {{ $data->childEducations->childrens->place_of_birth }}
                                                </li>
                                                <li class="list-group-item"><strong>Tanggal Lahir</strong>:
                                                    {{ $data->childEducations->childrens->date_of_birth }}
                                                </li>
                                                <li class="list-group-item"><strong>Agama</strong>:
                                                    {{ $data->childEducations->childrens->religion }}
                                                </li>
                                                <li class="list-group-item"><strong>Sekolah</strong>:
                                                    {{ $data->childEducations->schools->name }}
                                                </li>
                                                <li class="list-group-item"><strong>Jenjang Pendidikan</strong>:
                                                    {{ $data->childEducations->education_level }}
                                                </li>
                                                <li class="list-group-item"><strong>Kelas</strong>:
                                                    {{ $data->childEducations->class }}
                                                </li>
                                                <li class="list-group-item"><strong>Status</strong>:
                                                    @if ($data->childEducations->status == 'Aktif')
                                                        <button type="button" class="btn rounded-pill btn-success">
                                                            Aktif</button>
                                                    @elseif ($data->childEducations->status == 'Lulus')
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
                                <div class="pb-3 border-bottom">
                                    <div class="px-3">
                                        <h5>Data Detail Perlombaan</h5>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Nama Perlombaan
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->title }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Tingkat Perlombaan
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->competition_level }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Tanggal Perlombaan
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->competition_date }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Peringkat
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->ranking }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Hadiah Uang
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->prize_money }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Hadiah Lainnya
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                {{ $data->prize_item }}
                                            </div>
                                            <div class="w-25"></div>
                                        </div>
                                        <div class="d-flex py-2">
                                            <div class="w-25 d-flex">
                                                <div class="w-75">
                                                    Deskripsi Perlombaan
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
                                                    Sertifikat Perlombaan
                                                </div>
                                                <div class="w-25">
                                                    :
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                <img src="{{ asset('storage/' . $data->certificate) }}" alt=""
                                                    width="200px" height="150px">
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
    @include('admin.anak-asuh.js.prestasi-akademik-anak')
@endsection
