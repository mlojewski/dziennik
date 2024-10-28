<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Voivodeship;

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
            'pesel' => fake()->numerify('#########00'),
            'voivodeship_id' => \App\Models\Voivodeship::inRandomOrder()->first()->id,
        ];
    }
}
