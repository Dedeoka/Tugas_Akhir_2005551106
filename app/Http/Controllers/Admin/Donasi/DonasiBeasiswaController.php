<?php

namespace App\Http\Controllers\Admin\Donasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Validator;

class DonasiBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q', '');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $query = Scholarship::query();

        // Filter berdasarkan kata kunci
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('status', '=', $keyword);
            });
        }

        // Filter berdasarkan rentang tanggal jika startDate dan endDate tersedia
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Lakukan pagination dan tetapkan untuk menyimpan query string dalam URL
        $datas = $query->paginate(10)->withQueryString();
        return view('admin.donasi.donasi-beasiswa', compact('datas', 'keyword'));
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
                'description' => 'Data Diinput Oleh Admin',
                'status' => 'success',
            ];
            Scholarship::create($data);

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
        $data = Scholarship::find($id);
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
