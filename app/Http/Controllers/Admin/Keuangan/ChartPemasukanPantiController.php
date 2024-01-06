<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Income;

class ChartPemasukanPantiController extends Controller
{
    public function chartTahunan(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);

        $income = Income::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('total_amount');
            });

        $totalIncome = $income->sum();
        $allMonths = array_fill(1, 12, 0);

        foreach ($income as $month => $income) {
            $monthName = Carbon::create()->month($month)->format('F');
            $allMonths[$monthName] = $income;
        }

        $orderedMonths = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('F');
            $orderedMonths[$monthName] = $allMonths[$monthName] ?? 0;
        }

        $lastYearTotalIncome = Income::whereYear('created_at', $selectedYear - 1)
            ->sum('total_amount');
        $percentageChange = 0;

        if ($lastYearTotalIncome > 0) {
            $rawPercentage = (($totalIncome - $lastYearTotalIncome) / $lastYearTotalIncome) * 100;

            // Format percentage with leading zero if it's less than 1
            $formattedPercentage = number_format($rawPercentage, 2, ',', '.');

            if ($rawPercentage < 1 && $rawPercentage > -1 && $rawPercentage != 0) {
                $formattedPercentage = '0' . $formattedPercentage;
            }

            $percentageChange = $formattedPercentage;
        }

        return response()->json(['data' => $orderedMonths, 'selectedYear' => $selectedYear, 'totalIncome' => $totalIncome, 'percentage' => $percentageChange]);
    }

    public function chartBulanan(Request $request)
    {
        $selectedMonth = $request->input('month', Carbon::now()->format('m'));
        $selectedYear = $request->input('year', Carbon::now()->year);

        $firstDayOfMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1);
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        $income = Income::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get();

        $allDays = array_fill(1, $lastDayOfMonth->day, 0);

        foreach ($income as $income) {
            $day = Carbon::parse($income->created_at)->day;
            $allDays[$day] += $income->total_amount;
        }

        $values = array_values($allDays);

        $totalIncome = array_sum($values);

        // Perbandingan dengan bulan sebelumnya
        $lastMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1)->subMonth();
        $lastMonthTotalIncome = Income::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total_amount');

        $percentageChange = 0;

        if ($lastMonthTotalIncome > 0) {
            $rawPercentage = (($totalIncome - $lastMonthTotalIncome) / $lastMonthTotalIncome) * 100;

            // Format percentage with leading zero if it's less than 1
            $formattedPercentage = number_format($rawPercentage, 2, ',', '.');

            if ($rawPercentage < 1 && $rawPercentage > -1 && $rawPercentage != 0) {
                $formattedPercentage = '0' . $formattedPercentage;
            }

            $percentageChange = $formattedPercentage;
        }

        return response()->json([
            'labels' => range(1, $lastDayOfMonth->day),
            'values' => $values,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'totalIncome' => $totalIncome,
            'percentage' => $percentageChange,
        ]);
    }
}
