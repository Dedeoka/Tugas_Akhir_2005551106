<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateMoney;
use App\Models\GoodsCategory;
use App\Models\DonateGoods;
use App\Models\DonateGoodsDetail;
use App\Models\Scholarship;
use App\Models\Income;

class DonasiController extends Controller
{
    public function index(Request $request)
    {
        $goods = GoodsCategory::where('is_hide', false)
        ->where('stock', '>', 0)
        ->get();

        foreach ($goods as $good) {
            if ($good->stock === 0) {
                $good->percentage_available = 100;
            } else {
                $good->percentage_available = round((($good->capacity - $good->stock) / $good->capacity) * 100, 2);
            }
        }

        $donate = session('donate');
        $schoolarship = session('schoolarship');

        $now = now();

        // Jika kedua sesi ada
        if ($donate && $schoolarship) {
            $donateCreatedAt = $donate->created_at;
            $schoolarshipCreatedAt = $schoolarship->created_at;

            $donateDifferenceInMinutes = $now->diffInMinutes($donateCreatedAt);
            $schoolarshipDifferenceInMinutes = $now->diffInMinutes($schoolarshipCreatedAt);

            if ($donateDifferenceInMinutes > 15) {
                $request->session()->forget('donate');
            }

            if ($schoolarshipDifferenceInMinutes > 15) {
                $request->session()->forget('schoolarship');
            }

            return view('user.donasi.donasi-uang', compact('donate', 'schoolarship', 'goods'));
        }

        // Jika hanya sesi donate ada
        if ($donate) {
            $createdAt = $donate->created_at;
            $differenceInMinutes = $now->diffInMinutes($createdAt);

            if ($differenceInMinutes > 15) {
                $request->session()->forget('donate');
                return view('user.donasi.donasi-uang', compact('goods'));
            }

            return view('user.donasi.donasi-uang', compact('donate', 'goods'));
        }

        // Jika hanya sesi schoolarship ada
        if ($schoolarship) {
            $createdAt = $schoolarship->created_at;
            $differenceInMinutes = $now->diffInMinutes($createdAt);

            if ($differenceInMinutes > 15) {
                $request->session()->forget('schoolarship');
                return view('user.donasi.donasi-uang', compact('goods'));
            }

            return view('user.donasi.donasi-uang', compact('schoolarship', 'goods'));
        }

        // Jika tidak ada sesi donate maupun schoolarship
        return view('user.donasi.donasi-uang', compact('goods'));
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
        if($request->type_donation == 'donate_money'){
            $donate = session('donate');
            $donateId = $donate->id;
            $donasi = DonateMoney::findorfail($donateId);
            $donasi->status = 'success';

            $data = [
                'title' => 'Donasi Uang Umum #' . $donasi->id,
                'income_type_id' => 1,
                'total_amount' => $donasi->total_amount,
                'status' => 'Lunas'
            ];

            $donasi->save();
            Income::create($data);

            $request->session()->forget('donate');
        } else if($request->type_donation == 'schoolarship'){
            $donate = session('schoolarship');
            $donateId = $donate->id;
            $donasi = Scholarship::findorfail($donateId);
            $donasi->status = 'success';

            $data = [
                'title' => 'Donasi Beasiswa Umum #' . $donasi->id,
                'income_type_id' => 2,
                'total_amount' => $donasi->total_amount,
                'status' => 'Lunas'
            ];

            $donasi->save();
            Income::create($data);

            $request->session()->forget('schoolarship');
        }
        return redirect()->route('user-donasi.index', ['success' => $success]);
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
            return response()->json(['errors' => $validator->errors()], 422);
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

        return response()->json(['success' => 'Donasi berhasil disimpan!']);
    }

    public function storeSchoolarship(Request $request){
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
            $donate = Scholarship::create($data);

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

            $request->session()->put('schoolarship', $donate, 1);
            return redirect()->back();
        }
    }
}
