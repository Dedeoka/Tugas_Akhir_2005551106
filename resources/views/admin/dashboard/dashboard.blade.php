@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang Admin! 🎉</h5>
                                <p class="mb-4">
                                    Dashboard Admin Panti Asuhan Dharma Jati II
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class='bx bx-child bx-md'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $anakAsuhAktif }}
                                <span class="text-muted">
                                    Anak
                                </span>
                            </h4>
                        </div>
                        <p class="mb-1">Jumlah Anak Asuh Panti Yang Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-damger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class='bx bx-plus-medical'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $anakAsuhSakit }}
                                <span class="text-muted">
                                    Anak
                                </span>
                            </h4>
                        </div>
                        <p class="mb-1">Jumlah Anak Asuh Yang Sedang Sakit</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class='bx bxs-graduation'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">
                                {{ $anakAsuhAktifSekolah }}
                                <span class="text-muted">
                                    Anak
                                </span>
                            </h4>
                        </div>
                        <p class="mb-1">Jumlah Anak Asuh Yang Aktif Sekolah </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success"><i class='bx bx-medal'></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">
                                {{ $prestasiTotal }}
                                <span class="text-muted">
                                    Perlombaan
                                </span>
                            </h4>
                        </div>
                        <p class="mb-1">Jumlah Perlombaan Yang Diikuti Anak Asuh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
