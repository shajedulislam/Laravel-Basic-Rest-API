<?php

namespace App\Http\Controllers;

use App\PetService;
use Illuminate\Http\Request;


/**
 * @group PET SERVICE
 */
class PetServiceController extends Controller
{
    /**
     * SIGN UP
     * 
     * 
     * @bodyParam service_type string required Example: vet
     * @bodyParam first_name string required Example: Shajedul
     * @bodyParam last_name string required Example: Islam
     * @bodyParam email string required Example: info@shajedulislam.dev
     * @bodyParam mobile_number string required Example: 01628734916
     * @bodyParam password string required Example: 12345678
     * @bodyParam registration_number string required Example: 123456
     * @bodyParam nid_number string required Example: 199412345678
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

        if ($request->input('email') != null && $request->input('mobile_number') != null && $request->input('password') != null && $request->input('registration_number') != null && $request->input('nid_number') != null && $request->input('first_name') != null && $request->input('last_name') != null) {
            $petServiceUser = PetService::all();

            $userCount = count($petServiceUser);

            $user_exist = false;

            foreach ($petServiceUser as $data) {

                if ($data->email == $request->input('email') || $data->mobile_number == $request->input('mobile_number')) {
                    $user_exist = true;
                    break;
                }
            }

            if ($user_exist == true) {
                return response()->json([
                    "success" => false,
                    "message" => "User exist"
                ], 200);
            } else {
                $petServiceUser = new PetService();


                $user_id_generated = null;

                if ($userCount == 0) {
                    $user_id_generated = date("Y") . "1";
                } else {
                    $last_row = PetService::latest()->first();
                    $user_id_generated = $last_row->user_id + 1;
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

                if ($petServiceUser->save()) {

                    return response()->json([
                        "success" => true,
                        "message" => "Account created"
                    ], 200);
                } else {
                    return response()->json([
                        "success" => false,
                        "message" => "Something went wrong",
                    ], 500);
                }
            }
        } else {
            return response()->json([
                "success" => false,
                "message" => "Incomplete data in request body"
            ], 400);
        }
    }

    /**
     * SIGN IN
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
     *      "user_id": "1234",
     *      "service_type" : "vet"
     * }
     * 
     * @response 401
     * {
     *      "success": false,
     *      "message": "Wrong password"
     * }
     * 
     * @response 200
     * {
     *      "success": false,
     *      "message": "User not found"
     * }
     * 
     */
    public function signin(Request $request)
    {
        $petServiceUser = PetService::all();

        $user_exist = false;
        $password_wrong = false;
        $signed_user_data = null;

        foreach ($petServiceUser as $data) {
            if ($data->email == $request->input('email') || $data->mobile_number == $request->input('mobile_number')) {
                $user_exist = true;
                $signed_user_data = $data;
                if ($data->password != $request->input('password')) {
                    $password_wrong = true;
                    break;
                }
            }
        }

        if ($user_exist == true &&  $password_wrong == false) {
            //$access_token_generated = bin2hex(random_bytes(64));

            return response()->json([
                "success" => true,
                "user_id" => $signed_user_data->user_id,
                "service_type" => $signed_user_data->service_type
            ], 200);
        } else if ($user_exist == true &&  $password_wrong == true) {
            return response()->json([
                "success" => false,
                "message" => "Wrong password"
            ], 401);
        } else {
            return response()->json([
                "success" => false,
                "message" => "User not found"
            ], 200);
        }
    }


    /**
     * SET USER LOCATION
     * 
     * 
     * @bodyParam user_id string required Example: Shajedul
     * @bodyParam latitude string required Example: 23.12345
     * @bodyParam longitude string required Example: 73.12345
     *
     *
     * @response 200
     * {
     *      "success": true,
     *      "message": "Location saved"
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
    public function setLocation(Request $request)
    {
        if ($request->input('user_id') != null && $request->input('latitude') != null && $request->input('longitude') != null) {
            $row = PetService::where('user_id', $request->input('user_id'))->update(['latitude' => $request->input('latitude'), 'longitude' => $request->input('longitude')]);

            if ($row > 0) {
                return response()->json([
                    "success" => true,
                    "message" => "Location saved"
                ], 200);
            } else {
                return response()->json([
                    "success" => false,
                    "message" => "Something went wrong"
                ], 500);
            }
        } else {
            return response()->json([
                "success" => false,
                "message" => "Incomplete data in request body"
            ], 400);
        }
    }
}
