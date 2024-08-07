<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChildDetail;
use App\Models\ChildHealth;
use App\Models\ChildCost;
use App\Models\ChildCostDetail;
use App\Models\ChildEducation;
use App\Models\ChildEducationDetail;
use App\Models\Children;
use App\Models\User;
use App\Models\ChildAchievement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();

        $incomeTypes = [
            ['name' => 'Donasi Uang Umum'],
            ['name' => 'Donasi Beasiswa Umum'],
            ['name' => 'Bantuan Luar Negeri'],
            ['name' => 'Bantuan Pemerintah'],
            ['name' => 'Hasil Usaha Produktif'],
            ['name' => 'Bunga Bank'],
        ];
        \App\Models\IncomeType::insert($incomeTypes);

        $eventType = [
            ['name' => 'Perayaan Ulang Tahun'],
            ['name' => 'Tirta Yatra'],
            ['name' => 'Pengabdian Sosial'],
            ['name' => 'Syukuran'],
        ];
        \App\Models\EventType::insert($eventType);

        $profile = [
            ['name' => '-', 'description' => '-', 'thumbnail' => '-'],
        ];
        \App\Models\OrphanageProfile::insert($profile);

        $costType = [
            ['name' => 'Biaya Kebutuhan Pangan'],
            ['name' => 'Biaya Kebutuhan Sandang'],
            ['name' => 'Biaya Kebutuhan Papan'],
            ['name' => 'Biaya Usaha Panti'],
            ['name' => 'Biaya Kegiatan Hari Raya'],
            ['name' => 'Biaya Kegiatan Panti'],
        ];
        \App\Models\CostType::insert($costType);

        $disease = [
            ['name' => 'Batuk'],
            ['name' => 'Pilek'],
            ['name' => 'Pusing'],
            ['name' => 'Diare'],
            ['name' => 'Infeksi Saluran Pernapasan Akut (ISPA)'],
            ['name' => 'Influenza (Flu)'],
            ['name' => 'Tuberkulosis'],
            ['name' => 'Cacar Air'],
            ['name' => 'Campak'],
            ['name' => 'Tifus'],
            ['name' => 'Sakit Gigi'],
            ['name' => 'Demam Berdarah Dengue (DBD)'],
        ];
        \App\Models\Disease::insert($disease);

        $school = [
            ['name' => 'SMA Negeri 1 Denpasar', 'address' => 'Jl. Kamboja No.4, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar', 'phone' => '(0361) 222044'],
            ['name' => 'SMA Negeri 2 Denpasar', 'address' => 'Jl. Jendral Sudirman No.3a, Dauh Puri Klod, Kec. Denpasar Barat, Kota Denpasar', 'phone' => '(0361) 222829'],
            ['name' => 'SMA Negeri 3 Denpasar', 'address' => 'Jl. Nusa Indah No.20 X, Sumerta Kaja, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 234293'],
            ['name' => 'SMA Negeri 4 Denpasar', 'address' => 'Jl. Gunung Rinjani No.1, Tegal Harum, Kec. Denpasar Bar., Kota Denpasar', 'phone' => '(0361) 485363'],
            ['name' => 'SMA Negeri 5 Denpasar', 'address' => 'Jl. Sanitasi No.2, Sidakarya, Denpasar Selatan, Kota Denpasar', 'phone' => '(0361) 720642'],
            ['name' => 'SMK Negeri 1 Denpasar', 'address' => 'Jl. Cokroaminoto No.84, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar', 'phone' => '(0361) 422401'],
            ['name' => 'SMK Negeri 2 Denpasar', 'address' => 'Jl. Pendidikan No.28, Sidakarya, Denpasar Selatan, Kota Denpasar', 'phone' => '(0361) 720834'],
            ['name' => 'SMK Negeri 3 Denpasar', 'address' => 'Jl. Tirtanadi No.19, Sanur Kauh, Denpasar Selatan, Kota Denpasar', 'phone' => '(0361) 288347'],
            ['name' => 'SMK Negeri 4 Denpasar', 'address' => 'Jl. Drupadi No.5, Sumerta Kelod, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 226127'],
            ['name' => 'SMK Negeri 5 Denpasar', 'address' => 'Jl. Ratna No.17, Sumerta Kauh, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 222608'],
            ['name' => 'SMP Negeri 1 Denpasar', 'address' => 'Jl. Surapati No.2, Dangin Puri, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 224508'],
            ['name' => 'SMP Negeri 2 Denpasar', 'address' => 'Jl. Gn. Agung No.112, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar', 'phone' => '(0361) 424208'],
            ['name' => 'SMP Negeri 3 Denpasar', 'address' => 'Jl. Jepun No.5, Dangin Puri Kangin, Kec. Denpasar Utara, Kota Denpasar', 'phone' => '(0361) 224546'],
            ['name' => 'SMP Negeri 4 Denpasar', 'address' => 'Jl. Gn. Agung, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar', 'phone' => '(0361) 422486'],
            ['name' => 'SMP Negeri 5 Denpasar', 'address' => 'Gg. Angsoka, Ubung, Kec. Denpasar Utara, Kota Denpasar', 'phone' => '(0361) 413414'],
            ['name' => 'SD Negeri 1 Penatih', 'address' => 'Jl. Trenggana No.8, Penatih, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 224508'],
            ['name' => 'SD Negeri 2 Penatih', 'address' => 'Jl. Nagasari, Penatih Dangin Puri, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 9250788'],
            ['name' => 'SD Negeri 3 Penatih', 'address' => 'Jl. Trenggana No.167, Penatih, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 467895'],
            ['name' => 'SD Negeri 4 Penatih', 'address' => 'Jl. Siulan No.112, Penatih Dangin Puri, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 7897006'],
            ['name' => 'SD Negeri 5 Penatih', 'address' => 'Jl. Sangalangit No.3, Penatih, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '(0361) 461092'],
            ['name' => 'TK Astiti Dharma', 'address' => 'Jl. Trenggana No.44, Penatih, Kec. Denpasar Timur, Kota Denpasar', 'phone' => ' 081337196826'],
            ['name' => 'TK Hindu Widya Kerthi', 'address' => 'Jl. Sangalangit No.Dalam, Penatih, Kec. Denpasar Timur, Kota Denpasar ', 'phone' => ' 081238394974'],
            ['name' => 'TK Kumara Windu Kencana II', 'address' => 'Jl. Trenggana No.152, Penatih, Kec. Denpasar Timur, Kota Denpasar', 'phone' => '081338425314'],
            ['name' => 'TK Kumara Sari VI', 'address' => 'Gg. Sekar Gn., Penatih Dangin Puri, Kec. Denpasar Tim., Kota Denpasar', 'phone' => '(0361) 461092'],
        ];
        \App\Models\School::insert($school);

        Children::factory(30)->create()->each(function ($child) {
            ChildDetail::factory(1)->create(["children_id" => $child->id]);
            ChildAchievement::factory(1)->create(["children_id" => $child->id]);
            ChildHealth::factory(1)->create(["children_id" => $child->id])->each(function ($childHealth) {
                ChildCost::factory(1)->create([
                    "reference_table_id" => $childHealth->id,
                    "total_cost" => $childHealth->drug_cost + $childHealth->medical_check_cost,
                    "title" => 'Pengeluaran Sakit ' . $childHealth->diseases->name . ' ' . $childHealth->childrens->name,
                ])->each(function ($chilCost) {
                    ChildCostDetail::factory(1)->create([
                        'child_cost_id' => $chilCost->id,
                        'cost' => $chilCost->total_cost,
                    ]);
                });
            });
            ChildEducation::factory(1)->create(["children_id" => $child->id])->each(function ($childEducation) {
            ChildEducationDetail::factory(1)->create(["child_education_id" => $childEducation->id]);
            });
        });
    }
}
