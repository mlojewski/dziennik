<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    public function index()
    {
        $hours = Hour::all()->first()->get();

        return view('hours.index', compact('hours'));
    }

    public function create()
    {
        return view('hours.create');
    }

    public function store(Request $request)
    {
        $hour = new Hour();
        $hour->name = $request->input('name');
        $hour->value = $request->input('value');
        $hour->save();
        return redirect()->route('hours.index');

    }
    public function delete($id)
    {
        $hour = Hour::find($id);
        $hour->delete();
        return redirect()->route('hours.index');
    }

    public function edit($id)
    {
        $hour = Hour::find($id);
        return view('hours.edit', compact('hour'));
    }

    public function update(Request $request, $id)
    {
        $hour = Hour::find($id);
        $hour->name = $request->input('name');
        $hour->value = $request->input('value');
        $hour->save();
        return redirect()->route('hours.index');
    }
}
