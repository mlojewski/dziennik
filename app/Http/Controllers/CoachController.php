<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::with('school')->get();

        return view('coaches.index', ['coaches' => $coaches]);
    }

    public function create()
    {
        $user = User::where('id', Auth::id())->first();
        return view('coaches.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $coach = new Coach();
        $user = User::where('id', Auth::id())->first();

        $coach->name = $user->name;
        $coach->last_name = $request->last_name;
        $coach->phone = $request->phone;
        $coach->is_active = false;
        $coach->save();


        $user->coach_id = $coach->id;
        $user->save();

        return redirect()->route('dashboard');

    }

    public function delete($id)
    {
        $coach = Coach::find($id);
        $coach->delete();

        return redirect()->route('coaches.index');
    }

    public function edit($id)
    {
        $coach = Coach::find($id);

        return view('coaches.edit', ['coach' => $coach]);
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::find($id);

        $coach->name = $request->name;
        $coach->last_name = $request->last_name;
        $coach->phone = $request->phone;

        $coach->save();

        return redirect()->route('coaches.index');
    }

    public function activate($id)
    {
        $coach = Coach::find($id);
        $coach->is_active = true;

        $coach->save();
        return redirect()->route('coaches.index');

    }
}
