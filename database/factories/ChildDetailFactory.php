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
        $child = Children::inRandomOrder()->first();
        return [
            'children_id' => $child->id,
            'father_name' => $this->faker->name(),
            'mother_name' => $this->faker->name(),
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

    public function configure()
    {
        return $this->afterCreating(function (ChildDetail $detail) {
            $detail->update(['children_id' => Children::factory()->create()->id]);
        });
    }
}
