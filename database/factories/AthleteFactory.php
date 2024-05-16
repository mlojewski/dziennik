<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Athlete>
 */
class AthleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'last_name' => fake()->name(),
            'birth_date' => fake()->date(),
            'gender' => 'M',
            'guardian' => fake()->text(40),
            'guardian_number' => fake()->text(20),
            'school_id' => 1
        ];
    }
}
