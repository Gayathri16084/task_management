<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Management;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    // Show login form
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

        DB::table('employeelogs')->insert([
    'email'      => $user->email,
    'password'   => $user->password,
    'login_time' =>  Carbon::now('Asia/Kolkata'),
    'created_at' => now(),
    'updated_at' => now(),
]);


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
         $userEmail = session('user_email');

    if($userEmail){
        // Find the latest login record with null logout_time
        DB::table('employeelogs')
            ->where('email', $userEmail)
            ->whereNull('logout_time')
            ->latest('login_time')
            ->update(['logout_time' => Carbon::now('Asia/Kolkata')]);
    };
        session()->flush();
        return redirect()->route('home');
    }
}
