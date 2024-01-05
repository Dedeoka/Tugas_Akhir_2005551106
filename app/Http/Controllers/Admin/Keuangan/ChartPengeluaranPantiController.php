<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Cost;

class ChartPengeluaranPantiController extends Controller
{
    public function chartTahunan(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);

        $cost = Cost::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('total_cost');
            });

        $totalCost = $cost->sum();
        $allMonths = array_fill(1, 12, 0);

        foreach ($cost as $month => $cost) {
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
            $rawPercentage = (($totalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100;

            // Format percentage with leading zero if it's less than 1
            $formattedPercentage = number_format($rawPercentage, 2, ',', '.');

            if ($rawPercentage < 1 && $rawPercentage > -1 && $rawPercentage != 0) {
                $formattedPercentage = '0' . $formattedPercentage;
            }

            $percentageChange = $formattedPercentage;
        }

        return response()->json(['data' => $orderedMonths, 'selectedYear' => $selectedYear, 'totalCost' => $totalCost, 'percentage' => $percentageChange]);
    }

    public function chartBulanan(Request $request)
    {
        $selectedMonth = $request->input('month', Carbon::now()->format('m'));
        $selectedYear = $request->input('year', Carbon::now()->year);

        $firstDayOfMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1);
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        $cost = Cost::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get();

        $allDays = array_fill(1, $lastDayOfMonth->day, 0);

        foreach ($cost as $cost) {
            $day = Carbon::parse($cost->created_at)->day;
            $allDays[$day] += $cost->total_cost;
        }

        $values = array_values($allDays);

        $totalCost = array_sum($values);

        // Perbandingan dengan bulan sebelumnya
        $lastMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1)->subMonth();
        $lastMonthTotalCost = Cost::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total_cost');

        $percentageChange = 0;

        if ($lastMonthTotalCost > 0) {
            $rawPercentage = (($totalCost - $lastMonthTotalCost) / $lastMonthTotalCost) * 100;

            // Format percentage with leading zero if it's less than 1
            $formattedPercentage = number_format($rawPercentage, 2, ',', '.');

            if ($rawPercentage < 1 && $rawPercentage > -1 && $rawPercentage != 0) {
                $formattedPercentage = '0' . $formattedPercentage;
            }

            $percentageChange = $formattedPercentage;
        }

        return response()->json([
            'labels' => range(1, $lastDayOfMonth->day), // Use range to create an array of day numbers
            'values' => $values,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'totalCost' => $totalCost,
            'percentage' => $percentageChange,
        ]);
    }
}
