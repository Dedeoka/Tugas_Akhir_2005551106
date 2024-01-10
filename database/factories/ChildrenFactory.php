<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Children>
 */
class ChildrenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'place_of_birth' => fake()->randomElement(['Denpasar', 'Badung', 'Karangasem', 'Bangli', 'Klungkung', 'Tabanan', 'Buleleng', 'Jembrana', 'Gianyar']),
            'date_of_birth' => fake()->dateTimeBetween($startDate = '-20 years', $endDate = 'now')->format('Y-m-d'),
            'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'religion' => fake()->randomElement(['Islam', 'Hindu', 'Kristen Protestan', 'Kristen Katolik', 'Budha', 'Konghucu']),
            'congenital_disease' => 'Tidak Ada',
            'status' => 'Aktif',
            'image' => '-',
            'identity_card' => '-'
        ];
    }
}
