<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\UserAccount;

class AdminController extends Controller
{
    public function adminAdd(Request $request){

        $username = $request->input('username4');
        $password = Hash::make($request->input('password4'));
        $type = $request->input('new_admin_type');

        if($type == 'superAdmin'){
            $sector_id = NULL;
        }
        else{
            $sector_id = $request->input('admin_sector');
        }

        $last_id = app('App\Http\Controllers\UserAccountController')->newUsernameAndPassword( $username, $password, $type);
        $newadmin = new Admin();
        $newadmin->firstname = $request->input('firstname4');
        $newadmin->lastname = $request->input('lastname4');
        $newadmin->phone_number = $request->input('phone_number4');
        $newadmin->sector_id = $sector_id;
        $newadmin->users_id = $last_id;

        $newadmin->save();

        return $last_id;
    }

    public function viewInfo(Request $request){
        $id = $request->input('admin_id');

        $admin = DB::table('admin')
        ->join('users', 'users.id', 'admin.users_id')
        ->select('admin.id',
                 'admin.firstname as firstname',
                 'admin.lastname as lastname',
                 'admin.users_id',
                 'users.email',
                 'users.password',
                 'users.active_status')
        ->where('admin.id','=', $id)
        ->first();

        return json_encode($admin);

    }

    public function adminShowByIdToEdit(Request $request){
        $id = $request->input('admin_id');

        $admin = DB::table('admin')
        ->join('users', 'users.id', 'admin.users_id')
        ->join('company_and_lgu', 'company_and_lgu.id', 'admin.sector_id')
        ->select('admin.id',
                 'admin.firstname as firstname',
                 'admin.lastname as lastname',
                 'admin.users_id',
                 'users.email',
                 'users.password',
                 'users.type',
                 'admin.phone_number',
                 'company_and_lgu.sector_name')
        ->where('admin.id','=', $id)
        ->first();

        return json_encode($admin);
    }


    public function adminEdit(Request $request){

        $id = $request->input('admin_id');
        $users_id = $request->input('users_id');

        $admin = Admin::find($id);

        $admin->firstname = $request->input('firstname');
        $admin->lastname = $request->input('lastname');
        $admin->phone_number = $request->input('edit_phone_number');
        $admin->sector_id = $request->input('edit_admin_sector');

        $user = UserAccount::find($users_id);

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('edit_admin_type');

        $user->save();
        $admin->save();
    }
}
