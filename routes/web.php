
<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployerController;
use Chatify\Chatify; 

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login/{role}', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');




// Registration routes
Route::get('/register/{role}', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');



//employees table in the manager view


Route::get('/manager/employees', [ManagerController::class, 'viewemployee'])->name('manager.employees');

//add employee view table

Route::get('/manager/addview',[ManagerController::class,"addviewtable"])->name("manager.addview");

//adding employee to the table

Route::post("manager/addemployee",[ManagerController::class,"adddata"])->name("manager.addemployee");


// update employee

Route::get("manager/updtable/{id}",[ManagerController::class,"updtable"])->name("manager.updtable");
Route::post("manager/update/{id}",[ManagerController::class,"update"])->name("manager.update");



//delete employee
Route::get("manager/deletedata/{id}",[ManagerController::class,"deletedata"])->name("manager.deletedata");


//leads view store delete
//to view
Route::get('/manager/leads', [ManagerController::class, 'leads'])->name('manager.leads');



//to store
Route::get('/manager/addleads', [ManagerController::class, 'storeLeadtable'])->name('manager.leadsstoretable');
Route::post('/manager/addleads', [ManagerController::class, 'storeLead'])->name('manager.leadsstore');

// to delete
Route::post('/manager/leads/{id}', [ManagerController::class, 'deleteLead'])->name('manager.leads.delete');


//chatify

// use Chatify\Http\Controllers\MessagesController;
// Route::prefix('manager/employees')->middleware(['chatify.auth'])->group(function() {
//     Chatify::routes();   // no leading backslash
// });

// Route::prefix('employer/dashboard')->middleware(['chatify.auth'])->group(function() {
//     Chatify::routes();
// });


//profile

Route::get("manager/profile",[ManagerController::class,"profileview"])->name("manager.profileview");

//profile edit

Route::get("manager/profile/edit",[ManagerController::class,"profileeditview"])->name("manager.profileedit");

Route::post('/manager/profile/update', [ManagerController::class, 'updateProfile'])->name('manager.profileupdate');

//worktimings

Route::get('/manager/worktimings', [ManagerController::class, 'worktimings'])->name('manager.worktimings');
