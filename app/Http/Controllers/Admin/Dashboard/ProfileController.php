<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrphanageProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index(){
        $data = OrphanageProfile::first();
        return view('admin.dashboard.profile.index', compact('data'));
    }

    public function update(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'nullable|image|max:2048', // Add validation for the thumbnail if needed
        ], [
            'name.required' => 'Data wajib diisi',
            'description.required' => 'Data description wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()], 422);
        }

        try {
            // Get the first OrphanageProfile entry
            $data = OrphanageProfile::first();

            if (!$data) {
                return response()->json(['errors' => ['message' => 'Data not found']], 404);
            }

            // Update the data fields
            $data->name = $request->name;
            $data->description = $request->description;

            // Handle the thumbnail file upload
            if ($request->hasFile('thumbnail')) {
                // Delete the old thumbnail file if it exists
                if ($data->thumbnail && Storage::exists($data->thumbnail)) {
                    Storage::delete($data->thumbnail);
                }
                // Store the new thumbnail file
                $data->thumbnail = $request->file('thumbnail')->store('uploads/profile');
            }

            // Save the updated data
            $data->save();

            return response()->json(['success' => 'Berhasil memperbarui data']);

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['errors' => ['message' => 'Terjadi kesalahan pada server. Silahkan coba lagi nanti.']], 500);
        }
    }

}
