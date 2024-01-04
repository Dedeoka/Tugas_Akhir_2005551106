<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\CostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PengeluaranPantiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = Cost::with(['costTypes'])->where('title', 'LIKE', "%{$keyword}%")->paginate(10)->withQueryString();
        $costTypes = CostType::all();
        $cost = Cost::get();
        if ($cost->isNotEmpty()) {
            $years = range(
                $cost->min('created_at')->year,
                now()->year
            );
            arsort($years);
        } else {
            $years = [];
        }

        $currentYearCountCost = Cost::whereYear('created_at', now()->year)
            ->count();
        $lastYearCountCost = Cost::whereYear('created_at', now()->subMonth()->year)
            ->count();
        $percentageYearCountCost = 0;
        if ($lastYearCountCost > 0) {
            $percentageYearCountCost = (($currentYearCountCost - $lastYearCountCost) / $lastYearCountCost) * 100;
        }

        //total pengeluaran panti tahun ini dan tahun lalu
        $currentYearTotalCost = Cost::whereYear('created_at', now()->year)
            ->sum('total_cost');
        $currentYearTotalCostFormatted = 'Rp ' . number_format($currentYearTotalCost, 0, ',', '.');
        $lastYearTotalCost = Cost::whereYear('created_at', now()->subMonth()->year)
            ->sum('total_cost');
        $lastYearTotalCostFormatted = 'Rp ' . number_format($lastYearTotalCost, 0, ',', '.');
        $percentageYearTotalCost = 0;
        if ($lastYearTotalCost > 0) {
            $percentageYearTotalCost = number_format((($currentYearTotalCost - $lastYearTotalCost) / $lastYearTotalCost) * 100, 2);
        }

        //total pengeluaran panti bulan ini dan bulan lalu
        $currentMonthTotalCost = Cost::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_cost');
        $currentMonthTotalCostFormatted = 'Rp ' . number_format($currentMonthTotalCost, 0, ',', '.');
        $lastMonthTotalCost = Cost::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total_cost');
        $lastMonthTotalCostFormatted = 'Rp ' . number_format($lastMonthTotalCost, 0, ',', '.');
        $percentageMonthTotalCost = 0;
        if ($lastMonthTotalCost > 0) {
            $percentageMonthTotalCost = number_format((($currentMonthTotalCost - $lastMonthTotalCost) / $lastMonthTotalCost) * 100, 2);
        }

        $highestTotalCostByType = Cost::select('cost_type_id', \DB::raw('SUM(total_cost) as total_cost'))
            ->groupBy('cost_type_id')
            ->orderByDesc('total_cost')
            ->first();

        $highestTotalCostByTypeFormat = 'Rp ' . number_format($highestTotalCostByType->total_cost, 0, ',', '.');

        // Get the cost type name for the highest total cost
        $highestCostTypeName = $highestTotalCostByType
            ? CostType::find($highestTotalCostByType->cost_type_id)->name
            : 'Unknown';

        return view('admin.keuangan.pengeluaran-panti', compact('datas', 'keyword', 'costTypes', 'years', 'currentYearCountCost','percentageYearCountCost' ,'currentYearTotalCostFormatted', 'percentageYearTotalCost', 'currentMonthTotalCostFormatted', 'percentageMonthTotalCost', 'highestTotalCostByTypeFormat', 'highestCostTypeName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'cost_type_id' => 'required',
            'title' => 'required',
            'total_cost' => 'required',
        ], [
            'cost_type_id.required' => 'Nama anak asuh wajib diisi',
            'title.required' => 'Tempat lahir anak asuh wajib diisi',
            'total_cost.required' => 'Tanggal lahir anak asuh wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'cost_type_id' => $request->cost_type_id,
                'title' => $request->title,
                'total_cost' => str_replace(',', '', $request->total_cost),
                'status' => 'Lunas',
            ];

            Cost::create($data);

            return response()->json(['success' => "Berhasil menyimpan data"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cost::find($id)->delete();
        return response()->json(['success'=>'Data Berhasil Dihapus.'], 200);
    }
}
