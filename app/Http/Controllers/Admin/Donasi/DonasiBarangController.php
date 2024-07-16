<?php

namespace App\Http\Controllers\Admin\Donasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateGoods;
use App\Models\DonateGoodsDetail;
use App\Models\GoodsCategory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DonateGoodsExport;

class DonasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q', '');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Query untuk mengambil data GoodsCategory yang tidak disembunyikan dan stoknya lebih dari 0
        $goods = GoodsCategory::where('is_hide', false)
            ->where('stock', '>', 0)
            ->get();

        // Query untuk mengambil data DonateGoods dengan detail donasi barang dan kategori barang terkait
        $query = DonateGoods::with('donateGoodDetails.goodsCategory');

        // Filter berdasarkan kata kunci
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('status', '=', $keyword);
            });
        }

        // Filter berdasarkan rentang tanggal jika startDate dan endDate tersedia
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        // Lakukan pagination dan tetapkan untuk menyimpan query string dalam URL
        $datas = $query->paginate(10)->withQueryString();

        // Hitung persentase tersedia untuk setiap barang
        foreach ($goods as $good) {
            if ($good->stock === 0) {
                $good->percentage_available = 100;
            } else {
                $good->percentage_available = round((($good->capacity - $good->stock) / $good->capacity) * 100, 2);
            }
        }

        // Mengembalikan view dengan data yang diperlukan
        return view('admin.donasi.donasi-barang', compact('datas', 'keyword', 'goods', 'startDate', 'endDate'));
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
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'goods' => 'required|array',
            'goods.*' => 'exists:goods_categories,id',
            'quantities' => [
                'required',
                'array',
                function ($attribute, $value, $fail) use ($request) {
                    foreach ($request->goods as $index => $goodId) {
                        $goods = GoodsCategory::find($goodId);
                        if ($goods && $request->quantities[$index] > $goods->stock) {
                            $fail("{$goods->name} melebihi stok yang tersedia.");
                        }
                    }
                },
            ],
            'quantities.*' => 'integer|min:1',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'date.required' => 'Tanggal wajib diisi.',
            'goods.*.exists' => 'Barang yang dipilih tidak valid.',
            'quantities.*.integer' => 'Jumlah barang harus berupa angka.',
            'quantities.*.min' => 'Jumlah barang harus lebih dari 0.',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        $donation = DonateGoods::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'description' => 'Data Diinput Oleh Admin',
            'date' => $request->date,
            'status' => 'Success',
        ]);

        foreach ($request->goods as $index => $goodId) {
            $quantity = $request->quantities[$index];

            // Mencari GoodsCategory berdasarkan ID
            $goods = GoodsCategory::find($goodId);

            // Memastikan GoodsCategory ditemukan
            if (!$goods) {
                return response()->json(['errors' => ['goods' => "Barang dengan ID {$goodId} tidak ditemukan"]], 422);
            }

            // Membuat detail donasi barang baru
            DonateGoodsDetail::create([
                'donate_goods_id' => $donation->id,
                'goods_category_id' => $goods->id,
                'quantity' => $quantity,
                'description' => 'Data Diinput Oleh Admin',
            ]);

            // Mengurangi stok barang yang didonasikan
            if ($goods->stock >= $quantity) {
                $goods->stock -= $quantity;
                $goods->save();
            } else {
                return response()->json(['errors' => ['goods' => "Stok barang {$goods->name} tidak mencukupi"]], 422);
            }
        }

        return response()->json(['success' => 'Donasi barang berhasil disimpan']);
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
