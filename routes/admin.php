<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function(){
    Route::resource('shipments',ShipmentController::class);
    Route::resource('company',CompanyController::class);
    Route::get('company/changestatus/{id}',[CompanyController::class,'ChangeStatus'])->name('company.status');
    Route::get('company/employee/{company_id}',[CompanyController::class,'getCompanyEmployee'])->name('company.employee');
    Route::resource('employee',EmployeeController::class);
    Route::get('employee/changestatus/{id}',[EmployeeController::class,'ChangeStatus'])->name('employee.status');
    Route::resource('home',HomeController::class);
    Route::resource('clients',ClientController::class);



});
/* Route::group(['middleware'=>'guest:admin',],function(){
   
      }); */
