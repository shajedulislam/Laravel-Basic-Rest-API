<?php

namespace App\Http\Controllers;

use App\PetOwnerUser;
use Illuminate\Http\Request;


/**
 * @group Pet Owner User
 * 
 * APIs for pet owner user signup and signin
 */
class PetOwnerUserController extends Controller
{
     /**
     * Signup
     * 
     * 
     * @bodyParam first_name string required Example: Shajedul
     * @bodyParam last_name string required Example: Islam
     * @bodyParam email string required Example: info@shajedulislam.dev
     * @bodyParam mobile_number string required Example: 01628734916
     * @bodyParam password string required Example: 12345678
     * @bodyParam latitude string Example: 33.147984
     * @bodyParam longitude string Example: 73.753670
     * @bodyParam address string Example: 15 A, Road-8, Banani, Dhaka, Bangladesh
     *
     *
     * @response 200
     * {
     *      "success": true,
     *      "message": "Account created"
     * }
     * 
     * @response 200
     * {
     *      "success": false,
     *      "message": "User exist"
     * }
     * 
     * @response 500
     * {
     *      "success": false,
     *      "message": "Something went wrong"
     * }
     * 
     * @response 400
     * {
     *      "success": false,
     *      "message": "Incomplete data in request body"
     * }
     * 
     */
    public function signup(Request $request)
    {

        if($request->input('email') != null && $request->input('mobile_number') !=null && $request->input('password') !=null && $request->input('first_name') !=null && $request->input('last_name') !=null )
        {
            $petOwnerUser = PetOwnerUser::all();

            $userCount = count($petOwnerUser);
    
            $user_exist = false;
    
            foreach($petOwnerUser as $data)
            {
    
                if($data->email == $request->input('email') || $data->mobile_number == $request->input('mobile_number'))
                {
                    $user_exist = true;
                    break;
                }
            }

            if($user_exist == true)
            {
                return response()->json([
                    "success" => false,
                    "message" => "User exist"
                ],200);
            }
            else
            {
                $petOwnerUser = new PetOwnerUser();
               
    
                $user_id_generated = null;
    
                if($userCount==0)
                {
                    $user_id_generated = date("Y")."1";
                }
                else
                {
                    $last_row = PetOwnerUser::latest()->first();
                    $user_id_generated = $last_row->user_id+1;
                }
                
                $petOwnerUser->user_id = $user_id_generated;
                $petOwnerUser->email = $request->input('email');
                $petOwnerUser->mobile_number = $request->input('mobile_number');
                $petOwnerUser->password = $request->input('password');
                $petOwnerUser->first_name = $request->input('first_name');
                $petOwnerUser->last_name = $request->input('last_name');
                $petOwnerUser->latitude = $request->input('latitude');
                $petOwnerUser->longitude = $request->input('longitude');
                $petOwnerUser->address = $request->input('address');
                   
                if($petOwnerUser->save())
                {
                        
                    return response()->json([
                        "success" => true,
                        "message" => "Account created"
                    ],200);  
                    
                }
                else
                {
                    return response()->json([
                        "success" => false,
                        "message" => "Something went wrong",
                    ],500);
                }
            }
        }
        else
        {
            return response()->json([
                "success" => false,
                "message" => "Incomplete data in request body"
            ],400);
        }    
    }

     /**
     * Signin
     * 
     * 
     * @bodyParam email string it is optional only if you use mobile_number Example: info@shajedulislam.dev
     * @bodyParam mobile_number string it is optional only if you use email. Example: 01628734916
     * @bodyParam password string required Example: 12345678
     * 
     * 
     * @response 200
     * {
     *      "success": true,
     *      "user_id": "1234"
     * }
     * 
     * @response 401
     * {
     *      "success": false,
     *      "message": "Wrong password"
     * }
     * 
     * @response 404
     * {
     *      "success": false,
     *      "message": "User not found"
     * }
     * 
     */
    public function signin(Request $request)
    {
        $petOwnerUser = PetOwnerUser::all();

        $user_exist = false;
        $password_wrong = false;
        $signed_user_data = null;

        foreach($petOwnerUser as $data)
        {
            if($data->email == $request->input('email') || $data->mobile_number == $request->input('mobile_number'))
            {
                $user_exist = true;
                $signed_user_data = $data;
                if($data->password != $request->input('password'))
                {
                    $password_wrong = true;
                    break;
                }   
            }
        }

        if($user_exist == true &&  $password_wrong == false)
        {
            //$access_token_generated = bin2hex(random_bytes(64));

            return response()->json([
                "success" => true,
                "user_id" => $signed_user_data->user_id               
            ],200);
        }
        else if($user_exist == true &&  $password_wrong == true)
        {
            return response()->json([
                "success" => false,
                "message" => "Wrong password"
            ],401);
        }
        else
        {
            return response()->json([
                "success" => false,
                "message" => "User not found"               
            ],404);
        }
    }
}
