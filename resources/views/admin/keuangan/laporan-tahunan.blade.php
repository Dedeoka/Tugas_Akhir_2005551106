@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Keuangan /</span> <b>Laporan Keuangan Tahunan Panti Asuhan</b>
        </h4>

        <div class="card p-5">
            <select class="form-select me-4 border-0" id="angka" name="angka" aria-label="Default select example">
                <option value="1">
                    1
                </option>
                <option value="2">
                    2
                </option>
                <option value="3">
                    3
                </option>
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
                                <h5 class="m-0 p-2 text-dark">2</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bantuan Pemerintah</h5>
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
                                <h5 class="m-0 p-2 text-dark">3</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Umum</h5>
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
                                <h5 class="m-0 p-2 text-dark">4</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Beasiswa Umum</h5>
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
                                <h5 class="m-0 p-2 text-dark">5</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Hasil Usaha Produktif</h5>
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
                                <h5 class="m-0 p-2 text-dark">6</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bunga Bank</h5>
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
                                <h5 class="m-0 p-2 text-dark">7</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Penerimaan Lain-lain</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                    </div>
                </div>

                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Penerimaan
                        </h5>
                    </div>
                    <div class="w-50 border-bottom border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">Rp 50.000.000,00</h5>
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
                            <h5 class="text-start m-0 p-2 text-dark">Bantuan Luar Negeri</h5>
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
                                <h5 class="m-0 p-2 text-dark">2</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bantuan Pemerintah</h5>
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
                                <h5 class="m-0 p-2 text-dark">3</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Umum</h5>
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
                                <h5 class="m-0 p-2 text-dark">4</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Beasiswa Umum</h5>
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
                                <h5 class="m-0 p-2 text-dark">5</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bantuan Pemerintah</h5>
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
                                <h5 class="m-0 p-2 text-dark">6</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Donasi Beasiswa Umum</h5>
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
                                <h5 class="m-0 p-2 text-dark">7</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Hasil Usaha Produktif</h5>
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
                                <h5 class="m-0 p-2 text-dark">8</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Bunga Bank</h5>
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
                                <h5 class="m-0 p-2 text-dark">9</h5>
                            </div>
                        </div>
                        <div class="w-100 border-start-0 border-top-0 border border-2 border-dark">
                            <h5 class="text-start m-0 p-2 text-dark">Penerimaan Lain-lain</h5>
                        </div>
                    </div>
                    <div class="w-50 border-start-0 border-top-0 border-end-0 border border-2 border-dark">
                    </div>
                </div>

                <div class="d-flex bg-laporan">
                    <div class="w-50 border-start-0 border-top-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Penerimaan
                        </h5>
                    </div>
                    <div class="w-50">
                        <h5 class="m-0 p-2 border-bottom border-2 border-dark text-dark fw-bold">Rp 50.000.000,00</h5>
                    </div>
                </div>

                <div class="d-flex mt-5 bg-laporan">
                    <div class="w-50 border-start-0 border border-2 border-dark">
                        <h5 class="m-0 p-2 text-dark fw-bold">
                            Jumlah Penerimaan
                        </h5>
                    </div>
                    <div class="w-50">
                        <h5 class="m-0 p-2 border-bottom border-top border-2 border-dark text-dark fw-bold">Rp
                            50.000.000,00</h5>
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
        document.getElementById('angka').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
@endsection
