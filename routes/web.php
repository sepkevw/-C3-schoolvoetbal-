<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/teams', function () {
    return view('teams');
})->name('teams');

Route::get('/wedstrijden', function () {
    return view('wedstrijden');
})->name('wedstrijden');

Route::get('/inzetten', function () {
    return view('inzetten');
})->name('inzetten');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
