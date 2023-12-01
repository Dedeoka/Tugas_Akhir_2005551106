<?php

namespace App\Http\Controllers\Admin\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\CostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.keuangan.pengeluaran-panti', compact('datas', 'keyword', 'costTypes'));
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
            'total_amount' => 'required',
        ], [
            'cost_type_id.required' => 'Nama anak asuh wajib diisi',
            'title.required' => 'Tempat lahir anak asuh wajib diisi',
            'total_amount.required' => 'Tanggal lahir anak asuh wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'cost_type_id' => $request->cost_type_id,
                'title' => $request->title,
                'total_amount' => str_replace(',', '', $request->total_amount),
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
        //
    }
}
