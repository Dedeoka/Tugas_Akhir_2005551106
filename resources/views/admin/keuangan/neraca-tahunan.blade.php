@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Laporan Keuangan Bulanan Panti Asuhan</b>
        </h4>

        <div class="card p-5">
            <div class="d-flex justify-content-between mb-3">
                <div class="w-50 d-flex">
                    <div class="me-2">
                        <select class="form-select me-4" id="yearSelector" aria-label="Default select example">
                            @foreach ($allYearsArray as $optionYear)
                                <option value="{{ $optionYear }}">
                                    {{ $optionYear }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="ml-auto">
                    <a href="{{ route('laporan-keuangan.tahunan') }}">
                        <button class="btn btn-success"><i class='bx bx-food-menu me-2'></i>Tampilan Laporan</button>
                    </a>
                    <a id="downloadLink" href="{{ route('download-neraca-tahunan') }}">
                        <button class="btn btn-primary"><i class='bx bxs-file-pdf me-2'></i>Download PDF</button>
                    </a>
                </div>
            </div>
            <div class="border border-3 border-dark text-center">
                <h5 class="fw-bold m-auto mb-2 mt-5 text-dark">PANTI ASUHAN DHARMA JATI II</h5>
                <h5 class="fw-bold m-auto mb-3 text-dark">NERACA KEUANGAN</h5>

                <h5 class="m-auto mb-4 text-dark" id="laporanPeriode"></h5>

                <div class="d-flex w-100">
                    <div class="d-flex w-50">
                        <div class="w-25 border-start-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">No Akun</h5>
                        </div>
                        <div class="w-75 border-start-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Nama Akun</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">Debet</h5>
                    </div>
                    <div class="w-25 border-start-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">Kredit</h5>
                    </div>
                </div>

                <div class="m-3"></div>
                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border border-2 border-dark">
                        <h5 class="text-start m-0 p-2 text-dark fw-bold">
                            Aktiva
                        </h5>
                    </div>
                    <div class="w-50 border-start-0 border-end-0 border border-2 border-dark">
                    </div>
                </div>

                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">201</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Kas</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="kasPanti"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">202</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Bantuan Luar Negeri</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="bantuanLuar"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">203</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Bantuan Pemerintah</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="bantuanPemerintah"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">204</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Donasi Umum</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="donasiUmum"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">205</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Donasi Beasiswa</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="donasiBeasiswa"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">206</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Hasil Usaha Produktif</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="hasilUsaha"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">207</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Aktiva Lain-Lain</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="aktivaLain"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                </div>

                <div class="m-3"></div>
                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border border-2 border-dark">
                        <h5 class="text-start m-0 p-2 text-dark fw-bold">
                            Pasiva
                        </h5>
                    </div>
                    <div class="w-50 border-start-0 border-end-0 border border-2 border-dark">
                    </div>
                </div>

                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">301</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Kebutuhan Pangan</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaPangan"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">302</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Kebutuhan Sandang</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaSandang"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">303</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Kebutuhan Papan</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaPapan"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">304</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Usaha Panti</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaUsaha"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">305</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Kegiatan Hari Raya</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaHariRaya"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">306</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Kegiatan Panti</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaKegiatan"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">307</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Pendidikan Anak</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaPendidikan"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">308</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Kesehatan Anak</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaKesehatan"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">309</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Biaya Prestasi Anak</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="biayaPrestasi"></h5>
                    </div>
                </div>
                <div class="d-flex w-100">
                    <div class="w-50 d-flex">
                        <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-end m-0 p-2 text-dark fw-bold">310</h5>
                        </div>
                        <div class="w-75 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">Pasiva Lain-Lain</h5>
                        </div>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="pasivaLain"></h5>
                    </div>
                </div>
                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border-bottom-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah
                        </h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-bottom-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="totalDebet"></h5>
                    </div>
                    <div class="w-25 border-start-0 border-top-0 border-bottom-0 border-end-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="totalKredit"></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.keuangan.js.neraca-tahunan')
@endsection
