<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Children;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class DataAnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = Children::where('name', 'LIKE', "%{$keyword}%")->orWhere('place_of_birth', 'LIKE',"%{$keyword}%")->paginate(10)->withQueryString();
        $childs = Children::all();
        return view('admin.anak-asuh.data-anak-asuh', compact('datas', 'keyword'));
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
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'status' => 'required',
            'birth_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // maksimal 2MB
            'family_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Data wajib diisi',
            'place_of_birth.required' => 'Tempat lahir wajib diisi',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi',
            'date_of_birth.date' => 'Format tanggal lahir tidak valid',
            'gender.required' => 'Jenis kelamin wajib diisi',
            'religion.required' => 'Agama wajib diisi',
            'status.required' => 'Status wajib diisi',
            'birth_certificate.required' => 'Nomor Akta Kelahiran wajib diisi',
            'family_card.required' => 'Nomor Kartu Keluarga wajib diisi',
            'ktp.required' => 'Nomor KTP wajib diisi',
            'birth_certificate.file' => 'Berkas Akta Kelahiran harus berupa file',
            'birth_certificate.mimes' => 'Format file Akta Kelahiran tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'birth_certificate.max' => 'Ukuran file Akta Kelahiran tidak boleh lebih dari 2MB',
            'family_card.file' => 'Berkas Kartu Keluarga harus berupa file',
            'family_card.mimes' => 'Format file Kartu Keluarga tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'family_card.max' => 'Ukuran file Kartu Keluarga tidak boleh lebih dari 2MB',
            'ktp.file' => 'Berkas KTP harus berupa file',
            'ktp.mimes' => 'Format file KTP tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $birthCertificatePath = $request->file('birth_certificate')->store('uploads/akta-kelahiran');
            $familyCardPath = $request->file('family_card')->store('uploads/kartu-keluarga');
            $ktpPath = $request->file('ktp')->store('uploads/kartu-pengenal');

            $data = [
                'name' => $request->name,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'status' => $request->status,
                'birth_certificate' => $birthCertificatePath,
                'family_card' => $familyCardPath,
                'ktp' => $ktpPath,
            ];

            Children::create($data);

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
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'religion' => 'required',
            'status' => 'required',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // maksimal 2MB
            'family_card' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Data wajib diisi',
            'place_of_birth.required' => 'Tempat lahir wajib diisi',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi',
            'date_of_birth.date' => 'Format tanggal lahir tidak valid',
            'gender.required' => 'Jenis kelamin wajib diisi',
            'religion.required' => 'Agama wajib diisi',
            'status.required' => 'Status wajib diisi',
            'birth_certificate.file' => 'Berkas Akta Kelahiran harus berupa file',
            'birth_certificate.mimes' => 'Format file Akta Kelahiran tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'birth_certificate.max' => 'Ukuran file Akta Kelahiran tidak boleh lebih dari 2MB',
            'family_card.file' => 'Berkas Kartu Keluarga harus berupa file',
            'family_card.mimes' => 'Format file Kartu Keluarga tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'family_card.max' => 'Ukuran file Kartu Keluarga tidak boleh lebih dari 2MB',
            'ktp.file' => 'Berkas KTP harus berupa file',
            'ktp.mimes' => 'Format file KTP tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 2MB',
        ]);

        // Cek jika validasi gagal
        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }

        // Ambil data anak berdasarkan ID
        $data = Children::find($id);

        // Cek jika data anak tidak ditemukan
        if (!$data) {
            return response()->json(['errors' => ['Anak tidak ditemukan']]);
        }

        // Update data anak
        $data->name = $request->name;
        $data->place_of_birth = $request->place_of_birth;
        $data->date_of_birth = $request->date_of_birth;
        $data->gender = $request->gender;
        $data->religion = $request->religion;
        $data->status = $request->status;

        // Periksa dan simpan file-file yang diunggah jika ada
        if ($request->hasFile('birth_certificate')) {
            // Hapus file lama sebelum menyimpan yang baru
            Storage::delete($data->birth_certificate);

            // Simpan file yang baru
            $data->birth_certificate = $request->file('birth_certificate')->store('uploads/akta-kelahiran');
        }

        if ($request->hasFile('family_card')) {
            Storage::delete($data->family_card);
            $data->family_card = $request->file('family_card')->store('uploads/kartu-keluarga');
        }

        if ($request->hasFile('ktp')) {
            Storage::delete($data->ktp);
            $data->ktp = $request->file('ktp')->store('uploads/kartu-pengenal');
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
        Children::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
