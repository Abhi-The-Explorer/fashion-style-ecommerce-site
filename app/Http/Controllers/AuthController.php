<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User; // Update this if your User model is located in a different namespace

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function loginForm(Request $request)
    {
        // Redirect to home with a message if the user is already logged in
        if (Auth::check()) {
            return redirect()->route('home')->with('message', 'You are already logged in.');
        }

        return view('customlogin.login_user'); // Return the login view if not logged in
    }

    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate login inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check if the user exists
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home')->with('message', 'You have been logged In.'); // Redirect to home after successful login
        }

        // Flash error message and redirect back on failure
        $request->session()->flash('error', 'Check your email and password');
        return redirect()->back();
    }

    /**
     * Handle the logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'You have been logged out.');
    }
}
