<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Naam is verplicht',
            'name.min' => 'Naam moet minimaal 3 tekens hebben',
            'email.required' => 'Email is verplicht',
            'email.email' => 'Vul een geldig emailadres in',
            'email.unique' => 'Dit emailadres bestaat al',
            'password.required' => 'Wachtwoord is verplicht',
            'password.min' => 'Wachtwoord moet minimaal 6 tekens hebben',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => false,
            'team_id' => null,
        ]);

        return redirect('/register')->with('success', 'Account succesvol aangemaakt!');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is verplicht',
            'email.email' => 'Vul een geldig emailadres in',
            'password.required' => 'Wachtwoord is verplicht',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Je bent succesvol ingelogd!');
        }

        return back()->withErrors([
            'login' => 'Email of wachtwoord is onjuist',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Je bent uitgelogd!');
    }
}
