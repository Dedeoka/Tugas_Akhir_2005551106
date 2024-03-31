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
                                        data-bs-target="#modalDataPendidikanAnak" id="tambahDataBtn">
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
                                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-home" class="nav-link"
                                                            role="tab" data-bs-toggle="tab"
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
                                                <div class="card-datatable table-responsive">
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
                                                        <tbody class="text-center" id="tableDataPendidikan">
                                                            <!-- Data akan ditampilkan di sini -->
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
                                                <h3 class="text-center">Tambah Data Prestasi Anak Asuh</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-header">
                                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-home" class="nav-link"
                                                            role="tab" data-bs-toggle="tab"
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
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary updateSubmit"
                                        data-id="{{ $data->id }}">Save Changes</button>
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
                                <div class="d-flex pb-2 mb-4 border-bottom">
                                    <div class="w-25 mx-5">
                                        <img src="{{ asset('storage/avatar/avatar-cowok1.jpeg') }}" alt=""
                                            class="mx-auto d-block" style="max-width: 100%; height: 100%;">
                                    </div>
                                    <div>
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
                                <div class="pb-3">
                                    <div>
                                        <div class="px-2">
                                            <h5 class="px-3">Data Detail Perlombaan</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Nama Perlombaan</strong>:
                                                    {{ $data->title }}</li>
                                                <li class="list-group-item"><strong>Tingkat Perlombaan</strong>:
                                                    {{ $data->competition_level }}</li>
                                                <li class="list-group-item"><strong>Tanggal Perlombaan</strong>:
                                                    {{ $data->competition_date }}</li>
                                                <li class="list-group-item"><strong>Peringkat</strong>:
                                                    {{ $data->ranking }}</li>
                                                <li class="list-group-item"><strong>Hadiah Uang</strong>:
                                                    Rp {{ $data->prize_money }}</li>
                                                <li class="list-group-item"><strong>Hadiah Lainnya</strong>:
                                                    {{ $data->prize_item }}</li>
                                                <li class="list-group-item"><strong>Deskripsi Perlombaan</strong>:
                                                    {{ $data->description }}</li>
                                                <li class="list-group-item"><strong>Sertifikat Perlombaan</strong>:
                                                    <img src="{{ asset('storage/' . $data->certificate) }}"
                                                        alt="" width="200px" height="150px">
                                                </li>
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

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
        $(document).ready(function() {
            var currentPage = 1;
            var pageSize = 10; // Jumlah data per halaman
            var totalItems = 0;
            var totalPages = 0;

            // Fungsi untuk memuat data untuk halaman tertentu
            function loadData(page) {
                $.ajax({
                    url: "{{ route('pendidikan-anak.data') }}",
                    type: 'GET',
                    success: function(response) {
                        totalItems = response.length;
                        totalPages = Math.ceil(totalItems / pageSize);

                        // Menampilkan data untuk halaman tertentu
                        var startIndex = (page - 1) * pageSize;
                        var endIndex = Math.min(startIndex + pageSize, totalItems);
                        var html = '';

                        for (var i = startIndex; i < endIndex; i++) {
                            var item = response[i];
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.childrens.name + '</td>' +
                                '<td>' + item.education_level + '</td>' +
                                '<td>' + item.schools.name + '</td>' +
                                '<td>' + item.class + '</td>' +
                                '<td>' + item.status + '</td>' +
                                '<td><button class="btn btn-outline-success pilih-id" data-id="' + item
                                .id + '">Pilih</button></td>' +
                                '</tr>';
                        }

                        $('#tableDataPendidikan').html(html);
                        renderPagination();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function renderPagination() {
                var html = '';

                // Tombol First Page
                html += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">';
                html += '<a class="page-link" href="#" data-page="1">&laquo;</a></li>';

                // Tombol Previous Page
                html += '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">';
                html += '<a class="page-link" href="#" data-page="' + (currentPage - 1) + '">&lsaquo;</a></li>';

                // Menampilkan nomor halaman
                for (var i = 1; i <= totalPages; i++) {
                    html += '<li class="page-item ' + (currentPage == i ? 'active' : '') + '">';
                    html += '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
                }

                // Tombol Next Page
                html += '<li class="page-item ' + (currentPage == totalPages ? 'disabled' : '') + '">';
                html += '<a class="page-link" href="#" data-page="' + (currentPage + 1) + '">&rsaquo;</a></li>';

                // Tombol Last Page
                html += '<li class="page-item ' + (currentPage == totalPages ? 'disabled' : '') + '">';
                html += '<a class="page-link" href="#" data-page="' + totalPages + '">&raquo;</a></li>';

                $('#pagination').html(html);
            }


            // Ketika tombol pagination diklik
            $(document).on('click', '#pagination .page-link', function(e) {
                e.preventDefault();
                currentPage = parseInt($(this).data('page'));
                loadData(currentPage);
            });

            $(document).on('click', '.pilih-id', function(e) {
                let id = $(this).data('id');
                const eduationId = document.getElementById('educationId');
                educationId.value = id;
                $('#modalDataPendidikanAnak').modal('hide');
                $('#modalPrestasiAnakPanti').modal('show');

            });

            // Memuat data untuk halaman pertama saat halaman dimuat
            loadData(currentPage);
        })
    </script>


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
                // Ganti ID sesuai dengan form Anda
                $('#children_id').val('');
                $('#title').val('');
                $('#competition_date').val('');
                $('#ranking').val('');
                $('#certificate').val('');
                $('#description').val('');
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

            $('#dataPrestasiAnakPanti').on('submit', function(e) {
                e.preventDefault();
                clearErrors();
                simpan();
                return false;
            });

            function simpan() {
                const formData = new FormData($('#dataPrestasiAnakPanti')[0]);
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }
                $.ajax({
                    url: "{{ route('prestasi-akademik-anak.store') }}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            handleErrors(response.errors);
                        } else {
                            // Menghapus kelas is-invalid dari semua elemen input
                            $('.form-control').removeClass('is-invalid');

                            // Menggunakan sweetalert
                            Swal.fire({
                                icon: 'success',
                                title: response.success,
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                            $('#modalPrestasiAnakPanti').modal('hide');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('XHR Response:', xhr.responseText);
                        var errorMessage = "An error occurred while updating data.";
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = "Validation error: " + JSON.stringify(xhr.responseJSON
                                .errors);
                        }
                        console.log(errorMessage);
                    }
                });
            }

            function clearErrors() {
                // Hapus kelas is-invalid dari semua elemen input
                document.querySelectorAll('.form-control', ).forEach(function(element) {
                    element.classList.remove('is-invalid');
                });

                document.querySelectorAll('.form-select', ).forEach(function(element) {
                    element.classList.remove('is-invalid');
                });

                // Sembunyikan pesan error
                document.querySelectorAll('.invalid-feedback').forEach(function(element) {
                    element.innerHTML = '';
                });
            }

            function handleErrors(errors) {
                clearErrors();

                // Menambahkan kelas is-invalid hanya untuk elemen input yang memiliki error
                if (errors.children_id) {
                    $('#children_id').addClass('is-invalid');
                    $('#children_idError').text(errors.children_id[0]);
                }
                if (errors.title) {
                    $('#title').addClass('is-invalid');
                    $('#titleError').text(errors.title[0]);
                }
                if (errors.competition_date) {
                    $('#competition_date').addClass('is-invalid');
                    $('#competition_dateError').text(errors.competition_date[0]);
                }
                if (errors.ranking) {
                    $('#ranking').addClass('is-invalid');
                    $('#rankingError').text(errors.ranking[0]);
                }
                if (errors.certificate) {
                    $('#certificate').addClass('is-invalid');
                    $('#certificateError').text(errors.certificate[0]);
                }
                if (errors.description) {
                    $('#description').addClass('is-invalid');
                    $('#descriptionError').text(errors.description[0]);
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

            $('.updateSubmit').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                update(id);
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
                var formData = new FormData();

                // Add text data to FormData
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('title', $('#editTitle' + id).val());
                formData.append('competition_level', $('#editCompetition_level' + id).val());
                formData.append('competition_date', $('#editCompetition_date' + id).val());
                formData.append('ranking', $('#editRanking' + id).val());
                formData.append('prize_money', $('#editprize_money' + id).val());
                formData.append('prize_item', $('#editprize_item' + id).val());
                formData.append('description', $('#editDescription' + id).val());

                // Add file data to FormData if available
                var certificate = $('#editCertificate' + id)[0].files[0];

                if (certificate) {
                    formData.append('certificate', certificate);
                }

                formData.append('_method', 'patch');
                var url = "{{ url('anak-asuh/prestasi-akademik-anak') }}" + '/' + id;
                console.log('URL:', url);
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
                            handleUpdateErrors(response.errors, id);
                            console.log('Error Response:', response);
                        } else {
                            // Handle success
                            showSuccessMessage(response.success);
                            $('#editModal' + id).modal('hide');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle other types of errors (e.g., server errors)
                        console.error('XHR Response:', xhr.responseText);
                        showErrorMessage("An error occurred while updating data.");
                    }
                });
            }

            function handleUpdateErrors(errors, id) {
                // Clear previous errors
                clearUpdateErrors(id);

                // Display new errors
                if (errors.children_id) {
                    $('#editChildren_id' + id).addClass('is-invalid');
                    $('#editChildren_idError' + id).text(errors.children_id[0]);
                }
                if (errors.title) {
                    $('#editTitle' + id).addClass('is-invalid');
                    $('#editTitleError' + id).text(errors.title[0]);
                }
                if (errors.competition_date) {
                    $('#editCompetition_date' + id).addClass('is-invalid');
                    $('#editCompetition_dateError' + id).text(errors.competition_date[0]);
                }
                if (errors.ranking) {
                    $('#editRanking' + id).addClass('is-invalid');
                    $('#editRankingError' + id).text(errors.ranking[0]);
                }
                if (errors.certificate) {
                    $('#editCertificate' + id).addClass('is-invalid');
                    $('#editCertificateError' + id).text(errors.certificate[0]);
                }
                if (errors.description) {
                    $('#editDescription' + id).addClass('is-invalid');
                    $('#editDescriptionError' + id).text(errors.description[0]);
                }
            }

            function clearUpdateErrors(id) {
                // Clear previous errors
                $('#editChildren_id' + id).removeClass('is-invalid');
                $('#editTitile' + id).removeClass('is-invalid');
                $('#editCompetition_date' + id).removeClass('is-invalid');
                $('#editGraduation_date' + id).removeClass('is-invalid');
                $('#editCertificate' + id).removeClass('is-invalid');
                $('#editDescription' + id).removeClass('is-invalid');
                // Clear error messages
                $('#editChildren_idError' + id).text('');
                $('#editTitileError' + id).text('');
                $('#editCompetition_dateError' + id).text('');
                $('#editRankingError' + id).text('');
                $('#editCertificateError' + id).text('');
                $('#editDescriptionError' + id).text('');
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
                fetch(`/anak-asuh/prestasi-akademik-anak/${dataId}`, {
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
