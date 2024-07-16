<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\DonateMoney;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Cost;
use App\Models\ChildCostDetail;
use App\Models\Scholarship;
use PDF;
use Illuminate\Support\Facades\Artisan;
use App\Models\MonthlyReport;
use App\Models\AnnualReport;
use Illuminate\Support\Carbon;

class LaporanKeuanganController extends Controller
{
    public function laporanTahunan(){
        $costYears = Cost::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $childCostDetailYears = ChildCostDetail::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $incomeYears = Income::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $donateMoneyYears = DonateMoney::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $scholarshipYears = Scholarship::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });


        $allYears = collect()
            ->merge($costYears)
            ->merge($childCostDetailYears)
            ->merge($incomeYears)
            ->merge($donateMoneyYears)
            ->merge($scholarshipYears)
            ->unique()
            ->sortDesc();

        $allYearsArray = $allYears->toArray();
        Artisan::call('create:cash-data-manual');

        return view('admin.keuangan.laporan-tahunan', compact('allYearsArray'));
    }

    public function laporanTahunanReport(Request $request){

        $year = intval($request->input('year', now()->year));

        $date = Carbon::createFromDate($year, 1);
        $previousYearDate = $date->subYear();
        $previousYear = $previousYearDate->format('Y');

        // Ambil data dari YearlyReport untuk bulan sebelumnya
        $previousYearlyReport = AnnualReport::where('Year', $previousYear)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        if ($previousYearlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousYearlyReport->total_amount));
        } else {
            $previousYearlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousYearlyReport->total_amount = $previousTotalAmount;
            $previousYearlyReport->year = $previousYear;
        }

        $bantuanLuar = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Luar Negeri');
        })->whereYear('created_at', $year)->sum('total_amount');

        $bantuanPemerintah = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Pemerintah');
        })->whereYear('created_at', $year)->sum('total_amount');

        $hasilUsaha = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Hasil Usaha Produktif');
        })->whereYear('created_at', $year)->sum('total_amount');

        $bungaBank = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bunga Bank');
        })->whereYear('created_at', $year)->sum('total_amount');

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum', 'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
            $query->whereNotIn('name', $excludedIncomeTypes);
        })->whereYear('created_at', $year)->sum('total_amount');

        $donasiUmum = DonateMoney::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount');

        $donasiBeasiswa = Scholarship::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount');

        $totalAmount = $bantuanLuar + $bantuanPemerintah + $hasilUsaha + $bungaBank + $otherIncome + $donasiUmum + $donasiBeasiswa;

        $biayaPangan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaSandang = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaPapan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaUsaha = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaHariRaya = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaKegiatan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaKesehatan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->sum('cost');

        $biayaPendidikan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->sum('cost');

        $biayaPrestasi = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->sum('cost');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->sum('total_cost');

        $totalCost = $biayaPangan + $biayaSandang + $biayaPapan + $biayaUsaha + $biayaHariRaya + $biayaKegiatan + $biayaKesehatan + $biayaPendidikan + $biayaPrestasi + $otherCost;

        $total = $totalAmount - $totalCost;

        return response()->json(['year' => $year, 'bantuanLuar' => $bantuanLuar, 'bantuanPemerintah' => $bantuanPemerintah, 'hasilUsaha' => $hasilUsaha, 'bungaBank' => $bungaBank, 'otherIncome' => $otherIncome, 'donasiUmum' => $donasiUmum, 'donasiBeasiswa' => $donasiBeasiswa, 'totalAmount' => $totalAmount, 'biayaPangan' => $biayaPangan, 'biayaSandang' => $biayaSandang, 'biayaPapan' => $biayaPapan, 'biayaUsaha' => $biayaUsaha, 'biayaHariRaya' => $biayaHariRaya, 'biayaKegiatan' => $biayaKegiatan, 'biayaKesehatan' => $biayaKesehatan, 'biayaPendidikan' => $biayaPendidikan, 'biayaPrestasi' => $biayaPrestasi, 'otherCost' => $otherCost, 'totalCost' => $totalCost, 'total' => $total , 'previousYearlyReport' => $previousYearlyReport, 'previousYear' => $previousYear]);
    }

    public function laporanTahunanPdf(Request $request){

        $year = intval($request->input('year', now()->year));
        $periode="Periode 1 Januari S/D 31 Desember $year";

        $date = Carbon::createFromDate($year, 1);
        $previousYearDate = $date->subYear();
        $previousYear = $previousYearDate->format('Y');

        // Ambil data dari YearlyReport untuk bulan sebelumnya
        $previousYearlyReport = AnnualReport::where('Year', $previousYear)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        if ($previousYearlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousYearlyReport->total_amount));
        } else {
            $previousYearlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousYearlyReport->total_amount = $previousTotalAmount;
            $previousYearlyReport->year = $previousYear;
        }

        $previousTotalAmountFormatted = 'Rp ' . number_format($previousTotalAmount, 0, ',', '.');

        $bantuanLuar = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Luar Negeri');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $bantuanPemerintah = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Pemerintah');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $hasilUsaha = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Hasil Usaha Produktif');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $bungaBank = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bunga Bank');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum', 'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
                $query->whereNotIn('name', $excludedIncomeTypes);
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $donasiUmum = 'Rp ' . number_format(DonateMoney::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $donasiBeasiswa = 'Rp ' . number_format(Scholarship::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $totalAmount = floatval(str_replace(['Rp ', '.', ','], '', $hasilUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bungaBank)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherIncome)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiUmum)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiBeasiswa)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanLuar)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanPemerintah));

        $totalAmountFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');

        $biayaPangan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaSandang = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaPapan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaUsaha = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaHariRaya = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaKegiatan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaKesehatan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->sum('cost'), 0, ',', '.');

        $biayaPendidikan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->sum('cost'), 0, ',', '.');

        $biayaPrestasi = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->sum('cost'), 0, ',', '.');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $totalCost = floatval(str_replace(['Rp ', '.', ','], '', $biayaPangan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaSandang)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPapan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaHariRaya)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKegiatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKesehatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPendidikan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPrestasi)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherCost));

        $totalCostFormatted = 'Rp ' . number_format($totalCost, 0, ',', '.');

        $totalAmountValue = floatval(str_replace(['Rp ', '.', ','], '', $totalAmount));
        $totalCostValue = floatval(str_replace(['Rp ', '.', ','], '', $totalCost));

        $hitungTotal = $totalAmountValue - $totalCostValue;
        $total = 'Rp ' . number_format($hitungTotal, 0, ',', '.');

        $totalAkhir = $previousTotalAmount + $hitungTotal;
        $totalAkhirFormatted = 'Rp ' . number_format($totalAkhir, 0, ',', '.');

        if ($totalAmountValue - $totalCostValue < 0) {
            $status = 'Defisit';
        } else if ($totalAmountValue - $totalCostValue > 0) {
            $status = 'Surplus';
        } else {
            $status = 'Netral';
        }

        $pdf = PDF::loadView('admin/keuangan/pdf/laporan', compact('year', 'bantuanLuar', 'bantuanPemerintah', 'hasilUsaha', 'bungaBank', 'otherIncome', 'donasiUmum', 'donasiBeasiswa', 'totalAmountFormatted', 'biayaPangan', 'biayaSandang', 'biayaPapan', 'biayaUsaha', 'biayaHariRaya', 'biayaKegiatan', 'biayaKesehatan', 'biayaPendidikan', 'biayaPrestasi', 'otherCost', 'totalCostFormatted', 'total', 'status', 'periode', 'previousTotalAmountFormatted', 'totalAkhirFormatted'));
        return $pdf->download('laporan-tahunan-' . $year . '.pdf');
    }

    public function laporanBulanan(){
        $costYears = Cost::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $childCostDetailYears = ChildCostDetail::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $incomeYears = Income::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $donateMoneyYears = DonateMoney::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $scholarshipYears = Scholarship::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });


        $allYears = collect()
            ->merge($costYears)
            ->merge($childCostDetailYears)
            ->merge($incomeYears)
            ->merge($donateMoneyYears)
            ->merge($scholarshipYears)
            ->unique()
            ->sortDesc();

        $allYearsArray = $allYears->toArray();
        Artisan::call('create:cash-data-manual');

        return view('admin.keuangan.laporan-bulanan', compact('allYearsArray'));
    }

    public function laporanBulananReport(Request $request){

        $year = intval($request->input('year', now()->year));
        $month = $request->input('month', now()->month);
        $monthName = $request->input('monthName');

        $date = Carbon::createFromDate($year, $month, 1);

        // Dapatkan bulan sebelumnya
        $previousMonthDate = $date->subMonth();
        $previousMonth = $previousMonthDate->format('Y-m');
        $previousMonthName = $previousMonthDate->format('F');
        $previousYear = $previousMonthDate->format('Y');

        // Ambil data dari MonthlyReport untuk bulan sebelumnya
        $previousMonthlyReport = MonthlyReport::where('month', $previousMonth)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        if ($previousMonthlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousMonthlyReport->total_amount));
        } else {
            // Jika data tidak ditemukan, set total_amount ke 0 dan buat objek kosong
            $previousMonthlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousMonthlyReport->total_amount = $previousTotalAmount;
            $previousMonthlyReport->month = $previousMonth;
        }

        $bantuanLuar = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Luar Negeri');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $bantuanPemerintah = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Pemerintah');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $hasilUsaha = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Hasil Usaha Produktif');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $bungaBank = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bunga Bank');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum' ,'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
            $query->whereNotIn('name', $excludedIncomeTypes);
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $donasiUmum = DonateMoney::whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->where('status', 'success')
                        ->sum('total_amount');

        $donasiBeasiswa = Scholarship::whereYear('created_at', $year)
                        ->whereMonth('created_at', $month)
                        ->where('status', 'success')
                        ->sum('total_amount');

        $totalAmount = $bantuanLuar + $bantuanPemerintah + $hasilUsaha + $bungaBank + $otherIncome + $donasiUmum + $donasiBeasiswa;

        $biayaPangan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaSandang = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaPapan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaUsaha = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaHariRaya = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaKegiatan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaKesehatan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost');

        $biayaPendidikan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost');

        $biayaPrestasi = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $totalCost = $biayaPangan + $biayaSandang + $biayaPapan + $biayaUsaha + $biayaHariRaya + $biayaKegiatan + $biayaKesehatan + $biayaPendidikan + $biayaPrestasi + $otherCost;

        $total = $totalAmount - $totalCost;

        return response()->json(['year' => $year, 'bantuanLuar' => $bantuanLuar, 'bantuanPemerintah' => $bantuanPemerintah, 'hasilUsaha' => $hasilUsaha, 'bungaBank' => $bungaBank, 'otherIncome' => $otherIncome, 'donasiUmum' => $donasiUmum, 'donasiBeasiswa' => $donasiBeasiswa, 'totalAmount' => $totalAmount, 'biayaPangan' => $biayaPangan, 'biayaSandang' => $biayaSandang, 'biayaPapan' => $biayaPapan, 'biayaUsaha' => $biayaUsaha, 'biayaHariRaya' => $biayaHariRaya, 'biayaKegiatan' => $biayaKegiatan, 'biayaKesehatan' => $biayaKesehatan, 'biayaPendidikan' => $biayaPendidikan, 'biayaPrestasi' => $biayaPrestasi, 'otherCost' => $otherCost, 'totalCost' => $totalCost, 'total' => $total, 'monthName' => $monthName, 'previousMonthlyReport' => $previousMonthlyReport, 'previousMonthName' => $previousMonthName, 'previousYear' => $previousYear]);
    }

    public function laporanBulananPdf(Request $request){

        $year = intval($request->input('year', now()->year));
        $month = $request->input('month', now()->month);
        $monthName = $request->input('monthName');

        $periode="Periode 1 S/D 31 $monthName $year";
        $date = Carbon::createFromDate($year, $month, 1);

        $previousMonthDate = $date->subMonth();
        $previousMonth = $previousMonthDate->format('Y-m');
        $previousMonthName = $previousMonthDate->format('F');
        $previousYear = $previousMonthDate->format('Y');

        $previousMonthlyReport = MonthlyReport::where('month', $previousMonth)->first();

        if ($previousMonthlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousMonthlyReport->total_amount));
        } else {
            $previousMonthlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousMonthlyReport->total_amount = $previousTotalAmount;
            $previousMonthlyReport->month = $previousMonth;
        }

        $previousTotalAmountFormatted = 'Rp ' . number_format($previousTotalAmount, 0, ',', '.');

        $bantuanLuar = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Luar Negeri');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $bantuanPemerintah = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Pemerintah');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $hasilUsaha = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Hasil Usaha Produktif');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $bungaBank = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bunga Bank');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum' ,'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
                $query->whereNotIn('name', $excludedIncomeTypes);
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $donasiUmum = 'Rp ' . number_format(DonateMoney::whereYear('created_at', $year)->whereMonth('created_at', $month)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $donasiBeasiswa = 'Rp ' . number_format(Scholarship::whereYear('created_at', $year)->whereMonth('created_at', $month)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $totalAmount = floatval(str_replace(['Rp ', '.', ','], '', $hasilUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bungaBank)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherIncome)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiUmum)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiBeasiswa)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanLuar)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanPemerintah));

        $totalAmountFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');

        $biayaPangan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaSandang = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaPapan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaUsaha = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaHariRaya = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaKegiatan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaKesehatan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost'), 0, ',', '.');

        $biayaPendidikan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost'), 0, ',', '.');

        $biayaPrestasi = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost'), 0, ',', '.');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $totalCost = floatval(str_replace(['Rp ', '.', ','], '', $biayaPangan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaSandang)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPapan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaHariRaya)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKegiatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKesehatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPendidikan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPrestasi)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherCost));

        $totalCostFormatted = 'Rp ' . number_format($totalCost, 0, ',', '.');

        $totalAmountValue = floatval(str_replace(['Rp ', '.', ','], '', $totalAmount));
        $totalCostValue = floatval(str_replace(['Rp ', '.', ','], '', $totalCost));

        $hitungTotal = $totalAmountValue - $totalCostValue;
        $total = 'Rp ' . number_format($hitungTotal, 0, ',', '.');

        $totalAkhir = $previousTotalAmount + $hitungTotal;
        $totalAkhirFormatted = 'Rp ' . number_format($totalAkhir, 0, ',', '.');

        if ($totalAmountValue - $totalCostValue < 0) {
            $status = 'Defisit';
        } else if ($totalAmountValue - $totalCostValue > 0) {
            $status = 'Surplus';
        } else {
            $status = 'Netral';
        }

        $pdf = PDF::loadView('admin/keuangan/pdf/laporan', compact('year', 'bantuanLuar', 'bantuanPemerintah', 'hasilUsaha', 'bungaBank', 'otherIncome', 'donasiUmum', 'donasiBeasiswa', 'totalAmountFormatted', 'biayaPangan', 'biayaSandang', 'biayaPapan', 'biayaUsaha', 'biayaHariRaya', 'biayaKegiatan', 'biayaKesehatan', 'biayaPendidikan', 'biayaPrestasi', 'otherCost', 'totalCostFormatted', 'total', 'status', 'monthName', 'periode', 'previousTotalAmountFormatted', 'previousMonthName', 'previousYear', 'totalAkhirFormatted'));
        return $pdf->download('laporan-bulanan-' . $monthName . '-' . $year . '.pdf');
    }

    public function neracaTahunan(){
        $costYears = Cost::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $childCostDetailYears = ChildCostDetail::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $incomeYears = Income::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $donateMoneyYears = DonateMoney::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $scholarshipYears = Scholarship::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $allYears = collect()
            ->merge($costYears)
            ->merge($childCostDetailYears)
            ->merge($incomeYears)
            ->merge($donateMoneyYears)
            ->merge($scholarshipYears)
            ->unique()
            ->sortDesc();

        $allYearsArray = $allYears->toArray();

        return view('admin.keuangan.neraca-tahunan', compact('allYearsArray'));
    }

    public function neracaTahunanReport(Request $request){

        $year = intval($request->input('year', now()->year));

        $date = Carbon::createFromDate($year, 1);
        $previousYearDate = $date->subYear();
        $previousYear = $previousYearDate->format('Y');

        // Ambil data dari YearlyReport untuk bulan sebelumnya
        $previousYearlyReport = AnnualReport::where('Year', $previousYear)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        $previousYearlyReport = AnnualReport::where('Year', $previousYear)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        if ($previousYearlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousYearlyReport->total_amount));
        } else {
            $previousYearlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousYearlyReport->total_amount = $previousTotalAmount;
            $previousYearlyReport->year = $previousYear;
        }

        $bantuanLuar = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Luar Negeri');
        })->whereYear('created_at', $year)->sum('total_amount');

        $bantuanPemerintah = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Pemerintah');
        })->whereYear('created_at', $year)->sum('total_amount');

        $hasilUsaha = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Hasil Usaha Produktif');
        })->whereYear('created_at', $year)->sum('total_amount');

        $bungaBank = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bunga Bank');
        })->whereYear('created_at', $year)->sum('total_amount');

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum', 'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
            $query->whereNotIn('name', $excludedIncomeTypes);
        })->whereYear('created_at', $year)->sum('total_amount');

        $donasiUmum = DonateMoney::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount');

        $donasiBeasiswa = Scholarship::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount');

        $totalAmount = $bantuanLuar + $bantuanPemerintah + $hasilUsaha + $bungaBank + $otherIncome + $donasiUmum + $donasiBeasiswa + $previousYearlyReport->total_amount;

        $biayaPangan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaSandang = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaPapan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaUsaha = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaHariRaya = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaKegiatan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->sum('total_cost');

        $biayaKesehatan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->sum('cost');

        $biayaPendidikan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->sum('cost');

        $biayaPrestasi = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->sum('cost');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->sum('total_cost');

        $totalCost = $biayaPangan + $biayaSandang + $biayaPapan + $biayaUsaha + $biayaHariRaya + $biayaKegiatan + $biayaKesehatan + $biayaPendidikan + $biayaPrestasi + $otherCost;

        $total = $totalAmount - $totalCost;

        return response()->json(['year' => $year, 'bantuanLuar' => $bantuanLuar, 'bantuanPemerintah' => $bantuanPemerintah, 'hasilUsaha' => $hasilUsaha, 'bungaBank' => $bungaBank, 'otherIncome' => $otherIncome, 'donasiUmum' => $donasiUmum, 'donasiBeasiswa' => $donasiBeasiswa, 'totalAmount' => $totalAmount, 'biayaPangan' => $biayaPangan, 'biayaSandang' => $biayaSandang, 'biayaPapan' => $biayaPapan, 'biayaUsaha' => $biayaUsaha, 'biayaHariRaya' => $biayaHariRaya, 'biayaKegiatan' => $biayaKegiatan, 'biayaKesehatan' => $biayaKesehatan, 'biayaPendidikan' => $biayaPendidikan, 'biayaPrestasi' => $biayaPrestasi, 'otherCost' => $otherCost, 'totalCost' => $totalCost, 'total' => $total, 'previousYearlyReport' => $previousYearlyReport, 'previousYear' => $previousYear]);
    }

    public function neracaTahunanPdf(Request $request){

        $year = intval($request->input('year', now()->year));
        $periode="Periode 1 Januari S/D 31 Desember $year";

        $date = Carbon::createFromDate($year, 1);
        $previousYearDate = $date->subYear();
        $previousYear = $previousYearDate->format('Y');

        // Ambil data dari YearlyReport untuk bulan sebelumnya
        $previousYearlyReport = AnnualReport::where('Year', $previousYear)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        if ($previousYearlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousYearlyReport->total_amount));
        } else {
            $previousYearlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousYearlyReport->total_amount = $previousTotalAmount;
            $previousYearlyReport->year = $previousYear;
        }

        $previousTotalAmountFormatted = 'Rp ' . number_format($previousTotalAmount, 0, ',', '.');

        $bantuanLuar = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Luar Negeri');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $bantuanPemerintah = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Pemerintah');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $hasilUsaha = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Hasil Usaha Produktif');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $bungaBank = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bunga Bank');
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum', 'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
                $query->whereNotIn('name', $excludedIncomeTypes);
            })->whereYear('created_at', $year)->sum('total_amount'),0,',','.'
        );

        $donasiUmum = 'Rp ' . number_format(DonateMoney::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $donasiBeasiswa = 'Rp ' . number_format(Scholarship::whereYear('created_at', $year)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $totalAmount = floatval(str_replace(['Rp ', '.', ','], '', $hasilUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bungaBank)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherIncome)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiUmum)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiBeasiswa)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanLuar)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanPemerintah)) + $previousTotalAmount;

        $totalAmountFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');

        $biayaPangan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaSandang = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaPapan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaUsaha = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaHariRaya = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaKegiatan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $biayaKesehatan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->sum('cost'), 0, ',', '.');

        $biayaPendidikan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->sum('cost'), 0, ',', '.');

        $biayaPrestasi = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->sum('cost'), 0, ',', '.');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->sum('total_cost'), 0, ',', '.');

        $totalCost = floatval(str_replace(['Rp ', '.', ','], '', $biayaPangan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaSandang)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPapan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaHariRaya)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKegiatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKesehatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPendidikan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPrestasi)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherCost));

        $totalCostFormatted = 'Rp ' . number_format($totalCost, 0, ',', '.');

        $totalAmountValue = floatval(str_replace(['Rp ', '.', ','], '', $totalAmount));
        $totalCostValue = floatval(str_replace(['Rp ', '.', ','], '', $totalCost));

        $total = 'Rp ' . number_format($totalAmountValue - $totalCostValue, 0, ',', '.');

        if ($totalAmountValue - $totalCostValue < 0) {
            $status = 'Defisit';
        } else if ($totalAmountValue - $totalCostValue > 0) {
            $status = 'Surplus';
        } else {
            $status = 'Netral';
        }

        $pdf = PDF::loadView('admin/keuangan/pdf/neraca', compact('year', 'bantuanLuar', 'bantuanPemerintah', 'hasilUsaha', 'bungaBank', 'otherIncome', 'donasiUmum', 'donasiBeasiswa', 'totalAmountFormatted', 'biayaPangan', 'biayaSandang', 'biayaPapan', 'biayaUsaha', 'biayaHariRaya', 'biayaKegiatan', 'biayaKesehatan', 'biayaPendidikan', 'biayaPrestasi', 'otherCost', 'totalCostFormatted', 'total', 'status', 'periode', 'previousTotalAmountFormatted'));
        return $pdf->download('neraca-tahunan-' . $year . '.pdf');
    }

    public function neracaBulanan(){
        $costYears = Cost::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $childCostDetailYears = ChildCostDetail::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $incomeYears = Income::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $donateMoneyYears = DonateMoney::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });

        $scholarshipYears = Scholarship::distinct()->get(['created_at'])->pluck('created_at')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y');
        });


        $allYears = collect()
            ->merge($costYears)
            ->merge($childCostDetailYears)
            ->merge($incomeYears)
            ->merge($donateMoneyYears)
            ->merge($scholarshipYears)
            ->unique()
            ->sortDesc();

        $allYearsArray = $allYears->toArray();

        return view('admin.keuangan.neraca-bulanan', compact('allYearsArray'));
    }

    public function neracaBulananReport(Request $request){

        $year = intval($request->input('year', now()->year));
        $month = $request->input('month', now()->month);
        $monthName = $request->input('monthName');

        $date = Carbon::createFromDate($year, $month, 1);

        // Dapatkan bulan sebelumnya
        $previousMonthDate = $date->subMonth();
        $previousMonth = $previousMonthDate->format('Y-m');
        $previousMonthName = $previousMonthDate->format('F');
        $previousYear = $previousMonthDate->format('Y');

        // Ambil data dari MonthlyReport untuk bulan sebelumnya
        $previousMonthlyReport = MonthlyReport::where('month', $previousMonth)->first();

        // Jika data ditemukan, format total_amount sebagai mata uang Rupiah
        if ($previousMonthlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousMonthlyReport->total_amount));
        } else {
            // Jika data tidak ditemukan, set total_amount ke 0 dan buat objek kosong
            $previousMonthlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousMonthlyReport->total_amount = $previousTotalAmount;
            $previousMonthlyReport->month = $previousMonth;
        }

        $bantuanLuar = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Luar Negeri');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $bantuanPemerintah = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Pemerintah');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $hasilUsaha = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Hasil Usaha Produktif');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $excludedIncomeTypes = ['Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif'];

        $otherIncome = Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
            $query->whereNotIn('name', $excludedIncomeTypes);
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $donasiUmum = DonateMoney::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $donasiBeasiswa = Scholarship::whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount');

        $totalAmount = $bantuanLuar + $bantuanPemerintah + $hasilUsaha + $otherIncome + $donasiUmum + $donasiBeasiswa + $previousMonthlyReport->total_amount;

        $biayaPangan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaSandang = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaPapan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaUsaha = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaHariRaya = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaKegiatan = Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $biayaKesehatan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost');

        $biayaPendidikan = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost');

        $biayaPrestasi = ChildCostDetail::whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost');

        $totalCost = $biayaPangan + $biayaSandang + $biayaPapan + $biayaUsaha + $biayaHariRaya + $biayaKegiatan + $biayaKesehatan + $biayaPendidikan + $biayaPrestasi + $otherCost;

        $total = $totalAmount - $totalCost;

        return response()->json(['year' => $year, 'bantuanLuar' => $bantuanLuar, 'bantuanPemerintah' => $bantuanPemerintah, 'hasilUsaha' => $hasilUsaha, 'otherIncome' => $otherIncome, 'donasiUmum' => $donasiUmum, 'donasiBeasiswa' => $donasiBeasiswa, 'totalAmount' => $totalAmount, 'biayaPangan' => $biayaPangan, 'biayaSandang' => $biayaSandang, 'biayaPapan' => $biayaPapan, 'biayaUsaha' => $biayaUsaha, 'biayaHariRaya' => $biayaHariRaya, 'biayaKegiatan' => $biayaKegiatan, 'biayaKesehatan' => $biayaKesehatan, 'biayaPendidikan' => $biayaPendidikan, 'biayaPrestasi' => $biayaPrestasi, 'otherCost' => $otherCost, 'totalCost' => $totalCost, 'total' => $total, 'monthName' => $monthName, 'previousMonthlyReport' => $previousMonthlyReport]);

    }

    public function neracaBulananPdf(Request $request){

        $year = intval($request->input('year', now()->year));
        $month = $request->input('month', now()->month);
        $monthName = $request->input('monthName');

        $periode="Periode 1 S/D 31 $monthName $year";

        $date = Carbon::createFromDate($year, $month, 1);

        $previousMonthDate = $date->subMonth();
        $previousMonth = $previousMonthDate->format('Y-m');
        $previousMonthName = $previousMonthDate->format('F');
        $previousYear = $previousMonthDate->format('Y');

        $previousMonthlyReport = MonthlyReport::where('month', $previousMonth)->first();

        if ($previousMonthlyReport) {
            $previousTotalAmount = floatval(str_replace(['.', ','], ['', '.'], $previousMonthlyReport->total_amount));
        } else {
            $previousMonthlyReport = new \stdClass();
            $previousTotalAmount = 0;
            $previousMonthlyReport->total_amount = $previousTotalAmount;
            $previousMonthlyReport->month = $previousMonth;
        }

        $previousTotalAmountFormatted = 'Rp ' . number_format($previousTotalAmount, 0, ',', '.');

        $bantuanLuar = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Luar Negeri');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $bantuanPemerintah = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bantuan Pemerintah');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $hasilUsaha = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Hasil Usaha Produktif');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $bungaBank = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) {
                $query->where('name', 'Bunga Bank');
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $excludedIncomeTypes = ['Donasi Uang Umum', 'Donasi Beasiswa Umum', 'Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = 'Rp ' . number_format(
            Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
                $query->whereNotIn('name', $excludedIncomeTypes);
            })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_amount'),0,',','.'
        );

        $donasiUmum = 'Rp ' . number_format(DonateMoney::whereYear('created_at', $year)->whereMonth('created_at', $month)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $donasiBeasiswa = 'Rp ' . number_format(Scholarship::whereYear('created_at', $year)->whereMonth('created_at', $month)->where('status', 'success')->sum('total_amount'), 0, ',', '.');

        $totalAmount = floatval(str_replace(['Rp ', '.', ','], '', $hasilUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bungaBank)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherIncome)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiUmum)) +
        floatval(str_replace(['Rp ', '.', ','], '', $donasiBeasiswa)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanLuar)) +
        floatval(str_replace(['Rp ', '.', ','], '', $bantuanPemerintah)) + $previousTotalAmount;

        $totalAmountFormatted = 'Rp ' . number_format($totalAmount, 0, ',', '.');

        $biayaPangan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Pangan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaSandang = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Sandang');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaPapan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kebutuhan Papan');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaUsaha = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Usaha Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaHariRaya = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Hari Raya');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaKegiatan = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) {
            $query->where('name', 'Biaya Kegiatan Panti');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $biayaKesehatan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_health_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost'), 0, ',', '.');

        $biayaPendidikan = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_education_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost'), 0, ',', '.');

        $biayaPrestasi = 'Rp ' . number_format(ChildCostDetail::whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_achievement_table');
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('cost'), 0, ',', '.');

        $excludedCostTypes = [
            'Biaya Kebutuhan Pangan',
            'Biaya Kebutuhan Sandang',
            'Biaya Kebutuhan Papan',
            'Biaya Usaha Panti',
            'Biaya Kegiatan Hari Raya',
            'Biaya Kegiatan Panti',
        ];

        $otherCost = 'Rp ' . number_format(Cost::whereHas('costTypes', function ($query) use ($excludedCostTypes) {
            $query->whereNotIn('name', $excludedCostTypes);
        })->whereYear('created_at', $year)->whereMonth('created_at', $month)->sum('total_cost'), 0, ',', '.');

        $totalCost = floatval(str_replace(['Rp ', '.', ','], '', $biayaPangan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaSandang)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPapan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaUsaha)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaHariRaya)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKegiatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaKesehatan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPendidikan)) +
        floatval(str_replace(['Rp ', '.', ','], '', $biayaPrestasi)) +
        floatval(str_replace(['Rp ', '.', ','], '', $otherCost));

        $totalCostFormatted = 'Rp ' . number_format($totalCost, 0, ',', '.');

        $totalAmountValue = floatval(str_replace(['Rp ', '.', ','], '', $totalAmount));
        $totalCostValue = floatval(str_replace(['Rp ', '.', ','], '', $totalCost));

        $total = 'Rp ' . number_format($totalAmountValue - $totalCostValue, 0, ',', '.');

        if ($totalAmountValue - $totalCostValue < 0) {
            $status = 'Defisit';
        } else if ($totalAmountValue - $totalCostValue > 0) {
            $status = 'Surplus';
        } else {
            $status = 'Netral';
        }

        $pdf = PDF::loadView('admin/keuangan/pdf/neraca', compact('year', 'bantuanLuar', 'bantuanPemerintah', 'hasilUsaha', 'bungaBank', 'otherIncome', 'donasiUmum', 'donasiBeasiswa', 'totalAmountFormatted', 'biayaPangan', 'biayaSandang', 'biayaPapan', 'biayaUsaha', 'biayaHariRaya', 'biayaKegiatan', 'biayaKesehatan', 'biayaPendidikan', 'biayaPrestasi', 'otherCost', 'totalCostFormatted', 'total', 'status', 'monthName', 'periode', 'previousTotalAmountFormatted'));
        return $pdf->download('neraca-bulanan-' . $monthName . '-' . $year . '.pdf');
    }
}
