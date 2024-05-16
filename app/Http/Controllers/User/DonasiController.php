<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DonateMoney;

class DonasiController extends Controller
{
    public function index(Request $request){
        $donate = session('donate');
        // dd($donate);
        if ($donate) {
            $createdAt = $donate->created_at;
            $now = now();
            $differenceInMinutes = $now->diffInMinutes($createdAt);

            if ($differenceInMinutes > 15) {
                $request->session()->forget('donate');
                return view('user.donation');
            }

            return view('user.donation', compact('donate'));
        } else {
            return view('user.donation');
        }
    }

    public function store(Request $request){
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
}
