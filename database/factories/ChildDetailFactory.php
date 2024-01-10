<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Children;
use App\Models\ChildDetail;

class ChildDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_name' => $this->faker->name('id_ID'),
            'mother_name' => $this->faker->name('id_ID'),
            'reason_for_leaving' => 'Ekonomi',
            'guardian_name' => $this->faker->name(),
            'guardian_relationship' => $this->faker->randomElement(['Ayah', 'Ibu', 'Kerabat', 'Teman', 'Lainnya']),
            'guardian_address' => $this->faker->address(),
            'guardian_phone_number' => $this->faker->phoneNumber(),
            'guardian_email' => $this->faker->safeEmail(),
            'guardian_identity_card' => '-',
            'birth_certificate' => '-',
            'family_card' => '-',
        ];
    }

    // public function configure()
    // {
    //     return $this->afterMaking(function (ChildDetail $detail) {
    //         $detail->children_id = Children::factory()->create()->id;
    //     });
    // }
}
