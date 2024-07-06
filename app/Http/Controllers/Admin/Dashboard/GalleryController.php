<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = Gallery::with('galleryImages')->where('title', 'LIKE', "%{$keyword}%")->orWhere('description', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.dashboard.gallery.index', compact('datas', 'keyword'));
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
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'date' => 'required',
        ], [
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
            'images.required' => 'Foto gallery wajib diisi',
            'images.*.file' => 'Berkas foto anak asuh harus berupa file',
            'images.*.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'images.*.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
            'date.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ];

            $gallery = Gallery::create($data);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('uploads/gallery');
                    $imageData = [
                        'gallery_id' => $gallery->id,
                        'image' => $imagePath
                    ];
                    GalleryImage::create($imageData);
                }
            }

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
            'date' => 'required',
        ], [
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
            'date.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {

            $gallery = Gallery::find($id);
            $gallery->title = $request->title;
            $gallery->description = $request->description;
            $gallery->date = $request->date;
            $gallery->save();

            return response()->json(['success' => 'Berhasil menambahkan data']);

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
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['error' => 'Gallery not found.'], 404);
        }

        $galleryImages = $gallery->galleryImages;

        foreach ($galleryImages as $image) {
            Storage::delete($image->image);
        }

        GalleryImage::where('gallery_id', $gallery->id)->delete();

        $gallery->delete();

        return response()->json(['success' => 'Data Berhasil Dihapus.']);
    }

    public function storeImage(Request $request, string $id){
        $validasi = Validator::make($request->all(), [
            'images' => 'required',
            'images.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'images.required' => 'Foto gallery wajib diisi',
            'images.*.file' => 'Berkas foto anak asuh harus berupa file',
            'images.*.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'images.*.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {

            $gallery = Gallery::find($id);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('uploads/gallery');
                    $imageData = [
                        'gallery_id' => $gallery->id,
                        'image' => $imagePath
                    ];
                    GalleryImage::create($imageData);
                }
            }

            return response()->json(['success' => 'Berhasil menambahkan data']);

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['errors' => ['message' => 'Terjadi kesalahan pada server. Silahkan coba lagi nanti.']], 500);
        }
    }

    public function updateImage(Request $request, string $id){
        $validasi = Validator::make($request->all(), [
            'image' => 'required',
            'image' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'image.required' => 'Foto gallery wajib diisi',
            'image.file' => 'Berkas foto anak asuh harus berupa file',
            'image.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'image.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {
            $image = GalleryImage::find($id);

            if ($request->hasFile('image')) {
                // Simpan file baru
                $imagePath = $request->file('image')->store('uploads/gallery');

                // Hapus file lama jika ada
                if ($image->image) {
                    Storage::delete($image->image);
                }

                // Perbarui path gambar di database
                $image->image = $imagePath;
                $image->save();
            }

            $image->image = $imagePath;
            $image->save();

            return response()->json(['success' => 'Berhasil memperbarui data']);

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['errors' => ['message' => 'Terjadi kesalahan pada server. Silahkan coba lagi nanti.']], 500);
        }
    }
}
