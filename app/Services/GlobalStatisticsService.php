<?php

namespace App\Services;

use App\Models\Practice;
use App\Models\Athlete;
use App\Models\School;
use App\Models\Coach;
use Illuminate\Support\Facades\DB;

class GlobalStatisticsService
{
    /**
     * Pobiera podstawowe liczniki
     */
    public function getBasicCounts(): array
    {
        return [
            'total_practices' => Practice::count(),
            'total_athletes' => Athlete::count(),
            'total_schools' => School::count(),
            'total_coaches' => Coach::where('is_active', true)->count(),
            'inactive_coaches' => Coach::where('is_active', false)->count(),
        ];
    }

    /**
     * Pobiera statystyki zawodników według płci
     */
    public function getAthletesByGender(): array
    {
        return Athlete::groupBy('gender')
            ->select('gender', DB::raw('count(*) as count'))
            ->pluck('count', 'gender')
            ->toArray();
    }

    /**
     * Pobiera statystyki treningów według województw
     */
    public function getPracticesByVoivodeship(): array
    {
        return Practice::join('coaches', 'practices.coach_id', '=', 'coaches.id')
            ->join('voivodeships', 'coaches.voivodeship_id', '=', 'voivodeships.id')
            ->groupBy('voivodeships.name')
            ->select('voivodeships.name as voivodeship', DB::raw('count(*) as count'))
            ->pluck('count', 'voivodeship')
            ->toArray();
    }

    /**
     * Pobiera statystyki szkół według województw
     */
    public function getSchoolsByVoivodeship(): array
    {
        return School::join('coach_school', 'schools.id', '=', 'coach_school.school_id')
            ->join('coaches', 'coach_school.coach_id', '=', 'coaches.id')
            ->join('voivodeships', 'coaches.voivodeship_id', '=', 'voivodeships.id')
            ->groupBy('voivodeships.name')
            ->select('voivodeships.name as voivodeship', DB::raw('count(distinct schools.id) as count'))
            ->pluck('count', 'voivodeship')
            ->toArray();
    }

    /**
     * Pobiera liczbę treningów według miesięcy
     */
    public function getPracticesByMonth(): array
    {
        $practicesByMonth = Practice::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Uzupełnienie brakujących miesięcy zerami
        $completeMonths = array_fill(1, 12, 0);
        return array_replace($completeMonths, $practicesByMonth);
    }

    

    /**
     * Pobiera statystyki treningów według dni tygodnia
     */
    public function getPracticesByWeekday(): array
    {
        return Practice::selectRaw('DAYOFWEEK(date) as weekday, COUNT(*) as count')
            ->groupBy('weekday')
            ->orderBy('weekday')
            ->get()
            ->mapWithKeys(function ($item) {
                $days = ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'];
                return [$days[$item->weekday - 1] => $item->count];
            })
            ->toArray();
    }

    /**
     * Pobiera wszystkie statystyki w jednym wywołaniu
     */
    public function getAllStatistics(): array
    {
        return [
            'counts' => $this->getBasicCounts(),
            'athletes_by_gender' => $this->getAthletesByGender(),
            'practices_by_voivodeship' => $this->getPracticesByVoivodeship(),
            'schools_by_voivodeship' => $this->getSchoolsByVoivodeship(),
            'practices_by_month' => $this->getPracticesByMonth(),
        
            'practices_by_weekday' => $this->getPracticesByWeekday(),
            'participation' => $this->calculateAverageParticipation() // Dodana nowa sekcja
        ];
    }

    /**
     * Oblicza średnią frekwencję na wszystkich treningach
     */
    public function calculateAverageParticipation(): array
    {
        // Pobierz szkoły, które miały treningi
        $schoolsWithPractices = School::whereHas('practices')->get();
        $schoolCount = $schoolsWithPractices->count();
        
        if ($schoolCount === 0) {
            return [
                'participation_percentage' => 0,
                'male_attendance_percentage' => 0,
                'female_attendance_percentage' => 0,
                'average_participants' => 0,
                'average_male_participants' => 0,
                'average_female_participants' => 0
            ];
        }

        $totalSchoolPercentages = 0;
        $totalMalePercentages = 0;
        $totalFemalePercentages = 0;
        
        // Dodane zmienne dla średniej liczby uczestników
        $totalSchoolAverages = 0;
        $totalMaleAverages = 0;
        $totalFemaleAverages = 0;

        foreach ($schoolsWithPractices as $school) {
            $practices = $school->practices()
                ->with(['athletes' => function($query) {
                    $query->select('athletes.id', 'gender');
                }])
                ->get();

            if ($practices->isEmpty()) {
                continue;
            }

            $totalAthletes = $school->athletes()->count();
            $totalMaleAthletes = $school->athletes()->where('gender', 'M')->count();
            $totalFemaleAthletes = $school->athletes()->where('gender', 'K')->count();

            if ($totalAthletes === 0) {
                continue;
            }

            $totalParticipations = 0;
            $totalMaleParticipations = 0;
            $totalFemaleParticipations = 0;
            
            foreach ($practices as $practice) {
                $totalParticipations += $practice->athletes->count();
                $totalMaleParticipations += $practice->athletes->where('gender', 'M')->count();
                $totalFemaleParticipations += $practice->athletes->where('gender', 'K')->count();
            }
            

            // Obliczamy średnią frekwencję dla każdej płci osobno
            if ($totalMaleAthletes > 0) {
                $malePercentage = ($totalMaleParticipations / ($totalMaleAthletes * $practices->count())) * 100;
                $totalMalePercentages += $malePercentage;
            }

            if ($totalFemaleAthletes > 0) {
                $femalePercentage = ($totalFemaleParticipations / ($totalFemaleAthletes * $practices->count())) * 100;
                $totalFemalePercentages += $femalePercentage;
            }

            // Średnia frekwencja ogólna to średnia z frekwencji mężczyzn i kobiet
            $schoolPercentage = ($malePercentage + $femalePercentage) / 2;
            
            $totalSchoolPercentages += $schoolPercentage;
            

            // Obliczenia średniej liczby uczestników pozostają bez zmian
            $schoolAverage = $totalParticipations / $practices->count();
            $maleAverage = $totalMaleParticipations / $practices->count();
            $femaleAverage = $totalFemaleParticipations / $practices->count();

            $totalSchoolAverages += $schoolAverage;
            $totalMaleAverages += $maleAverage;
            $totalFemaleAverages += $femaleAverage;
        }
        
        return [
            'participation_percentage' => round($totalSchoolPercentages / $schoolCount, 2),
            'male_attendance_percentage' => round($totalMalePercentages / $schoolCount, 2),
            'female_attendance_percentage' => round($totalFemalePercentages / $schoolCount, 2),
            'average_participants' => round($totalSchoolAverages / $schoolCount, 2),
            'average_male_participants' => round($totalMaleAverages / $schoolCount, 2),
            'average_female_participants' => round($totalFemaleAverages / $schoolCount, 2)
        ];
    }
}
