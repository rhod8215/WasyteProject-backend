<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerApiController extends Controller
{
    //
    public function create(Request $request)
    {
        $newCustomer = new Customer();
        $newCustomer->firstname = $request->input('firstname');
        $newCustomer->lastname = $request->input('lastname');
        $newCustomer->phone_number = $request->input('phone_number');
        $newCustomer->address = $request->input('address');
        $newCustomer->type = $request->input('type');
        $newCustomer->users_id = $request->input('users_id');


        $newCustomer->save();
        return response()->json($newCustomer);
    }

    public function show()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    public function showid($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function customerUpdate(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->phone_number = $request->input('phone_number');
        $customer->address = $request->input('address');
        $customer->type = $request->input('type');
        $customer->users_id = $request->input('users_id');

        $customer->save();
        return response()->json($customer);
    }
}
