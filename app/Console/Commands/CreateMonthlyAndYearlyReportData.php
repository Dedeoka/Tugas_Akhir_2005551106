<?php

namespace App\Console\Commands;

use App\Models\AnnualReport;
use App\Models\MonthlyReport;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Cost;
use App\Models\ChildCostDetail;
use App\Models\Income;

class CreateMonthlyAndYearlyReportData extends Command
{
    protected $signature = 'create:cash-data';
    protected $description = 'Create monthly and yearly cash data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        // Create monthly cash data
        if ($now->day == 1) {
            $previousMonth = $now->subMonth()->format('Y-m');
            $totalAmount = $this->calculateMonthlyCash($previousMonth);
            MonthlyReport::create([
                'name' => 'Monthly Report',
                'month' => $previousMonth,
                'total_amount' => $totalAmount,
                'status' => 'Completed',
            ]);

            $this->info("Monthly report for {$previousMonth} has been created with total amount: {$totalAmount}.");
        }

        // Create yearly cash data
        if ($now->month == 1 && $now->day == 1) {
            $previousYear = $now->subYear()->format('Y');
            $totalAmount = $this->calculateYearlyCash($previousYear);
            AnnualReport::create([
                'name' => 'Annual Report',
                'year' => $previousYear,
                'total_amount' => $totalAmount,
                'status' => 'Completed',
            ]);

            $this->info("Annual report for {$previousYear} has been created with total amount: {$totalAmount}.");
        }
    }

    protected function calculateMonthlyCash($month)
    {
        // Menghitung total pemasukan (income)
        $totalIncome = Income::whereMonth('created_at', $month)->sum('total_amount');

        // Menghitung total biaya (cost)
        $totalCost = Cost::whereMonth('created_at', $month)->sum('total_cost');

        // Menghitung total biaya anak (child cost detail)
        $totalChildCost = ChildCostDetail::whereMonth('created_at', $month)->sum('cost');

        // Menghitung total amount
        $totalAmount = $totalIncome - ($totalCost + $totalChildCost);

        return $totalAmount;
    }

    protected function calculateYearlyCash($year)
    {
        // Menghitung total pemasukan (income)
        $totalIncome = Income::whereYear('created_at', $year)->sum('total_amount');

        // Menghitung total biaya (cost)
        $totalCost = Cost::whereYear('created_at', $year)->sum('total_cost');

        // Menghitung total biaya anak (child cost detail)
        $totalChildCost = ChildCostDetail::whereYear('created_at', $year)->sum('cost');

        // Menghitung total amount
        $totalAmount = $totalIncome - ($totalCost + $totalChildCost);

        return $totalAmount;
    }
}
