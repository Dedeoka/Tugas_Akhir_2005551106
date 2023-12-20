<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ChildCost;
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

        // Fetch data from ChildCost model for the selected year
        $pengeluaranAnak = ChildCost::whereYear('created_at', $selectedYear)
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m');
            });

        // Get distinct years for the dropdown
        $distinctYears = ChildCost::distinct()->get([DB::raw('YEAR(created_at) as year')])->pluck('year');

        return view('admin.keuangan.pengeluaran-total', compact('pengeluaranAnak', 'selectedYear', 'distinctYears'));
    }
}
