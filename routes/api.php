<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//pet service
Route::post('/petservicesignup', 'PetServiceController@signup');
Route::post('/petservicesignin', 'PetServiceController@signin');
Route::post('/petservicesetlocation', 'PetServiceController@setLocation');


//pet owner
Route::post('/petownersignup', 'PetOwnerController@signup');
Route::post('/petownersignin', 'PetOwnerController@signin');
Route::post('/petownersetlocation', 'PetOwnerController@setLocation');


//pet profile
Route::post('/createpetprofile', 'PetProfileController@create');
