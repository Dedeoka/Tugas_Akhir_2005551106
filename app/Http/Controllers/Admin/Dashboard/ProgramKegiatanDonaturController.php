<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonaturEvent;
use App\Models\DonaturEventImages;
use App\Models\EventType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProgramKegiatanDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $eventType = EventType::all();
        $datas = DonaturEvent::with('donaturEventImages')->where('title', 'LIKE', "%{$keyword}%")->orWhere('description', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.dashboard.program-kegiatan.donatur.index', compact('datas', 'keyword', 'eventType'));
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
            'email' => 'required|email',
            'phone_number' => 'required',
            'event_type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'date' => 'required|date',
        ], [
            'name.required' => 'Data wajib diisi',
            'address.required' => 'Data wajib diisi',
            'phone_number.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'email.email' => 'Format email tidak valid',
            'event_type_id.required' => 'Data wajib diisi',
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
            'thumbnail.required' => 'Foto gallery wajib diisi',
            'thumbnail.file' => 'Berkas foto anak asuh harus berupa file',
            'thumbnail.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'thumbnail.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
            'date.required' => 'Data wajib diisi',
            'date.date' => 'Format tanggal tidak valid',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'event_type_id' => $request->event_type_id,
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ];

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('uploads/donatur-event-thumbnail');
                $data['thumbnail'] = $thumbnailPath;
            }

            $donaturEvent = DonaturEvent::create($data);

            return response()->json(['success' => 'Berhasil menambahkan data']);
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'event_type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'date' => 'required|date',
        ], [
            'name.required' => 'Data wajib diisi',
            'address.required' => 'Data wajib diisi',
            'phone_number.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'email.email' => 'Format email tidak valid',
            'event_type_id.required' => 'Data wajib diisi',
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
            'thumbnail.file' => 'Berkas foto anak asuh harus berupa file',
            'thumbnail.mimes' => 'Format file foto tidak valid. Pilih format jpg, jpeg, atau png',
            'thumbnail.max' => 'Ukuran file foto tidak boleh lebih dari 2MB',
            'date.required' => 'Data wajib diisi',
            'date.date' => 'Format tanggal tidak valid',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {
            // Find the existing donatur event by ID
            $donaturEvent = DonaturEvent::find($id);

            // Check if the event exists
            if (!$donaturEvent) {
                return response()->json(['errors' => ['message' => 'Data tidak ditemukan.']], 404);
            }

            if ($request->hasFile('thumbnail')) {
                if ($donaturEvent->thumbnail) {
                    Storage::delete($donaturEvent->thumbnail);
                }
                $donaturEvent->thumbnail = $request->file('thumbnail')->store('uploads/donatur-event-thumbnail');
            } else{
                $donaturEvent->thumbnail = $donaturEvent->thumbnail;
            }

            // Update other fields
            $donaturEvent->name = $request->name;
            $donaturEvent->address = $request->address;
            $donaturEvent->email = $request->email;
            $donaturEvent->phone_number = $request->phone_number;
            $donaturEvent->event_type_id = $request->event_type_id;
            $donaturEvent->date = $request->date;
            $donaturEvent->title = $request->title;
            $donaturEvent->description = $request->description;

            // Save the updated donatur event
            $donaturEvent->save();

            return response()->json(['success' => 'Berhasil memperbarui data']);

        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Error updating donatur event: ' . $e->getMessage());

            return response()->json(['errors' => ['message' => 'Terjadi kesalahan pada server. Silahkan coba lagi nanti.']], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donaturEvent = DonaturEvent::find($id);

        if (!$donaturEvent) {
            return response()->json(['error' => 'Gallery not found.'], 404);
        }

        $donaturEventImages = $donaturEvent->donaturEventImages;

        foreach ($donaturEventImages as $image) {
            Storage::delete($image->image);
        }

        DonaturEventImages::where('donatur_event_id', $donaturEvent->id)->delete();

        $donaturEvent->delete();

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

            $donaturEvent = DonaturEvent::find($id);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('uploads/donatur-event-images');
                    $imageData = [
                        'donatur_event_id' => $donaturEvent->id,
                        'image' => $imagePath
                    ];
                    DonaturEventImages::create($imageData);
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
            $image = DonaturEventImages::find($id);

            if ($request->hasFile('image')) {
                // Simpan file baru
                $imagePath = $request->file('image')->store('uploads/donatur-event-images');

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
