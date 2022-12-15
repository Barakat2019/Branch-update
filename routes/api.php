<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Required and optional paramter,use Regular Expression in route
Route::get('/users/{name?}',function($name=null)
{
    return 'Hi '.$name;
});

Route::get('products/{id?}', function ($id=null) {
    return 'Product id is'.$id;
});


Route::match(['get', 'post'], '/user/profile', function (Request $request) {
    return 'Request method '.$request->method();
});

Route::any('/posts',function(Request $req){
    return 'Requested Method '.$req->method();
});



