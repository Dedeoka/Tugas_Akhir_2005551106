<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncomeType;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KategoriPemasukanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = IncomeType::where('name', 'LIKE', "%{$keyword}%")->orWhere('id', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.master-data.kategori-pemasukan', compact('datas', 'keyword'));
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
            'name' => 'required|unique:income_types,name',
        ], [
            'name.required' => 'Data wajib diisi',
            'name.unique' => 'Nama kategori pemasukan sudah digunakan, harap pilih nama yang lain.',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
            ];
            IncomeType::create($data);

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
        $validasi = Validator::make($request->all(), [
            'name' => 'required|unique:income_types,name,' . $id,
        ], [
            'name.required' => 'Data wajib diisi',
            'name.unique' => 'Nama kategori pemasukan sudah digunakan, harap pilih nama yang lain.',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
            ];
            IncomeType::where('id', $id)->update($data);
            return response()->json(['success' => "Berhasil melakukan update data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IncomeType::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
