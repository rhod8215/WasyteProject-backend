<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collector;
class CollectorApiController extends Controller
{

    public function create(Request $request)
    {
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $type = 'household';
        $last_id = app('App\Http\Controllers\UserApiAccountController')->newUsernameAndPassword( $username, $password, $type);

        $newCollector = new Collector();
        $newCollector->firstname = $request->input('firstname');
        $newCollector->lastname = $request->input('lastname');
        $newCollector->phone_number = $request->input('phone_number');
        $newCollector->address = $request->input('address');
        $newCollector->earnings = $request->input('earnings');
        $newCollector->type = $request->input('type');
        $newCollector->active_request = $request->input('active_request');
        $newCollector->users_id = $last_id;


        $newCollector->save();
        return response()->json($newCollector);
    }

    public function show()
    {
        $collector = Collector::all();
        return response()->json($collector);
    }

    public function showid($id)
    {
        $collector = Collector::find($id);
        return response()->json($collector);
    }

    public function collectorUpdate(Request $request, $id)
    {
        $collector = Collector::find($id);
        $collector->firstname = $request->input('firstname');
        $collector->lastname = $request->input('lastname');
        $collector->phone_number = $request->input('phone_number');
        $collector->address = $request->input('address');
        //$collector->earnings = $request->input('earnings');
        //$collector->type = $request->input('type');
        $collector->active_request = $request->input('active_request');
        $collector->users_id = $request->input('users_id');
        $collector->drivers_license_img = $request->input('drivers_license_img');
        $collector->marital_status = $request->input('marital_status');
        $collector->number_of_children = $request->input('number_of_children');
        $collector->gender = $request->input('gender');
        $collector->bio = $request->input('bio');
        $collector->job_description = $request->input('job_description');

        $collector->save();
        return response()->json($collector);
    }

    public function collectorUpdateActiveStatus(Request $request, $id)
    {
        $collector = Collector::find($id);
        $collector->active_status = $request->input('active_status');

        $collector->save();
        return response()->json($collector);
    }
}
