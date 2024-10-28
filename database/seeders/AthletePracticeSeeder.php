<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Athlete;
use App\Models\Practice;

class AthletePracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $athletes = Athlete::all();

        $athletes->each(function ($athlete) {
            // Pobierz treningi tylko z tej samej szkoły co zawodnik
            $schoolPractices = Practice::where('school_id', $athlete->school_id)
                ->get();
            
            if ($schoolPractices->isNotEmpty()) {
                // Losowa liczba treningów między 3 a 6, ale nie więcej niż dostępne treningi5
                $numberOfPractices = min(rand(3, 6), $schoolPractices->count());
                
                // Wybierz losowe treningi
                $randomPractices = $schoolPractices->random($numberOfPractices);
                
                // Przypisz treningi do zawodnika
                $athlete->practices()->attach($randomPractices);
            }
        });
    }
}
