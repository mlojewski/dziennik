<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practice>
 */
class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warm_up' => fake()->text(50),
            'drills' => fake()->text(50),
            'date' => fake()->dateTime(),
            'stage_id' => 1,
            'school_id' => 1
        ];
    }
}
