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
                        <select class="form-select" id="monthSelector" name="month" aria-label="Default select example">
                            <option value="01">
                                Januari
                            </option>
                            <option value="02">
                                Februari
                            </option>
                            <option value="03">
                                Maret
                            </option>
                            <option value="04">
                                April
                            </option>
                            <option value="05">
                                Mei
                            </option>
                            <option value="06">
                                Juni
                            </option>
                            <option value="07">
                                Juli
                            </option>
                            <option value="08">
                                Agustus
                            </option>
                            <option value="09">
                                September
                            </option>
                            <option value="10">
                                Oktober
                            </option>
                            <option value="11">
                                November
                            </option>
                            <option value="12">
                                Desember
                            </option>
                        </select>
                    </div>
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
                    <a href="{{ route('neraca-keuangan.bulanan') }}">
                        <button class="btn btn-success"><i class='bx bx-food-menu me-2'></i>Tampilan Neraca</button>
                    </a>
                    <a id="downloadLink" href="{{ route('download-laporan-bulanan') }}">
                        <button class="btn btn-primary"><i class='bx bxs-file-pdf me-2'></i>Download PDF</button>
                    </a>
                </div>
            </div>
            <div class="border border-3 border-dark text-center">
                <h5 class="fw-bold m-auto mb-2 mt-5 text-dark">PANTI ASUHAN DHARMA JATI II</h5>
                <h5 class="fw-bold m-auto mb-3 text-dark">LAPORAN KEUANGAN</h5>

                <h5 class="m-auto mb-4 text-dark" id="laporanPeriode"></h5>

                <div class="d-flex mb-5 bg-laporan">
                    <div class="border-start-0 border border-2 border-dark w-50 text-center fw-bold text-dark p-2 fs-5"
                        id="kasTahunLalu">
                    </div>
                    <div class="border-top border-bottom border-2 border-dark w-50 text-center fw-bold text-dark p-2 fs-5">
                        Rp 50.000.000,00
                    </div>
                </div>

                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border border-2  border-dark"></div>
                    <div class="w-50 border-top border-bottom border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="year"></h5>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="wid-10 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">I</h5>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark fw-bold">PENERIMAAN :</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">1</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bantuan Luar Negeri</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark" id="bantuanLuar">

                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">2</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bantuan Pemerintah</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="bantuanPemerintah">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">3</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Umum</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark" id="donasiUmum">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">4</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Beasiswa</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="donasiBeasiswa">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">5</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Hasil Usaha Produktif</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="hasilUsaha">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">6</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bunga Bank</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark" id="bungaBank">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">7</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Penerimaan Lain-lain</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="otherIncome">
                    </div>
                </div>

                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Penerimaan
                        </h5>
                    </div>
                    <div class="w-50 border-bottom border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="totalAmount"></h5>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="wid-10 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="m-0 p-2 text-dark fw-bold">II</h5>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark fw-bold">PENGELUARAN :</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">1</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Kebutuhan Pangan</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaPangan">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">2</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Kebutuhan Sandang</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaSandang">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">3</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Kebutuhan Papan</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaPapan">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">4</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Usaha Panti</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaUsaha">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">5</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Kegiatan Hari Raya</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaHariRaya">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">6</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Kegiatan Panti</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaKegiatan">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">7</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Pendidikan Anak</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaPendidikan">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">8</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Kesehatan Anak</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaKesehatan">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">9</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Prestasi Anak</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark"
                        id="biayaPrestasi">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex w-50">
                        <div class="w-25 d-flex">
                            <div class="wid-46 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark"></h5>
                            </div>
                            <div class="wid-55 border-start-0 border-top-0 border border-2 border-dark">
                                <h5 class="m-0 p-2 text-dark">10</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Biaya Lain-Lain</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark" id="otherCost">
                    </div>
                </div>

                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Pengeluaran
                        </h5>
                    </div>
                    <div class="w-50">
                        <h5 class="m-0 p-2 border-bottom border-2 border-dark text-dark fw-bold" id="totalCost"></h5>
                    </div>
                </div>

                <div class="d-flex mt-5 bg-laporan">
                    <div class="w-50 border-start-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold" id="totalStatus">

                        </h5>
                    </div>
                    <div class="w-50">
                        <h5 class="m-0 p-2 border-bottom border-top border-2 border-dark text-dark fw-bold"
                            id="total">
                        </h5>
                    </div>
                </div>
                <div class="d-flex mb-5 bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Saldo Kas Akhir Tahun Ini
                        </h5>
                    </div>
                    <div class="w-50">
                        <h5 class="m-0 p-2 border-bottom border-2 border-dark text-dark fw-bold">Rp</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.keuangan.js.laporan-bulanan')
@endsection
