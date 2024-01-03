<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Children;
use App\Models\ChildEducation;
use App\Http\Requests\StoreKategoriRequest;
use App\Models\ChildEducationDetail;
use App\Models\School;
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
        $schools = School::all();
        return view('admin.anak-asuh.pendidikan-anak-asuh', compact('datas', 'keyword', 'childs', 'schools'));
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
            'school_id' => 'required',
            'education_level' => 'required',
            'class' => 'required',
            'class_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => [
                'required',
                Rule::unique('child_education')->where(function ($query) use ($request) {
                        return $query->where('children_id', $request->children_id)
                        ->where('status', 'aktif');
                }),
            ],

            'guardian_name' => 'required',
            'guardian_address' => 'required',
            'guardian_phone' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'school_id.required' => 'Nama sekolah wajib diisi',
            'education_level.required' => 'Nama jenjang wajib diisi',
            'class.required' => 'Kelas wajib diisi',
            'class_name.required' => 'Nama kelas wajib diisi',
            'start_date.required' => 'Tanggal masuk wajib diisi',
            'start_date.date' => 'Format tanggal tidak valid',
            'status.required' => 'Status wajib diisi',
            'status.unique' => 'Anak ini sudah memiliki data pendidikan dengan status aktif',

            'guardian_name.required' => 'Nama wali kelas wajib diisi',
            'guardian_address.required' => 'Alamat wali kelas wajib diisi',
            'guardian_phone.required' => 'Nomor telepon wali kelas wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 400);
        } else {
            $data = [
                'children_id' => $request->children_id,
                'school_id' => $request->school_id,
                'education_level' => $request->education_level,
                'class' => $request->class,
                'class_name' => $request->class_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ];

            $childEducation = ChildEducation::create($data);

            $detailData = [
                'child_education_id' => $childEducation->id,
                'guardian_name' => $request->guardian_name,
                'guardian_address' => $request->guardian_address,
                'guardian_phone' => $request->guardian_phone,
            ];

            ChildEducationDetail::create($detailData);
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
