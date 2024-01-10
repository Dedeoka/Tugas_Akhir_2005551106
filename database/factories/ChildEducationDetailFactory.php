<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChildEducationDetail>
 */
class ChildEducationDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guardian_name' => fake()->name(),
            'guardian_address' => fake()->address(),
            'guardian_phone' => fake()->phoneNumber(),
        ];
    }
}
