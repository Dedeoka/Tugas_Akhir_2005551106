<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Cost;

class ChartPengeluaranPantiController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);

        $childCost = Cost::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('total_cost');
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

        $lastYearTotalCost = Cost::whereYear('created_at', $selectedYear - 1)
            ->sum('total_cost');
        $percentageChange = 0;
        if ($lastYearTotalCost > 0) {
            $percentageChange = number_format((($totalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100, 2);
        }

        return response()->json(['data' => $orderedMonths, 'selectedYear' => $selectedYear, 'totalCost' => $totalCost, 'percentage' => $percentageChange]);
    }

    // public function index(Request $request)
    // {
    //     $selectedMonth = $request->input('month', Carbon::now()->format('m'));
    //     $selectedYear = $request->input('year', Carbon::now()->year);

    //     $firstDayOfMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1);
    //     $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

    //     $childCost = Cost::whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
    //         ->get()
    //         ->groupBy(function ($item) {
    //             return Carbon::parse($item->created_at)->format('d');
    //         })
    //         ->map(function ($group) {
    //             return $group->sum('total_cost');
    //         });

    //     $totalCost = $childCost->sum();
    //     $allDays = array_fill(1, $lastDayOfMonth->day, 0);

    //     foreach ($childCost as $day => $cost) {
    //         $allDays[$day] = $cost;
    //     }

    //     $orderedDays = [];
    //     for ($i = 1; $i <= $lastDayOfMonth->day; $i++) {
    //         $orderedDays[$i] = $allDays[$i] ?? 0;
    //     }

    //     $lastYearTotalCost = Cost::whereYear('created_at', $selectedYear - 1)
    //         ->sum('total_cost');
    //     $percentageChange = 0;
    //     if ($lastYearTotalCost > 0) {
    //         $percentageChange = number_format((($totalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100, 2);
    //     }

    //     return response()->json([
    //         'data' => $orderedDays,
    //         'selectedMonth' => $selectedMonth,
    //         'selectedYear' => $selectedYear,
    //         'totalCost' => $totalCost,
    //         'percentage' => $percentageChange,
    //     ]);
    // }

}
