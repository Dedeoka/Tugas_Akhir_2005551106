<?php

namespace App\Http\Controllers\Admin\Donasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateGoods;
use App\Models\DonateGoodsDetail;

class DonasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = DonateGoods::with('donateGoodDetails.goodsCategory')
        ->where('name', 'LIKE', "%{$keyword}%")
        ->orWhere('status', '=', $keyword)
        ->paginate(10)
        ->withQueryString();
        return view('admin.donasi.donasi-barang', compact('datas', 'keyword'));
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
        //
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
        $data = DonateGoods::find($id);
        if ($request->pending){
            $data->status = 'pending';
            $data->save();
        }
        else if($request->success){
            $data->status = 'success';
            $data->save();
            }
        return response()->json(['success' => "Berhasil mengubah data"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
