<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use APp\Models\Disease;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildHealth>
 */
class ChildHealthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $disease = Disease::inRandomOrder()->first()->id;
        return [
            'disease_id' => $disease,
            'medicine' => 'Obat-Obatan',
            'date_of_illness' => fake()->dateTimeBetween($startDate = '-20 years', $endDate = 'now')->format('Y-m-d'),
            'recovery_date' => function (array $attributes) {
                // Mendapatkan tanggal penyakit
                $dateOfIllness = Carbon::parse($attributes['date_of_illness']);

                // Menambahkan 20 hari ke tanggal penyakit
                return $dateOfIllness->addDays(20)->format('Y-m-d');
            },
            'status' => 'Sedang Sakit',
            'payment_method' => 'Biaya Panti Asuhan',
            'drug_cost' => fake()->numberBetween(10000, 100000),
            'medical_check_cost' => fake()->numberBetween(10000, 100000),
            'description' => 'Sakit',
        ];
    }
}
