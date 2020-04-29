<?php

namespace App\Http\Controllers;

use App\POsigning;
use App\POprofile;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class POsigningController extends Controller
{
    /**
     * Signup function for pet owners.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {

        if($request->input('email') != null && $request->input('password') !=null && $request->input('first_name') !=null && $request->input('last_name') !=null && $request->input('mobile_no') !=null)
        {
            $poSigningGet = POsigning::all();

            $userCount = count($poSigningGet);
    
            $user_exist = false;
    
            foreach($poSigningGet as $data)
            {
    
                if($data->email == $request->input('email') || $data->mobile_no == $request->input('mobile_no'))
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
                $poSigning = new POsigning();
                $poProfile = new POprofile();
    
                $user_id_generated = null;
    
                if($userCount==0)
                {
                    $user_id_generated = date("Y")."1";
                }
                else
                {
                    $last_row = POsigning::latest()->first();
                    $user_id_generated = $last_row->user_id+1;
                }
                
                $poSigning->user_id = $user_id_generated;
                $poSigning->email = $request->input('email');
                $poSigning->mobile_no = $request->input('mobile_no');
                $poSigning->password = $request->input('password');
                
                $poProfile->user_id = $user_id_generated;
                $poProfile->first_name = $request->input('first_name');
                $poProfile->last_name = $request->input('last_name');
                $poProfile->mobile_no = $request->input('mobile_no');
                $poProfile->latitude = $request->input('latitude');
                $poProfile->longitude = $request->input('longitude');
                $poProfile->email = $request->input('email');
                $poProfile->address = $request->input('address');
                   
                if($poSigning->save())
                {
                    if($poProfile->save())
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
                            "message" => "Account created but something went wrong while creating a profile",
                        ],500);
                    }  
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
                "message" => "Incomplete data in reuqest body"
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
        $poSigningGet = POsigning::all();

        $user_exist = false;
        $password_wrong = false;

        foreach($poSigningGet as $data)
        {
            if($data->email == $request->input('email') || $data->mobile_no == $request->input('mobile_no'))
            {
                $user_exist = true;
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
