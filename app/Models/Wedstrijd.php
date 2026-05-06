<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Wedstrijd extends Model
{
    protected $table = 'wedstrijden'; // <-- DIT MIS JE

    protected $fillable = ['team1_id', 'team2_id', 'datum', 'locatie'];
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
