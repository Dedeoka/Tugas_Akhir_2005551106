<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\DonaturEvent;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\EventType;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\OrphanageProfile;
use App\Models\Event;

class ViewController extends Controller
{
    public function contact(){
        return view('user.contact.index');
    }

    public function gallery(){
        $datas = Gallery::with('galleryImages')->get();
        return view('user.gallery.index', compact('datas'));
    }

    public function pengumuman(){
        $datas = Announcement::paginate(6);
        return view('user.pengumuman.index', compact('datas'));
    }

    public function program(){
        $datas = DonaturEvent::with('donaturEventImages')->paginate(6);
        $types = EventType::all();
        return view('user.program.index', compact('datas', 'types'));
    }

    public function storeProgram(Request $request){
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'event_type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ], [
            'name.required' => 'Data wajib diisi',
            'address.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'phone_number.required' => 'Data wajib diisi',
            'event_type_id.required' => 'Data wajib diisi',
            'title.required' => 'Data wajib diisi',
            'description.required' => 'Data wajib diisi',
            'date.required' => 'Data wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail')->store('uploads/event-thumbnail');
            } else{
                $thumbnail = '-';
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
                'thumbnail' => $thumbnail,
            ];
            DonaturEvent::create($data);

            return response()->json(['success' => "Berhasil menyimpan data"]);
        }
    }

    public function profil(){
        $data = OrphanageProfile::first();
        $events = Event::with('eventImages')->paginate(6);
        return view('user.profil.index', compact('data', 'events'));
    }
}
