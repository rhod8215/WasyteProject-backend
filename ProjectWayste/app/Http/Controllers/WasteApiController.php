<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waste;

class WasteApiController extends Controller
{
    public function show()
    {
        $wasteType = Waste::all()->where('waste_status', '=', 'Enabled');
        return response()->json($wasteType);
    }

}
