<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildCostDetail;
use App\Models\Cost;
use Carbon\Carbon;

class ChartPengeluaranTotalController extends Controller
{
    public function chartTahunan(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);

        // Mengambil data dari model Cost
        $costData = Cost::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('total_cost');
            });

        // Mengambil data dari model ChildCostDetail
        $childCostData = ChildCostDetail::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('cost');
            });

        // Menggabungkan data dari kedua model dengan menjumlahkan nilai
        $mergedData = collect(array_merge_recursive($costData->toArray(), $childCostData->toArray()))
            ->map(function ($item) {
                return is_array($item) ? array_sum($item) : $item;
            });

        // Membuat array yang berisi total biaya untuk setiap bulan
        $allMonths = [];
        $carbonNow = Carbon::now();

        // Inisialisasi array bulan dengan nilai 0
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('F');
            $allMonths[$monthName] = 0;
        }

        // Isi nilai yang sebenarnya berdasarkan data yang ada
        foreach ($mergedData as $key => $value) {
            $allMonths[Carbon::create()->month($key)->format('F')] = $value;
        }

        $lastYearCostData = Cost::whereYear('created_at', $selectedYear - 1)
            ->sum('total_cost');

        $lastYearChildCostData = ChildCostDetail::whereYear('created_at', $selectedYear - 1)
            ->sum('cost');



        // Menghitung total pengeluaran untuk tahun lalu
        $lastYearTotalCost = $lastYearCostData + $lastYearChildCostData;

        // Menghitung total biaya untuk setiap bulan
        $totalCost = $mergedData->sum();

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

        return response()->json(['data' => $allMonths, 'selectedYear' => $selectedYear, 'totalCost' => $totalCost, 'percentage' => $percentageChange]);

    }


    public function chartBulanan(Request $request)
    {
        $selectedMonth = $request->input('month', Carbon::now()->format('m'));
        $selectedYear = $request->input('year', Carbon::now()->year);

        $firstDayOfMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1);
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        // Mengambil data dari model Cost
        $costData = Cost::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->day;
            })
            ->map(function ($group) {
                return $group->sum('total_cost');
            });


        // Mengambil data dari model ChildCostDetail
        $childCostData = ChildCostDetail::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->day;
            })
            ->map(function ($group) {
                return $group->sum('cost');
            });

        // Menggabungkan data dari kedua model dengan menjumlahkan nilai
        $mergedData = collect([]);

        // Menambahkan data dari model Cost
        foreach ($costData as $key => $value) {
            if ($mergedData->has($key)) {
                $mergedData[$key] += $value;
            } else {
                $mergedData[$key] = $value;
            }
        }

        // Menambahkan data dari model ChildCostDetail
        foreach ($childCostData as $key => $value) {
            if ($mergedData->has($key)) {
                $mergedData[$key] += $value;
            } else {
                $mergedData[$key] = $value;
            }
        }

        $allDays = array_fill(1, $lastDayOfMonth->day, 0);

        // Isi nilai yang sebenarnya berdasarkan data yang ada
        foreach ($mergedData as $key => $value) {
            $allDays[$key] = $value;
        }


        $values = array_values($allDays);

        $totalCost = array_sum($values);

        // Perbandingan dengan bulan sebelumnya
        $lastMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1)->subMonth();
        $lastMonthTotalCost = Cost::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total_cost') + ChildCostDetail::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('cost');

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
            'labels' => range(1, $lastDayOfMonth->day),
            'values' => $values,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'totalCost' => $totalCost,
            'percentage' => $percentageChange,
        ]);
    }
}
