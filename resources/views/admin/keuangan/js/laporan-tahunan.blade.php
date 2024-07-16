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
                    const biayaUsaha = document.getElementById('biayaUsaha');
                    biayaUsaha.innerHTML = formatCurrency(data.biayaUsaha);
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

                    const laporanPeriode = document.getElementById('laporanPeriode');
                    laporanPeriode.innerHTML = 'PERIODE 1 JANUARI S / D 31 DESEMBER ' + data.year;


                    const kasTahunLalu = document.getElementById('kasTahunLalu');
                    kasTahunLalu.innerHTML = 'Saldo Kas Akhir Tahun ' + data.previousYear;

                    const jumlahKasTahunLalu = document.getElementById('jumlahKasTahunLalu');
                    jumlahKasTahunLalu.innerHTML = formatCurrency(data.previousYearlyReport
                        .total_amount);

                    let previousTotalAmount = parseFloat(data.previousYearlyReport.total_amount);
                    let currentTotal = parseFloat(data.total);

                    let formattedTotal; // Deklarasikan di luar blok if

                    // Pastikan nilai yang dikonversi bukan NaN (Not a Number)
                    if (isNaN(previousTotalAmount) || isNaN(currentTotal)) {
                        console.error("Nilai tidak valid untuk penjumlahan");
                    } else {
                        let kasTotalTahunIni = previousTotalAmount + currentTotal;

                        // Memformat hasil penjumlahan ke dalam format mata uang
                        formattedTotal = formatCurrency(kasTotalTahunIni);

                        console.log(formattedTotal);
                    }

                    if (formattedTotal !==
                        undefined) { // Pastikan formattedTotal telah diinisialisasi
                        const kasTahunIni = document.getElementById('kasTahunIni');
                        kasTahunIni.innerHTML = formattedTotal;
                    }

                    const year = document.getElementById('year');
                    year.innerHTML = data.year;
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var yearSelector = document.getElementById("yearSelector");
        var downloadLink = document.getElementById("downloadLink");

        yearSelector.addEventListener("change", function() {
            var selectedYear = yearSelector.value;
            downloadLink.href = "{{ route('download-laporan-tahunan') }}?year=" + selectedYear;
        });
    });
</script>
