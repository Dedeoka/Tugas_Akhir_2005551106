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
                    const otherIncome = document.getElementById('aktivaLain');
                    otherIncome.innerHTML = formatCurrency(data.otherIncome);
                    const donasiUmum = document.getElementById('donasiUmum');
                    donasiUmum.innerHTML = formatCurrency(data.donasiUmum);
                    const donasiBeasiswa = document.getElementById('donasiBeasiswa');
                    donasiBeasiswa.innerHTML = formatCurrency(data.donasiBeasiswa);
                    const totalAmount = document.getElementById('totalDebet');
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
                    const otherCost = document.getElementById('pasivaLain');
                    otherCost.innerHTML = formatCurrency(data.otherCost);
                    const totalCost = document.getElementById('totalKredit');
                    totalCost.innerHTML = formatCurrency(data.totalCost);

                    const laporanPeriode = document.getElementById('laporanPeriode');
                    laporanPeriode.innerHTML = 'PERIODE 1 JANUARI S / D 31 DESEMBER ' + data.year;

                    // const year = document.getElementById('year');
                    // year.innerHTML = data.year;
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
            downloadLink.href = "{{ route('download-neraca-tahunan') }}?year=" + selectedYear;
        });
    });
</script>
