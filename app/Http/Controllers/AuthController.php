<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // show login form
    public function showLoginForm($role)
    {
        return view('auth.login', compact('role'));
    }

    // Login user
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required|in:manager,employer'
        ]);

        $user = Management::where('email', $request->email)
                          ->where('role', $request->role)
                          ->first();

        if($user && Hash::check($request->password, $user->password)){
            session(['user_id' => $user->id, 'role' => $user->role,'user_name' => $user->name,
        'user_email' => $user->email]);

            return $user->role === 'manager' 
                ? redirect()->route('manager.dashboard') 
                : redirect()->route('employer.dashboard');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    // Show registration form
    public function showRegisterForm($role)
    {
        return view('auth.register', compact('role'));
    }

    // Register user
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:management,email',
            'password'=>'required|min:6|confirmed',
            'role'=>'required|in:manager,employer'
        ]);

        $user = Management::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        session(['user_id' => $user->id, 'role' => $user->role,'user_name' => $user->name,
        'user_email' => $user->email]);

        return $user->role === 'manager' 
            ? redirect()->route('manager.dashboard') 
            : redirect()->route('employer.dashboard');
    }

    // Logout
    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }
}
