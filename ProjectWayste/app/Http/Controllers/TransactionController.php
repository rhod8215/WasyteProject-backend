<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Requests;

class TransactionController extends Controller
{
    //
    public function index(){
        $completedTransactions = DB::table('requests')
        ->join('waste_type', 'waste_type.id', 'requests.waste_type_id')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->select('waste_type.waste_name',
                 'household.firstname AS household_first_name',
                 'household.lastname AS household_last_name',
                 'collector.firstname AS collector_first_name',
                 'collector.lastname AS collector_last_name',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.weigh',
                 'requests.time_requested',
                 'requests.time_accepted',
                 'requests.time_completed')
        ->where('is_completed', '=', '1')
        ->get();

        $uncompletedTransactions = DB::table('requests')
        ->join('waste_type', 'waste_type.id', 'requests.waste_type_id')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->select('waste_type.waste_name',
                 'household.firstname AS household_first_name',
                 'household.lastname AS household_last_name',
                 'collector.firstname AS collector_first_name',
                 'collector.lastname AS collector_last_name',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.weigh',
                 'requests.time_requested',
                 'requests.time_accepted',
                 'requests.time_completed')
        ->where('is_completed', '=', '0')
        ->get();

        return view('admin.dashboardRequests', compact('uncompletedTransactions', 'completedTransactions'));

    }
}
