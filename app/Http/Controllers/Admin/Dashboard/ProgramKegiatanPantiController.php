<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\EventType;
use App\Models\Event;
use App\Models\EventImages;

class ProgramKegiatanPantiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $eventType = EventType::all();
        $datas = Event::with('eventImages')->where('title', 'LIKE', "%{$keyword}%")->orWhere('description', '=',$keyword)->paginate(10)->withQueryString();
        return view('admin.dashboard.program-kegiatan.panti-asuhan.index', compact('datas', 'keyword', 'eventType'));
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
            'location' => 'required',
            'event_type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'date' => 'required|date',
        ], [
            'location.required' => 'Data wajib diisi',
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
                'location' => $request->location,
                'event_type_id' => $request->event_type_id,
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ];

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('uploads/event-thumbnail');
                $data['thumbnail'] = $thumbnailPath;
            }

            $event = Event::create($data);

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
            'location' => 'required',
            'event_type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'date' => 'required|date',
        ], [
            'location.required' => 'Data wajib diisi',
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
            $event = Event::find($id);

            // Check if the event exists
            if (!$event) {
                return response()->json(['errors' => ['message' => 'Data tidak ditemukan.']], 404);
            }

            if ($request->hasFile('thumbnail')) {
                if ($event->thumbnail) {
                    Storage::delete($event->thumbnail);
                }
                $event->thumbnail = $request->file('thumbnail')->store('uploads/event-thumbnail');
            } else{
                $event->thumbnail = $event->thumbnail;
            }

            // Update other fields
            $event->location = $request->location;
            $event->event_type_id = $request->event_type_id;
            $event->date = $request->date;
            $event->title = $request->title;
            $event->description = $request->description;

            // Save the updated donatur event
            $event->save();

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
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found.'], 404);
        }

        $eventImages = $event->eventImages;

        foreach ($eventImages as $image) {
            Storage::delete($image->image);
        }

        EventImages::where('event_id', $event->id)->delete();

        $event->delete();

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

            $Event = Event::find($id);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('uploads/event-images');
                    $imageData = [
                        'event_id' => $Event->id,
                        'image' => $imagePath
                    ];
                    EventImages::create($imageData);
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
            $image = EventImages::find($id);

            if ($request->hasFile('image')) {
                // Simpan file baru
                $imagePath = $request->file('image')->store('uploads/event-images');

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
