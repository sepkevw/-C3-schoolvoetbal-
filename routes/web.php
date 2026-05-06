<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WedstrijdController;

/*
|----------------------------------------------------------------------
| Routes
|----------------------------------------------------------------------
*/

Route::get('/', [WedstrijdController::class, 'index'])->name('home');

// Teams
Route::get('/teams', [TeamController::class, 'index'])->name('teams');
Route::post('/teams', [TeamController::class, 'store']);

// Wedstrijden (BELANGRIJK: deze ontbrak)
Route::get('/wedstrijden', [WedstrijdController::class, 'index'])->name('wedstrijden');
Route::get('/inzetten', [WedstrijdController::class, 'index'])->name('inzetten');
// Schema genereren
Route::post('/schema/generate', [WedstrijdController::class, 'generate'])->name('schema.generate');
