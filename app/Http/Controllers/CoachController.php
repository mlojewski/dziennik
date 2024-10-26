<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\User;
use App\Models\Voivodeship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::with('schools')->where('is_active', 1)->get();

        return view('coaches.index', ['coaches' => $coaches]);
    }

    public function inactives()
    {
        $coaches = Coach::with('schools')->where('is_active', 0)->get();

        return view('coaches.inactives', ['coaches' => $coaches]);
    }

    public function create()
    {
        $voivodeships = Voivodeship::all();
        $user = User::where('id', Auth::id())->first();
        return view('coaches.create', ['user' => $user, 'voivodeships' => $voivodeships]);
    }

    public function store(Request $request)
    {
        $coach = new Coach();
        $user = User::where('id', Auth::id())->first();

        $coach->name = $user->name;
        $coach->last_name = $request->last_name;
        $coach->phone = $request->phone;
        $coach->is_active = false;
        $coach->nip = $request->nip;
        $coach->pesel = $request->pesel;
        $coach->voivodeship_id = $request->voivodeship_id;
        $coach->licence = $request->licence;
        $coach->is_b2b = $request->is_b2b;
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
        $voivodeships = Voivodeship::all();

        return view('coaches.edit', ['coach' => $coach, 'voivodeships' => $voivodeships]);
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::find($id);

        $coach->name = $request->name;
        $coach->last_name = $request->last_name;
        $coach->phone = $request->phone;
        $coach->nip = $request->nip;
        $coach->is_b2b = $request->is_b2b;
        $coach->pesel = $request->pesel;
        $coach->voivodeship_id = $request->voivodeship_id;
        $coach->licence = $request->licence;
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
