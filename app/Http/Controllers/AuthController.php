<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Events\UserSubscribed;

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

            if ($request->subscribe) {
                event(new UserSubscribed($user));
            }

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
            // Validate the input fields
            $fields = $request->validate([
                'email' => ['required', 'max:255', 'email'],
                'password' => ['required']
            ]);

            // Try to login
            if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']], $request->remember)) {
                // Retrieve the authenticated user
                $user = Auth::user();

                // Check the user type and redirect accordingly
                if ($user->type === 'admin') {
                    return redirect()->intended('admin'); // Redirect to admin dashboard
                } else {
                    return redirect()->intended('dashboard'); // Redirect to customer dashboard
                }
            } else {
                return back()->withErrors([
                    'failed' => 'The provided credentials are incorrect.'
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
