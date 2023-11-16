<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Children;
use App\Models\ChildEducation;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PendidikanAnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = ChildEducation::with(['childrens'])
        ->where(function ($query) use ($keyword) {
            $query->whereHas('childrens', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            });
        })
        ->paginate(10)
        ->withQueryString();
        $childs = Children::all();
        return view('admin.anak-asuh.pendidikan-anak-asuh', compact('datas', 'keyword', 'childs'));
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
            'name' => 'required',
            'school_name' => 'required',
            'graduation_date' => 'required|date',
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'name.required' => 'Nama jenjang wajib diisi',
            'school_name.required' => 'Nama sekolah wajib diisi',
            'graduation_date.required' => 'Tanggal kelulusan wajib diisi',
            'graduation_date.date' => 'Format tanggal tidak valid',
            'certificate.required' => 'Berkas bukti kelulusan wajib diisi',
            'certificate.file' => 'Berkas bukti kelulusan harus berupa file',
            'certificate.mimes' => 'Format file bukti kelulusan tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'certificate.max' => 'Ukuran file bukti kelulusan tidak boleh lebih dari 2MB',
            'description' => 'Deskripsi wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $certificatePath = $request->file('certificate')->store('uploads/bukti-kelulusan');

            $data = [
                'children_id' => $request->children_id,
                'name' => $request->name,
                'school_name' => $request->school_name,
                'graduation_date' => $request->graduation_date,
                'certificate' => $certificatePath,
                'description' => $request->description,
            ];

            ChildEducation::create($data);

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
            'name' => 'required',
            'school_name' => 'required',
            'graduation_date' => 'required|date',
            'certificate' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'name.required' => 'Nama jenjang wajib diisi',
            'school_name.required' => 'Nama sekolah wajib diisi',
            'graduation_date.required' => 'Tanggal kelulusan wajib diisi',
            'graduation_date.date' => 'Format tanggal tidak valid',
            'certificate.file' => 'Berkas bukti kelulusan harus berupa file',
            'certificate.mimes' => 'Format file bukti kelulusan tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'certificate.max' => 'Ukuran file bukti kelulusan tidak boleh lebih dari 2MB',
            'description' => 'Deskripsi wajib diisi',
        ]);

        // Cek jika validasi gagal
        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }

        // Ambil data anak berdasarkan ID
        $data = ChildEducation::find($id);

        // Cek jika data anak tidak ditemukan
        if (!$data) {
            return response()->json(['errors' => ['Data tidak ditemukan']]);
        }

        // Update data anak
        $data->children_id = $request->children_id;
        $data->name = $request->name;
        $data->school_name = $request->school_name;
        $data->graduation_date = $request->graduation_date;
        $data->description = $request->description;

        // Periksa dan simpan file-file yang diunggah jika ada
        if ($request->hasFile('certificate')) {
            // Hapus file lama sebelum menyimpan yang baru
            Storage::delete($data->certificate);

            // Simpan file yang baru
            $data->certificate = $request->file('certificate')->store('uploads/bukti-kelulusan');
        }

        // Simpan perubahan
        $data->save();

        return response()->json(['success' => "Berhasil memperbarui data"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChildEducation::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
