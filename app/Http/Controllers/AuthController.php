<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Register a new user
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users',
            'phone'    => 'required|regex:/^01[3-9]\d{8}$/|unique:users',
            'password' => 'required|confirmed|min:4',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'courier';

        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('courier.dashboard');
    }

    // Login existing user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(
                Auth::user()->role === 'admin'
                    ? route('admin.reports')
                    : route('courier.dashboard')
            );
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.reports');
    }
}
