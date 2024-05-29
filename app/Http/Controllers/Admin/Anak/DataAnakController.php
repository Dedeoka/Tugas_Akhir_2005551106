<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Children;
use App\Http\Requests\StoreKategoriRequest;
use App\Models\ChildDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class DataAnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = Children::with('childDetails', 'childHealths', 'childEducations', 'childAchievements')  // Sertakan data relasi
            ->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('place_of_birth', 'LIKE', "%{$keyword}%")
            ->paginate(10)
            ->withQueryString();
        $details = Children::with('childDetails', 'childHealths', 'childEducations.schools', 'childEducations.childAcademicAchievements', 'childAchievements')->get();
        return view('admin.anak-asuh.data-anak-asuh', compact('datas', 'keyword', 'details'));
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
            'identity_card' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',


            'father_name' => '',
            'mother_name' => '',
            'reason_for_leaving' => 'required',
            'guardian_name' => 'required',
            'guardian_relationship' => 'required',
            'guardian_address' => 'required',
            'guardian_phone_number' => 'required|regex:/^[0-9]+$/|min:10|max:15',
            'guardian_email' => 'required|email',
            'guardian_identity_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'birth_certificate' => 'file|mimes:pdf,jpg,jpeg,png|max:2048', // maksimal 2MB
            'family_card' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Nama anak asuh wajib diisi',
            'place_of_birth.required' => 'Tempat lahir anak asuh wajib diisi',
            'date_of_birth.required' => 'Tanggal lahir anak asuh wajib diisi',
            'date_of_birth.date' => 'Format tanggal lahir tidak valid',
            'gender.required' => 'Jenis kelamin anak asuh wajib diisi',
            'religion.required' => 'Agama anak asuh wajib diisi',
            'status.required' => 'Status anak asuh wajib diisi',
            'identity_card.required' => 'Berkas kartu identitas anak asuh wajib diisi',
            'identity_card.file' => 'Berkas kartu identitas anak asuh harus berupa file',
            'identity_card.mimes' => 'Format file kartu identitas tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'identity_card.max' => 'Ukuran file kartu identitas tidak boleh lebih dari 2MB',
            'image.required' => 'Foto anak asuh wajib diisi',
            'image.file' => 'Berkas foto anak asuh harus berupa file',
            'image.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'image.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',


            'father_name.required' => 'Nama ayah anak asuh wajib diisi',
            'mother_name.required' => 'Nama ibu anak asuh wajib diisi',
            'reason_for_leaving.required' => 'Alasan menitipkan anak wajib diisi',
            'guardian_name.required' => 'Nama wali anak asuh wajib diisi',
            'guardian_relationship.required' => 'Hubungan wali dengan anak asuh wajib diisi',
            'guardian_address.required' => 'Alamat wali anak asuh wajib diisi',
            'guardian_phone_number.required' => 'Nomor telepon wali anak asuh harus diisi.',
            'guardian_phone_number.regex' => 'Nomor telepon wali hanya boleh berisi angka.',
            'guardian_phone_number.min' => 'Nomor telepon wali minimal harus 10 karakter.',
            'guardian_phone_number.max' => 'Nomor telepon wali maksimal harus 15 karakter.',
            'guardian_email.required' => 'Alamat email wali anak asuh harus diisi.',
            'guardian_email.email' => 'Alamat email wali harus berupa alamat email yang valid.',
            'guardian_identity_card.required' => 'Berkas kartu identitas wali anak asuh wajib diisi',
            'guardian_identity_card.file' => 'Berkas kartu identitas wali anak asuh harus berupa file',
            'guardian_identity_card.mimes' => 'Format file kartu identitas wali tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'guardian_identity_card.max' => 'Ukuran file kartu identitas wali tidak boleh lebih dari 2MB',
            'birth_certificate.required' => 'Berkas akta kelahiran wajib diisi',
            'birth_certificate.file' => 'Berkas akta kelahiran anak asuh harus berupa file',
            'birth_certificate.mimes' => 'Format file akta kelahiran tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'birth_certificate.max' => 'Ukuran file akta kelahiran tidak boleh lebih dari 2MB',
            'family_card.required' => 'Berkas kartu keluarga anak asuh wajib diisi',
            'family_card.file' => 'Berkas kartu keluarga harus berupa file',
            'family_card.mimes' => 'Format berkas kartu keluarga tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'family_card.max' => 'Ukuran berkas kartu keluarga tidak boleh lebih dari 2MB',
        ]);

        $validasi->sometimes(['identity_card', 'birth_certificate', 'family_card', 'father_name', 'mother_name'], 'required', function ($input) use ($request) {
            return !$request->has('kelengkapan_data');
        });

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {

            if ($request->has('kelengkapan_data')) {
                $identityCardPath = '-';
                $familyCardPath = '-';
                $birthCertificatePath = '-';
                $imagePath = $request->file('image')->store('uploads/foto-anak');
                $guardianIdentityPath = $request->file('guardian_identity_card')->store('uploads/kartu-pengenal-wali');
            } else {
                $birthCertificatePath = $request->file('birth_certificate')->store('uploads/akta-kelahiran');
                $familyCardPath = $request->file('family_card')->store('uploads/kartu-keluarga');
                $identityCardPath = $request->file('identity_card')->store('uploads/kartu-pengenal');
                $imagePath = $request->file('image')->store('uploads/foto-anak');
                $guardianIdentityPath = $request->file('guardian_identity_card')->store('uploads/kartu-pengenal-wali');
            }

            $data = [
                'name' => ucwords($request->name),
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'status' => $request->status,
                'congenital_disease' => $request->congenital_disease ? $request->congenital_disease : 'Tidak Ada',
                'identity_card' => $identityCardPath,
                'image' => $imagePath,
            ];

            $newChildren = Children::create($data);

            if ($request->has('kelengkapan_data')) {

                $dataDetail = [
                    'children_id' => $newChildren->id,
                    'father_name' => $request->father_name ? $request->father_name : '-',
                    'mother_name' => $request->mother_name ? $request->mother_name : '-',
                    'reason_for_leaving' => $request->reason_for_leaving,
                    'guardian_name' => $request->guardian_name,
                    'guardian_relationship' => $request->guardian_relationship,
                    'guardian_address' => $request->guardian_address,
                    'guardian_phone_number' => $request->guardian_phone_number,
                    'guardian_email' => $request->guardian_email,
                    'birth_certificate' => $birthCertificatePath,
                    'family_card' => $familyCardPath,
                    'guardian_identity_card' => $guardianIdentityPath,
                ];

            } else {

                $dataDetail = [
                    'children_id' => $newChildren->id,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'reason_for_leaving' => $request->reason_for_leaving,
                    'guardian_name' => $request->guardian_name,
                    'guardian_relationship' => $request->guardian_relationship,
                    'guardian_address' => $request->guardian_address,
                    'guardian_phone_number' => $request->guardian_phone_number,
                    'guardian_email' => $request->guardian_email,
                    'birth_certificate' => $birthCertificatePath,
                    'family_card' => $familyCardPath,
                    'guardian_identity_card' => $guardianIdentityPath,
                ];

            }

            ChildDetail::create($dataDetail);

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
            'identity_card' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'image' => 'file|mimes:jpg,jpeg,png|max:2048',


            'father_name' => 'required',
            'mother_name' => 'required',
            'reason_for_leaving' => 'required',
            'guardian_name' => 'required',
            'guardian_relationship' => 'required',
            'guardian_address' => 'required',
            'guardian_phone_number' => 'required|regex:/^[0-9]+$/|min:10|max:15',
            'guardian_email' => 'required|email',
            'guardian_identity_card' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'birth_certificate' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'family_card' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Nama anak asuh wajib diisi',
            'place_of_birth.required' => 'Tempat lahir anak asuh wajib diisi',
            'date_of_birth.required' => 'Tanggal lahir anak asuh wajib diisi',
            'date_of_birth.date' => 'Format tanggal lahir tidak valid',
            'gender.required' => 'Jenis kelamin anak asuh wajib diisi',
            'religion.required' => 'Agama anak asuh wajib diisi',
            'status.required' => 'Status anak asuh wajib diisi',
            'identity_card.file' => 'Berkas kartu identitas anak asuh harus berupa file',
            'identity_card.mimes' => 'Format file kartu identitas tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'identity_card.max' => 'Ukuran file kartu identitas tidak boleh lebih dari 2MB',
            'image.file' => 'Berkas foto anak asuh harus berupa file',
            'image.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'image.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',


            'father_name.required' => 'Nama ayah anak asuh wajib diisi',
            'mother_name.required' => 'Nama ibu anak asuh wajib diisi',
            'reason_for_leaving.required' => 'Alasan menitipkan anak wajib diisi',
            'guardian_name.required' => 'Nama wali anak asuh wajib diisi',
            'guardian_relationship.required' => 'Hubungan wali dengan anak asuh wajib diisi',
            'guardian_address.required' => 'Alamat wali anak asuh wajib diisi',
            'guardian_phone_number.required' => 'Nomor telepon wali anak asuh harus diisi.',
            'guardian_phone_number.regex' => 'Nomor telepon wali hanya boleh berisi angka.',
            'guardian_phone_number.min' => 'Nomor telepon wali minimal harus 10 karakter.',
            'guardian_phone_number.max' => 'Nomor telepon wali maksimal harus 15 karakter.',
            'guardian_email.required' => 'Alamat email wali anak asuh harus diisi.',
            'guardian_email.email' => 'Alamat email wali harus berupa alamat email yang valid.',
            'guardian_identity_card.file' => 'Berkas kartu identitas wali anak asuh harus berupa file',
            'guardian_identity_card.mimes' => 'Format file kartu identitas wali tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'guardian_identity_card.max' => 'Ukuran file kartu identitas wali tidak boleh lebih dari 2MB',
            'birth_certificate.file' => 'Berkas akta kelahiran anak asuh harus berupa file',
            'birth_certificate.mimes' => 'Format file akta kelahiran tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'birth_certificate.max' => 'Ukuran file akta kelahiran tidak boleh lebih dari 2MB',
            'family_card.file' => 'Berkas kartu keluarga harus berupa file',
            'family_card.mimes' => 'Format berkas kartu keluarga tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'family_card.max' => 'Ukuran berkas kartu keluarga tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }

        $data = Children::find($id);

        if (!$data) {
            return response()->json(['errors' => ['Anak tidak ditemukan']]);
        }

        $data->name = $request->name;
        $data->place_of_birth = $request->place_of_birth;
        $data->date_of_birth = $request->date_of_birth;
        $data->gender = $request->gender;
        $data->religion = $request->religion;
        $data->status = $request->status;

        if ($request->hasFile('identity_card')) {
            Storage::delete($data->identity_card);
            $data->identity_card = $request->file('identity_card')->store('uploads/kartu-pengenal');
        }

        if ($request->hasFile('image')) {
            Storage::delete($data->image);
            $data->image = $request->file('image')->store('uploads/foto-anak');
        }

        $data->save();


        $childDetail = ChildDetail::where('children_id', $data->id)->first();

        $childDetail->father_name = $request->father_name;
        $childDetail->mother_name = $request->mother_name;
        $childDetail->reason_for_leaving = $request->reason_for_leaving;
        $childDetail->guardian_name = $request->guardian_name;
        $childDetail->guardian_relationship = $request->guardian_relationship;
        $childDetail->guardian_address = $request->guardian_address;
        $childDetail->guardian_phone_number = $request->guardian_phone_number;
        $childDetail->guardian_email = $request->guardian_email;

        if ($request->hasFile('birth_certificate')) {
            Storage::delete($data->birth_certificate);
            $data->birth_certificate = $request->file('birth_certificate')->store('uploads/akta-kelahiran');
        }

        if ($request->hasFile('family_card')) {
            Storage::delete($data->family_card);
            $data->family_card = $request->file('family_card')->store('uploads/kartu-keluarga');
        }

        if ($request->hasFile('guardian_identity_card')) {
            Storage::delete($data->guardian_identity_card);
            $data->guardian_identity_card = $request->file('guardian_identity_card')->store('uploads/kartu-pengenal-wali');
        }

        $childDetail->save();

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
