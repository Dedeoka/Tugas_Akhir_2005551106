<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ChildCostDetail;
use App\Models\Cost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PengeluaranTotalController extends Controller
{
    public function index(Request $request)
    {
        // Get the selected year from the request or use the current year
        $selectedYear = $request->input('year', Carbon::now()->year);

        $childCostDetail = ChildCostDetail::get();
        $cost = Cost::get();

        // Menggabungkan data tahun dari kedua model
        $allData = $childCostDetail->concat($cost);

        if ($allData->isNotEmpty()) {
            $years = range(
                $allData->min('created_at')->year,
                now()->year
            );
            arsort($years);
        } else {
            $years = [];
        }

        //total pengeluaran panti tahun ini dan tahun lalu
        $currentYearPantiCost = Cost::whereYear('created_at', now()->year)
            ->sum('total_cost');
        $currentYearPantiCostFormatted = 'Rp ' . number_format($currentYearPantiCost, 0, ',', '.');
        $lastYearPantiCost = Cost::whereYear('created_at', now()->subYear()->year)
            ->sum('total_cost');
        $lastYearPantiCostFormatted = 'Rp ' . number_format($lastYearPantiCost, 0, ',', '.');
        $percentageYearPantiCost = 0;
        if ($lastYearPantiCost > 0) {
            $percentageYearPantiCost = number_format((($currentYearPantiCost - $lastYearPantiCost) / $lastYearPantiCost) * 100, 2);
        }
        //total pengeluaran panti bulan ini dan bulan lalu
        $currentMonthPantiCost = Cost::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_cost');
        $currentMonthPantiCostFormatted = 'Rp ' . number_format($currentMonthPantiCost, 0, ',', '.');
        $lastMonthPantiCost = Cost::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total_cost');
        $lastMonthPantiCostFormatted = 'Rp ' . number_format($lastMonthPantiCost, 0, ',', '.');
        $percentageMonthPantiCost = 0;
        if ($lastMonthPantiCost > 0) {
            $percentageMonthPantiCost = number_format((($currentMonthPantiCost - $lastMonthPantiCost) / $lastMonthPantiCost) * 100, 2);
        }

        //total pengeluaran anak bulan ini dan bulan lalu
        $currentYearChildCost = ChildCostDetail::whereYear('created_at', now()->year)
            ->whereYear('created_at', now()->year)
            ->sum('cost');
        $currentYearChildCostFormatted = 'Rp ' . number_format($currentYearChildCost, 0, ',', '.');
        $lastYearChildCost = ChildCostDetail::whereYear('created_at', now()->subYear()->year)
            ->whereYear('created_at', now()->subYear()->year)
            ->sum('cost');
        $lastYearChildCostFormatted = 'Rp ' . number_format($lastYearChildCost, 0, ',', '.');
        $percentageYearChildCost = 0;
        if ($lastYearChildCost > 0) {
            $percentageYearChildCost = number_format((($currentYearChildCost - $lastYearChildCost) / $lastYearChildCost) * 100, 2);
        }
        //total pengeluaran anak bulan ini dan bulan lalu
        $currentMonthChildCost = ChildCostDetail::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('cost');
        $currentMonthChildCostFormatted = 'Rp ' . number_format($currentMonthChildCost, 0, ',', '.');
        $lastMonthChildCost = ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('cost');
        $lastMonthChildCostFormatted = 'Rp ' . number_format($lastMonthChildCost, 0, ',', '.');
        $percentageMonthChildCost = 0;
        if ($lastMonthChildCost > 0) {
            $percentageMonthChildCost = number_format((($currentMonthChildCost - $lastMonthChildCost) / $lastMonthChildCost) * 100, 2);
        }

        return view('admin.keuangan.pengeluaran-total', compact('selectedYear', 'years', 'currentYearPantiCostFormatted', 'percentageYearPantiCost', 'currentMonthPantiCostFormatted', 'percentageMonthPantiCost', 'currentYearChildCostFormatted', 'percentageYearChildCost', 'currentMonthChildCostFormatted', 'percentageMonthChildCost'));
    }
}
