<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\UserAccount;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function login(Request $request){
        if(Auth::attempt([
            'email' =>  $request->email,
            'password' => $request->password
        ])){
            $user = UserAccount::where('email',$request->email)->first();
            if($user->type == 'superAdmin'){
                return redirect()->route('dashboard');
            }
            elseif($user->type == 'admin'){
                // return redirect()->route('company.admin.dashboard');
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('login');
            }
        }
        redirect()->route('login');
        //redirect()->back();
        //return route('login');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
