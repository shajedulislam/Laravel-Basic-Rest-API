<?php

namespace App\Http\Controllers;

use App\PetServiceUser;
use Illuminate\Http\Request;

class PetServiceUserController extends Controller
{
   /**
     * Signup function for pet owners.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {

        if($request->input('email') != null && $request->input('mobile_number') !=null && $request->input('password') !=null && $request->input('registration_number') != null && $request->input('nid_number') != null && $request->input('first_name') !=null && $request->input('last_name') !=null )
        {
            $petServiceUser = PetServiceUser::all();

            $userCount = count($petServiceUser);
    
            $user_exist = false;
    
            foreach($petServiceUser as $data)
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
                $petServiceUser = new PetServiceUser();
               
    
                $user_id_generated = null;
    
                if($userCount==0)
                {
                    $user_id_generated = date("Y")."1";
                }
                else
                {
                    $last_row = PetServiceUser::latest()->first();
                    $user_id_generated = $last_row->user_id+1;
                }
                
                $petServiceUser->user_id = $user_id_generated;
                $petServiceUser->service_type = $request->input('service_type');
                $petServiceUser->email = $request->input('email');
                $petServiceUser->mobile_number = $request->input('mobile_number');
                $petServiceUser->password = $request->input('password');
                $petServiceUser->first_name = $request->input('first_name');
                $petServiceUser->last_name = $request->input('last_name');
                $petServiceUser->registration_number = $request->input('registration_number');
                $petServiceUser->nid_number = $request->input('nid_number');
                $petServiceUser->latitude = $request->input('latitude');
                $petServiceUser->longitude = $request->input('longitude');
                $petServiceUser->address = $request->input('address');
                   
                if($petServiceUser->save())
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
        $petServiceUser = PetServiceUser::all();

        $user_exist = false;
        $password_wrong = false;
        $signed_user_data = null;

        foreach($petServiceUser as $data)
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
                "user_id" => $signed_user_data->user_id,
                "service_type" => $signed_user_data->service_type                 
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
