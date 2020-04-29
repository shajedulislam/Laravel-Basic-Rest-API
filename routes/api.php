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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Pet Service
Route::post('/petservicesignup','PetServiceUserController@signup');
Route::get('/petservicesignin','PetServiceUserController@signin');


//Pet Owner
Route::post('/petownersignup','PetOwnerUserController@signup');
Route::get('/petownersignin','PetOwnerUserController@signin');
