<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAccount;
use Illuminate\Support\Facades\DB;

class UserApiController extends Controller
{
    ///
    public function newUsernameAndPassword($username, $password, $type){
        $new = new UserAccount();
        $new->email = $username;
        $new->password = $password;
        $new->type = $type;

        $new->save();
        $last_id = $new->id;

        return $last_id;
    }

    public function create(Request $request)
    {
        $newUser = new UserAccount();
        $newUser->email = $request->input('email');
        $newUser->password = $request->input('password');
        $newUser->type = $request->input('type');

        $newUser->save();
        return response()->json($newUser);
    }

    public function show()
    {
        $users = UserAccount::all();
        $users = json_encode($users);
        return response($users);
        //return response()->json($users);
        //return response($users)->header('Content-Type', 'application/json');
    }

    public function showid($id)
    {
        $user = UserAccount::find($id);
        return response()->json($user);
    }

    public function userUpdate(Request $request, $id)
    {
        $user = UserAccount::find($id);
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->type = $request->input('type');

        $user->save();
        return response()->json($user);
    }

    public function showByUsernamePassword($email, $password)
    {
        $user = DB::table('users')
        ->select('users.*')
        ->where('email', '=', $email)
        ->where('password', '=',  $password)
        ->get();
        return response()->json($user);
    }

    public function postByUsernamePassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')
        ->select('users.*')
        ->where('email', '=', $email)
        ->where('password', '=',  $password)
        ->get();
        $user = json_encode($user);
        return response($user);
        //return response()->json($user);
        //return response($user)->header('Content-Type', 'application/json')
    }
}
// ->whereColumn([
        //     ['email', '=', $email],
        //     ['password', '=', $password]
        // ])
