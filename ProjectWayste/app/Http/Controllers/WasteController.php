<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WasteController extends Controller
{
    public function getDailyWeighOfEachWaste($waste_id){
        $Daily = DB::table('requests')
            ->whereDate('time_completed', Carbon::today())
            //->where('time_completed', '>=', Carbon::now())
            ->where('is_completed', '=', '1')
            ->where('waste_type_id', '=', $waste_id)
            ->sum('weigh');

        return $Daily;
    }

    public function getTotalWeighOfEachWaste($waste_id){
        $Total =  DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', $waste_id)
        ->sum('weigh');

        return $Total;
    }

    public function index(){
    //WASTE----------------------------------------------------------
        //kitchen-----------------
        $kitchenWasteWeigh = $this->getTotalWeighOfEachWaste(1);
        if($kitchenWasteWeigh == 0){
            $kitchenDivisor = 1;
        }else{$kitchenDivisor = $kitchenWasteWeigh;}

        $kitchenWasteWeighDaily = $this->getDailyWeighOfEachWaste(1);
        $kitchenWasteWeighDailyTon = round(($kitchenWasteWeighDaily/907.185), 6);
        $kitchenWasteWeighDailyPercentage = round(($kitchenWasteWeighDaily/$kitchenDivisor),2)*100;

        $kitchenWasteWeighTon = round(($kitchenWasteWeigh/907.185), 6);
        $kitchenWasteWeigh = round($kitchenWasteWeigh, 2);

        //recyclable-----------------
        $recWasteWeigh = $this->getTotalWeighOfEachWaste(2);
        if($recWasteWeigh == 0){
            $recDivisor = 1;
        }else{$recDivisor = $recWasteWeigh;}

        $recWasteWeighDaily = $this->getDailyWeighOfEachWaste(2);
        $recWasteWeighDailyTon = round(($recWasteWeighDaily/907.185), 6);
        $recWasteDailyPercentage = round(($recWasteWeighDaily/$recDivisor),2)*100;

        $recWasteWeighTon = round(($recWasteWeigh/907.185), 6);
        $recWasteWeigh = round($recWasteWeigh, 2);

        //electronic-----------------
        $electronicWasteWeigh =  $this->getTotalWeighOfEachWaste(3);
        if($electronicWasteWeigh == 0){
            $electronicDivisor = 1;
        }else{$electronicDivisor = $electronicWasteWeigh;}

        $electronicWasteWeighDaily = $this->getDailyWeighOfEachWaste(3);
        $electronicWasteWeighDailyTon = round(($electronicWasteWeighDaily/907.185), 6);
        $electronicWasteWeighDailyPercentage = round(($electronicWasteWeighDaily/$electronicDivisor),2)*100;

        $electronicWasteWeighTon = round(($electronicWasteWeigh/907.185), 6);
        $electronicWasteWeigh = round($electronicWasteWeigh, 2);

        //residual-----------------
        $residualWasteWeigh =  $this->getTotalWeighOfEachWaste(4);
        if($residualWasteWeigh == 0){
            $residualDivisor = 1;
        }else{$residualDivisor = $residualWasteWeigh;}

        $residualWasteWeighDaily = $this->getDailyWeighOfEachWaste(4);
        $residualWasteWeighDailyTon = round(($residualWasteWeighDaily/907.185), 6);
        $residualWasteWeighDailyPercentage = round(($residualWasteWeighDaily/$residualDivisor),2)*100;

        $residualWasteWeighTon = round(($residualWasteWeigh/907.185), 6);
        $residualWasteWeigh = round($residualWasteWeigh, 2);

        //hazard-----------------
        $hazardWasteWeigh =  $this->getTotalWeighOfEachWaste(5);
        if($hazardWasteWeigh == 0){
            $hazardDivisor = 1;
        }else{$hazardDivisor = $hazardWasteWeigh;}


        $hazardWasteWeighDaily = $this->getDailyWeighOfEachWaste(5);
        $hazardWasteWeighDailyTon = round(($hazardWasteWeighDaily/907.185), 6);
        $hazardWasteWeighDailyPercentage = round(($hazardWasteWeighDaily/$hazardDivisor),2)*100;

        $hazardWasteWeighTon = round(($hazardWasteWeigh/907.185), 6);
        $hazardWasteWeigh = round($hazardWasteWeigh, 2);

        //bulk-----------------
        $bulkWasteWeigh =  $this->getTotalWeighOfEachWaste(6);
        if($bulkWasteWeigh == 0){
            $bulkDivisor = 1;
        }else{$bulkDivisor = $bulkWasteWeigh;}

        $bulkWasteWeighDaily = $this->getDailyWeighOfEachWaste(6);
        $bulkWasteWeighDailyTon = round(($bulkWasteWeighDaily/907.185), 6);
        $bulkWasteWeighDailyPercentage = round(($bulkWasteWeighDaily/$bulkDivisor),2)*100;

        $bulkWasteWeighTon = round(($bulkWasteWeigh/907.185), 6);
        $bulkWasteWeigh = round($bulkWasteWeigh, 2);

        return view('admin.dashboardWastes', compact('kitchenWasteWeigh',
            'kitchenWasteWeighTon',
            'kitchenWasteWeighDaily',
            'kitchenWasteWeighDailyTon',
            'kitchenWasteWeighDailyPercentage',
            'recWasteWeigh',
            'recWasteWeighTon',
            'recWasteWeighDaily',
            'recWasteWeighDailyTon',
            'recWasteDailyPercentage',
            'electronicWasteWeigh',
            'electronicWasteWeighTon',
            'electronicWasteWeighDaily',
            'electronicWasteWeighDailyTon',
            'electronicWasteWeighDailyPercentage',
            'residualWasteWeigh',
            'residualWasteWeighTon',
            'residualWasteWeighDaily',
            'residualWasteWeighDailyTon',
            'residualWasteWeighDailyPercentage',
            'hazardWasteWeigh',
            'hazardWasteWeighTon',
            'hazardWasteWeighDaily',
            'hazardWasteWeighDailyTon',
            'hazardWasteWeighDailyPercentage',
            'bulkWasteWeigh',
            'bulkWasteWeighTon',
            'bulkWasteWeighDaily',
            'bulkWasteWeighDailyTon',
            'bulkWasteWeighDailyPercentage'
        ));

    }
}
