<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildAcademicAchievement;
use App\Models\ChildHealth;
use App\Models\ChildEducation;
use App\Models\ChildAchievement;
use Illuminate\Pagination\LengthAwarePaginator;

class DataController extends Controller
{
    public function educationData(Request $request){
        $query = ChildEducation::with(['childrens', 'schools'])->where('status', 'aktif');

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $query->whereHas('childrens', function ($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%');
            });
        }

        $childEducations = $query->paginate(10);
        return response()->json($childEducations);
    }

    public function healthData(Request $request){
        $query = ChildHealth::with(['childrens', 'diseases'])->where('status', 'Sedang Sakit');

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $query->whereHas('childrens', function ($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%');
            });
        }

        $childHealths = $query->paginate(10);
        return response()->json($childHealths);
    }

    public function achievementData(Request $request){
        $query = ChildAchievement::with(['childrens']);

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $query->whereHas('childrens', function ($q) use ($searchQuery) {
                $q->where('name', 'like', '%' . $searchQuery . '%');
            });
        }

        $childAchievements = $query->paginate(10);
        return response()->json($childAchievements);
    }

    public function academicAchievementData(Request $request){
        $childAcademicAchievements = ChildAcademicAchievement::with(['childEducations.childrens', 'childEducations.schools'])->get();

        // Memproses data untuk mengambil nilai "name" dari model Children
        $processedData = $childAcademicAchievements->map(function ($achievement) {
            // Mendapatkan nama anak dari relasi childEducations
            $childName = $achievement->childEducations->childrens->name;
            $education_level = $achievement->childEducations->education_level;
            $class = $achievement->childEducations->class;
            $school_name = $achievement->childEducations->schools->name;

            return [
                'id' => $achievement->id,
                'child_name' => $childName,
                'title' => $achievement->title,
                'competition_level' => $achievement->competition_level,
                'ranking' => $achievement->ranking,
                'competition_date' => $achievement->competition_date,
                'education_level' => $education_level,
                'class' => $class,
                'school_name' => $school_name,
            ];
        });

        // Lakukan pencarian berdasarkan processedData jika ada query pencarian
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $filteredData = $processedData->filter(function ($item) use ($searchQuery) {
                // Lakukan pencarian berdasarkan nama anak
                return strpos(strtolower($item['child_name']), strtolower($searchQuery)) !== false;
            });

            // Buat LengthAwarePaginator dari data yang difilter
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 10; // Jumlah item per halaman
            $currentPageSearchResults = $filteredData->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $filteredData = new LengthAwarePaginator($currentPageSearchResults, count($filteredData), $perPage);

            // Mengembalikan response JSON dengan data yang telah diproses
            return response()->json($filteredData);
        }

        // Buat LengthAwarePaginator dari semua data
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Jumlah item per halaman
        $currentPageData = $processedData->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $processedData = new LengthAwarePaginator($currentPageData, count($processedData), $perPage);

        // Mengembalikan response JSON dengan data yang telah diproses jika tidak ada query pencarian
        return response()->json($processedData);
    }
}

