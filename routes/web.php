<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
 use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

 use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

 


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('register-company',function(){
  return view('Register-company');
})->name('register.company');

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::resource('shipments',ShipmentController::class);
    Route::resource('company',CompanyController::class);
    Route::get('company/changestatus/{id}',[CompanyController::class,'ChangeStatus'])->name('company.status');
    Route::resource('employee',EmployeeController::class);
    Route::resource('home',HomeController::class);
}); */
Route::resource('home',HomeController::class);
Route::get("logout",[LogoutController::class,'flush'])->name('user.logout');

/* Route::get('/admin',function(){
   return view('layouts.admin');
}); */

Route::get('sidebar',function(){
  return view('layouts.admin');
});

Route::get('language',function(){
   return get_languages();
});