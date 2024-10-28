<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Practice;
use App\Models\Coach;
use App\Models\School;
use App\Models\Voivodeship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAthletes = Athlete::count();
        $athletesByGender = Athlete::groupBy('gender')->selectRaw('gender, count(*) as count')->get();
        
        $totalPractices = Practice::count();
        
        $practicesByVoivodeship = Practice::join('coaches', 'practices.coach_id', '=', 'coaches.id')
            ->join('voivodeships', 'coaches.voivodeship_id', '=', 'voivodeships.id')
            ->groupBy('voivodeships.name')
            ->select('voivodeships.name as voivodeship', DB::raw('count(*) as count'))
            ->get();
        
        $schoolsByVoivodeship = School::join('coach_school', 'schools.id', '=', 'coach_school.school_id')
            ->join('coaches', 'coach_school.coach_id', '=', 'coaches.id')
            ->join('voivodeships', 'coaches.voivodeship_id', '=', 'voivodeships.id')
            ->groupBy('voivodeships.name')
            ->select('voivodeships.name as voivodeship', DB::raw('count(distinct schools.id) as count'))
            ->get();

        // Dodajemy kolekcję nieaktywnych trenerów
        $inactiveCoaches = Coach::where('is_active', false)->get();

        // Dodajemy nową kolekcję dla treningów według miesięcy
        $practicesByMonth = Practice::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Uzupełniamy brakujące miesiące zerami
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($practicesByMonth[$i])) {
                $practicesByMonth[$i] = 0;
            }
        }
        ksort($practicesByMonth);

        $chartData = [
            'athletesByGender' => $athletesByGender->pluck('count', 'gender')->toArray(),
            'practicesByVoivodeship' => $practicesByVoivodeship->pluck('count', 'voivodeship')->toArray(),
            'schoolsByVoivodeship' => $schoolsByVoivodeship->pluck('count', 'voivodeship')->toArray(),
            'practicesByMonth' => $practicesByMonth, // Dodajemy nowe dane do chartData
        ];

        return view('index', compact('totalAthletes', 'totalPractices', 'chartData', 'inactiveCoaches'));
    }

    private function calculatePracticeParticipation($schoolId): array
    {
        $school = School::findOrFail($schoolId);
        $totalAthletes = $school->athletes()->count();
        $totalMaleAthletes = $school->athletes()->where('gender', 'M')->count();
        $totalFemaleAthletes = $school->athletes()->where('gender', 'K')->count();
        
        $practices = Practice::where('school_id', $schoolId)
            ->with(['athletes' => function ($query) {
                $query->select('athletes.id', 'gender');
            }])
            ->get();
            
        if ($practices->isEmpty()) {
            return [
                'average_participants' => 0,
                'participation_percentage' => 0,
                'average_male_participants' => 0,
                'average_female_participants' => 0,
                'male_attendance_percentage' => 0,
                'female_attendance_percentage' => 0
            ];
        }

        $averageParticipants = $practices->avg(function($practice) {
            return $practice->athletes->count();
        });

        $averageMaleParticipants = $practices->avg(function($practice) {
            return $practice->athletes->where('gender', 'M')->count();
        });

        $averageFemaleParticipants = $practices->avg(function($practice) {
            return $practice->athletes->where('gender', 'K')->count();
        });
        
        $participationPercentage = ($totalAthletes > 0) 
            ? ($averageParticipants / $totalAthletes) * 100 
            : 0;

        $maleAttendancePercentage = ($totalMaleAthletes > 0)
            ? ($averageMaleParticipants / $totalMaleAthletes) * 100
            : 0;

        $femaleAttendancePercentage = ($totalFemaleAthletes > 0)
            ? ($averageFemaleParticipants / $totalFemaleAthletes) * 100
            : 0;

        return [
            'average_participants' => round($averageParticipants, 2),
            'participation_percentage' => round($participationPercentage, 2),
            'average_male_participants' => round($averageMaleParticipants, 2),
            'average_female_participants' => round($averageFemaleParticipants, 2),
            'male_attendance_percentage' => round($maleAttendancePercentage, 2),
            'female_attendance_percentage' => round($femaleAttendancePercentage, 2)
        ];
    }

    private function getPracticesGenderDistribution($schoolId): array
    {
        $practices = Practice::where('school_id', $schoolId)
            ->with(['athletes' => function ($query) {
                $query->select('athletes.id', 'gender');
            }])
            ->select('id', 'date')
            ->orderBy('date')
            ->get()
            ->map(function ($practice) {
                $maleCount = $practice->athletes->where('gender', 'M')->count();
                $femaleCount = $practice->athletes->where('gender', 'K')->count();
                
                return [
                    'date' => $practice->date,
                    'male' => $maleCount,
                    'female' => $femaleCount,
                    'total' => $maleCount + $femaleCount
                ];
            })
            ->toArray();

        return $practices;
    }

    public function getSchoolStats($schoolId): View
    {
        $school = School::findOrFail($schoolId);

        // Pobieramy liczbę treningów dla każdego miesiąca
        $practicesCount = Practice::where('school_id', $schoolId)
            ->selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Uzupełniamy brakujące miesiące zerami
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($practicesCount[$i])) {
                $practicesCount[$i] = 0;
            }
        }
        ksort($practicesCount);

        // Obliczamy łączną sumę treningów
        $totalPractices = array_sum($practicesCount);

        $athletesCount = Athlete::where('school_id', $schoolId)->count();
        $maleAthletesCount = Athlete::where('school_id', $schoolId)->where('gender', 'M')->count();
        $femaleAthletesCount = Athlete::where('school_id', $schoolId)->where('gender', 'K')->count();

        $stats = [
            'practices_count' => [
                'monthly' => array_values($practicesCount),
                'total' => $totalPractices
            ],
            'athletes_count' => [
                'total' => $athletesCount,
                'male' => $maleAthletesCount,
                'female' => $femaleAthletesCount,
            ],
            'participation' => $this->calculatePracticeParticipation($schoolId),
            'practices_gender_distribution' => $this->getPracticesGenderDistribution($schoolId) // Nowa sekcja
        ];

        return view('dashboard.school-stats', [
            'school' => $school,
            'stats' => $stats,
        ]);
    }

    public function exportPractices($schoolId)
    {
        $school = School::findOrFail($schoolId);
        
        // Pobierz dane
        $practices = Practice::where('school_id', $schoolId)
            ->with(['coach' => function($query) {
                $query->select('id', 'name', 'last_name');
            }])
            ->orderBy('date')
            ->get();

        // Utwórz nowy arkusz
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ustaw nagłówki
        $sheet->setCellValue('A1', 'Data treningu');
        $sheet->setCellValue('B1', 'Trener');
        $sheet->setCellValue('C1', 'Rozgrzewka');
        $sheet->setCellValue('D1', 'Ćwiczenia');

        // Wypełnij danymi
        $row = 2;
        foreach ($practices as $practice) {
            $sheet->setCellValue('A' . $row, $practice->date);
            $sheet->setCellValue('B' . $row, $practice->coach->name . ' ' . $practice->coach->last_name);
            $sheet->setCellValue('C' . $row, $practice->warm_up);
            $sheet->setCellValue('D' . $row, $practice->drills);
            $row++;
        }

        // Dostosuj szerokość kolumn
        foreach(range('A','D') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Stylizacja nagłówków
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'E0E0E0',
                ],
            ],
        ];
        $sheet->getStyle('A1:D1')->applyFromArray($headerStyle);

        // Przygotuj response
        $fileName = 'treningi_' . str_replace(' ', '_', $school->name) . '_' . date('Y-m-d') . '.xlsx';

        return new StreamedResponse(
            function () use ($spreadsheet) {
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ]
        );
    }
}
