<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    public function index()
    {
        $editions = Edition::all();
        return view('editions.index', ['editions' => $editions]);
    }

    public function create()
    {
        return view('editions.create');
    }

    public function store(Request $request)
    {
        
        $edition = new Edition();
        $edition->name = $request->name;
        $edition->excluded_dates = $request->excluded_dates;

        $edition->save();
        return redirect()->route('editions.index');
    }

    public function edit($id)
    {
        $edition = Edition::findOrFail($id);
        return view('editions.edit', compact('edition'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'excluded_dates' => 'nullable|string',
        ]);

        $edition = Edition::findOrFail($id);
        $edition->name = $validatedData['name'];
        
        // Przetwarzanie wykluczonych dat
        if ($request->has('excluded_dates')) {
            $excludedDates = array_map('trim', explode(',', $validatedData['excluded_dates']));
            $edition->excluded_dates = $excludedDates;
        } else {
            $edition->excluded_dates = null;
        }

        $edition->save();

        return redirect()->route('editions.index')->with('success', 'Edycja została zaktualizowana pomyślnie.');
    }

    public function delete($id)
    {
        $edition = Edition::find($id);
        $edition->delete();
        return redirect()->route('editions.index');
    }
}
