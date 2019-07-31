<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseholdApiController extends Controller
{
    public function create(Request $request)
    {

        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $type = 'household';
        $last_id = app('App\Http\Controllers\UserApiAccountController')->newUsernameAndPassword( $username, $password, $type);

        $newHousehold = new Household();
        $newHousehold->firstname = $request->input('firstname');
        $newHousehold->lastname = $request->input('lastname');
        $newHousehold->phone_number = $request->input('phone_number');
        $newHousehold->address = $request->input('address');
        $newHousehold->type = $request->input('type');
        $newHousehold->users_id = $last_id;


        $newHousehold->save();
        return response()->json($newHousehold);
    }

    public function show()
    {
        $Household = Household::all();
        return response()->json($Household);
    }

    public function showid($id)
    {
        $Household = Household::find($id);
        return response()->json($Household);
    }

    public function HouseholdUpdate(Request $request, $id)
    {
        $Household = Household::find($id);
        $Household->firstname = $request->input('firstname');
        $Household->lastname = $request->input('lastname');
        $Household->address = $request->input('address');
        $Household->phone_number = $request->input('phone_number');
        $Household->address = $request->input('address');
        $Household->type = $request->input('type');
        $Household->users_id = $request->input('users_id');
        $Household->sector_id = $request->input('sector_id');
        $Household->marital_status = $request->input('marital_status');
        $Household->number_of_children = $request->input('number_of_children');
        $Household->gender = $request->input('gender');
        $Household->bio = $request->input('bio');
        $Household->job_description = $request->input('job_description');

        $Household->save();
        return response()->json($Household);
    }
}
