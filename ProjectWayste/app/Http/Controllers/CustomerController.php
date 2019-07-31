<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\UserAccount;

class CustomerController extends Controller
{
    public function index(){
        //$customers = Customer::all();
        $customers = DB::table('customer')
        ->join('users', 'users.id', 'customer.users_id')
        ->select('customer.id',
                 'customer.firstname',
                 'customer.lastname',
                 'customer.address',
                 'customer.phone_number',
                 'customer.type',
                 'customer.users_id',
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
                 'users.created_at')
        ->get();

        $admin = DB::table('admin')
        ->join('users', 'users.id', 'admin.users_id')
        ->select('admin.id',
                 'admin.firstname',
                 'admin.lastname',
                 'admin.phone_number',
                 'admin.users_id',
                 'users.active_status',
                 'users.email',
                 'users.created_at')
        ->get();

        return view('admin.dashboardUsers', compact('customers', 'collectors', 'admin'));
    }

    public function customerAdd(Request $request){
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $type = 'customer';
        $last_id = app('App\Http\Controllers\UserAccountController')->newUsernameAndPassword( $username, $password, $type);

        $newCustomer = new Customer();
        $newCustomer->firstname = $request->input('firstname');
        $newCustomer->lastname = $request->input('lastname');
        $newCustomer->phone_number = $request->input('phone_number');
        $newCustomer->address = $request->input('address');
        $newCustomer->type = $request->input('type');
        $newCustomer->users_id = $last_id;

        $newCustomer->save();
    }

    public function customerShowByIdToEdit(Request $request){
        $id = $request->input('customer_id');
        $customer = DB::table('customer')
        ->join('users', 'users.id', 'customer.users_id')
        ->select('customer.id',
                 'customer.firstname as firstname',
                 'customer.lastname as lastname',
                 'customer.address',
                 'customer.phone_number',
                 'customer.type',
                 'customer.users_id',
                 'users.email',
                 'users.password')
        ->where('customer.id','=', $id)
        ->first();

        return json_encode($customer);
    }

    public function customerEdit(Request $request){

        $id = $request->input('customer_id');
        $users_id = $request->input('users_id');

        $customer = Customer::find($id);

        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->phone_number = $request->input('phone_number');
        $customer->address = $request->input('address');
        $customer->type = $request->input('type');

        $user = UserAccount::find($users_id);

        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
        $customer->save();
    }

    public function viewInfo(Request $request){
        $id = $request->input('customer_id');

        $customer = DB::table('customer')
        ->join('users', 'users.id', 'customer.users_id')
        ->select('customer.id',
                 'customer.firstname as firstname',
                 'customer.lastname as lastname',
                 'customer.address',
                 'customer.phone_number',
                 'customer.type',
                 'customer.users_id',
                 'users.email',
                 'users.password',
                 'users.active_status')
        ->where('customer.id','=', $id)
        ->first();

        return json_encode($customer);

    }

    // public function viewInfo(Request $request){
    //     $id = $request->input('customer_id');
    //     $output = '';
    //     $customer = DB::table('customer')
    //     ->join('users', 'users.id', 'customer.users_id')
    //     ->select('customer.id',
    //              'customer.firstname as firstname',
    //              'customer.lastname as lastname',
    //              'customer.address',
    //              'customer.phone_number',
    //              'customer.type',
    //              'customer.users_id',
    //              'users.email',
    //              'users.password')
    //     ->where('customer.id','=', $id)
    //     ->first();

    //     $output .= '
    //         <div class="table-responsive">
    //             <table class="table table-bordered">';
    //     foreach($customers as $row2)
    //         $output .= '
    //         <tr>
    //             <th scope="row"> Name</th>
    //             <td>'.$row2['firstname'].', '.$row2['lastname'].'</td>
    //         </tr>
    //         <tr>
    //           <th scope="row"> Type</th>
    //           <td>'.$row2['type'].'</td>
    //         </tr>
    //         <tr>
    //           <th scope="row"> Status</th>
    //         <td>'.$row2['active_status'].'</td>
    //         </tr>

    //         <tr>
    //           <th scope="row"> Username</th>
    //           <td>'.$row2['email'].'</td>
    //         </tr>
    //         <tr>
    //           <th scope="row"> Password</th>
    //           <td>'.$row2['password'].'</td>
    //         </tr>

    //         ';

    //   $output .= "</table></div>";

    // echo $output;
    // }
}
