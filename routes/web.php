<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',function(){
    return view('frontend.index');
});

//Register School & User
Route::get('/register-school',[App\Http\Controllers\ResgisterSchoolController::class, 'index']);
Route::post('/register-school',[App\Http\Controllers\ResgisterSchoolController::class, 'register'])->name('school.store');
Route::get('/dashboard/{id}',[App\Http\Controllers\ResgisterSchoolController::class,'dashboard'])->name('dashboard');
Route::get('/dashboard/{id}/edit',[App\Http\Controllers\ResgisterSchoolController::class,'edit'])->name('dashboard.edit');
Route::put('/dashboard/{id}',[App\Http\Controllers\ResgisterSchoolController::class,'update'])->name('dashboard.update');

//For Students
Route::get('/students',[App\Http\Controllers\StudentController::class,'index'])->name('student');
Route::get('/students/create',[App\Http\Controllers\StudentController::class,'create'])->name('student.create');
Route::post('/students',[App\Http\Controllers\StudentController::class,'store'])->name('student.store');

//For Employee
Route::get('/employee',[App\Http\Controllers\EmployeeController::class,'index'])->name('employee');
Route::get('/employee/create',[App\Http\Controllers\EmployeeController::class,'create'])->name('employee.create');
