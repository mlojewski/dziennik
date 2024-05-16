<?php

namespace App\Http\Controllers;

use App\Models\Stage;
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
        return view('stages.create');
    }

    public function store(Request $request)
    {
        $stage = new Stage();
        $stage->name = $request->name;
        $stage->start_date = $request->start_date;
        $stage->end_date = $request->end_date;

        $stage->save();
        return redirect()->route('stages.index');
    }

    public function edit($id)
    {
        $stage = Stage::find($id);

        return view('stages.edit', ['stage' => $stage]);
    }

    public function update(Request $request, $id)
    {
        $stage = Stage::find($id);
        $stage->name = $request->name;
        $stage->start_date = $request->start_date;
        $stage->end_date = $request->end_date;

        $stage->save();
        return redirect()->route('stages.index');
    }

    public function delete($id)
    {
        $stage = Stage::find($id);
        $stage->delete();
        return redirect()->route('stages.index');
    }
}
