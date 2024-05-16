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
        $school = $this->getSchoolForLoggedTeacher();
        $athletes = Athlete::with('school')->where('school_id', $school->id)->get();

        return view('athletes.index', ['athletes' => $athletes]);
    }

    public function create()
    {
        return view('athletes.create');
    }

    public function store(Request $request)
    {
        $school = $this->getSchoolForLoggedTeacher();
        $athlete = new Athlete();

        $athlete->name = $request->name;
        $athlete->last_name = $request->last_name;
        $athlete->birth_date = $request->birth_date;
        $athlete->gender = $request->gender;
        $athlete->guardian = $request->guardian;
        $athlete->guardian_number = $request->guardian_number;
        $athlete->school_id = $school->id;

        $athlete->save();
        return redirect()->route('athletes.index');

    }

    public function delete($id)
    {
        $school = $this->getSchoolForLoggedTeacher();
        $athlete = Athlete::find($id);

        if ($athlete->school_id != $school->id) {
            abort(403);
        }
        $athlete->delete();

        return redirect()->route('athletes.index');
    }

    public function edit($id)
    {
        $school = $this->getSchoolForLoggedTeacher();
        $athlete = Athlete::find($id);
        if ($athlete->school_id != $school->id) {
            abort(403);
        }
        return view('athletes.edit', ['athlete' => $athlete]);
    }

    public function update(Request $request, $id)
    {
        $athlete = Athlete::find($id);
        $school = $this->getSchoolForLoggedTeacher();
        if ($athlete->school_id != $school->id) {
            abort(403);
        }
        $athlete->name = $request->name;
        $athlete->last_name = $request->last_name;
        $athlete->birth_date = $request->birth_date;
        $athlete->gender = $request->gender;
        $athlete->guardian = $request->guardian;
        $athlete->guardian_number = $request->guardian_number;

        $athlete->save();
        return redirect()->route('athletes.index');
    }

    public function getSchoolForLoggedTeacher()
    {
        $coach = Coach::where('id', [Auth::user()->coach_id])->first();

        return School::where('id', [$coach->school_id])->first();
    }

}
