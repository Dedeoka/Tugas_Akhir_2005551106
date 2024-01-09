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
            'name' => $this->faker->firstName(),
            'place_of_birth' => $this->faker->randomElement(['Denpasar', 'Badung', 'Karangasem', 'Bangli', 'Klungkung', 'Tabanan', 'Buleleng', 'Jembrana', 'Gianyar']),
            'date_of_birth' => $this->faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now')->format('Y-m-d'),
            'gender' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'religion' => $this->faker->randomElement(['Islam', 'Hindu', 'Kristen Protestan', 'Kristen Katolik', 'Budha', 'Konghucu']),
            'congenital_disease' => 'Tidak Ada',
            'status' => 'Aktif',
            'image' => '-',
            'identity_card' => '-'
        ];
    }
}
