<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoodsCategory;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = GoodsCategory::where('name', 'LIKE', "%{$keyword}%")->orWhere('id', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.master-data.kategori-barang', compact('datas', 'keyword'));
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
            'name' => 'required|unique:goods_categories,name',
            'capacity' => 'required',
            'unit' => 'required',
        ], [
            'name.required' => 'Data nama barang wajib diisi',
            'capacity.required' => 'Data kapasitas wajib diisi',
            'unit.required' => 'Satuan wajib diisi',
            'name.unique' => 'Nama kategori barang sudah digunakan, harap pilih nama yang lain.',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'capacity' => $request->capacity,
                'unit' => $request->unit,
                'stock' => $request->capacity,
            ];
            GoodsCategory::create($data);

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
            'name' => 'required|unique:goods_categories,name,' . $id,
            'capacity' => 'required|integer|min:0',
            'unit' => 'required',
        ], [
            'name.required' => 'Data wajib diisi',
            'name.unique' => 'Nama kategori barang sudah digunakan, harap pilih nama yang lain.',
            'capacity.required' => 'Data kapasitas wajib diisi',
            'capacity.integer' => 'Kapasitas harus berupa angka',
            'capacity.min' => 'Kapasitas tidak boleh kurang dari 0',
            'unit.required' => 'Satuan wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }

        $goodsCategory = GoodsCategory::find($id);

        if (!$goodsCategory) {
            return response()->json(['errors' => ['id' => 'Kategori barang tidak ditemukan.']]);
        }

        $newCapacity = (int)$request->capacity;
        $oldCapacity = (int)$goodsCategory->capacity;
        $stock = (int)$goodsCategory->stock;

        $capacityDifference = $newCapacity - $oldCapacity;

        if ($capacityDifference > 0) {
            $stock += $capacityDifference;
        }

        $data = [
            'name' => $request->name,
            'capacity' => $newCapacity,
            'unit' => $request->unit,
            'stock' => $stock,
        ];

        $goodsCategory->update($data);

        return response()->json(['success' => "Berhasil melakukan update data"]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GoodsCategory::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }

    public function updateStatus(Request $request, string $id){
        $data = GoodsCategory::find($id);
        if ($request->is_hide){
            $data->is_hide = true;
            $data->save();
        }
        else if($request->is_show){
            $data->is_hide = false;
            $data->save();
            }
        return response()->json(['success' => "Berhasil mengubah data"]);
    }
}
