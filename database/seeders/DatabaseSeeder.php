<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $incomeTypes = [
            ['name' => 'Bantuan Luar Negeri'],
            ['name' => 'Bantuan Pemerintah'],
            ['name' => 'Hasil Usaha Produktif'],
            ['name' => 'Bunga Bank'],
        ];
        \App\Models\IncomeType::insert($incomeTypes);
    }
}
