<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ChildAcademicAchievement;
use App\Models\ChildAchievement;
use App\Models\ChildEducation;
use Illuminate\Http\Request;
use App\Models\ChildHealth;
use App\Models\Children;

class DashboardController extends Controller
{
    public function index(){
        $anakAsuhAktif = Children::where('status', 'Aktif')->count();
        $anakAsuhAktifSekolah = ChildEducation::where('status', 'Aktif')->count();
        $anakAsuhSakit = ChildHealth::where('status', 'Sedang Sakit')->count();
        $prestasiAnakAsuh = ChildAchievement::count();
        $prestasiAkademikAnakAsuh = ChildAcademicAchievement::count();
        $prestasiTotal = $prestasiAnakAsuh + $prestasiAkademikAnakAsuh;
        return view('admin.dashboard.dashboard', compact('anakAsuhAktif' ,'anakAsuhSakit', 'anakAsuhAktifSekolah', 'prestasiTotal'));
    }

}
