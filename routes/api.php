<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/petservicesignup','PetServiceUserController@signup');
Route::get('/petservicesignin','PetServiceUserController@signin');


Route::post('/petownersignup','PetOwnerUserController@signup');
Route::get('/petownersignin','PetOwnerUserController@signin');
