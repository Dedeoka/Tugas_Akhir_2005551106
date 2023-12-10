<?php

namespace App\Http\Controllers\Admin\Anak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Children;
use App\Models\ChildAchievement;
use App\Models\ChildEducation;
use App\Http\Requests\StoreKategoriRequest;
use App\Models\ChildAcademicAchievement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PrestasiAnakController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q','');
        $datas = ChildAchievement::with(['childrens'])
        ->where(function ($query) use ($keyword) {
            $query->whereHas('childrens', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            });
        })
        ->paginate(10)
        ->withQueryString();
        $childs = Children::all();
        $childEducations = ChildEducation::with(['childrens'])->paginate(10)->withQueryString();
        return view('admin.anak-asuh.prestasi-anak-asuh', compact('datas', 'keyword', 'childs', 'childEducations'));
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
            'competition_level' => 'required',
            'competition_date' => 'required|date',
            'ranking' => 'required',
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'title.required' => 'Judul wajib diisi',
            'competition_level.required' => 'Tingkat perlombaan wajib diisi',
            'competition_date.required' => 'Tanggal perlombaan wajib diisi',
            'competition_date.date' => 'Format tanggal tidak valid',
            'ranking.required' => 'Peringkat wajib diisi',
            'certificate.required' => 'Berkas bukti perlombaan wajib diisi',
            'certificate.file' => 'Berkas bukti perlombaan harus berupa file',
            'certificate.mimes' => 'Format file bukti perlombaan tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'certificate.max' => 'Ukuran file bukti perlombaan tidak boleh lebih dari 2MB',
            'description' => 'Deskripsi wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {

            if($request->achievement_type == 'Panti') {
                $certificate = $request->file('certificate')->store('uploads/sertifikat-perlombaan/mewakili-panti');

                $data = [
                'children_id' => $request->children_id,
                'title' => $request->title,
                'competition_level' => $request->competition_level,
                'competition_date' => $request->competition_date,
                'ranking' => $request->ranking,
                'prize_money' => str_replace(',', '', $request->prize_money)? $request->prize_money : 'tidak ada',
                'prize_item' => $request->prize_item? $request->prize_item : 'tidak ada',
                'description' => $request->description,
                'certificate' => $certificate,
                ];

                ChildAchievement::create($data);
            }
            else if($request->achievement_type == 'Sekolah') {
                $certificate = $request->file('certificate')->store('uploads/sertifikat-perlombaan/mewakili-sekolah');

                $data = [
                'child_education_id' => $request->child_education_id,
                'title' => $request->title,
                'competition_level' => $request->competition_level,
                'competition_date' => $request->competition_date,
                'ranking' => $request->ranking,
                'prize_money' => str_replace(',', '', $request->prize_money)? $request->prize_money : 'tidak ada',
                'prize_item' => $request->prize_item? $request->prize_item : 'tidak ada',
                'description' => $request->description,
                'certificate' => $certificate,
                ];

                ChildAcademicAchievement::create($data);
            }

            return response()->json(['success' => "Berhasil menyimpan data"]);
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
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'children_id' => 'required',
            'title' => 'required',
            'ranking' => 'required',
            'competition_date' => 'required|date',
            'certificate' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'description' => 'required',
        ], [
            'children_id.required' => 'Data wajib diisi',
            'title.required' => 'Judul wajib diisi',
            'ranking.required' => 'Peringkat wajib diisi',
            'competition_date.required' => 'Tanggal perlombaan wajib diisi',
            'competition_date.date' => 'Format tanggal tidak valid',
            'certificate.file' => 'Berkas bukti perlombaan harus berupa file',
            'certificate.mimes' => 'Format file bukti perlombaan tidak valid. Pilih format pdf, jpg, jpeg, atau png',
            'certificate.max' => 'Ukuran file bukti perlombaan tidak boleh lebih dari 2MB',
            'description' => 'Deskripsi wajib diisi',
        ]);

        // Cek jika validasi gagal
        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }

        // Ambil data anak berdasarkan ID
        $data = ChildAchievement::find($id);

        // Cek jika data anak tidak ditemukan
        if (!$data) {
            return response()->json(['errors' => ['Data tidak ditemukan']]);
        }

        // Update data anak
        $data->children_id = $request->children_id;
        $data->title = $request->title;
        $data->competition_date = $request->competition_date;
        $data->ranking = $request->ranking;
        $data->description = $request->description;

        // Periksa dan simpan file-file yang diunggah jika ada
        if ($request->hasFile('certificate')) {
            // Hapus file lama sebelum menyimpan yang baru
            Storage::delete($data->certificate);

            // Simpan file yang baru
            $data->certificate = $request->file('certificate')->store('uploads/bukti-perlombaan');
        }

        // Simpan perubahan
        $data->save();

        return response()->json(['success' => "Berhasil memperbarui data"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ChildAchievement::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
