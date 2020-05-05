<?php

namespace App\Http\Controllers;

use App\PetProfile;
use Illuminate\Http\Request;

/**
 * @group PET PROFILE
 */
class PetProfileController extends Controller
{
    /**
     * CREATE PET PROFILE
     * 
     * 
     * @bodyParam user_id string required Example: 12345
     * @bodyParam pet_id string required Example: 12345
     * @bodyParam type string required Example: Cat
     * @bodyParam name string required Example: Dobby
     * @bodyParam gender string required Example: Male
     * @bodyParam breed string required Example: Asian
     * @bodyParam birthday string required Example: 01-01-2020
     * @bodyParam neutered_spayed boolean required Example: true
     * @bodyParam notes string Example: Any notes can be written
     *
     *
     * @response 200
     * {
     *      "success": true,
     *      "message": "Profile created"
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
    public function create(Request $request)
    {

        if ($request->input('user_id') != null && $request->input('pet_id') != null && $request->input('name') != null && $request->input('gender') != null) {
            $pets = PetProfile::all();

            $userCount = count($pets);

            $petProfile = new PetProfile();

            $pet_id_generated = null;

            if ($userCount == 0) {
                $pet_id_generated = date("Y") . "1";
            } else {
                $last_row = PetProfile::latest()->first();
                $pet_id_generated = $last_row->pet_id + 1;
            }

            $petProfile->user_id = $request->input('user_id');
            $petProfile->pet_id = $pet_id_generated;
            $petProfile->type = $request->input('type');
            $petProfile->name = $request->input('name');
            $petProfile->gender = $request->input('gender');
            $petProfile->password = $request->input('breed');
            $petProfile->first_name = $request->input('birthday');
            $petProfile->last_name = $request->input('neutered_spayed');
            $petProfile->registration_number = $request->input('color');
            $petProfile->nid_number = $request->input('notes');

            if ($petProfile->save()) {

                return response()->json([
                    "success" => true,
                    "message" => "Profile created"
                ], 200);
            } else {
                return response()->json([
                    "success" => false,
                    "message" => "Something went wrong",
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
