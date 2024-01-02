<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ChildCost;
use App\Models\ChildCostDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartPengeluaranAnakController extends Controller
{
    public function chartTahunan(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);

        $childCost = ChildCostDetail::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('cost');
            });

        $totalCost = $childCost->sum();
        $allMonths = array_fill(1, 12, 0);

        foreach ($childCost as $month => $cost) {
            $monthName = Carbon::create()->month($month)->format('F');
            $allMonths[$monthName] = $cost;
        }

        $orderedMonths = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('F');
            $orderedMonths[$monthName] = $allMonths[$monthName] ?? 0;
        }

        // Menghitung total pengeluaran untuk tahun lalu
        $lastYearTotalCost = ChildCostDetail::whereYear('created_at', $selectedYear - 1)
            ->sum('cost');

        // Menghitung persentase perbandingan dengan tahun lalu
        $percentageChange = 0;
        if ($lastYearTotalCost > 0) {
            $percentageChange = number_format((($totalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100, 2);
        }



        return response()->json(['data' => $orderedMonths, 'selectedYear' => $selectedYear, 'totalCost' => $totalCost, 'percentage' => $percentageChange]);
    }
}
