<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildHealth;
use App\Models\Children;
use App\Models\Disease;
use App\Models\Cost;
use App\Http\Requests\StoreKategoriRequest;
use App\Models\ChildCost;
use App\Models\ChildCostDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class KesehatanAnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = ChildHealth::with(['childrens', 'diseases'])
        ->where(function ($query) use ($keyword) {
            $query->whereHas('childrens', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            })
            ->orWhereHas('diseases', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            });
        })
        ->paginate(10)
        ->withQueryString();
        $childs = Children::all();
        $diseases = Disease::all();
        // dd($datas);
        return view('admin.anak-asuh.kesehatan-anak-asuh', compact('datas', 'keyword', 'childs', 'diseases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'children_id' => 'required',
            'disease_id' => 'required',
            'medicine' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'date_of_illness' => 'required|date',
            'recovery_date' => 'nullable|date',
            'description' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'disease_id.required' => 'Penyakit wajib diisi',
            'medicine.required' => 'Obat wajib diisi',
            'status.required' => 'Status wajib diisi',
            'payment_method.required' => 'Pembayaran wajib diisi',
            'date_of_illness.required' => 'Tanggal sakit wajib diisi',
            'date_of_illness.date' => 'Format tanggal tidak valid',
            'recovery_date.date' => 'Format tanggal tidak valid',
            'description' => 'Deskripsi wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 400);
        } else {
            $data = [
                'children_id' => $request->children_id,
                'disease_id' => $request->disease_id,
                'medicine' => $request->medicine,
                'date_of_illness' => $request->date_of_illness,
                'recovery_date' => $request->recovery_date,
                'status' => $request->status,
                'payment_method' => $request->payment_method,
                'medical_check_cost' => $request->medical_check_cost !== null ? str_replace(',', '', $request->medical_check_cost) : 0,
                'drug_cost' => $request->drug_cost !== null ? str_replace(',', '', $request->drug_cost) : 0,
                'description' => $request->description,
            ];

            $childHealth = ChildHealth::create($data);

            if ($request->payment_method == 'Biaya Panti Asuhan') {
                $costData = [
                    'reference_table' => 'child_health_table',
                    'reference_table_id' => $childHealth->id,
                    'title' => 'Pengeluaran Sakit '. $childHealth->diseases->name . ' ' . $childHealth->childrens->name,
                    'total_cost' => $childHealth->medical_check_cost + $childHealth->drug_cost,
                    'status' => 'Lunas',
                ];

                $childCost = ChildCost::create($costData);

                $costDetailData = [
                    'child_cost_id' => $childCost->id,
                    'title' => 'Pengeluaran Cek Kesehatan dan Berobat',
                    'cost' => $childHealth->medical_check_cost + $childHealth->drug_cost,
                ];

                ChildCostDetail::create($costDetailData);
            }
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
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'recovery_date' => 'required|date',
            'recovery_date' => 'required|date',
        ], [
            'recovery_date.required' => 'Tanggal sakit wajib diisi',
            'recovery_date.date' => 'Format tanggal tidak valid',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 400);
        }

        $data = ChildHealth::find($id);

        if (!$data) {
            return response()->json(['errors' => ['Data tidak ditemukan']]);
        } else{
            $data->recovery_date = $request->recovery_date;
            $data->status = 'Sudah Sembuh';
            if ($request->has('medicine')) {
                $data->medicine = $data->medicine . ',' . $request->medicine;
            }
            if ($request->payment_method == 'Biaya Panti Asuhan' && $data->payment_method != 'Biaya Panti Asuhan') {
                $data->payment_method = $data->payment_method . ',' . $request->payment_method;
            }
            $data->medical_check_cost += $request->medical_check_cost !== null ? str_replace(',', '', $request->medical_check_cost) : 0;
            $data->drug_cost += $request->drug_cost !== null ? str_replace(',', '', $request->drug_cost) : 0;
            $data->save();

            if ($request->payment_method == 'Biaya Panti Asuhan') {
                $childCost = ChildCost::where('reference_table', 'child_health_table')->where('reference_table_id', $data->id)->first();

                if ($childCost) {
                    $childCost->total_cost = $childCost->total_cost + str_replace(',', '', $request->medical_check_cost) + str_replace(',', '', $request->drug_cost);
                    $childCost->save();

                    $costDetailData = [
                        'child_cost_id' => $childCost->id,
                        'title' => 'Pengeluaran Tambahan Cek Kesehatan dan Berobat',
                        'cost' => str_replace(',', '', $request->medical_check_cost) + str_replace(',', '', $request->drug_cost),
                    ];

                    ChildCostDetail::create($costDetailData);
                } else {
                    $costDataNew = [
                    'reference_table' => 'child_health_table',
                    'reference_table_id' => $data->id,
                    'title' => 'Pengeluaran Sakit ' . $data->diseases->name . ' ' . $data->childrens->name,
                    'total_cost' => str_replace(',', '', $request->medical_check_cost) + str_replace(',', '', $request->drug_cost),
                    'status' => 'Lunas',
                    ];

                    $childCostCreate = ChildCost::create($costDataNew);

                    $costDetailDataNew = [
                        'child_cost_id' => $childCostCreate->id,
                        'title' => 'Pengeluaran Tambahan Cek Kesehatan dan Berobat',
                        'cost' => str_replace(',', '', $request->medical_check_cost) + str_replace(',', '', $request->drug_cost),
                    ];

                    ChildCostDetail::create($costDetailDataNew);
                }
            }
            return response()->json(['success' => "Berhasil memperbarui data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChildHealth::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
