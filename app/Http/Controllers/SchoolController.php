<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', ['schools' => $schools]);
    }

    public function create()
    {

        return view('schools.create');
    }

    public function store(Request $request)
    {
        $school = new School();

        $school->name = $request->name;
        $school->city = $request->city;
        $school->postal_code = $request->postal_code;
        $school->address = $request->address;

        $school->save();
        $coach = Coach::where('id', [Auth::user()->coach_id])->first();
        $coach->school_id = $school->id;
        $coach->save();

        return redirect()->route('schools.index');
    }

    public function delete($id)
    {
        $school = School::find($id);

        $school->delete();
        return redirect()->route('schools.index');
    }

    public function edit($id)
    {
        $school = School::find($id);
        return view('schools.edit', ['school' => $school]);

    }

    public function update(Request $request, $id)
    {
        $school = School::find($id);
        $school->name = $request->name;
        $school->city = $request->city;
        $school->postal_code = $request->postal_code;
        $school->address = $request->address;

        $school->save();
        return redirect()->route('schools.index');
    }

}
