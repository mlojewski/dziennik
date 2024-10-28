<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coach;
use App\Models\School;

class CoachSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coaches = Coach::all();
        $schools = School::all();

        // Dla każdego trenera przypisz jedną losową szkołę
        $coaches->each(function ($coach) use ($schools) {
            $randomSchool = $schools->random(); // Wybierz losowo jedną szkołę
            $coach->schools()->attach($randomSchool);
        });

    }
}
