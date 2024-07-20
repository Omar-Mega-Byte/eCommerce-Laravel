<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class AuthController extends Controller
{   // Register user
    public function register(Request $request)
    {
        //Validate
        $fields = $request->validate([
            'name' => ['required', 'MAX:255'],
            'email' => ['required', 'MAX:255', 'email', 'unique:users'],
            'password' => ['required', 'MIN:3', 'confirmed']
        ]);

        //Register
        $user = User::create($fields);
        //Login
        Auth::login($user);
        //Redirect
        return redirect()->route('posts.index');
    }

    public function login(Request $request)
    {
        //Validate
        $fields = $request->validate([
            'email' => ['required', 'MAX:255', 'email'],
            'password' => ['required']
        ]);

        //Try to login
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided Input isnt correct'
            ]);
        }
    }

    public function logout(Request $request)
    {
        //logout the user
        Auth::logout();

        //invalidate user session
        $request->session()->invalidate();

        //regenerate csrf token
        $request->session()->regenerateToken();

        //redirect to home
        return redirect('/');
    }
}
