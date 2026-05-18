<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WedstrijdController;

Route::get('/', [WedstrijdController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/wedstrijden', [WedstrijdController::class, 'index'])->name('wedstrijden');
    Route::get('/inzetten', fn() => view('inzetten'))->name('inzetten');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/teams', [TeamController::class, 'index'])->name('teams');
    Route::post('/teams', [TeamController::class, 'store']);
    Route::post('/schema/generate', [WedstrijdController::class, 'generate'])->name('schema.generate');
});

require __DIR__.'/auth.php';
