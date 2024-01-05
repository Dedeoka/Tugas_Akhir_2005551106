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

        return view('admin.keuangan.pengeluaran-total', compact('selectedYear', 'years'));
    }
}
