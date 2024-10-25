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

        $edition->save();
        return redirect()->route('editions.index');
    }

    public function edit($id)
    {
        $edition = Edition::find($id);

        return view('editions.edit', ['edition' => $edition]);
    }

    public function update(Request $request, $id)
    {
        $edition = Edition::find($id);
        $edition->name = $request->name;

        $edition->save();
        return redirect()->route('editions.index');
    }

    public function delete($id)
    {
        $edition = Edition::find($id);
        $edition->delete();
        return redirect()->route('editions.index');
    }
}
