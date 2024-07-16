<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Income;
use App\Models\ChildCostDetail;
use App\Models\Cost;
use App\Models\IncomeType;

class StatistikKeuanganController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->query('q', '');
        $childCostDetail = ChildCostDetail::get();
        $cost = Cost::get();
        $income = Income::get();

        // Menggabungkan data tahun dari semua model
        $allData = $childCostDetail->concat($cost)->concat($income);

        if ($allData->isNotEmpty()) {
            $years = range(
                $allData->min('created_at')->year,
                now()->year
            );
            arsort($years);
        } else {
            $years = [];
        }

        // Total pengeluaran panti dan anak tahun ini dan tahun lalu
        $currentYearTotalCost = Cost::whereYear('created_at', now()->year)->sum('total_cost') +
                                ChildCostDetail::whereYear('created_at', now()->year)->sum('cost');
        $currentYearTotalCostFormatted = 'Rp ' . number_format($currentYearTotalCost, 0, ',', '.');
        $lastYearTotalCost = Cost::whereYear('created_at', now()->subYear()->year)->sum('total_cost') +
                            ChildCostDetail::whereYear('created_at', now()->subYear()->year)->sum('cost');
        $lastYearTotalCostFormatted = 'Rp ' . number_format($lastYearTotalCost, 0, ',', '.');
        $percentageYearTotalCost = 0;
        if ($lastYearTotalCost > 0) {
            $percentageYearTotalCost = number_format((($currentYearTotalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100, 2);
        }

        // Total pengeluaran panti dan anak bulan ini dan bulan lalu
        $currentMonthTotalCost = Cost::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('total_cost') +
                                ChildCostDetail::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('cost');
        $currentMonthTotalCostFormatted = 'Rp ' . number_format($currentMonthTotalCost, 0, ',', '.');
        $lastMonthTotalCost = Cost::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->sum('total_cost') +
                            ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->sum('cost');
        $lastMonthTotalCostFormatted = 'Rp ' . number_format($lastMonthTotalCost, 0, ',', '.');
        $percentageMonthTotalCost = 0;
        if ($lastMonthTotalCost > 0) {
            $percentageMonthTotalCost = number_format((($currentMonthTotalCost - $lastMonthTotalCost) / $lastMonthTotalCost) * 100, 2);
        }

        // Total pemasukan tahun ini dan tahun lalu
        $currentYearTotalIncome = Income::whereYear('created_at', now()->year)->sum('total_amount');
        $currentYearTotalIncomeFormatted = 'Rp ' . number_format($currentYearTotalIncome, 0, ',', '.');
        $lastYearTotalIncome = Income::whereYear('created_at', now()->subYear()->year)->sum('total_amount');
        $lastYearTotalIncomeFormatted = 'Rp ' . number_format($lastYearTotalIncome, 0, ',', '.');
        $percentageYearTotalIncome = 0;
        if ($lastYearTotalIncome > 0) {
            $percentageYearTotalIncome = number_format((($currentYearTotalIncome - $lastYearTotalIncome) / $lastYearTotalIncome) * 100, 2);
        }

        // Total pemasukan bulan ini dan bulan lalu
        $currentMonthTotalIncome = Income::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('total_amount');
        $currentMonthTotalIncomeFormatted = 'Rp ' . number_format($currentMonthTotalIncome, 0, ',', '.');
        $lastMonthTotalIncome = Income::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->sum('total_amount');
        $lastMonthTotalIncomeFormatted = 'Rp ' . number_format($lastMonthTotalIncome, 0, ',', '.');
        $percentageMonthTotalIncome = 0;
        if ($lastMonthTotalIncome > 0) {
            $percentageMonthTotalIncome = number_format((($currentMonthTotalIncome - $lastMonthTotalIncome) / $lastMonthTotalIncome) * 100, 2);
        }

        return view('admin.keuangan.statistik-keuangan', compact(
            'keyword', 'years',
            'currentYearTotalCostFormatted', 'percentageYearTotalCost',
            'currentMonthTotalCostFormatted', 'percentageMonthTotalCost',
            'currentYearTotalIncomeFormatted', 'percentageYearTotalIncome',
            'currentMonthTotalIncomeFormatted', 'percentageMonthTotalIncome'
        ));
    }

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
        $mergedCostData = collect(array_merge_recursive($costData->toArray(), $childCostData->toArray()))
            ->map(function ($item) {
                return is_array($item) ? array_sum($item) : $item;
            });

        // Mengambil data dari model Income
        $incomeData = Income::whereYear('created_at', $selectedYear)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('m');
            })
            ->map(function ($group) {
                return $group->sum('total_amount');
            });

        // Membuat array yang berisi total biaya dan pemasukan untuk setiap bulan
        $allMonths = [];
        $carbonNow = Carbon::now();

        // Inisialisasi array bulan dengan nilai 0
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('F');
            $allMonths[$monthName] = [
                'cost' => 0,
                'income' => 0,
            ];
        }

        // Isi nilai yang sebenarnya berdasarkan data yang ada
        foreach ($mergedCostData as $key => $value) {
            $allMonths[Carbon::create()->month($key)->format('F')]['cost'] = $value;
        }

        foreach ($incomeData as $key => $value) {
            $allMonths[Carbon::create()->month($key)->format('F')]['income'] = $value;
        }

        // Menghitung total pengeluaran dan pemasukan untuk tahun lalu
        $lastYearTotalCost = Cost::whereYear('created_at', $selectedYear - 1)
            ->sum('total_cost') + ChildCostDetail::whereYear('created_at', $selectedYear - 1)
            ->sum('cost');

        $lastYearTotalIncome = Income::whereYear('created_at', $selectedYear - 1)
            ->sum('total_amount');

        // Menghitung total biaya dan pemasukan untuk tahun ini
        $totalCost = $mergedCostData->sum();
        $totalIncome = $incomeData->sum();

        // Menghitung perubahan persentase biaya
        $percentageChangeCost = 0;
        if ($lastYearTotalCost > 0) {
            $rawPercentageCost = (($totalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100;
            $formattedPercentageCost = number_format($rawPercentageCost, 2, ',', '.');
            if ($rawPercentageCost < 1 && $rawPercentageCost > -1 && $rawPercentageCost != 0) {
                $formattedPercentageCost = '0' . $formattedPercentageCost;
            }
            $percentageChangeCost = $formattedPercentageCost;
        }

        // Menghitung perubahan persentase pemasukan
        $percentageChangeIncome = 0;
        if ($lastYearTotalIncome > 0) {
            $rawPercentageIncome = (($totalIncome - $lastYearTotalIncome) / $lastYearTotalIncome) * 100;
            $formattedPercentageIncome = number_format($rawPercentageIncome, 2, ',', '.');
            if ($rawPercentageIncome < 1 && $rawPercentageIncome > -1 && $rawPercentageIncome != 0) {
                $formattedPercentageIncome = '0' . $formattedPercentageIncome;
            }
            $percentageChangeIncome = $formattedPercentageIncome;
        }

        return response()->json([
            'data' => $allMonths,
            'selectedYear' => $selectedYear,
            'totalCost' => $totalCost,
            'percentageCost' => $percentageChangeCost,
            'totalIncome' => $totalIncome,
            'percentageIncome' => $percentageChangeIncome,
        ]);
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
        $mergedCostData = collect([]);

        // Menambahkan data dari model Cost
        foreach ($costData as $key => $value) {
            if ($mergedCostData->has($key)) {
                $mergedCostData[$key] += $value;
            } else {
                $mergedCostData[$key] = $value;
            }
        }

        // Menambahkan data dari model ChildCostDetail
        foreach ($childCostData as $key => $value) {
            if ($mergedCostData->has($key)) {
                $mergedCostData[$key] += $value;
            } else {
                $mergedCostData[$key] = $value;
            }
        }

        // Mengambil data dari model Income
        $incomeData = Income::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->day;
            })
            ->map(function ($group) {
                return $group->sum('total_amount');
            });

        $allDays = [];
        $daysInMonth = $lastDayOfMonth->day;

        // Inisialisasi array hari dengan nilai 0 untuk biaya dan pemasukan
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $allDays[$i] = [
                'cost' => 0,
                'income' => 0,
            ];
        }

        // Isi nilai biaya yang sebenarnya berdasarkan data yang ada
        foreach ($mergedCostData as $day => $value) {
            $allDays[$day]['cost'] = $value;
        }

        // Isi nilai pemasukan yang sebenarnya berdasarkan data yang ada
        foreach ($incomeData as $day => $value) {
            $allDays[$day]['income'] = $value;
        }

        $totalCost = array_sum(array_column($allDays, 'cost'));
        $totalIncome = array_sum(array_column($allDays, 'income'));

        // Perbandingan dengan bulan sebelumnya
        $lastMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1)->subMonth();

        $lastMonthTotalCost = Cost::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total_cost') + ChildCostDetail::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('cost');

        $lastMonthTotalIncome = Income::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total_amount');

        $percentageChangeCost = 0;
        if ($lastMonthTotalCost > 0) {
            $rawPercentageCost = (($totalCost - $lastMonthTotalCost) / $lastMonthTotalCost) * 100;
            $formattedPercentageCost = number_format($rawPercentageCost, 2, ',', '.');
            if ($rawPercentageCost < 1 && $rawPercentageCost > -1 && $rawPercentageCost != 0) {
                $formattedPercentageCost = '0' . $formattedPercentageCost;
            }
            $percentageChangeCost = $formattedPercentageCost;
        }

        $percentageChangeIncome = 0;
        if ($lastMonthTotalIncome > 0) {
            $rawPercentageIncome = (($totalIncome - $lastMonthTotalIncome) / $lastMonthTotalIncome) * 100;
            $formattedPercentageIncome = number_format($rawPercentageIncome, 2, ',', '.');
            if ($rawPercentageIncome < 1 && $rawPercentageIncome > -1 && $rawPercentageIncome != 0) {
                $formattedPercentageIncome = '0' . $formattedPercentageIncome;
            }
            $percentageChangeIncome = $formattedPercentageIncome;
        }

        return response()->json([
            'labels' => range(1, $daysInMonth),
            'values' => $allDays,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'totalCost' => $totalCost,
            'totalIncome' => $totalIncome,
            'percentageCost' => $percentageChangeCost,
            'percentageIncome' => $percentageChangeIncome,
        ]);
    }

}
