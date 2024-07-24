<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
        // Register User
        public function register(Request $request)
        {
            // Validate
            $fields = $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email', 'unique:users'],
                'password' => ['required', 'min:3', 'confirmed']
            ]);

            // Register
            $user = User::create($fields);

            // Login
            Auth::login($user);

            event(new Registered($user));

            // Redirect
            return redirect()->route('dashboard');
        }

        // Verify Email Notice Handler
        public function verifyEmailNotice()
        {
            return view('auth.verify-email');
        }

        // Email Verification Handler
        public function verifyEmailHandler(EmailVerificationRequest $request)
        {
            $request->fulfill();

            return redirect()->route('dashboard');
        }

        // Resending the Verification Email Handler
        public function verifyEmailResend(Request $request)
        {
            $request->user()->sendEmailVerificationNotification();

            return back()->with('message', 'Verification link sent!');
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
