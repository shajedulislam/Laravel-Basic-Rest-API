<?php

namespace App\Http\Controllers;

use App\PetOwnerUser;
use Illuminate\Http\Request;

class PetOwnerUserController extends Controller
{
    /**
     * Signup function for pet owners.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
                ],400);
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
                    ],201);  
                    
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
     * Signin for pet owners.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
            ],400);
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
