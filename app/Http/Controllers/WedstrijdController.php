<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use App\Models\Team;
use Illuminate\Http\Request;

class WedstrijdController extends Controller
{
  public function home()
{
    $wedstrijden = Wedstrijd::with(['team1', 'team2'])->get();

    return view('home', compact('wedstrijden'));
}

public function index()
{
    $wedstrijden = Wedstrijd::with(['team1', 'team2'])->get();
    $teams = Team::all();

    return view('wedstrijden', compact('wedstrijden', 'teams'));
}

    public function generate(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
        ]);

        $team1 = Team::findOrFail($request->team1_id);

        Wedstrijd::create([
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'datum' => now(),
            'locatie' => $team1->location ?? 'Sportveld',
        ]);

        return redirect()->back();
    }
}
