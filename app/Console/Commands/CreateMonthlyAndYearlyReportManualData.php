<?php

namespace App\Console\Commands;

use App\Models\AnnualReport;
use App\Models\MonthlyReport;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Cost;
use App\Models\ChildCostDetail;
use App\Models\Income;

class CreateMonthlyAndYearlyReportManualData extends Command
{
    protected $signature = 'create:cash-data-manual';
    protected $description = 'Create manual monthly and yearly cash data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Proses data bulanan
        $this->processMonthlyReports();

        // Proses data tahunan
        $this->processAnnualReports();
    }

    protected function processMonthlyReports()
    {
        $firstIncome = Income::orderBy('created_at')->first();
        if (!$firstIncome) {
            $this->info("No income data found.");
            return;
        }

        $firstMonth = Carbon::parse($firstIncome->created_at)->startOfMonth();
        $lastMonth = Carbon::now()->startOfMonth();

        while ($firstMonth->lessThanOrEqualTo($lastMonth)) {
            $month = $firstMonth->format('Y-m');
            $totalAmount = $this->calculateMonthlyCash($month);

            // Only create or update the report if there is a total amount (i.e., data exists)
            if ($totalAmount !== null) {
                MonthlyReport::updateOrCreate(
                    ['month' => $month],
                    [
                        'name' => 'Monthly Report',
                        'total_amount' => $totalAmount,
                        'status' => 'Completed',
                    ]
                );

                $this->info("Monthly report for {$month} has been created with total amount: {$totalAmount}.");
            }

            $firstMonth->addMonth();
        }
    }

    protected function processAnnualReports()
    {
        $firstIncome = Income::orderBy('created_at')->first();
        if (!$firstIncome) {
            $this->info("No income data found.");
            return;
        }

        $firstYear = Carbon::parse($firstIncome->created_at)->startOfYear();
        $lastYear = Carbon::now()->startOfYear();

        // Clear existing annual reports to avoid re-accumulating totals
        AnnualReport::whereBetween('year', [$firstYear->format('Y'), $lastYear->format('Y')])->delete();

        while ($firstYear->lessThanOrEqualTo($lastYear)) {
            $year = $firstYear->format('Y');
            $totalAmount = $this->calculateYearlyCash($year);
            AnnualReport::updateOrCreate(
                ['year' => $year],
                [
                    'name' => 'Annual Report',
                    'total_amount' => $totalAmount,
                    'status' => 'Completed',
                ]
            );

            $this->info("Annual report for {$year} has been created with total amount: {$totalAmount}.");

            $firstYear->addYear();
        }
    }

    protected function calculateMonthlyCash($month)
    {
        $parsedMonth = Carbon::parse($month);
        $year = $parsedMonth->year;
        $monthNumber = $parsedMonth->month;

        // Calculate total income
        $totalIncome = Income::whereYear('created_at', $year)
                            ->whereMonth('created_at', $monthNumber)
                            ->sum('total_amount');

        // Calculate total cost
        $totalCost = Cost::whereYear('created_at', $year)
                        ->whereMonth('created_at', $monthNumber)
                        ->sum('total_cost');

        // Calculate total child cost detail
        $totalChildCost = ChildCostDetail::whereYear('created_at', $year)
                                        ->whereMonth('created_at', $monthNumber)
                                        ->sum('cost');

        // Calculate total amount
        $totalAmount = $totalIncome - ($totalCost + $totalChildCost);

        // Get the previous month's report
        $previousMonth = $parsedMonth->subMonth()->format('Y-m');
        $previousMonthlyReport = MonthlyReport::where('month', $previousMonth)->first();

        if ($previousMonthlyReport) {
            $totalAmount += $previousMonthlyReport->total_amount;
        }

        // Return null if there is no data for the current month
        if ($totalIncome == 0 && $totalCost == 0 && $totalChildCost == 0 && !$previousMonthlyReport) {
            return null;
        }

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

        // Add the previous year's total amount if it exists
        $previousYear = Carbon::parse($year)->subYear()->format('Y');
        $previousAnnualReport = AnnualReport::where('year', $previousYear)->first();

        if ($previousAnnualReport) {
            $totalAmount += $previousAnnualReport->total_amount;
        }

        return $totalAmount;
    }
}
