<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = School::where('name', 'LIKE', "%{$keyword}%")->orWhere('id', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.master-data.daftar-sekolah', compact('datas', 'keyword'));
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
            'name' => 'required|unique:schools,name',
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Data wajib diisi',
            'name.unique' => 'Nama sekolah sudah digunakan, harap pilih nama yang lain.',
            'address.required' => 'Data wajib diisi',
            'phone.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ];
            School::create($data);

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
            'name' => 'required|unique:schools,name,' . $id,
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Data wajib diisi',
            'name.unique' => 'Nama sekolah sudah digunakan, harap pilih nama yang lain.',
            'address.required' => 'Data wajib diisi',
            'phone.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ];
            School::find($id)->update($data);
            return response()->json(['success' => "Berhasil melakukan update data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        School::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
