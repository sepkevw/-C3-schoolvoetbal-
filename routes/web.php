<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WedstrijdController;
use App\Http\Controllers\ProfileController;

Route::get('/', [WedstrijdController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/inzetten', fn() => view('inzetten'))->name('inzetten');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/teams', [TeamController::class, 'index'])->name('teams');
    Route::post('/teams', [TeamController::class, 'store']);

    Route::get('/wedstrijden', [WedstrijdController::class, 'index'])->name('wedstrijden');
    Route::post('/schema/generate', [WedstrijdController::class, 'generate'])->name('schema.generate');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/inzetten', fn() => view('inzetten'))->name('inzetten');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
