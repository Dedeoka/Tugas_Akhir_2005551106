<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;

class ViewController extends Controller
{
    public function contact(){
        return view('user.contact.index');
    }

    public function gallery(){
        $datas = Gallery::with('galleryImages')->get();
        return view('user.gallery.index', compact('datas'));
    }
}
