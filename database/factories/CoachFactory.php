<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'last_name' => fake()->name(),
            'phone' => fake()->text(),
            'is_active' => true,
            'licence' => fake()->text(),
            'pesel' => fake()->text(),
            'voivodeship_id' => fake()->numberBetween(1, 16),
        ];
    }
}
