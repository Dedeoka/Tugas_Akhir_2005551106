@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Anak Asuh /</span> <b>Data Anak Asuh</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Anak Asuh
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
                                                <h3 class="text-center">Tambah Data Anak Asuh</h3>
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
                                                                Data Anak</span>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-profile" class="nav-link"
                                                            role="tab" data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-profile"
                                                            aria-controls="navs-justified-profile" aria-selected="false"
                                                            disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Lainnya</span>
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" id="tab-justified-messages" class="nav-link"
                                                            role="tab" data-bs-toggle="tab" data-bs-target="#ss"
                                                            aria-controls="ss" aria-selected="false" disabled>
                                                            <span class="d-none d-sm-block">
                                                                Data Wali</span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <form id="dataAnakForm" action="{{ route('data-anak.store') }}"
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
                                                                                    <label for="name"
                                                                                        class="form-label">Nama
                                                                                        Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="name"
                                                                                        name="name"
                                                                                        placeholder="Nama Anak..." />
                                                                                    <div id="nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="place_of_birth"
                                                                                        class="form-label">Tempat
                                                                                        Lahir</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="place_of_birth"
                                                                                        name="place_of_birth"
                                                                                        placeholder="Tempat Lahir..." />
                                                                                    <div id="placeOfBirthError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="date_of_birth"
                                                                                        class="form-label">Tanggal
                                                                                        Lahir</label>
                                                                                    <input class="form-control"
                                                                                        type="date" id="date_of_birth"
                                                                                        name="date_of_birth" />
                                                                                    <div id="dateOfBirthError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="gender"
                                                                                        class="form-label">Jenis
                                                                                        Kelamin</label>
                                                                                    <select class="form-select"
                                                                                        id="gender" name="gender"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>Pilih
                                                                                            Jenis Kelamin
                                                                                        </option>
                                                                                        <option value="Laki-Laki">Laki-Laki
                                                                                        </option>
                                                                                        <option value="Perempuan">Perempuan
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="genderError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="religion"
                                                                                        class="form-label">Agama</label>
                                                                                    <select class="form-select"
                                                                                        id="religion" name="religion"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>Pilih
                                                                                            Agama</option>
                                                                                        <option value="Islam">Islam
                                                                                        </option>
                                                                                        <option value="Hindu">Hindu
                                                                                        </option>
                                                                                        <option value="Kristen Protestan">
                                                                                            Kristen Protestan</option>
                                                                                        <option value="Kristen Katolik">
                                                                                            Kristen Katolik</option>
                                                                                        <option value="Budha">Budha
                                                                                        </option>
                                                                                        <option value="Konghucu">Konghucu
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="religionError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="congenital_disease"
                                                                                        class="form-label">Penyakit
                                                                                        Bawaan (Kosongkan Bila Tidak
                                                                                        Ada)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="congenital_disease"
                                                                                        name="congenital_disease"
                                                                                        placeholder="Penaykit Bawaan..." />
                                                                                    <div id="congenital_diseaseError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="status"
                                                                                        class="form-label">Status</label>
                                                                                    <select class="form-select"
                                                                                        id="status" name="status"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Status Anak Asuh</option>
                                                                                        <option value="Aktif">Aktif
                                                                                        </option>
                                                                                        <option value="Non-Aktif">Non-Aktif
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="statusError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="image"
                                                                                        class="form-label">Foto
                                                                                        Anak</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="image"
                                                                                        name="image" />
                                                                                    <div id="imageError"
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
                                                                                <div class="form-check mt-3 mb-3">
                                                                                    <input class="form-check-input"
                                                                                        type="checkbox"
                                                                                        value="tidak_lengkap"
                                                                                        id="kelengkapanData"
                                                                                        name="kelengkapan_data" />
                                                                                    <label class="form-check-label"
                                                                                        for="kelengkapanData"> Data Anak
                                                                                        Tidak Lengkap? (Data di Bawah Dapat
                                                                                        Dikosongkan)
                                                                                    </label>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="father_name"
                                                                                        class="form-label">Nama
                                                                                        Ayah Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="father_name"
                                                                                        name="father_name"
                                                                                        placeholder="Nama Ayah Anak..." />
                                                                                    <div id="father_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="mother_name"
                                                                                        class="form-label">Nama
                                                                                        Ibu Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="mother_name"
                                                                                        name="mother_name"
                                                                                        placeholder="Nama Ibu Anak..." />
                                                                                    <div id="mother_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="identity_card"
                                                                                        class="form-label">Kartu
                                                                                        Pengenal Anak (KTP
                                                                                        atau Kartu Pengenal Lainnya)</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="identity_card"
                                                                                        name="identity_card" />
                                                                                    <div id="identity_cardError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="birth_certificate"
                                                                                        class="form-label">Akta
                                                                                        Kelahiran Anak</label>
                                                                                    <input class="form-control"
                                                                                        type="file"
                                                                                        id="birth_certificate"
                                                                                        name="birth_certificate" />
                                                                                    <div id="birthCertificateError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="family_card"
                                                                                        class="form-label">Kartu
                                                                                        Keluarga Anak</label>
                                                                                    <input class="form-control"
                                                                                        type="file" id="family_card"
                                                                                        name="family_card" />
                                                                                    <div id="family_cardError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" id="btnNextMessages"
                                                                            class="btn btn-primary mb-2 next-tab d-grid w-100">Berikutnya</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            id="btnPrevHome">Sebelumnya</button>
                                                                    </div>
                                                                    <div class="tab-pane fade"
                                                                        id="navs-justified-messages" role="tabpanel">
                                                                        <div class="card mb-4">
                                                                            <div class="card-body">
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_name"
                                                                                        class="form-label">Nama
                                                                                        Wali Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_name"
                                                                                        name="guardian_name"
                                                                                        placeholder="Nama Wali Anak..." />
                                                                                    <div id="guardian_nameError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_relationship"
                                                                                        class="form-label">Hubungan Wali
                                                                                        Dengan Anak</label>
                                                                                    <select class="form-select"
                                                                                        id="guardian_relationship"
                                                                                        name="guardian_relationship"
                                                                                        aria-label="Default select example">
                                                                                        <option value="" hidden>
                                                                                            Hubungan Wali Dengan Anak
                                                                                        </option>
                                                                                        <option value="Ayah">Ayah
                                                                                        </option>
                                                                                        <option value="Ibu">Ibu
                                                                                        </option>
                                                                                        <option value="Kerabat">Kerabat
                                                                                        </option>
                                                                                        <option value="Teman">Teman
                                                                                        </option>
                                                                                        <option value="Lainnya">Lainnya
                                                                                        </option>
                                                                                    </select>
                                                                                    <div id="guardian_relationshipError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_address"
                                                                                        class="form-label">Alamat
                                                                                        Wali Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_address"
                                                                                        name="guardian_address"
                                                                                        placeholder="Alamat Wali Anak..." />
                                                                                    <div id="guardian_addressError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_phone_number"
                                                                                        class="form-label">Nomor Telepon
                                                                                        Wali Anak</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="guardian_phone_number"
                                                                                        name="guardian_phone_number"
                                                                                        placeholder="Nomor Telepon Wali Anak..." />
                                                                                    <div id="guardian_phone_numberError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_email"
                                                                                        class="form-label">Email
                                                                                        Wali Anak</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="guardian_email"
                                                                                        name="guardian_email"
                                                                                        placeholder="Email Wali Anak..." />
                                                                                    <div id="guardian_emailError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="guardian_identity_card"
                                                                                        class="form-label">Kartu Pengenal
                                                                                        Wali Anak (KTP
                                                                                        atau Kartu Pengenal Lainnya)</label>
                                                                                    <input class="form-control"
                                                                                        type="file"
                                                                                        id="guardian_identity_card"
                                                                                        name="guardian_identity_card" />
                                                                                    <div id="guardian_identity_cardError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="reason_for_leaving"
                                                                                        class="form-label">Alasan
                                                                                        Menitipkan</label>
                                                                                    <textarea class="form-control" id="reason_for_leaving" name="reason_for_leaving" rows="3"></textarea>
                                                                                    <div id="reason_for_leavingError"
                                                                                        class="invalid-feedback"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn btn-primary mb-2 d-grid w-100">Simpan</button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary d-grid w-100"
                                                                            id="btnPrevProfile">Sebelumnya</button>
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
                                <th class="col-md-1 text-center fw-bold">Foto Anak</th>
                                <th class="col-md-1 text-center fw-bold">Nama</th>
                                <th class="col-md-1 text-center fw-bold">Tempat/Tanggal Lahir</th>
                                <th class="col-md-1 text-center fw-bold">Jenis Kelamin</th>
                                <th class="col-md-1 text-center fw-bold">Agama</th>
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
                                    <td>
                                        <ul
                                            class="list-unstyled users-list m-0 avatar-group align-items-center text-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xl pull-up"
                                                title="Foto {{ $data->name }}">
                                                @if ($data->image == '-' && $data->gender == 'Laki-Laki')
                                                    <img src="{{ asset('storage/avatar/avatar-cowok.jpeg') }}"
                                                        alt="" data-bs-toggle="modal"
                                                        data-bs-target="#modalCenterFoto_{{ $loop->index }}">
                                                @elseif ($data->image == '-' && $data->gender == 'Perempuan')
                                                    <img src="{{ asset('storage/avatar/avatar-cewek.jpeg') }}"
                                                        alt="" data-bs-toggle="modal"
                                                        data-bs-target="#modalCenterFoto_{{ $loop->index }}">
                                                @else()
                                                    <img src="{{ asset('storage/' . $data->image) }}" alt=""
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalCenterFoto_{{ $loop->index }}">
                                                @endif
                                            </li>
                                            <div class="modal fade" id="modalCenterFoto_{{ $loop->index }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCenterTitle">Foto
                                                                {{ $data->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @if ($data->image == '-' && $data->gender == 'Laki-Laki')
                                                                    <img src="{{ asset('storage/avatar/avatar-cowok.jpeg') }}"
                                                                        alt="" class="mx-auto d-block"
                                                                        style="max-width: 100%; height: auto;">
                                                                @elseif ($data->image == '-' && $data->gender == 'Perempuan')
                                                                    <img src="{{ asset('storage/avatar/avatar-cewek.jpeg') }}"
                                                                        alt="" class="mx-auto d-block"
                                                                        style="max-width: 100%; height: auto;">
                                                                @else()
                                                                    <img src="{{ asset('storage/' . $data->image) }}"
                                                                        alt="" class="mx-auto d-block"
                                                                        style="max-width: 100%; height: auto;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </td>

                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->place_of_birth }}, {{ $data->date_of_birth }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->religion }}</td>
                                    <td>{{ $data->status }}</td>
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
                                <h3 class="text-center">Edit Data Anak Asuh {{ $data->name }}</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-header">
                                <ul class="nav nav-tabs nav-fill w-100" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-home{{ $data->id }}"
                                            class="nav-link active" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                            aria-selected="true" disabled>
                                            <span class="d-none d-sm-block">
                                                Data Anak</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-profile{{ $data->id }}"
                                            class="nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-justified-profile"
                                            aria-controls="navs-justified-profile" aria-selected="false" disabled>
                                            <span class="d-none d-sm-block">
                                                Data Lainnya</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" id="tab-justified-messages{{ $data->id }}"
                                            class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#ss"
                                            aria-controls="ss" aria-selected="false" disabled>
                                            <span class="d-none d-sm-block">
                                                Data Wali</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-body">
                                <form id="editDataAnakForm{{ $data->id }}"
                                    action="{{ route('data-anak.update', $data->id) }}" data-id="{{ $data->id }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="">
                                            <div class="nav-align-top mb-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active"
                                                        id="navs-justified-home{{ $data->id }}" role="tabpanel">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label for="name{{ $data->id }}"
                                                                        class="form-label">Nama
                                                                        Anak</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name{{ $data->id }}" name="name"
                                                                        placeholder="Nama Anak..."
                                                                        value="{{ $data->name }}" />
                                                                    <div id="editNameError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="place_of_birth{{ $data->id }}"
                                                                        class="form-label">Tempat
                                                                        Lahir</label>
                                                                    <input type="text" class="form-control"
                                                                        id="place_of_birth{{ $data->id }}"
                                                                        name="place_of_birth"
                                                                        placeholder="Tempat Lahir..."
                                                                        value="{{ $data->place_of_birth }}" />
                                                                    <div id="editPlaceOfBirthError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="date_of_birth{{ $data->id }}"
                                                                        class="form-label">Tanggal
                                                                        Lahir</label>
                                                                    <input class="form-control" type="date"
                                                                        id="date_of_birth{{ $data->id }}"
                                                                        name="date_of_birth"
                                                                        value="{{ $data->date_of_birth }}" />
                                                                    <div id="editDateOfBirthError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="gender{{ $data->id }}"
                                                                        class="form-label">Jenis
                                                                        Kelamin</label>
                                                                    <select class="form-select"
                                                                        id="gender{{ $data->id }}" name="gender"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Pilih Jenis Kelamin
                                                                        </option>
                                                                        <option value="Laki-Laki"
                                                                            {{ $data->gender == 'Laki-Laki' ? 'selected' : '' }}>
                                                                            Laki-Laki
                                                                        </option>
                                                                        <option value="Perempuan"
                                                                            {{ $data->gender == 'Perempuan' ? 'selected' : '' }}>
                                                                            Perempuan
                                                                        </option>
                                                                    </select>
                                                                    <div id="editGenderError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="religion{{ $data->id }}"
                                                                        class="form-label">Agama</label>
                                                                    <select class="form-select"
                                                                        id="religion{{ $data->id }}" name="religion"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Pilih Agama</option>
                                                                        <option value="Islam"
                                                                            {{ $data->religion == 'Islam' ? 'selected' : '' }}>
                                                                            Islam
                                                                        </option>
                                                                        <option value="Hindu"
                                                                            {{ $data->religion == 'Hindu' ? 'selected' : '' }}>
                                                                            Hindu
                                                                        </option>
                                                                        <option value="Kristen Protestan"
                                                                            {{ $data->religion == 'Kristen Protestan' ? 'selected' : '' }}>
                                                                            Kristen Protestan</option>
                                                                        <option value="Kristen Katolik"
                                                                            {{ $data->religion == 'Kristen Katolik' ? 'selected' : '' }}>
                                                                            Kristen Katolik</option>
                                                                        <option value="Budha"
                                                                            {{ $data->religion == 'Budha' ? 'selected' : '' }}>
                                                                            Budha
                                                                        </option>
                                                                        <option value="Konghucu"
                                                                            {{ $data->religion == 'Konghucu' ? 'selected' : '' }}>
                                                                            Konghucu
                                                                        </option>
                                                                    </select>
                                                                    <div id="editReligionError{{ $data->id }}"
                                                                        class="invalid-feedback">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="congenital_disease{{ $data->id }}"
                                                                        class="form-label">Penyakit
                                                                        Bawaan (Kosongkan Bila Tidak
                                                                        Ada)</label>
                                                                    <input type="text" class="form-control"
                                                                        id="congenital_disease{{ $data->id }}"
                                                                        name="congenital_disease"
                                                                        placeholder="Penaykit Bawaan..."
                                                                        value="{{ $data->congenital_disease }}" />
                                                                    <div id="editCongenital_diseaseError"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status{{ $data->id }}"
                                                                        class="form-label">Status</label>
                                                                    <select class="form-select"
                                                                        id="status{{ $data->id }}" name="status"
                                                                        aria-label="Default select example">
                                                                        <option value="" hidden>Status Anak Asuh
                                                                        </option>
                                                                        <option value="Aktif"
                                                                            {{ $data->status == 'Aktif' ? 'selected' : '' }}>
                                                                            Aktif</option>
                                                                        <option value="Non-Aktif"
                                                                            {{ $data->status == 'Non-Aktif' ? 'selected' : '' }}>
                                                                            Non-Aktif
                                                                        </option>
                                                                    </select>
                                                                    <div id="editStatusError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image{{ $data->id }}"
                                                                        class="form-label">Foto
                                                                        Anak</label>
                                                                    <input class="form-control" type="file"
                                                                        id="image{{ $data->id }}" name="image" />
                                                                    <div id="editImageError{{ $data->id }}"
                                                                        class="invalid-feedback"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-primary mb-2 d-grid w-100 btnNextProfile"
                                                            data-id="{{ $data->id }}">Berikutnya</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary d-grid w-100"
                                                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                    </div>
                                                    @foreach ($data->childDetails as $detail)
                                                        <div class="tab-pane fade"
                                                            id="navs-justified-profile{{ $data->id }}"
                                                            role="tabpanel">
                                                            <div class="card mb-4">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label for="father_name{{ $data->id }}"
                                                                            class="form-label">Nama
                                                                            Ayah Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="father_name {{ $data->id }}"
                                                                            name="father_name"
                                                                            placeholder="Nama Ayah Anak..."
                                                                            value="{{ $detail->father_name }}" />
                                                                        <div id="editFather_nameError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="mother_name{{ $data->id }}"
                                                                            class="form-label">Nama
                                                                            Ibu Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="mother_name{{ $data->id }}"
                                                                            name="mother_name"
                                                                            placeholder="Nama Ibu Anak..."
                                                                            value="{{ $detail->mother_name }}" />
                                                                        <div id="editMother_nameError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="identity_card{{ $data->id }}"
                                                                            class="form-label">Kartu
                                                                            Pengenal (KTP
                                                                            atau Kartu Pengenal Lainnya)</label>
                                                                        <input class="form-control" type="file"
                                                                            id="identity_card{{ $data->id }}"
                                                                            name="identity_card" />
                                                                        <div id="editIdentity_cardError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="birth_certificate{{ $data->id }}"
                                                                            class="form-label">Akta
                                                                            Kelahiran Anak</label>
                                                                        <input class="form-control" type="file"
                                                                            id="birth_certificate{{ $data->id }}"
                                                                            name="birth_certificate" />
                                                                        <div id="editBirthCertificateError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="family_card{{ $data->id }}"
                                                                            class="form-label">Kartu
                                                                            Keluarga</label>
                                                                        <input class="form-control" type="file"
                                                                            id="family_card{{ $data->id }}"
                                                                            name="family_card" />
                                                                        <div id="editFamily_cardError"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" data-id="{{ $data->id }}"
                                                                class="btn btn-primary mb-2 next-tab d-grid w-100 btnNextMessages">Berikutnya</button>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary d-grid w-100 btnPrevHome"
                                                                data-id="{{ $data->id }}">Sebelumnya</button>
                                                        </div>
                                                        <div class="tab-pane fade"
                                                            id="navs-justified-messages{{ $data->id }}"
                                                            role="tabpanel">
                                                            <div class="card mb-4">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label for="guardian_name{{ $data->id }}"
                                                                            class="form-label">Nama
                                                                            Wali Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="guardian_name{{ $data->id }}"
                                                                            name="guardian_name"
                                                                            placeholder="Nama Wali Anak..."
                                                                            value="{{ $detail->guardian_name }}" />
                                                                        <div id="editGuardian_nameError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="guardian_relationship{{ $data->id }}"
                                                                            class="form-label">Jenis
                                                                            Kelamin</label>
                                                                        <select class="form-select"
                                                                            id="guardian_relationship{{ $data->id }}"
                                                                            name="guardian_relationship"
                                                                            aria-label="Default select example">
                                                                            <option value="" hidden>Hubungan Wali
                                                                                Dengan Anak</option>
                                                                            <option value="Ayah"
                                                                                {{ $detail->guardian_relationship == 'Ayah' ? 'selected' : '' }}>
                                                                                Ayah</option>
                                                                            <option value="Ibu"
                                                                                {{ $detail->guardian_relationship == 'Ibu' ? 'selected' : '' }}>
                                                                                Ibu</option>
                                                                            <option value="Kerabat"
                                                                                {{ $detail->guardian_relationship == 'Kerabat' ? 'selected' : '' }}>
                                                                                Kerabat</option>
                                                                            <option value="Teman"
                                                                                {{ $detail->guardian_relationship == 'Teman' ? 'selected' : '' }}>
                                                                                Teman</option>
                                                                            <option value="Lainnya"
                                                                                {{ $detail->guardian_relationship == 'Lainnya' ? 'selected' : '' }}>
                                                                                Lainnya</option>
                                                                        </select>
                                                                        <div id="editGuardian_relationshipError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="guardian_address{{ $data->id }}"
                                                                            class="form-label">Alamat
                                                                            Wali Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="guardian_address{{ $data->id }}"
                                                                            name="guardian_address"
                                                                            placeholder="Alamat Wali Anak..."
                                                                            value="{{ $detail->guardian_address }}" />
                                                                        <div id="editGuardian_addressError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="guardian_phone_number{{ $data->id }}"
                                                                            class="form-label">Nomor
                                                                            Telepon
                                                                            Wali Anak</label>
                                                                        <input type="text" class="form-control"
                                                                            id="guardian_phone_number{{ $data->id }}"
                                                                            name="guardian_phone_number"
                                                                            placeholder="Nomor Telepon Wali Anak..."
                                                                            value="{{ $detail->guardian_phone_number }}" />
                                                                        <div id="editGuardian_phone_numberError{{ $data->id }}"
                                                                            class="invalid-feedback">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="guardian_email{{ $data->id }}"
                                                                            class="form-label">Email
                                                                            Wali Anak</label>
                                                                        <input type="email" class="form-control"
                                                                            id="guardian_email{{ $data->id }}"
                                                                            name="guardian_email"
                                                                            placeholder="Email Wali Anak..."
                                                                            value="{{ $detail->guardian_email }}" />
                                                                        <div id="editGuardian_emailError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="guardian_identity_card{{ $data->id }}"
                                                                            class="form-label">Kartu
                                                                            Pengenal
                                                                            Wali Anak (KTP
                                                                            atau Kartu Pengenal Lainnya)</label>
                                                                        <input class="form-control" type="file"
                                                                            id="guardian_identity_card{{ $data->id }}"
                                                                            name="guardian_identity_card" />
                                                                        <div id="editGuardian_identity_cardError"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="reason_for_leaving{{ $data->id }}"
                                                                            class="form-label">Alasan
                                                                            Menitipkan</label>
                                                                        <textarea class="form-control" id="reason_for_leaving{{ $data->id }}" name="reason_for_leaving"
                                                                            rows="3">{{ $detail->reason_for_leaving }}</textarea>
                                                                        <div id="editReason_for_leavingError{{ $data->id }}"
                                                                            class="invalid-feedback"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button"
                                                                class="btn btn-primary mb-2 d-grid w-100 updateSubmit"
                                                                data-id="{{ $data->id }}">Simpan</button>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary d-grid w-100 btnPrevProfile"
                                                                data-id="{{ $data->id }}">Sebelumnya</button>
                                                        </div>
                                                    @endforeach
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
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.anak-asuh.js.data-anak-asuh');
@endsection
