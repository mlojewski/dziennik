<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Edition;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index()
    {
        $stages = Stage::all();
        return view('stages.index', ['stages' => $stages]);
    }

    public function create()
    {
        $editions = Edition::all();
        return view('stages.create', compact('editions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'edition_id' => 'required|exists:editions,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'limit' => 'nullable|integer|min:0',
        ]);

        $stage = new Stage();
        $stage->name = $validatedData['name'];
        $stage->edition_id = $validatedData['edition_id'];
        $stage->start_date = $validatedData['start_date'];
        $stage->end_date = $validatedData['end_date'];
        $stage->limit = $validatedData['limit'];
        $stage->save();

        return redirect()->route('stages.index')->with('success', 'Etap został utworzony pomyślnie.');
    }

    public function edit($id)
    {
        $stage = Stage::findOrFail($id);
        $editions = Edition::all();
        return view('stages.edit', compact('stage', 'editions'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'edition_id' => 'required|exists:editions,id',
            'start_date' => 'required|date',    
            'end_date' => 'required|date|after_or_equal:start_date',
            'limit' => 'nullable|integer|min:0',
        ]);

        $stage = Stage::findOrFail($id);
        $stage->name = $validatedData['name'];
        $stage->edition_id = $validatedData['edition_id'];
        $stage->start_date = $validatedData['start_date'];
        $stage->end_date = $validatedData['end_date'];
        $stage->limit = $validatedData['limit'];
        $stage->save();

        return redirect()->route('stages.index')->with('success', 'Etap został zaktualizowany pomyślnie.');
    }

    public function delete($id)
    {
        $stage = Stage::find($id);
        $stage->delete();
        return redirect()->route('stages.index');
    }
}
