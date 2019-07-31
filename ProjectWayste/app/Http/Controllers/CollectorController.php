<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Collector;
use App\UserAccount;

class CollectorController extends Controller
{
    public function collectorAdd(Request $request){

        $username = $request->input('username3');
        $password = Hash::make($request->input('password3'));
        $type = 'collector';
        $last_id = app('App\Http\Controllers\UserAccountController')->newUsernameAndPassword( $username, $password, $type);

        $newCollector = new Collector();
        $newCollector->firstname = $request->input('firstname3');
        $newCollector->lastname = $request->input('lastname3');
        $newCollector->phone_number = $request->input('phone_number3');
        $newCollector->address = $request->input('address3');
        $newCollector->type = $request->input('type3');
        $newCollector->sector_id = $request->input('sector3');
        $newCollector->users_id = $last_id;

        $newCollector->save();
    }

    public function viewInfo(Request $request){
        $id = $request->input('collector_id');

        $collector = DB::table('collector')
        ->join('users', 'users.id', 'collector.users_id')
        ->join('company_and_lgu', 'company_and_lgu.id', 'collector.sector_id')
        ->select('collector.id',
                 'collector.firstname as firstname',
                 'collector.lastname as lastname',
                 'collector.address',
                 'collector.phone_number',
                 'collector.type',
                 'collector.users_id',
                 'users.email',
                 'users.password',
                 'users.active_status',
                 'company_and_lgu.sector_name')
        ->where('collector.id','=', $id)
        ->first();

        return json_encode($collector);

    }

    public function collectorShowByIdToEdit(Request $request){
        $id = $request->input('collector_id');

        $collector = DB::table('collector')
        ->join('users', 'users.id', 'collector.users_id')
        ->join('company_and_lgu', 'company_and_lgu.id', 'collector.sector_id')
        ->select('collector.id',
                 'collector.firstname as firstname',
                 'collector.lastname as lastname',
                 'collector.address',
                 'collector.phone_number',
                 'collector.type',
                 'collector.users_id',
                 'users.email',
                 'users.password',
                 'company_and_lgu.sector_name')
        ->where('collector.id','=', $id)
        ->first();

        return json_encode($collector);
    }

    public function collectorEdit(Request $request){

        $id = $request->input('collector_id');
        $users_id = $request->input('users_id');

        $collector = Collector::find($id);

        $collector->firstname = $request->input('firstname');
        $collector->lastname = $request->input('lastname');
        $collector->phone_number = $request->input('phone_number');
        $collector->address = $request->input('address');
        $collector->type = $request->input('type');
        $collector->sector_id = $request->input('edit_coll_sector');

        $user = UserAccount::find($users_id);

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password_coll'));

        $user->save();
        $collector->save();
    }
}
