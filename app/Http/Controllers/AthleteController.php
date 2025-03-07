<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AthleteController extends Controller
{
    public function index()
    {
        $schools = $this->getSchoolsForLoggedTeacher();
        
        if (auth()->user()->is_admin) {
            // Dla admina zachowujemy oryginalną logikę
            $athletes = Athlete::with('school')->get();
        } else {
            // Dla trenera pobieramy tylko zawodników z jego szkół
            $athletes = Athlete::with('school')
                ->whereIn('school_id', function($query) {
                    $query->select('schools.id')
                        ->from('schools')
                        ->join('coach_school', 'schools.id', '=', 'coach_school.school_id')
                        ->where('coach_school.coach_id', auth()->user()->coach_id);
                })
                ->get();
        }

        return view('athletes.index', ['athletes' => $athletes, 'schools' => $schools]);
    }

    public function create()
    {
        $schools = $this->getSchoolsForLoggedTeacher();
        return view('athletes.create', ['schools' => $schools]  );
    }

    public function store(Request $request)
    {
        
        $athlete = new Athlete();

        $athlete->name = $request->name;
        $athlete->last_name = $request->last_name;
        $athlete->birth_date = $request->birth_date;
        $athlete->gender = $request->gender;
        $athlete->guardian = $request->guardian;
        $athlete->guardian_number = $request->guardian_number;
        $athlete->school_id = $request->school_id;

        $athlete->save();
        return redirect()->route('athletes.index');

    }

    public function delete($id)
    {
    
        $athlete = Athlete::find($id);

    
        $athlete->delete();

        return redirect()->route('athletes.index');
    }

    public function edit($id)
    {
        $schools = $this->getSchoolsForLoggedTeacher();
        $athlete = Athlete::find($id);
        
        return view('athletes.edit', ['athlete' => $athlete, 'schools' => $schools]);
    }

    public function update(Request $request, $id)
    {
        $athlete = Athlete::find($id);
        
        
        $athlete->name = $request->name;
        $athlete->last_name = $request->last_name;
        $athlete->birth_date = $request->birth_date;
        $athlete->gender = $request->gender;
        $athlete->guardian = $request->guardian;
        $athlete->guardian_number = $request->guardian_number;
        $athlete->school_id = $request->school_id;

        $athlete->save();
        return redirect()->route('athletes.index');
    }

    

    public function getSchoolsForLoggedTeacher()
    {
        $user = Auth::user();
        if (!$user || !$user->coach_id) {
            return collect(); // Zwraca pustą kolekcję, jeśli użytkownik nie jest trenerem
        }

        $coach = Coach::find($user->coach_id);
        if (!$coach) {
            return collect(); // Zwraca pustą kolekcję, jeśli trener nie istnieje
        }

        return $coach->schools; // Zakładamy, że istnieje relacja 'schools' w modelu Coach
    }

}
