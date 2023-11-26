@extends('layouts.admin')

@section('menu-bar')
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Dashboard</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Basic">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div data-i18n="Profile">Profile Panti</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                        class="menu-link">
                        <div data-i18n="CRM">Data Profile Panti</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <div data-i18n="Analytics">Pengumuman</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <div data-i18n="Analytics">Foto Panti Asuhan</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-party"></i>
                <div data-i18n="Profile">Program Kegiatan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                        class="menu-link">
                        <div data-i18n="CRM">Data Program Kegiatan Panti Asuhan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <div data-i18n="Analytics">Foto Program Kegiatan Panti Asuhan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html"
                        class="menu-link">
                        <div data-i18n="CRM">Data Program Kegiatan Donatur</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <div data-i18n="Analytics">Foto Program Kegiatan Donatur</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <!-- Apps -->
        <li class="menu-item">
            <a href="{{ route('daftar-sekolah.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-school'></i>
                <div data-i18n="Email">Daftar Sekolah</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{ route('kategori-barang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                <div data-i18n="Email">Kategori Barang</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-pemasukan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Email">Kategori Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-pengeluaran.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div data-i18n="Email">Kategori Pengeluaran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-penyakit.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-virus"></i>
                <div data-i18n="Email">Kategori Penyakit</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kategori-program.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-party"></i>
                <div data-i18n="Email">Kategori Program Panti</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Donasi</span></li>
        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic">Donasi Uang</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-donate-heart"></i>
                <div data-i18n="Basic">Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Basic">Donasi Beasiswa</div>
            </a>
        </li>
        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Keuangan</span></li>
        <!-- Tables -->
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-wallet"></i>
                <div data-i18n="Tables">Pemasukan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money-withdraw"></i>
                <div data-i18n="Tables">Pengularan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Tables">Laporan Bulanan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-food-menu"></i>
                <div data-i18n="Tables">Laporan Tahunan</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Anak Asuh</span></li>
        <li class="menu-item">
            <a href="{{ route('data-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-child"></i>
                <div data-i18n="Support">Data Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('pendidikan-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Documentation">Pendidikan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('kesehatan-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-heart"></i>
                <div data-i18n="Documentation">Kesehatan Anak Asuh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('prestasi-anak.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-medal"></i>
                <div data-i18n="Documentation">Prestasi Anak Asuh</div>
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Master Data /</span> <b>Kategori Donasi Barang</b>
        </h4>


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="d-flex">
                <div class="w-75 m-3 quick-sand">
                    <h3>
                        Tabel Data Kategori Donasi Barang
                    </h3>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="mt-3 mb-3">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class='bx bx-export m-1'></i>
                                Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-3 col-md-6 quick-sand">
                    <div class="mt-3 mb-3">
                        <div class="d-flex">
                            <div class="side-content">

                            </div>
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
                                                    <input type="text" id="nameBasic" name="name"
                                                        class="form-control" placeholder="Enter Name" />
                                                    <div id="nameError" class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
            <div class="card-datatable table-responsive">
                @if ($datas->total() > 0)
                    <table class="datatables-basic table border-top quick-sand" id="kategoriBarangTable">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center fw-bold">No</th>
                                <th class="col-md-5 text-center fw-bold">Nama</th>
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
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Data Kategori Donasi Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('kategori-barang.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="editName{{ $data->id }}" class="form-label">Nama Kategori
                                                Donasi Barang</label>
                                            <input type="text" id="editName{{ $data->id }}" name="name"
                                                class="form-control" value="{{ $data->name }}" />
                                            <div id="editNameError{{ $data->id }}" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary updateSubmit"
                                        data-id="{{ $data->id }}">Save Changes</button>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Tambahkan ini ke head tag HTML Anda jika belum ada -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
        $(document).ready(function() {
            // Setup CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function clearForm() {
                $('#nameBasic').val('');
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

            $('#basicModal').on('hidden.bs.modal', function() {
                clearForm();
            });

            $('#postSubmit').click(function(e) {
                e.preventDefault();
                simpan();
                return false;
            });

            function simpan() {
                $.ajax({
                    url: "{{ route('kategori-barang.store') }}",
                    type: 'POST',
                    data: {
                        name: $('#nameBasic').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.errors) {
                            $('#nameBasic').addClass('is-invalid');
                            $('#nameError').text(response.errors.name[0]);
                        } else {
                            showSuccessMessage(response.success);
                            $('#basicModal').modal('hide');
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
                    url: "{{ url('master-data/kategori-barang') }}/" + id,
                    type: 'PATCH',
                    data: {
                        name: $('#editName' + id).val(),
                        _token: '{{ csrf_token() }}'
                    },
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
                fetch(`/master-data/kategori-barang/${dataId}`, {
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
