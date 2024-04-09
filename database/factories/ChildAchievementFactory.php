<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildAchievement>
 */
class ChildAchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'competition_level' => $this->faker->randomElement(['Tingkat Sekolah', 'Tingkat Desa', 'Tingkat Kabupaten/Kota', 'Tingkat Regional', 'Tingkat Nasional', 'Tingkat Internasional', 'Tingkat Lainnya']),
            'competition_date' => fake()->dateTimeBetween($startDate = '-2 years', $endDate = 'now')->format('Y-m-d'),
            'ranking' => $this->faker->randomElement(['Juara 1', 'Juara 2', 'Juara 3', 'Juara Harapan 1', 'Juara Harapan 2', 'Juara Harapan 3', 'Juara Favorit', 'Peserta']),
            'prize_money' => fake()->numberBetween(10000, 100000),
            'prize_item' => $this->faker->randomElement(['Motor', 'Pakaian', 'Sembako', 'Sepeda']),
            'description' => 'Lomba Keren',
            'certificate' => '-'
        ];
    }
}
