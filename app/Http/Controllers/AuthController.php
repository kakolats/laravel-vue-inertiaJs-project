<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{

    public function showLoginPage(){
        return inertia('Auth/Login');
    }

    public function authenticate(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $defaultRoute = route('books.index');
            $intended_route = redirect()->intended($defaultRoute)->getTargetUrl();
            return Inertia::location($intended_route);
        }

        return back()->withErrors([
            'email' => 'Le nom d\'utilisateur ou le mot de passe est incorrect',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
