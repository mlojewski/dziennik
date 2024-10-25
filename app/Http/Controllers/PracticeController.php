<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coach;
use App\Models\User;

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
        $stages = Stage::all();
        return view('practices.create', ['stages' => $stages]);
    }

    public function store(Request $request)
    {
        $practice = new Practice();

        $practice->warm_up = $request->warm_up;
        $practice->drills = $request->drills;
        $practice->date = $request->date;
        $practice->stage_id = $request->stage;
        $practice->school_id = 1;
        $practice->save();
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
        $practice = Practice::find($id);

        return view('practices.edit', ['practice' => $practice]);
    }

    public function update(Request $request, $id)
    {
        $practice = Practice::find($id);

        $practice->warm_up = $request->warm_up;
        $practice->drills = $request->drills;

        $practice->save();
        return redirect()->route('practices.index');
    }

    public function getLoggedInCoachPractices()
    {
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();
        
        // Znajdź trenera powiązanego z tym użytkownikiem
        $coach = Coach::where('user_id', $user->id)->first();
        
        if (!$coach) {
            return collect(); // Zwracamy pustą kolekcję, jeśli nie znaleziono trenera
        }
        
        // Pobierz wszystkie szkoły, do których przypisany jest trener
        $schoolIds = $coach->schools->pluck('id');
        
        // Pobierz wszystkie treningi dla tych szkół
        $practices = Practice::whereIn('school_id', $schoolIds)->get();
        
        return $practices;
    }
}
