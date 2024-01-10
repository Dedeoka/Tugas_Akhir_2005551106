@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Laporan Keuangan Tahunan Panti Asuhan</b>
        </h4>

        <div class="card p-5">
            <select class="form-select me-4 border-0" id="yearSelector" aria-label="Default select example">
                @foreach ($allYearsArray as $year)
                    <option value="{{ $year }}" @if ($loop->first) selected @endif>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
            <div class="border border-3 border-dark text-center">
                <h5 class="fw-bold m-auto mb-2 mt-5 text-dark">PANTI ASUHAN DHARMA JATI II</h5>
                <h5 class="fw-bold m-auto mb-3 text-dark">LAPORAN KEUANGAN</h5>

                <h5 class="m-auto mb-4 text-dark">PERIODE 1 JANUARI S/D 31 DESEMBER</h5>

                <div class="d-flex mb-5 bg-laporan">
                    <div class="border-start-0 border border-2 border-dark w-50 text-center fw-bold text-dark p-2 fs-5">
                        Jumlah Saldo Kas Akhir Tahun X
                    </div>
                    <div class="border-top border-bottom border-2 border-dark w-50 text-center fw-bold text-dark p-2 fs-5">
                        Rp 50.000.000,00
                    </div>
                </div>

                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border border-2  border-dark"></div>
                    <div class="w-50 border-top border-bottom border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">2018</h5>
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
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Beasiswa Umum</h5>
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
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark" id="hasilUsaha">
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
                            id="total"></h5>
                    </div>
                </div>
                <div class="d-flex mb-5 bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Penerimaan
                        </h5>
                    </div>
                    <div class="w-50">
                        <h5 class="m-0 p-2 border-bottom border-2 border-dark text-dark fw-bold">Rp 50.000.000,00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            fetchYearlyReport();

            $('#yearSelector').change(function() {
                fetchYearlyReport($(this).val());
            });

            function fetchYearlyReport(selectedYear = null) {
                let url = "{{ route('laporan-keuangan.tahunanReport') }}";
                if (selectedYear) {
                    url += "?year=" + selectedYear;
                }
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        console.log(data);
                        const bantuanLuar = document.getElementById('bantuanLuar');
                        bantuanLuar.innerHTML = formatCurrency(data.bantuanLuar);
                        const bantuanPemerintah = document.getElementById('bantuanPemerintah');
                        bantuanPemerintah.innerHTML = formatCurrency(data.bantuanPemerintah);
                        const hasilUsaha = document.getElementById('hasilUsaha');
                        hasilUsaha.innerHTML = formatCurrency(data.hasilUsaha);
                        const bungaBank = document.getElementById('bungaBank');
                        bungaBank.innerHTML = formatCurrency(data.bungaBank);
                        const otherIncome = document.getElementById('otherIncome');
                        otherIncome.innerHTML = formatCurrency(data.otherIncome);
                        const donasiUmum = document.getElementById('donasiUmum');
                        donasiUmum.innerHTML = formatCurrency(data.donasiUmum);
                        const donasiBeasiswa = document.getElementById('donasiBeasiswa');
                        donasiBeasiswa.innerHTML = formatCurrency(data.donasiBeasiswa);
                        const totalAmount = document.getElementById('totalAmount');
                        totalAmount.innerHTML = formatCurrency(data.totalAmount);
                        const biayaPangan = document.getElementById('biayaPangan');
                        biayaPangan.innerHTML = formatCurrency(data.biayaPangan);
                        const biayaSandang = document.getElementById('biayaSandang');
                        biayaSandang.innerHTML = formatCurrency(data.biayaSandang);
                        const biayaPapan = document.getElementById('biayaPapan');
                        biayaPapan.innerHTML = formatCurrency(data.biayaPapan);
                        const biayaHariRaya = document.getElementById('biayaHariRaya');
                        biayaHariRaya.innerHTML = formatCurrency(data.biayaHariRaya);
                        const biayaKegiatan = document.getElementById('biayaKegiatan');
                        biayaKegiatan.innerHTML = formatCurrency(data.biayaKegiatan);
                        const biayaKesehatan = document.getElementById('biayaKesehatan');
                        biayaKesehatan.innerHTML = formatCurrency(data.biayaKesehatan);
                        const biayaPendidikan = document.getElementById('biayaPendidikan');
                        biayaPendidikan.innerHTML = formatCurrency(data.biayaPendidikan);
                        const biayaPrestasi = document.getElementById('biayaPrestasi');
                        biayaPrestasi.innerHTML = formatCurrency(data.biayaPrestasi);
                        const otherCost = document.getElementById('otherCost');
                        otherCost.innerHTML = formatCurrency(data.otherCost);
                        const totalCost = document.getElementById('totalCost');
                        totalCost.innerHTML = formatCurrency(data.totalCost);
                        const total = document.getElementById('total');
                        total.innerHTML = formatCurrency(data.total);
                        const totalStatus = document.getElementById('totalStatus');
                        const jumlahTotal = data
                            .total;

                        if (jumlahTotal < 0) {
                            totalStatus.innerHTML = `(Defisit) Jumlah Total`;
                        } else {
                            totalStatus.innerHTML = `(Surplus) Jumlah Total`;
                        };
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }

            function formatCurrency(value) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(value);
            }
        });
    </script>
@endsection
