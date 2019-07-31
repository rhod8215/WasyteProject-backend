<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests;

class RequestsApiController extends Controller
{
    //
    public function create(Request $request)
    {
        $newRequest = new Requests();
        $newRequest->request_by = $request->input('requested_by');
        $newRequest->collected_by = $request->input('collected_by');
        $newRequest->collected_at = $request->input('collected_at');
        $newRequest->payment = $request->input('payment');
        $newRequest->is_accepted = $request->input('is_accepted');
        $newRequest->is_completed = $request->input('is_completed');

        $newRequest->save();
        return response()->json($newRequest);
    }

    public function show()
    {
        $requests = Requests::all();
        return response()->json($requests);
    }

    public function showid($id)
    {
        $requests = Requests::find($id);
        return response()->json($requests);
    }

    public function requestUpdate(Request $request, $id)
    {
        $requests = Requests::find($id);
        $requests->request_by = $request->input('requested_by');
        $requests->collected_by = $request->input('collected_by');
        $requests->collected_at = $request->input('collected_at');
        $requests->payment = $request->input('payment');
        $requests->is_accepted = $request->input('is_accepted');
        $requests->is_completed = $request->input('is_completed');

        $requests->save();
        return response()->json($requests);
    }
}
