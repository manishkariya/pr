<?php

use App\Http\Controllers\citiescontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\countrycontroller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\departmentcontroller;
use App\Http\Controllers\designationcontroller;

use App\Http\Controllers\salarycontroller;
use App\Http\Controllers\statecontroller;
use App\Models\cities;
use App\Models\countries;
use App\Models\designation;
use App\Models\salarymodel;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[Controller::class,'login']);
Route::get('/employee',[EmployeeController::class,'index'])->middleware('sentinel.auth');

Route::get('/register', [Controller::class, 'index']);


Route::post('/login', [Controller::class, 'storelogin']);
Route::post('/addregister', [Controller::class, 'register']);
Route::get('/login', [Controller::class, 'show']);

Route::get('/department', [Controller::class, 'fetchdepartment'])->name('department');

Route::get('/get-designations/{departmentId}', [Controller::class, 'getDesignations']);


//Route::get('/employee/create',[EmployeeController::class,'create'])->middleware('sentinel.auth');
//Route::post('/Addemployee',[EmployeeController::class,'store']);
//Route::get('/employee.edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
//Route::get('employee',[EmployeeController::class,'index'])->name('employee');
//Route::put('employee.update{id}',[EmployeeController::class,'update'])->name('employee.update');
//Route::get('employees/{id}',[EmployeeController::class,'destroy'])->name('employees');

Route::resource('/employee', EmployeeController::class)
    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);

Route::get('/get-state/{countryId}', [statecontroller::class, 'getstate']);
Route::get('/get-city/{countryId}', [citiescontroller::class, 'getcity']);



Route::group(['middleware' => 'sentinel.auth'], function(){
//Route::get('/salary/create',[salarycontroller::class,'index']);

Route::resource('/salary', salarycontroller::class)
    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);
//Route::post('/salary/add',[salarycontroller::class,'store'])->name('salary.add');
});
Route::get('/logout', [Controller::class, 'logout'])->name('logout');


Route::resource('/country', CountriesController::class)
    ->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);

 Route::get('users', [EmployeeController::class, 'getUsers'])->name('users.index');

Route::resource('/state',statecontroller::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);
Route::post('/state/{state_id}/toggle-status', [statecontroller::class, 'toggleStatus'])->name('state.toggleStatus');


Route::resource('/cities',citiescontroller::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);

Route::post('/city/{cid}/toggle-status', [citiescontroller::class, 'toggleStatus'])->name('city.toggleStatus');


Route::resource('/departments',departmentcontroller::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);


Route::resource('/designation',designationcontroller::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show']);

Route::post('/countries/{cid}/toggle-status', [CountriesController::class, 'toggleStatus'])->name('country.toggleStatus');


Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
