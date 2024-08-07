<script>
    $(document).ready(function() {
        var selectedYear = $('#yearSelector').val();
        var selectedMonthValue = $('#monthSelector').val();
        var selectedMonthText = $('#monthSelector').find(':selected').text();

        fetchMonthlyReport(selectedYear, selectedMonthValue, selectedMonthText);
        updateDownloadLink(selectedYear, selectedMonthValue, selectedMonthText);

        $('#yearSelector').change(function() {
            var selectedYear = $(this).val();
            var selectedMonth = $('#monthSelector').val();
            fetchMonthlyReport(selectedYear, selectedMonth);
            updateDownloadLink(selectedYear, selectedMonth);
        });

        $('#monthSelector').change(function() {
            var selectedYear = $('#yearSelector').val();
            var selectedMonthValue = $(this).val();
            var selectedMonthText = $(this).find(':selected').text();
            fetchMonthlyReport(selectedYear, selectedMonthValue, selectedMonthText);
            updateDownloadLink(selectedYear, selectedMonthValue, selectedMonthText);
        });

        function fetchMonthlyReport(selectedYear, selectedMonthValue, selectedMonthText) {
            var url = "{{ route('neraca-keuangan.bulananReport') }}";
            if (selectedYear) {
                url += "?year=" + selectedYear;
            }
            if (selectedMonthValue) {
                url += "&month=" + selectedMonthValue;
            }
            if (selectedMonthText) {
                url += "&monthName=" + selectedMonthText;
            }
            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    const laporanPeriode = document.getElementById('laporanPeriode');
                    laporanPeriode.innerHTML = 'Periode 1 S / D 31 ' + data.monthName + ' ' + data
                        .year;
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
                    const kasPanti = document.getElementById('kasPanti');
                    kasPanti.innerHTML = formatCurrency(data.previousMonthlyReport.total_amount);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function updateDownloadLink(selectedYear, selectedMonthValue, selectedMonthText) {
            var downloadLink = $("#downloadLink");
            downloadLink.attr("href", "{{ route('download-neraca-bulanan') }}?year=" + selectedYear +
                "&month=" + selectedMonthValue + "&monthName=" + selectedMonthText);
        }

        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
    });
</script>
