<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coach;
use App\Models\User;
use App\Models\School;

class PracticeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            // Dla administratora pobieramy wszystkie treningi
            $practices = Practice::with('school')->get();
        } else {
            // Dla zwykłego trenera używamy istniejącej funkcji
            $practices = $this->getLoggedInCoachPractices();
        }

        return view('practices.index', ['practices' => $practices]);
    }

    public function create()
    {
        $stages = Stage::with('edition')->get();
        
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();
        
        // Inicjalizuj pustą kolekcję szkół
        $schools = collect();
        
        if ($user && $user->coach_id) {
            // Pobierz trenera na podstawie coach_id użytkownika
            $coach = Coach::find($user->coach_id);
            
            if ($coach) {
                // Pobierz szkoły przypisane do trenera
                $schools = $coach->schools;
            }
        }

        return view('practices.create', compact('stages', 'schools'));
    }

    public function store(Request $request)
    {
        $practice = new Practice();

        $practice->warm_up = $request->warm_up;
        $practice->drills = $request->drills;
        $practice->date = $request->date;
        $practice->stage_id = $request->stage_id;
        $practice->school_id = $request->school_id;
        $user = Auth::user();
        if ($user && $user->coach_id) {
            $practice->coach_id = $user->coach_id;
        }

        $practice->save();

        // Dodajemy obsługę zapisu zawodników
        if ($request->has('athletes')) {
            $practice->athletes()->attach($request->athletes);
        }

        return redirect()->route('practices.index');
    }

    public function delete($id)
    {
        $practice = Practice::find($id);
        $practice->delete();

        return redirect()->route('practices.index');
    }

    public function edit($id)
    {
        $practice = Practice::with('athletes')->findOrFail($id);
        $schools = School::all();
        $stages = Stage::with('edition')->get();
        
        return view('practices.edit', compact('practice', 'schools', 'stages'));
    }

    public function update(Request $request, $id)
    {
        $practice = Practice::findOrFail($id);

        $practice->warm_up = $request->warm_up;
        $practice->drills = $request->drills;
        
        $practice->school_id = $request->school_id;

        $practice->save();

        // Aktualizacja powiązanych zawodników
        if ($request->has('athletes')) {
            $practice->athletes()->sync($request->athletes);
        } else {
            $practice->athletes()->detach();
        }

        return redirect()->route('practices.index')->with('success', 'Trening został zaktualizowany.');
    }

    public function getLoggedInCoachPractices()
    {
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();
        
        // Znajdź trenera powiązanego z tym użytkownikiem
        $coach = Coach::find(Auth::user()->coach_id);
        
        if (!$coach) {
            return collect(); // Zwracamy pustą kolekcję, jeśli nie znaleziono trenera
        }
        
        // Pobierz wszystkie szkoły, do których przypisany jest trener
        $schoolIds = $coach->schools->pluck('id');
        
        // Pobierz wszystkie treningi dla tych szkół
        $practices = Practice::whereIn('school_id', $schoolIds)->get();
        
        return $practices;
    }

    public function getAthletes($schoolId)
    {
        $school = School::findOrFail($schoolId);
        $athletes = $school->athletes;
        return response()->json($athletes);
    }

}
