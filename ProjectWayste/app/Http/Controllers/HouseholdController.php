<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gate;

class HouseholdController extends Controller
{
    public function getAllBusinessName(){
        $businessArray = DB::table('company_and_lgu')->orderBy('sector_name', 'asc')->get();

        return $businessArray;
    }

    public function index(){

        // if(!Gate::allows('isSuperAdmin')){
        //     abort(404, 'You are not allowed to view this');
        // }

        //$households = household::all();
        $households = DB::table('household')
        ->join('users', 'users.id', 'household.users_id')
        ->select('household.id',
                 'household.firstname',
                 'household.lastname',
                 'household.address',
                 'household.phone_number',
                 'household.type',
                 'household.users_id',
                 'users.active_status',
                 'users.email',
                 'users.created_at')
        ->get();

        $collectors = DB::table('collector')
        ->join('users', 'users.id', 'collector.users_id')
        ->select('collector.id',
                 'collector.firstname',
                 'collector.lastname',
                 'collector.address',
                 'collector.phone_number',
                 'collector.type',
                 'collector.users_id',
                 'users.active_status',
                 'users.email',
                 'users.created_at',
                 'collector.sign_up_status')
        ->get();

        $admin = DB::table('admin')
        ->join('users', 'users.id', 'admin.users_id')
        ->join('company_and_lgu', 'company_and_lgu.id', 'admin.sector_id')
        ->select('admin.id',
                 'admin.firstname',
                 'admin.lastname',
                 'admin.phone_number',
                 'admin.users_id',
                 'users.active_status',
                 'users.email',
                 'users.created_at',
                 'users.type',
                 'company_and_lgu.sector_name')
        ->get();

        $allBusinessName = $this->getAllBusinessName();

        return view('admin.dashboardUsers', compact('households', 'collectors', 'admin', 'allBusinessName'));
    }

    public function householdAdd(Request $request){
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $type = 'household';
        $last_id = app('App\Http\Controllers\UserAccountController')->newUsernameAndPassword( $username, $password, $type);

        $newHousehold = new Household();
        $newHousehold->firstname = $request->input('firstname');
        $newHousehold->lastname = $request->input('lastname');
        $newHousehold->phone_number = $request->input('phone_number');
        $newHousehold->address = $request->input('address');
        $newHousehold->type = $request->input('type');
        $newHousehold->users_id = $last_id;

        $newHousehold->save();
    }

    public function householdShowByIdToEdit(Request $request){
        $id = $request->input('household_id');
        $household = DB::table('household')
        ->join('users', 'users.id', 'household.users_id')
        ->select('household.id',
                 'household.firstname as firstname',
                 'household.lastname as lastname',
                 'household.address',
                 'household.phone_number',
                 'household.type',
                 'household.users_id',
                 'users.email',
                 'users.password')
        ->where('household.id','=', $id)
        ->first();

        return json_encode($household);
    }

    public function householdEdit(Request $request){

        $id = $request->input('household_id');
        $users_id = $request->input('users_id');

        $household = Household::find($id);

        $household->firstname = $request->input('firstname');
        $household->lastname = $request->input('lastname');
        $household->phone_number = $request->input('phone_number');
        $household->address = $request->input('address');
        $household->type = $request->input('type');

        $user = UserAccount::find($users_id);

        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
        $household->save();
    }

    public function viewInfo(Request $request){
        $id = $request->input('household_id');

        $household = DB::table('household')
        ->join('users', 'users.id', 'household.users_id')
        ->select('household.id',
                 'household.firstname as firstname',
                 'household.lastname as lastname',
                 'household.address',
                 'household.phone_number',
                 'household.type',
                 'household.users_id',
                 'users.email',
                 'users.password',
                 'users.active_status')
        ->where('household.id','=', $id)
        ->first();

        return json_encode($household);

    }
}
