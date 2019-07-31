<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAccount;
use App\Collector;
use App\Requests;
use Illuminate\Support\Facades\DB;

class JoinTblApiController extends Controller
{
    //
    public function showCollectorUserRequestAll()
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->get();

        return response()->json($requests);
    }

    public function showCollectorUserRequestByHouseholdId($id)
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('users.id','=', $id)
        ->get();

        return response()->json($requests);
    }

    public function showCollectorUserRequestByCollectorId($id)
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('collector.id','=', $id)
        ->get();

        return response()->json($requests);
    }

    public function showCollectorUserRequestByRequestId($id)
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('collector.id','=', $id)
        ->get();

        return response()->json($requests);
    }

    public function showAllCompletedRequests()
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('requests.is_completed','=', '1')
        ->get();

        return response()->json($requests);
    }

    public function showAllUncompletedRequests()
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('requests.is_completed','=', '0')
        ->get();

        return response()->json($requests);
    }

    public function showAllAcceptedRequests()
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('requests.is_accepted','=', '1')
        ->get();

        return response()->json($requests);
    }

    public function showAllUnacceptedRequests()
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('requests.is_accepted','=', '0')
        ->get();

        return response()->json($requests);
    }

    public function showAllAcceptedRequestsOfCollector($id)
    {
        $requests = DB::table('requests')
        ->join('collector', 'collector.id', 'requests.collected_by')
        ->join('household', 'household.id', 'requests.requested_by')
        ->join('users', 'users.id', 'household.users_id')
        ->select('requests.requested_by as  requested_by_ID',
                 'household.firstname as requested_by_FIRSTNAME',
                 'household.lastname as requested_by_LASTNAME',
                 'household.phone_number as household_phone_number',
                 'requests.collected_by as collected_by_ID',
                 'collector.firstname as collected_by_FIRSTNAME',
                 'collector.lastname as collected_by_LASTNAME',
                 'requests.collected_at',
                 'requests.payment',
                 'requests.is_accepted',
                 'requests.is_completed' )
        ->where('requests.is_accepted','=', '1')
        ->where('collector.id','=', $id)
        ->get();

        return response()->json($requests);
    }


}
