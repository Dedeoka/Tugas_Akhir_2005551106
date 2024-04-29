<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\ChildCost;
use App\Models\ChildCostDetail;
use App\Models\ChildHealth;
use App\Models\ChildEducation;
use App\Models\ChildAchievement;
use App\Models\ChildAcademicAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengeluaranAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $childCostDetail = ChildCostDetail::get();
        if ($childCostDetail->isNotEmpty()) {
            $years = range(
                $childCostDetail->min('created_at')->year,
                now()->year
            );
            arsort($years);
        } else {
            $years = [];
        }

        $datas = ChildCost::where('title', 'LIKE', "%{$keyword}%")->with(['childCostDetails'])->paginate(10)->withQueryString();
        $childHealths = ChildHealth::with(['childrens', 'diseases'])->paginate(10)
        ->withQueryString();
        $childEducations = ChildEducation::with(['childrens'])->paginate(10)
        ->withQueryString();
        $childAchievements = ChildAchievement::with(['childrens'])->paginate(10)
        ->withQueryString();

        //total pengeluaran anak bulan ini dan bulan lalu
        $currentMonthTotalCost = ChildCostDetail::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('cost');
        $currentMonthTotalCostFormatted = 'Rp ' . number_format($currentMonthTotalCost, 0, ',', '.');
        $lastMonthTotalCost = ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('cost');
        $lastMonthTotalCostFormatted = 'Rp ' . number_format($lastMonthTotalCost, 0, ',', '.');
        $percentageTotalCost = 0;
        if ($lastMonthTotalCost > 0) {
            $percentageTotalCost = number_format((($currentMonthTotalCost - $lastMonthTotalCost) / $lastMonthTotalCost) * 100, 2);
        }

        //pengeluaran kesehatan bulan ini dan bulan lalu
        $currentMonthHealthCost = ChildCostDetail::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_health_table');
            })
            ->sum('cost');
        $currentMonthHealthCostFormatted = 'Rp ' . number_format($currentMonthHealthCost, 0, ',', '.');
        $lastMonthHealthCost = ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_health_table');
            })
            ->sum('cost');
        $lastMonthHealthCostFormatted = 'Rp ' . number_format($lastMonthHealthCost, 0, ',', '.');
        $percentageHealthCost = 0;
        if ($lastMonthHealthCost > 0) {
            $percentageHealthCost = number_format((($currentMonthHealthCost - $lastMonthHealthCost) / $lastMonthHealthCost) * 100, 2);
        }

        //pengeluaran Pendidikan bulan ini dan bulan lalu
        $currentMonthEducationCost = ChildCostDetail::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_education_table');
            })
            ->sum('cost');
        $currentMonthEducationCostFormatted = 'Rp ' . number_format($currentMonthEducationCost, 0, ',', '.');
        $lastMonthEducationCost = ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_education_table');
            })
            ->sum('cost');
        $lastMonthEducationCostFormatted = 'Rp ' . number_format($lastMonthEducationCost, 0, ',', '.');
        $percentageEducationCost = 0;
        if ($lastMonthEducationCost > 0) {
            $percentageEducationCost = number_format((($currentMonthEducationCost - $lastMonthEducationCost) / $lastMonthEducationCost) * 100, 2);
        }

        //pengeluaran Prestasi bulan ini dan bulan lalu
        $currentMonthAchievementCost = ChildCostDetail::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_achievement_table');
            })
            ->sum('cost');

        $currentMonthAcademicAchievementCost = ChildCostDetail::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->whereHas('childCosts', function ($query) {
                $query->where('reference_table', 'child_academic_achievement_table');
            })
            ->sum('cost');

        $currentMonthAchievementCostFormatted = 'Rp ' . number_format($currentMonthAchievementCost + $currentMonthAcademicAchievementCost, 0, ',', '.');
        $lastMonthAchievementCost = ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_achievement_table');
            })
            ->sum('cost');
        $lastMonthAcademicAchievementCost = ChildCostDetail::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->whereHas('childCosts', function ($query) {
            $query->where('reference_table', 'child_academic_achievement_table');
            })
            ->sum('cost');
        $lastMonthAchievementCostFormatted = 'Rp ' . number_format($lastMonthAchievementCost + $lastMonthAcademicAchievementCost, 0, ',', '.');
        $percentageAchievementCost = 0;
        if ($lastMonthAchievementCost > 0) {
            $percentageAchievementCost = number_format((($currentMonthAchievementCost - $lastMonthAchievementCost) / $lastMonthAchievementCost) * 100, 2);
        }

        return view('admin.keuangan.pengeluaran-anak', compact('datas', 'keyword', 'childHealths', 'childEducations', 'childAchievements', 'years', 'currentMonthTotalCostFormatted', 'currentMonthHealthCostFormatted', 'currentMonthEducationCostFormatted','currentMonthAchievementCostFormatted', 'percentageTotalCost', 'percentageHealthCost', 'percentageEducationCost', 'percentageAchievementCost'));
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
            'title' => 'required',
            'total_cost' => 'required',
            'proof_of_payment' => 'file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'title.required' => 'Nama pengeluaran wajib diisi',
            'total_cost.required' => 'Jumlah pengeluaran wajib diisi',
            'proof_of_payment.file' => 'Berkas foto anak asuh harus berupa file',
            'proof_of_payment.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'proof_of_payment.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 400);
        } else {

            $data_id = $request->data_id;
            if ($request->type_cost == 'Kesehatan'){
                $childHealth = ChildHealth::with(['childrens', 'diseases'])->find($data_id);
                $childCost = ChildCost::where('reference_table', 'child_health_table')->where('reference_table_id', $data_id)->first();

                $proofPayment = null;
                if ($request->hasFile('proof_of_payment')) {
                    $proofPayment = $request->file('proof_of_payment')->store('uploads/bukti-pembayaran-kesehatan');
                }

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_health_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Sakit ' . $childHealth->diseases->name . ' ' . $childHealth->childrens->name,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            elseif ($request->type_cost == 'Pendidikan'){
                $childEducation = ChildEducation::with(['childrens'])->find($data_id);
                $childCost = ChildCost::where('reference_table', 'child_education_table')->where('reference_table_id', $data_id)->first();
                $proofPayment = null;
                if ($request->hasFile('proof_of_payment')) {
                    $proofPayment = $request->file('proof_of_payment')->store('uploads/bukti-pembayaran-pendidikan');
                }

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_education_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Pendidikan' . ' ' . $childEducation->childrens->name . ' ' . $childEducation->education_level . '/Kelas ' . $childEducation->class ,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Pendidikan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            elseif ($request->type_cost == 'Prestasi'){
                $childAchievements = ChildAchievement::with(['childrens'])->find($data_id);
                $childCost = ChildCost::where('reference_table', 'child_achievement_table')->where('reference_table_id', $data_id)->first();
                $proofPayment = null;
                if ($request->hasFile('proof_of_payment')) {
                    $proofPayment = $request->file('proof_of_payment')->store('uploads/bukti-pembayaran-prestasi');
                }

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_achievement_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Prestasi' . ' ' . $childAchievements->childrens->name . ' ' . 'Perlombaan ' . $childAchievements->title ,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Prestasi ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            elseif ($request->type_cost == 'Prestasi Akademik'){
                $childAchievements = ChildAcademicAchievement::with(['childEducations.childrens'])->find($data_id);
                $childCost = ChildCost::where('reference_table', 'child_academic_achievement_table')->where('reference_table_id', $data_id)->first();
                $proofPayment = null;
                if ($request->hasFile('proof_of_payment')) {
                    $proofPayment = $request->file('proof_of_payment')->store('uploads/bukti-pembayaran-prestasi-akademik');
                }

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_academic_achievement_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Prestasi Akademik' . ' ' . $childAchievements->childEducations->childrens->name . ' Perlombaan ' . $childAchievements->title ,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Prestasi ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                        'proof_of_payment' => $proofPayment,
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            return response()->json(['success' => "Berhasil memperbarui data"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
        ChildCost::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.'], 200);
    }
}
