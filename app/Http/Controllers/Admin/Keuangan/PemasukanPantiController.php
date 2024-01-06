<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\IncomeType;
use Illuminate\Support\Facades\Validator;


class PemasukanPantiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = Income::with(['incomeTypes'])->where('title', 'LIKE', "%{$keyword}%")->paginate(10)->withQueryString();
        $incomeTypes = IncomeType::all();
        $income = Income::get();
        if ($income->isNotEmpty()) {
            $years = range(
                $income->min('created_at')->year,
                now()->year
            );
            arsort($years);
        } else {
            $years = [];
        }

        $currentYearCountIncome = Income::whereYear('created_at', now()->year)
            ->count();
        $lastYearCountIncome = Income::whereYear('created_at', now()->subMonth()->year)
            ->count();
        $percentageYearCountIncome = 0;
        if ($lastYearCountIncome > 0) {
            $percentageYearCountIncome = (($currentYearCountIncome - $lastYearCountIncome) / $lastYearCountIncome) * 100;
        }

        //total pengeluaran panti tahun ini dan tahun lalu
        $currentYearTotalIncome = Income::whereYear('created_at', now()->year)
            ->sum('total_amount');
        $currentYearTotalIncomeFormatted = 'Rp ' . number_format($currentYearTotalIncome, 0, ',', '.');
        $lastYearTotalIncome = Income::whereYear('created_at', now()->subYear()->year)
            ->sum('total_amount');
        $lastYearTotalIncomeFormatted = 'Rp ' . number_format($lastYearTotalIncome, 0, ',', '.');
        $percentageYearTotalIncome = 0;
        if ($lastYearTotalIncome > 0) {
            $percentageYearTotalIncome = number_format((($currentYearTotalIncome - $lastYearTotalIncome) / $lastYearTotalIncome) * 100, 2);
        }

        //total pengeluaran panti bulan ini dan bulan lalu
        $currentMonthTotalIncome = Income::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');
        $currentMonthTotalIncomeFormatted = 'Rp ' . number_format($currentMonthTotalIncome, 0, ',', '.');
        $lastMonthTotalIncome = Income::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total_amount');
        $lastMonthTotalIncomeFormatted = 'Rp ' . number_format($lastMonthTotalIncome, 0, ',', '.');
        $percentageMonthTotalIncome = 0;
        if ($lastMonthTotalIncome > 0) {
            $percentageMonthTotalIncome = number_format((($currentMonthTotalIncome - $lastMonthTotalIncome) / $lastMonthTotalIncome) * 100, 2);
        }

        $highestTotalIncomeByType = Income::select('income_type_id', \DB::raw('SUM(total_amount) as total_amount'))
            ->groupBy('Income_type_id')
            ->orderByDesc('total_amount')
            ->first();

        $highestTotalIncomeByTypeFormat = 'Rp ' . number_format($highestTotalIncomeByType->total_Income, 0, ',', '.');

        // Get the Income type name for the highest total Income
        $highestIncomeTypeName = $highestTotalIncomeByType
            ? IncomeType::find($highestTotalIncomeByType->income_type_id)->name
            : 'Unknown';
        return view('admin.keuangan.pemasukan-panti', compact('datas', 'keyword', 'incomeTypes', 'years','currentYearCountIncome','percentageYearCountIncome' ,'currentYearTotalIncomeFormatted', 'percentageYearTotalIncome', 'currentMonthTotalIncomeFormatted', 'percentageMonthTotalIncome', 'highestTotalIncomeByTypeFormat', 'highestIncomeTypeName'));

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
            'income_type_id' => 'required',
            'title' => 'required',
            'total_amount' => 'required',
        ], [
            'income_type_id.required' => 'Kategori pengeluaran wajib diisi',
            'title.required' => 'Nama pengeluaran wajib diisi',
            'total_amount.required' => 'Jumlah pengeluaran wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'income_type_id' => $request->income_type_id,
                'title' => $request->title,
                'total_amount' => str_replace(',', '', $request->total_amount),
                'status' => 'Lunas',
            ];

            Income::create($data);

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
        Income::find($id)->delete();
        return response()->json(['success'=>'Data Berhasil Dihapus.'], 200);
    }
}
