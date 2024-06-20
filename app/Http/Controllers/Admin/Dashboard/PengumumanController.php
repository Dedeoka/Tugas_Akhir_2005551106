<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = Announcement::where('title', 'LIKE', "%{$keyword}%")->orWhere('description', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.dashboard.pengumuman.index', compact('datas', 'keyword'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Add validation for the thumbnail if needed
        ], [
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
            'image.file' => 'Berkas foto anak asuh harus berupa file',
            'image.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'image.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('uploads/profile');
            }

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
            ];

            Announcement::create($data);

            return response()->json(['success' => 'Berhasil menambahkan data']);

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['errors' => ['message' => 'Terjadi kesalahan pada server. Silahkan coba lagi nanti.']], 500);
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Add validation for the thumbnail if needed
        ], [
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
            'image.file' => 'Berkas foto anak asuh harus berupa file',
            'image.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'image.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {

            $announcement = Announcement::find($id);

            $announcement->title = $request->title;
            $announcement->description = $request->description;
            if ($request->hasFile('image')) {
                Storage::delete($announcement->image);
                $announcement->image = $request->file('image')->store('uploads/pengumuman');
            }else{
                $announcement->image = $announcement->image;
            }
            $announcement->save();

            return response()->json(['success' => 'Berhasil memperbarui data']);

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['errors' => ['message' => 'Terjadi kesalahan pada server. Silahkan coba lagi nanti.']], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Announcement::find($id)->delete();
        return response()->json(['success'=>'Data Berhasil Dihapus.']);
    }
}
