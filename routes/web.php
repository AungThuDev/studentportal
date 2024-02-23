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
Route::get('/register-school',[App\Http\Controllers\ResgisterSchoolController::class, 'index'])->name('register-school')->middleware('guest');
Route::post('/register-school',[App\Http\Controllers\ResgisterSchoolController::class, 'register'])->name('school.store');
Route::get('/{name}/user-dashboard/{id}',[App\Http\Controllers\ResgisterSchoolController::class,'dashboard'])->name('dashboard')->middleware(['auth', 'useraccess']);
Route::get('/{name}/user-dashboard/{id}/edit',[App\Http\Controllers\ResgisterSchoolController::class,'edit'])->name('dashboard.edit')->middleware('auth');
Route::put('/{name}/user-dashboard/{id}',[App\Http\Controllers\ResgisterSchoolController::class,'update'])->name('dashboard.update')->middleware('auth');
Route::post('/logout-school',[App\Http\Controllers\ResgisterSchoolController::class,'logout'])->name('logout-school')->middleware('auth');

//For Students
Route::get('/{name}/user-dashboard/{id}/students',[App\Http\Controllers\StudentController::class,'index'])->name('student')->middleware('auth');
Route::get('/{name}/user-dashboard/{id}/students/create',[App\Http\Controllers\StudentController::class,'create'])->name('student.create')->middleware('auth');
Route::post('/students',[App\Http\Controllers\StudentController::class,'store'])->name('student.store')->middleware('auth');
Route::get('/{name}/user-dashboard/{id}/student/detail/{stdId}',[App\Http\Controllers\StudentController::class,'show'])->name('student.detail');

Route::get('/students-info/{id}',[App\Http\Controllers\StudentController::class,'detailInfo'])->name('student.info');
Route::get('/student-photos/{id}',[App\Http\Controllers\StudentController::class,'exportImage'])->name('image');

//For Employee
Route::get('/{name}/user-dashboard/{id}/employee',[App\Http\Controllers\EmployeeController::class,'index'])->name('employee')->middleware('auth');
Route::get('/{name}/user-dashboard/{id}/employee/create',[App\Http\Controllers\EmployeeController::class,'create'])->name('employee.create')->middleware('auth');
Route::post('/employee',[App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store')->middleware('auth');
