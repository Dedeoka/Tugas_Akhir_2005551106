<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Panti Asuhan Dharma Jati II</title>
    <meta name="description" content="" />
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .laporan-card {
            padding: 20px;
        }

        .laporan-border {
            border: 3px solid black;
        }

        .laporan-title {
            font-weight: bold;
            text-align: center;
            color: black;
            font-size: 1.35rem;
        }

        .laporan-subtitle {
            text-align: center;
            color: black;
            font-size: 1.25rem;
            font-weight: 500;
        }

        .tb-flex {
            display: -webkit-box;
            /* wkhtmltopdf uses this one */
            display: flex;
            -webkit-box-pack: center;
            /* wkhtmltopdf uses this one */
            justify-content: center;
        }

        .wid-50 {
            width: 50%;
        }

        .wid-45 {
            width: 45%;
        }

        .wid-40 {
            width: 40%;
        }

        .wid-30 {
            width: 30%;
        }

        .wid-25 {
            width: 25%;
        }

        .wid-20 {
            width: 20%;
        }

        .wid-10 {
            width: 10%;
        }

        .wid-11 {
            width: 11%;
        }

        .wid-100 {
            width: 100%;
        }

        .wid-5 {
            width: 5%;
        }

        .tb-title {
            text-align: center;
            margin: 0px;
            padding: 15px;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .tb-subtitle {
            margin: 0px;
            padding: 15px;
            font-weight: bold;
            font-size: 1.15rem;
        }

        .tb-text {
            margin: 0px;
            padding: 15px;
            font-weight: 500;
            font-size: 1.15rem;
        }

        .tb-text-number {
            text-align: center;
            margin: 0px;
            padding: 15px;
            font-weight: 500;
            font-size: 1.15rem;
        }
    </style>
</head>

<body>
    <div class="laporan-card">
        <div class="laporan-border">
            <h5 class="laporan-title" style="margin: 50px 0 10px 0;">PANTI ASUHAN DHARMA JATI II</h5>
            <h5 class="laporan-title" style="margin: 0 0 20px 0;">LAPORAN KEUANGAN</h5>

            <h5 class="laporan-subtitle" id="laporanPeriode" style="margin: 0px;"> {{ $periode }}
            </h5>

            <div class="tb-flex" style="margin: 30px 0 70px 0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-right: 2px solid black; border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        @isset($previousMonthName)
                            Jumlah Saldo Kas Akhir Bulan {{ $previousMonthName }} Tahun {{ $year - 1 }}
                        @else
                            Jumlah Saldo Kas Akhir Tahun {{ $year - 1 }}
                        @endisset
                    </h5>
                </div>
                <div class="wid-50" style="border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        {{ $previousTotalAmountFormatted }}
                    </h5>
                </div>
            </div>

            <div class="tb-flex" style="margin:0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-right: 2px solid black; border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                    </h5>
                </div>
                <div class="wid-50" style="border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        {{ $year }}
                    </h5>
                </div>
            </div>

            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-subtitle">
                            I
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-subtitle" style="text-align:start">
                            PENERIMAAN :
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-subtitle">
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-subtitle">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            1
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Bantuan Luar Negeri
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $bantuanLuar }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-subtitle">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            2
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Bantuan Pemerintah
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $bantuanPemerintah }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            3
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Donasi Umum
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $donasiUmum }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            4
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Donasi Beasiswa Umum
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $donasiBeasiswa }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            5
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Hasil Usaha Produktif
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $hasilUsaha }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            6
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Bunga Bank
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $bungaBank }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            7
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Penerimaan Lain-Lain
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $otherIncome }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin:0; background-color: #C0C0C0;">
                <div class="wid-50" style="border-right: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        Jumlah Penerimaan
                    </h5>
                </div>
                <div class="wid-50" style="border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        {{ $totalAmountFormatted }}
                    </h5>
                </div>
            </div>

            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-subtitle">
                            II
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-subtitle" style="text-align:start">
                            PENGELUARAN :
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-subtitle">
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            1
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Kebutuhan Pangan
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaPangan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            2
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Kebutuhan Sandang
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaSandang }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            3
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Kebutuhan Papan
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaPapan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            4
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Usaha Panti
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaUsaha }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            5
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Kegiatan Hari Raya
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaHariRaya }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            6
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Kegiatan Panti
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaKegiatan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            7
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Pendidikan Anak
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaPendidikan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            8
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Kesehatan Anak
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaKesehatan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            9
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Prestasi Anak
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $biayaPrestasi }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">

                        </h5>
                    </div>
                    <div class="wid-11" style="border-right: 2px solid black;">
                        <h5 class="tb-text">
                            10
                        </h5>
                    </div>
                    <div class="wid-100">
                        <h5 class="tb-text" style="text-align:start">
                            Biaya Lain-Lain
                        </h5>
                    </div>
                </div>
                <div class="wid-50" style=" border-bottom: 2px solid black;">
                    <h5 class="tb-text-number">
                        {{ $otherCost }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin:0; background-color: #C0C0C0;">
                <div class="wid-50" style="border-right: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        Jumlah Pengeluaran
                    </h5>
                </div>
                <div class="wid-50" style="border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        {{ $totalCostFormatted }}
                    </h5>
                </div>
            </div>

            <div class="tb-flex" style="margin:50px 0 0 0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-right: 2px solid black; border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        ({{ $status }}) Jumlah Total
                    </h5>
                </div>
                <div class="wid-50" style="border-bottom: 2px solid black; border-top: 2px solid black;">
                    <h5 class="tb-title">
                        {{ $total }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin:0 0 80px 0; background-color: #C0C0C0;">
                <div class="wid-50" style="border-right: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        @isset($previousMonthName)
                            Jumlah Saldo Kas Akhir Bulan Ini
                        @else
                            Jumlah Saldo Kas Akhir Tahun Ini
                        @endisset
                    </h5>
                </div>
                <div class="wid-50" style="border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                        {{ $totalAkhirFormatted }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
