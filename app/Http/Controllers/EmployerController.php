<?php
namespace App\Http\Controllers;

use App\Models\Employees;

class EmployerController extends Controller
{
    public function dashboard()
    {
        // Manual session check for Employer
        if(session('user_id') && session('role') === 'employer'){
            return view('employer.dashboard');
        }
        return redirect('/')->with('error', 'Unauthorized access');
    }
   
}

