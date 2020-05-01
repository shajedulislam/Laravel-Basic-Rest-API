<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/petservicesignup','PetServiceUserController@signup');
Route::post('/petservicesignin','PetServiceUserController@signin');

Route::post('/petownersignup','PetOwnerUserController@signup');
Route::post('/petownersignin','PetOwnerUserController@signin');
