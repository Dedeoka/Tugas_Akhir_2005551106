<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;

class LaporanKeuanganController extends Controller
{
    public function laporanTahunan(){
        return view('admin.keuangan.laporan-tahunan');
    }

    public function laporanTahunanReport(Request $request){

        $year = $request->input('year', now()->year);

        $bantuanLuar = Income::whereHas('incomeTypes', function ($query) {
            $query->where('name', 'Bantuan Luar Negeri');
        })->whereYear('created_at', $year)->sum('total_amount');

        return response()->json(['bantuanLuar' => $bantuanLuar, '']);
    }
}
