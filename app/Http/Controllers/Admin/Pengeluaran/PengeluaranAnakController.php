<?php

namespace App\Http\Controllers\Admin\Pengeluaran;

use App\Http\Controllers\Controller;
use App\Models\ChildCost;
use App\Models\ChildCostDetail;
use App\Models\ChildHealth;
use App\Models\ChildEducation;
use App\Models\ChildAchievement;
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
        $datas = ChildCost::where('title', 'LIKE', "%{$keyword}%")->paginate(10)->withQueryString();
        $childHealths = ChildHealth::with(['childrens', 'diseases'])->paginate(10)
        ->withQueryString();
        $childEducations = ChildEducation::with(['childrens'])->paginate(10)
        ->withQueryString();
        $childAchievements = ChildAchievement::with(['childrens'])->paginate(10)
        ->withQueryString();
        return view('admin.keuangan.pengeluaran-anak', compact('datas', 'keyword', 'childHealths', 'childEducations', 'childAchievements'));
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
        ], [
            'title.required' => 'Nama pengeluaran wajib diisi',
            'total_cost.required' => 'Jumlah pengeluaran wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 400);
        } else {

            $data_id = $request->data_id;
            $childHealth = ChildHealth::with(['childrens', 'diseases'])->find($data_id);
            $childEducation = ChildEducation::with(['childrens'])->find($data_id);
            $childAchievements = ChildAchievements::with(['childrens'])->find($data_id);
            if ($request->type_cost == 'Kesehatan'){

                $childCost = ChildCost::where('reference_table', 'child_health_table')->where('reference_table_id', $data_id)->first();

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_health_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Kesehatan ' . $childHealth->childrens->name,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            elseif ($request->type_cost == 'Pendidikan'){

                $childCost = ChildCost::where('reference_table', 'child_education_table')->where('reference_table_id', $data_id)->first();

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_education_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Pendidikan ' . ' ' . $childEducation->childrens->name . ' ' . $childEducation->education_level . '/Kelas ' . $childEducation->class ,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Pendidikan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            elseif ($request->type_cost == 'Prestasi'){

                $childCost = ChildCost::where('reference_table', 'child_education_table')->where('reference_table_id', $data_id)->first();

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->total_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_education_table',
                    'reference_table_id' => $data_id,
                    'title' => 'Pengeluaran Pendidikan ' . ' ' . $childEducation->childrens->name . ' ' . $childEducation->education_level . '/Kelas ' . $childEducation->class ,
                    'total_cost' => str_replace(',', '', $request->total_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Pendidikan ' . $request->title,
                        'cost' => str_replace(',', '', $request->total_cost),
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            return response()->json(['success' => "Berhasil memperbarui data"]);
        }
        dd($request);
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
        //
    }
}
