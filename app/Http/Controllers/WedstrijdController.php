<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use App\Models\Team;

class WedstrijdController extends Controller
{
    public function index()
    {
        $wedstrijden = Wedstrijd::with(['team1', 'team2'])->get();
        return view('wedstrijden', compact('wedstrijden'));
    }

    public function generate()
    {
        $teams = Team::all();

        for ($i = 0; $i < count($teams); $i++) {
            for ($j = $i + 1; $j < count($teams); $j++) {

                Wedstrijd::create([
                    'team1_id' => $teams[$i]->id,
                    'team2_id' => $teams[$j]->id,
                    'datum' => now()->addDays(rand(1, 30)),
                    'locatie' => 'Sportveld'
                ]);
            }
        }

        return redirect()->back();
    }
}
