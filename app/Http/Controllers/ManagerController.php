<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Leads;
use App\Models\Profiles;
use App\Models\User;
use App\Models\Management;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB; 

class ManagerController extends Controller
{
    public function dashboard()
    {
        // Manual session check for Manager
        $totalEmployees = Employees::count();
        $totalLeads = Leads::count();
        if(session('user_id') && session('role') === 'manager'){
            return view('manager.dashboard',compact("totalEmployees","totalLeads"));
        }
        return redirect('/')->with('error', 'Unauthorized access');
    }

    public function viewemployee()
    {
        $employees = Employees::all(); // fetch all employee records
        return view('manager.employees', compact('employees'));
    }


    public function addviewtable(){
        return view("manager.addemployeview");
    }

    
        public function adddata(Request $request){
 
            $request->validate([
                
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'name'   => 'required',
                'email'  => 'required',
                'department' => 'required',
                'phone'  => 'required',
                
            ]);
        
             $path = $request->file('image')->store('images', 'public');
            DB::table('employees')->insert([
                'image'  => $path,
                'name'   => $request->name,
                'email'  => $request->email,
                'department' => $request->department,
                'phone'  => $request->phone,
                
            ]);
        
            
             return redirect()->route('manager.employees');
            
        }


        public function updtable($id){
            $employees = DB::table('employees')->where('id', $id)->first();
            return view('manager.updateemployee', compact('employees')); 
        }
    
       
        

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'department' => 'required',
        'phone' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
    ]);

    // Handle image upload if provided
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Build data array to update
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'department' => $request->department,
        'phone' => $request->phone,
    ];

    // Only update image if a new one is uploaded
    if ($imagePath) {
        $data['image'] = $imagePath;
    }

    // Update the record using DB facade
    DB::table('employees')->where('id', $id)->update($data);

    return redirect()->route('manager.employees')->with('success', 'Employee updated successfully.');
}


        public function deletedata($id){
            $data = DB::table("employees")->where('id',$id) ->delete();
            return redirect()->route('manager.employees');
        }
        

// leads adding and deleting
       


// Show leads page
public function leads()
{
    $leads = DB::table('leads')->get();
    return view('manager.leadsview', compact('leads'));

}

public function storeLeadtable(){
    return view("manager.addleadview");
}

// Store new lead
public function storeLead(Request $request)
{
    $request->validate([
        'company_name' => 'required',
        'location' => 'required',
        'field_of_requirement' => 'required',
        'candidate_number' => 'required|integer',
        'days' => 'required|integer'
    ]);

    DB::table('leads')->insert([
        'company_name' => $request->company_name,
        'location' => $request->location,
        'field_of_requirement' => $request->field_of_requirement,
        'candidate_number' => $request->candidate_number,
        'days' => $request->days,
        
    ]);

    return redirect()->route('manager.leads')->with('success', 'Lead added successfully!');
}

// Delete lead
public function deleteLead($id)
{
    DB::table('leads')->where('id', $id)->delete();
    return redirect()->route('manager.leads')->with('success', 'Lead deleted successfully!');
}

//profile
public function profileview()
{
    $userId = session('user_id'); 

    $profile = Profiles::where('management_id', $userId)->first();
    if (!$profile) {
        $profile = new Profiles([
            'name' => session('user_name'),
            'email' => session('user_email'),
            'department' => '',
            'phone' => '',
            'image' => null,
        ]);
    }

    return view("manager.profileview", compact('profile'));
}

public function profileeditview(){
    return view("manager.profiletable");
}
        
public function updateProfile(Request $request)
{
    $userId = session('user_id');

    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email',
        'department' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

   
    $profile = Profiles::where('management_id', $userId)->first();

    // If not exist, create a new one
    if (!$profile) {
        $profile = new Profiles();
        $profile->management_id = $userId;
    }

    // Image upload
    if ($request->hasFile('image')) {
        $profile->image = $request->file('image')->store('images', 'public');
    }

    // Update fields
    $profile->name = $request->name ?? session('user_name');
    $profile->email = $request->email ?? session('user_email');
    $profile->department = $request->department;
    $profile->phone = $request->phone;

    $profile->save();

    return redirect()->route('manager.profileview')->with('success', 'Profile updated successfully!');
}


}