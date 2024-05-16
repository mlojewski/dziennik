<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Stage;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        $practices = Practice::with('school')->get();
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
}
