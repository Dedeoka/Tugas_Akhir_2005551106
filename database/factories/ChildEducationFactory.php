<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Children;
use App\Models\School;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildEducation>
 */
class ChildEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'education_level' => fake()->randomElement(['TK', 'SD', 'SMP', 'SMA/SMK']),
            'class' => function (array $attributes) {
                $educationLevel = $attributes['education_level'];

                // Generate class based on education_level
                if ($educationLevel === 'TK') {
                    return fake()->randomElement(['TK Kecil', 'TK Besar']);
                } elseif ($educationLevel === 'SD') {
                    return fake()->randomElement(['1', '2', '3', '4', '5', '6']);
                } elseif ($educationLevel === 'SMP') {
                    return fake()->randomElement(['7', '8', '9']);
                } elseif ($educationLevel === 'SMA/SMK') {
                    return fake()->randomElement(['10', '11', '12']);
                }

                return fake()->randomElement(['A', 'B', 'C', 'D', 'E']); // Default value
            },
            'class_name' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
            'start_date' => fake()->dateTimeBetween($startDate = '-5 years', $endDate = 'now')->format('Y-m-d'),
            'end_date' => fake()->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('Y-m-d'),
            'status' => fake()->randomElement(['Aktif', 'Non-Aktif']),
            'school_id' => function (array $attributes) {
                $educationLevel = $attributes['education_level'];

                // Generate school_id based on education_level
                if ($educationLevel === 'TK') {
                    return School::where('name', 'like', '%TK%')->inRandomOrder()->first()->id;
                } elseif ($educationLevel === 'SD') {
                    return School::where('name', 'like', '%SD%')->inRandomOrder()->first()->id;
                } elseif ($educationLevel === 'SMP') {
                    return School::where('name', 'like', '%SMP%')->inRandomOrder()->first()->id;
                } elseif ($educationLevel === 'SMA/SMK') {
                    return School::where('name', 'like', '%SMA%')->orWhere('name', 'like', '%SMK%')->inRandomOrder()->first()->id;
                }

                // Default school_id, you may adjust as needed
                return School::inRandomOrder()->first()->id;
            },
        ];
    }
}
