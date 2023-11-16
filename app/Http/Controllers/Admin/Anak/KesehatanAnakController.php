<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildHealth;
use App\Models\Children;
use App\Models\Disease;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class KesehatanAnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = ChildHealth::with(['childrens', 'diseases'])
        ->where(function ($query) use ($keyword) {
            $query->whereHas('childrens', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            })
            ->orWhereHas('diseases', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            });
        })
        ->paginate(10)
        ->withQueryString();
        $childs = Children::all();
        $diseases = Disease::all();
        // dd($datas);
        return view('admin.anak-asuh.kesehatan-anak-asuh', compact('datas', 'keyword', 'childs', 'diseases'));
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
            'children_id' => 'required',
            'disease_id' => 'required',
            'medicine' => 'required',
            'date_of_illness' => 'required|date',
            'description' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'disease_id.required' => 'Penyakit wajib diisi',
            'medicine.required' => 'Obat wajib diisi',
            'date_of_illness.required' => 'Tanggal sakit wajib diisi',
            'date_of_illness.date' => 'Format tanggal tidak valid',
            'description' => 'Deskripsi wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'children_id' => $request->children_id,
                'disease_id' => $request->disease_id,
                'medicine' => $request->medicine,
                'date_of_illness' => $request->date_of_illness,
                'description' => $request->description,
            ];

            ChildHealth::create($data);

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
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'children_id' => 'required',
            'disease_id' => 'required',
            'medicine' => 'required',
            'date_of_illness' => 'required|date',
            'description' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'disease_id.required' => 'Penyakit wajib diisi',
            'medicine.required' => 'Obat wajib diisi',
            'date_of_illness.required' => 'Tanggal sakit wajib diisi',
            'date_of_illness.date' => 'Format tanggal tidak valid',
            'description' => 'Deskripsi wajib diisi',
        ]);

        // Cek jika validasi gagal
        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }

        // Ambil data anak berdasarkan ID
        $data = ChildHealth::find($id);

        // Cek jika data anak tidak ditemukan
        if (!$data) {
            return response()->json(['errors' => ['Anak tidak ditemukan']]);
        }

        // Update data anak
        $data->children_id = $request->children_id;
        $data->disease_id = $request->disease_id;
        $data->medicine = $request->medicine;
        $data->date_of_illness = $request->date_of_illness;
        $data->description = $request->description;

        // Simpan perubahan
        $data->save();

        return response()->json(['success' => "Berhasil memperbarui data"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChildHealth::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
