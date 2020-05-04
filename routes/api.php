<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//petservice
Route::post('/petservicesignup', 'PetServiceUserController@signup');
Route::post('/petservicesignin', 'PetServiceUserController@signin');
Route::post('/petservicesetlocation', 'PetServiceUserController@setLocation');


//petowner
Route::post('/petownersignup', 'PetOwnerUserController@signup');
Route::post('/petownersignin', 'PetOwnerUserController@signin');
Route::post('/petownersetlocation', 'PetOwnerUserController@setLocation');
