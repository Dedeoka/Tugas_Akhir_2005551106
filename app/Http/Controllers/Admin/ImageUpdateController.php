<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Children;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ImageUpdateController extends Controller
{
    public function updateBirthCertificate(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required|unique:childrens,name,' . $id,
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
            'name.unique' => 'Nama anak asuh sudah digunakan, harap pilih nama yang lain.',
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
    }

    public function updateFamilyCard(Request $request, $id)
    {

    }

    public function updateKtp(Request $request, $id)
    {

    }

    public function test(Request $request, $id)
    {

    }
}
