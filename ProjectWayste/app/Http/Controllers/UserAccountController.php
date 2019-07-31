<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAccount;

class UserAccountController extends Controller
{
    public function newUsernameAndPassword($username, $password, $type){
        $new = new UserAccount();
        $new->email = $username;
        $new->password = $password;
        $new->type = $type;

        $new->save();
        $last_id = $new->id;

        return $last_id;
        //return response()->json(array('last_insert_id' => $new->id));
        // return response()->json(array('last_insert_id' => $data->id));
    }
    public function activateUser(Request $request){

        $users_id = $request->input('idToActivate');
        $user = UserAccount::find($users_id);

        $user->active_status = 'active';

        $user->save();
    }

    public function deactivateUser(Request $request){

        $users_id = $request->input('idToDeactivate');
        $user = UserAccount::find($users_id);

        $user->active_status = 'inactive';

        $user->save();
    }
}
