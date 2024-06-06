<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateMoney;
use App\Models\GoodsCategory;
use App\Models\DonateGoods;
use App\Models\DonateGoodsDetail;

class DonasiController extends Controller
{
    public function index(Request $request){
        $goods = GoodsCategory::get();
        foreach ($goods as $good) {
        if ($good->stock === 0) {
            $good->percentage_available = 100;
        } else {
            $good->percentage_available = round((($good->capacity - $good->stock) / $good->capacity) * 100, 2);
        }
    }
        $donate = session('donate');
        // dd($goods);
        // dd($donate);
        if ($donate) {
            $createdAt = $donate->created_at;
            $now = now();
            $differenceInMinutes = $now->diffInMinutes($createdAt);

            if ($differenceInMinutes > 15) {
                $request->session()->forget('donate');
                return view('user.donasi.donasi-uang', compact('goods'));
            }

            return view('user.donasi.donasi-uang', compact('donate', 'goods'));
        } else {
            return view('user.donasi.donasi-uang', compact('goods'));
        }

    }

    public function storeMoney(Request $request){
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'total_amount' => 'required',
        ], [
            'name.required' => 'Data wajib diisi',
            'address.required' => 'Data wajib diisi',
            'phone_number.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'total_amount.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'total_amount' => str_replace(',', '', $request->total_amount),
                'description' => $request->description,
            ];
            $totalAmount = str_replace(',', '', $request->total_amount);
            $name = $request->name;
            $email = $request->email;
            $donate = DonateMoney::create($data);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $totalAmount,
                ),
                'customer_details' => array(
                    'first_name' => $name,
                    'email' => $email,
                )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $donate->snap_token = $snapToken;
            $donate->save();

            $request->session()->put('donate', $donate, 1);
            return redirect()->back();
        }
    }

    public function success(Request $request){
        $success = true;
        $donate = session('donate');
        $donateId = $donate->id;
        $donasi = DonateMoney::findorfail($donateId);
        $donasi->status = 'success';
        $donasi->save();
        $request->session()->forget('donate');
        return redirect()->route('user-donasi-uang.index', ['success' => $success]);
    }

    public function storeGoods(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
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
                            $fail("{$goods->name} Melebihi Stock Yang Dapat Ditampung");
                        }
                    }
                },
            ],
            'quantities.*' => 'integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput(); // Mempertahankan input sebelumnya
        }

        $donation = DonateGoods::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'description' => $request->description,
            'date' => $request->date,
            'status' => 'Pending'
        ]);

        foreach ($request->goods as $index => $goodId) {
            $quantity = $request->quantities[$index];

            DonateGoodsDetail::create([
                'donate_goods_id' => $donation->id,
                'goods_category_id' => $goodId,
                'quantity' => $quantity,
                'description' => $request->description,
            ]);

            $goods = GoodsCategory::find($goodId);
            if ($goods) {
                $goods->stock -= $quantity;
                $goods->save();
            }
        }

        return redirect()->back()->with('success', 'Donasi berhasil disimpan!');
    }
}
