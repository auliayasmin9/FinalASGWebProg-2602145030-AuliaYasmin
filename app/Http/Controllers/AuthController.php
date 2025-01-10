<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|in:Male,Female',
            'hobbies' => 'required|array|min:3',
            'instagram_username' => 'required|url|starts_with:http://www.instagram.com/',
            'mobile_number' => 'required|digits_between:10,15',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'hobbies' => json_encode($request->hobbies),
            'instagram_username' => $request->instagram_username,
            'mobile_number' => $request->mobile_number,
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Your account has not been registered');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid password');
        }

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Your account has not been registered.']);
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
}
