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

        .wid-75 {
            width: 75%;
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
            padding: 10px;
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
            <h5 class="laporan-title" style="margin: 0 0 20px 0;">NERACA KEUANGAN</h5>

            <h5 class="laporan-subtitle" id="laporanPeriode" style="margin-bottom: 40px;">
                {{ $periode }}
            </h5>

            {{-- <div class="tb-flex" style="margin:0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-right: 2px solid black; border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">
                    </h5>
                </div>
                <div class="wid-50" style="border-top: 2px solid black; border-bottom: 2px solid black;">
                    <h5 class="tb-title">

                    </h5>
                </div>
            </div> --}}

            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-top:2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">No
                            Akun</h5>
                    </div>
                    <div class="wid-75"
                        style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Nama Akun</h5>

                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black; border-top:2px solid black; border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">
                        Debet
                    </h5>
                </div>
                <div class="wid-25"
                    style="border-top:2px solid black; border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">
                        Kredit
                    </h5>
                </div>
            </div>
            <div style="margin-bottom: 20px;"></div>
            <div class="tb-flex" style="margin: 0 0 0 0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-top:2px solid black;  border-right:2px solid black; text-align: left;">
                    <h5 class="tb-subtitle">Aktiva</h5>
                </div>
                <div class="wid-25" style="border-right: 2px solid black;  border-top:2px solid black;">
                    <h5 class="tb-subtitle">
                    </h5>
                </div>
                <div class="wid-25" style=" border-top:2px solid black;">
                    <h5 class="tb-subtitle">
                    </h5>
                </div>
            </div>

            <div class="tb-flex" style="margin: 0 0 0 0; border-top:2px solid black;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            201</h5>
                    </div>
                    <div class="wid-75" style="border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Kas</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="kasPanti">
                        {{ $previousTotalAmountFormatted }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            202</h5>
                    </div>
                    <div class="wid-75" style="border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Bantuan Luar Negeri</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="bantuanLuar">
                        {{ $bantuanLuar }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            203</h5>
                    </div>
                    <div class="wid-75" style="border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Bantuan Pemerintah</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="bantuanPemerintah">
                        {{ $bantuanPemerintah }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            204</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Donasi Umum</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="donasiUmum">
                        {{ $donasiUmum }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            205</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle" id="donasiBeasiswa">Donasi Beasiswa</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">
                        {{ $donasiBeasiswa }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            206</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle" id="hasilUsaha">Hasil Usaha Produktif</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="aktivaLain">
                        {{ $hasilUsaha }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            207</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Aktiva Lain-Lain</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">
                        {{ $otherIncome }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
            </div>

            <div style="margin-bottom: 20px;"></div>
            <div class="tb-flex" style="margin: 0 0 0 0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-top:2px solid black;  border-right:2px solid black; text-align: left;">
                    <h5 class="tb-subtitle">Pasiva</h5>
                </div>
                <div class="wid-25" style="border-right: 2px solid black;  border-top:2px solid black;">
                    <h5 class="tb-subtitle">
                    </h5>
                </div>
                <div class="wid-25" style=" border-top:2px solid black;">
                    <h5 class="tb-subtitle">
                    </h5>
                </div>
            </div>

            <div class="tb-flex" style="margin: 0 0 0 0; border-top:2px solid black;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            301</h5>
                    </div>
                    <div class="wid-75" style="border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Kebutuhan Pangan</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaPangan">
                        {{ $biayaPangan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            302</h5>
                    </div>
                    <div class="wid-75" style="border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Kebutuhan Sandang</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaSandang">
                        {{ $biayaSandang }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            303</h5>
                    </div>
                    <div class="wid-75" style="border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Kebutuhan Papan</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaPapan">
                        {{ $biayaPapan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            304</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Usaha Panti</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaUsaha">
                        {{ $biayaUsaha }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            305</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Kegiatan Hari Raya</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaHariRaya">
                        {{ $biayaHariRaya }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            306</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Kegiatan Panti</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaKegiatan">
                        {{ $biayaKegiatan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            307</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Pendidikan Anak</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaPendidikan">
                        {{ $biayaPendidikan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            308</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Kesehatan Anak</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaKesehatan">
                        {{ $biayaKesehatan }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            309</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Biaya Prestasi Anak</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="biayaPrestasi">
                        {{ $biayaPrestasi }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0;">
                <div class="wid-50 tb-flex" style="border-right: 2px solid black;">
                    <div class="wid-25">
                        <h5 class="tb-subtitle"
                            style="border-right: 2px solid black; border-bottom: 2px solid black; text-align: right;">
                            310</h5>
                    </div>
                    <div class="wid-75" style=" border-bottom: 2px solid black; text-align: center;">
                        <h5 class="tb-subtitle">Pasiva Lain-Lain</h5>
                    </div>
                </div>
                <div class="wid-25"
                    style="border-right: 2px solid black;  border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">

                    </h5>
                </div>
                <div class="wid-25" style=" border-bottom: 2px solid black; text-align: center;">
                    <h5 class="tb-subtitle" id="pasivaLain">
                        {{ $otherCost }}
                    </h5>
                </div>
            </div>
            <div class="tb-flex" style="margin: 0 0 0 0; background-color: #C0C0C0;">
                <div class="wid-50"
                    style="border-top:2px solid black;  border-right:2px solid black; text-align: center;">
                    <h5 class="tb-subtitle">Jumlah</h5>
                </div>
                <div class="wid-25" style="border-right: 2px solid black;  border-top:2px solid black;">
                    <h5 class="tb-subtitle" id="totalDebet">
                        {{ $totalAmountFormatted }}
                    </h5>
                </div>
                <div class="wid-25" style=" border-top:2px solid black;">
                    <h5 class="tb-subtitle" id="totalKredit">
                        {{ $totalCostFormatted }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
