<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\DonateMoney;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Cost;
use App\Models\ChildCostDetail;
use App\Models\Scholarship;
use Barryvdh\DomPDF\Facade\Pdf;

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

        // Gabungkan tahun-tahun tersebut menjadi satu koleksi unik
        $allYears = collect()
            ->merge($costYears)
            ->merge($childCostDetailYears)
            ->merge($incomeYears)
            ->merge($donateMoneyYears)
            ->merge($scholarshipYears)
            ->unique()
            ->sortDesc();

        $allYearsArray = $allYears->toArray();

        return view('admin.keuangan.laporan-tahunan', compact('allYearsArray'));
    }

    public function laporanTahunanReport(Request $request){

        $year = intval($request->input('year', now()->year));

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

        $excludedIncomeTypes = ['Bantuan Luar Negeri', 'Bantuan Pemerintah', 'Hasil Usaha Produktif', 'Bunga Bank'];

        $otherIncome = Income::whereHas('incomeTypes', function ($query) use ($excludedIncomeTypes) {
            $query->whereNotIn('name', $excludedIncomeTypes);
        })->whereYear('created_at', $year)->sum('total_amount');

        $donasiUmum = DonateMoney::whereYear('created_at', $year)->sum('total_amount');

        $donasiBeasiswa = Scholarship::whereYear('created_at', $year)->sum('total_amount');

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

        return response()->json(['year' => $year, 'bantuanLuar' => $bantuanLuar, 'bantuanPemerintah' => $bantuanPemerintah, 'hasilUsaha' => $hasilUsaha, 'bungaBank' => $bungaBank, 'otherIncome' => $otherIncome, 'donasiUmum' => $donasiUmum, 'donasiBeasiswa' => $donasiBeasiswa, 'totalAmount' => $totalAmount, 'biayaPangan' => $biayaPangan, 'biayaSandang' => $biayaSandang, 'biayaPapan' => $biayaPapan, 'biayaUsaha' => $biayaUsaha, 'biayaHariRaya' => $biayaHariRaya, 'biayaKegiatan' => $biayaKegiatan, 'biayaKesehatan' => $biayaKesehatan, 'biayaPendidikan' => $biayaPendidikan, 'biayaPrestasi' => $biayaPrestasi, 'otherCost' => $otherCost, 'totalCost' => $totalCost, 'total' => $total]);
    }

    public function laporanTahunanPdf(){

    }
}
