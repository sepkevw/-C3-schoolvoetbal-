<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'nullable',
            'event_date' => 'nullable|date',
        ]);

        Team::create([
            'name' => $request->name,
            'location' => $request->location,
            'event_date' => $request->event_date,
        ]);

        return redirect()->back();
    }
}
