<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildAcademicAchievement;
use App\Models\ChildHealth;
use App\Models\ChildEducation;
use App\Models\ChildAchievement;

class DataController extends Controller
{
    public function educationData(){
        $childEducations = ChildEducation::with(['childrens', 'schools'])->get();
        return response()->json($childEducations);
    }

    public function healthData(){
        $childHealths = ChildHealth::with(['childrens', 'diseases'])->get();
        return response()->json($childHealths);
    }

    public function achievementData(){
        $childAchievements = ChildAchievement::with(['childrens'])->get();
        return response()->json($childAchievements);
    }

    public function academicAchievementData(){
        $childAcademicAchievement = ChildAcademicAchievement::with(['childEducations'])->get();
        return response()->json($childAcademicAchievement);
    }
}
