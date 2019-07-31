<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\UserAccount;
use Auth;

class CompanyAdminDashboardController extends Controller
{
   //graph-waste part
   public function getNameOfUser(){

        //getting the name of user
        $users_id = Auth::user()->id;
        //$nameofuser = $this->getNameOfUser($users_id);

        $UsersName = DB::table('admin')
        ->where('users_id', '=', $users_id)
        ->first();

        // return view('layouts.companyAdminMaster', compact('UsersName'));
        return $UsersName;
    }

   public function getMax($array){
        $max = max($array);
        return $max;
    }

    public function getWeighEveryType($monthNum, $wasteTypeId){
        $monthlyUser = DB::table('requests')
        ->where('waste_type_id', '=', $wasteTypeId)
        ->where('is_completed', '=', '1')
        ->whereMonth('time_completed', $monthNum)
        ->sum('weigh');

        return $monthlyUser;

    }

    public function getMonthsForWaste(){
        $rawmonths = DB::table('requests')
        ->orderBy('time_completed', 'ASC')->pluck('time_completed');

        $monthArray = array();
        if(!empty($rawmonths)){
            foreach($rawmonths as $unformattedDate){
                $date = new \DateTime($unformattedDate);
                $monthsNum = $date->format('m');
                $monthsName = $date->format('M');
                $monthArray[$monthsNum] = $monthsName;
            }
           return $monthArray;
        }
    }

    public function theFinalDataEveryType(){
        $months = $this->getMonthsForWaste();
        $monthNameArray = array();

        foreach($months as $month_no => $month_name){
            array_push($monthNameArray, $month_name);
        }

        $monthlyCountKitchenEachMonth = array();
        $monthlyCountKitchenFinal = array();
        $monthlyCountRecyclableEachMonth = array();
        $monthlyCountRecyclableFinal = array();
        $monthlyCountElectronicEachMonth = array();
        $monthlyCountElectronicFinal = array();
        $monthlyCountResidualEachMonth = array();
        $monthlyCountResidualFinal = array();
        $monthlyCountHazardousEachMonth = array();
        $monthlyCountHazardousFinal = array();
        $monthlyCountBulkEachMonth = array();
        $monthlyCountBulkFinal = array();

        $allMaxFinal = array();



        //kitchen
        foreach($months as $month_no => $month_name){
            $monthlyCountKitchenEachMonth = $this->getWeighEveryType($month_no, 1);
            array_push($monthlyCountKitchenFinal, $monthlyCountKitchenEachMonth);
        }
        //recyclable
        foreach($months as $month_no => $month_name){
            $monthlyCountRecyclableEachMonth = $this->getWeighEveryType($month_no, 2);
            array_push($monthlyCountRecyclableFinal, $monthlyCountRecyclableEachMonth);
        }
        //Electronic
        foreach($months as $month_no => $month_name){
            $monthlyCountElectronicEachMonth = $this->getWeighEveryType($month_no, 3);
            array_push($monthlyCountElectronicFinal, $monthlyCountElectronicEachMonth);
        }
        //Residual
        foreach($months as $month_no => $month_name){
            $monthlyCountResidualEachMonth = $this->getWeighEveryType($month_no, 4);
            array_push($monthlyCountResidualFinal, $monthlyCountResidualEachMonth);
        }
        //Hazardous
        foreach($months as $month_no => $month_name){
            $monthlyCountHazardousEachMonth = $this->getWeighEveryType($month_no, 5);
            array_push($monthlyCountHazardousFinal, $monthlyCountHazardousEachMonth);
        }
        //Bulk
        foreach($months as $month_no => $month_name){
            $monthlyCountBulkEachMonth = $this->getWeighEveryType($month_no, 6);
            array_push($monthlyCountBulkFinal, $monthlyCountBulkEachMonth);
        }

        $maxKitch = $this->getMax($monthlyCountKitchenFinal);
        array_push($allMaxFinal, $maxKitch);
        $maxRec = $this->getMax($monthlyCountRecyclableFinal);
        array_push($allMaxFinal, $maxRec);
        $maxElec = $this->getMax($monthlyCountElectronicFinal);
        array_push($allMaxFinal, $maxElec);
        $maxRes = $this->getMax($monthlyCountResidualFinal);
        array_push($allMaxFinal, $maxRes);
        $maxHaz = $this->getMax($monthlyCountHazardousFinal);
        array_push($allMaxFinal, $maxHaz);
        $maxBulk = $this->getMax($monthlyCountBulkFinal);
        array_push($allMaxFinal, $maxBulk);

        $finalMax = $this->getMax($allMaxFinal);
        $max = round(($finalMax + 10/2) /10) *10 ;

        $FinalData = array(
                        'months'=> $monthNameArray,
                        'monthlyCountKitchenFinal' => $monthlyCountKitchenFinal,
                        'monthlyCountRecyclableFinal' => $monthlyCountRecyclableFinal,
                        'monthlyCountElectronicFinal' => $monthlyCountElectronicFinal,
                        'monthlyCountResidualFinal' => $monthlyCountResidualFinal,
                        'monthlyCountHazardousFinal' => $monthlyCountHazardousFinal,
                        'monthlyCountBulkFinal' => $monthlyCountBulkFinal,
                        'max' => $max
        );
        return $FinalData;

    }

    // public function checkAndGetPresentWasteType(){
    //     $waste_type_in_waste_table = $this->wasteTypeInWasteTable();
    //     $waste_type_ids_in_requests_table = $this->wasteTypeInRequestTable();

    //     $present_waste_id_array = array();

    //     foreach($waste_type_in_waste_table as $eachElement=>$element){
    //        if(in_array($eachElement, $waste_type_in_waste_table)){
    //             $present_waste_id_array[$eachElement] = $value;
    //         }
    //     }
    //    return $present_waste_id_array;
    // //    return dd($waste_type_in_waste_table);
    // }



    //for graph-request part
    public function getMonthsRequests(){
        $rawmonths = DB::table('requests')
        ->orderBy('time_completed', 'ASC')->pluck('time_completed');

        $monthArray = array();
        $countPerMonth = array();

        if(!empty($rawmonths)){
            foreach($rawmonths as $unformattedDate){
                $date = new \DateTime($unformattedDate);
                $monthsNum = $date->format('m');
                $monthsName = $date->format('M');
                $monthArray[$monthsNum] = $monthsName;
            }
           return $monthArray;
        }
    }

    public function getMonthlyRequests($monthNum){
        $monthlyRequests = DB::table('requests')
        ->whereMonth('time_completed', $monthNum)
        ->get()
        ->count();

        return $monthlyRequests;
    }

    public function getMonthlyRequestsFinalData(){
        $monthlyCountRequestsArray = array();
        $monthArray = $this->getMonthsRequests();
        $monthNameArray = array();
        if(!empty($monthArray)){
            foreach($monthArray as $month_no => $month_name){
                $monthlyCountRequests = $this->getMonthlyRequests($month_no);
                array_push($monthlyCountRequestsArray, $monthlyCountRequests);
                array_push($monthNameArray, $month_name);
            }
            $max_inCount = max($monthlyCountRequestsArray);
            $max = round(($max_inCount + 10/2) /10) *10 ;

            $monthRequestsFinalData = array(
                'months'=> $monthNameArray,
                'requests_finalcount_data_monthly'=> $monthlyCountRequestsArray,
                'max'=>$max,
            );

            return $monthRequestsFinalData;
        }
    }
    //-graph user part
    public function getMonths(){
        $rawmonths = DB::table('users')
        ->orderBy('created_at', 'ASC')->pluck('created_at');

        $monthArray = array();
        $countPerMonth = array();

        // $months = json_decode($months);
        if(!empty($rawmonths)){
            foreach($rawmonths as $unformattedDate){
                $date = new \DateTime($unformattedDate);
                $monthsNum = $date->format('m');
                $monthsName = $date->format('M');
                $monthArray[$monthsNum] = $monthsName;
            }
           return $monthArray;
           //return $this->getMonthlyUser(05);
        }
    }

    public function getMonthlyUser($monthNum){
        $monthlyUser = DB::table('users')
        ->whereMonth('created_at', $monthNum)
        ->get()
        ->count();

        return $monthlyUser;
    }

    public function getMonthlyUserFinalData(){
        $monthlyCountUserArray = array();
        $monthArray = $this->getMonths();
        $monthNameArray = array();
        if(!empty($monthArray)){
            foreach($monthArray as $month_no => $month_name){
                $monthlyCountUser = $this->getMonthlyUser($month_no);
                array_push($monthlyCountUserArray, $monthlyCountUser);
                array_push($monthNameArray, $month_name);
            }
            $max_inCount = max($monthlyCountUserArray);
            $max = round(($max_inCount + 10/2) /10) *10 ;

            $monthUserFinalData = array(
                'months'=> $monthNameArray,
                'user_finalcount_data_monthly'=> $monthlyCountUserArray,
                'max'=>$max,
            );

            return $monthUserFinalData;
        }

    }

    public function index(){
        $this->getNameOfUser();

        $totalhouseholdCount = DB::table('household')->count();

        $lastMonthCountHousehold = DB::table('users')
        ->where('type', '=', 'household')
        ->where('created_at', '<=', Carbon::now()->subMonth())
        ->count();

        $currentMonthCountHousehold = UserAccount ::where('created_at', '>=', Carbon::now()->startOfMonth())
        ->where('type', '=', 'household')
        ->count();

        $totalhouseholdDivisor = $lastMonthCountHousehold;
            if($lastMonthCountHousehold == 0){
                $totalhouseholdDivisor = 1;
            }

        $householdpercentage =(($currentMonthCountHousehold- $lastMonthCountHousehold)/$totalhouseholdDivisor)*100;
        $householdpercentage = round($householdpercentage, 0);

        //homeowner
            $totalHomeOwnerCount = DB::table('household')
                                    ->where('type', '=', 'HO')
                                    ->count();

            $lastMonthHomeOwnerCount = DB::table('users')
            ->join('household', 'users.id', 'household.users_id')
            ->where('household.type', '=', 'HO')
            ->where('users.type', '=', 'household')
            ->where('created_at', '<=', Carbon::now()->subMonth())
            ->count();

            $HOdivisorLM = $lastMonthHomeOwnerCount;
            if($lastMonthHomeOwnerCount == 0){
                $HOdivisorLM = 1;
            }

            $currentMonthHomeOwnerCount = DB::table('users')
            ->join('household', 'users.id', 'household.users_id')
            ->where('household.type', '=', 'HO')
            ->where('users.type', '=', 'household')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();


            $householdHomeOwnerpercentage =(($currentMonthHomeOwnerCount - $lastMonthHomeOwnerCount)/$HOdivisorLM)*100;
            $householdHomeOwnerpercentage = round($householdHomeOwnerpercentage, 0);

            //businessowner
            $totalBusinessOwnerCount = DB::table('household')
                                    ->where('type', '=', 'BO')
                                    ->count();

            $lastMonthBusinessOwnerCount = DB::table('users')
            ->join('household', 'users.id', 'household.users_id')
            ->where('household.type', '=', 'BO')
            ->where('users.type', '=', 'household')
            ->where('created_at', '<=', Carbon::now()->subMonth())
            ->count();



            $currentMonthBusinessOwnerCount = DB::table('users')
            ->join('household', 'users.id', 'household.users_id')
            ->where('household.type', '=', 'BO')
            ->where('users.type', '=', 'household')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();

            $BOdivisorLM = $lastMonthBusinessOwnerCount;
            if($lastMonthBusinessOwnerCount == 0){
                $BOdivisorLM = 1;
            }
            $householdBusinessOwnerpercentage = (($currentMonthBusinessOwnerCount - $lastMonthBusinessOwnerCount)/$BOdivisorLM)*100;
            $householdBusinessOwnerpercentage = round($householdBusinessOwnerpercentage, 0);

            //mrf
            $totalMRFCount = DB::table('household')
                                    ->where('type', '=', 'MRF')
                                    ->count();

            $lastMonthMRFCount = DB::table('users')
            ->join('household', 'users.id', 'household.users_id')
            ->where('household.type', '=', 'MRF')
            ->where('users.type', '=', 'household')
            ->where('created_at', '<=', Carbon::now()->subMonth())
            ->count();

            $MRFdivisorLM = $lastMonthMRFCount;
            if($lastMonthMRFCount == 0 || $lastMonthMRFCount == Null){
                $MRFdivisorLM = 1;
            }

            $currentMonthMRFCount = DB::table('users')
            ->join('household', 'users.id', 'household.users_id')
            ->where('household.type', '=', 'MRF')
            ->where('users.type', '=', 'household')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();


            $householdMRFpercentage = (($currentMonthMRFCount - $lastMonthMRFCount)/$MRFdivisorLM)*100;
            $householdMRFpercentage = round($householdMRFpercentage, 0);

        //COLLECTOR
        $totalCollectorCount = DB::table('collector')->count();

        $lastMonthCountCollector = DB::table('users')
        ->where('type', '=', 'collector')
        ->where('created_at', '<=', Carbon::now()->subMonth())
        ->count();

        $colDivisor = $lastMonthCountCollector;
        if($lastMonthCountCollector == 0 || $lastMonthCountCollector == NULL){
            $colDivisor = 1;
        }

        $currentMonthCountCollector = UserAccount ::where('created_at', '>=', Carbon::now()->startOfMonth())
        ->where('type', '=', 'collector')
        ->count();

        $collectorpercentage =(($currentMonthCountCollector - $lastMonthCountCollector)/$colDivisor)*100;
        $collectorpercentage = round($collectorpercentage, 0);
            //EcoAide
            $totalEcoAideCount = DB::table('collector')
            ->where('type', '=', 'ecoAide')
            ->count();

            $lastMonthEcoAideCount = DB::table('users')
            ->join('collector', 'users.id', 'collector.users_id')
            ->where('collector.type', '=', 'ecoAide')
            ->where('users.type', '=', 'collector')
            ->where('created_at', '<=', Carbon::now()->subMonth())
            ->count();

            $EAdivisorLM = $lastMonthEcoAideCount;
            if($lastMonthEcoAideCount == 0 || $lastMonthEcoAideCount == NULL){
            $EAdivisorLM = 1;
            }

            $currentMonthEcoAideCount = DB::table('users')
            ->join('collector', 'users.id', 'collector.users_id')
            ->where('collector.type', '=', 'ecoAide')
            ->where('users.type', '=', 'collector')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();

            $collectorEcoAidepercentage =(($currentMonthEcoAideCount - $lastMonthEcoAideCount)/$EAdivisorLM)*100;
            $collectorEcoAidepercentage = round($collectorEcoAidepercentage, 0);
            //TruckHauler
            $totalTruckHaulerCount = DB::table('collector')
            ->where('type', '=', 'truckHauler')
            ->count();

            $lastMonthTruckHaulerCount = DB::table('users')
            ->join('collector', 'users.id', 'collector.users_id')
            ->where('collector.type', '=', 'truckHauler')
            ->where('users.type', '=', 'collector')
            ->where('created_at', '<=', Carbon::now()->subMonth())
            ->count();

            $THdivisorLM = $lastMonthTruckHaulerCount;
            if($lastMonthTruckHaulerCount == 0 || $lastMonthTruckHaulerCount == NULL){
            $THdivisorLM = 1;
            }

            $currentMonthTruckHaulerCount = DB::table('users')
            ->join('collector', 'users.id', 'collector.users_id')
            ->where('collector.type', '=', 'truckHauler')
            ->where('users.type', '=', 'collector')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->count();

            $collectorTruckHaulerpercentage =(($currentMonthTruckHaulerCount - $lastMonthTruckHaulerCount)/$THdivisorLM)*100;
            $collectorTruckHaulerpercentage = round($collectorTruckHaulerpercentage, 0);

         //Company Admins
         $totalCompAdminsCount = DB::table('admin')->count();

         $lastMonthCountCompAdmins = DB::table('users')
         ->where('type', '=', 'admin')
         ->where('created_at', '<=', Carbon::now()->subMonth())
         ->count();

         $CADivisor = $lastMonthCountCompAdmins;
         if($lastMonthCountCompAdmins == 0 || $lastMonthCountCompAdmins == NULL){
             $CADivisor = 1;
         }

         $currentMonthCountCompAdmins = UserAccount ::where('created_at', '>=', Carbon::now()->startOfMonth())
         ->where('type', '=', 'admin')
         ->count();

         $companyAdminpercentage =(($currentMonthCountCompAdmins - $lastMonthCountCompAdmins)/$CADivisor)*100;

        //  REQUESTS
        $totalRequestsCount = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->count();

        $yesterdayCountRequests = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('time_completed', '<=', Carbon::yesterday()->startOfMonth())
        ->count();

        $requestsDivisor = $yesterdayCountRequests;
        if($yesterdayCountRequests == 0 || $yesterdayCountRequests == NULL){
            $requestsDivisor = 1;
        }

        $todayCountRequests =  DB::table('requests')->where('time_completed', '>=', Carbon::now()->startOfMonth())
        ->where('is_completed', '=', '1')
        ->count();

        $requestsPercentage =round((($todayCountRequests - $yesterdayCountRequests)/$requestsDivisor)*100, 0);

        //WASTE----------------------------------------------------------
        //kitchen-----------------
        $kitchenWasteWeigh = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', '1')
        ->sum('weigh');
        $kitchenWasteWeigh = round($kitchenWasteWeigh, 2);

        //recyclable-----------------
        $recWasteWeigh = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', '2')
        ->sum('weigh');
        $recWasteWeigh = round($recWasteWeigh, 2);
        //electronic-----------------
        $electronicWasteWeigh = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', '3')
        ->sum('weigh');
        $electronicWasteWeigh = round($electronicWasteWeigh, 2);
        //residual-----------------
        $residualWasteWeigh = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', '4')
        ->sum('weigh');
        $residualWasteWeigh = round($residualWasteWeigh, 2);
        //hazard-----------------
        $hazardWasteWeigh = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', '5')
        ->sum('weigh');
        $hazardWasteWeigh = round($hazardWasteWeigh, 2);
        //bulk-----------------
        $bulkWasteWeigh = DB::table('requests')
        ->where('is_completed', '=', '1')
        ->where('waste_type_id', '=', '6')
        ->sum('weigh');
        $bulkWasteWeigh = round($bulkWasteWeigh, 2);

         return view('companyAdmin.companyAdminDashboard',
            compact('totalhouseholdCount',
                    'lastMonthCountHousehold',
                    'currentMonthCountHousehold',
                    'householdpercentage',
                    'householdHomeOwnerpercentage',
                    'currentMonthHomeOwnerCount',
                    'totalHomeOwnerCount',
                    'totalBusinessOwnerCount',
                    'householdBusinessOwnerpercentage',
                    'currentMonthBusinessOwnerCount',
                    'totalMRFCount',
                    'householdMRFpercentage',
                    'currentMonthMRFCount',
                    'totalCollectorCount',  //collector part
                    'currentMonthCountCollector',
                    'collectorpercentage',
                    'totalEcoAideCount', //collector-ecoaide
                    'collectorEcoAidepercentage',
                    'currentMonthEcoAideCount',
                    'currentMonthTruckHaulerCount', //collector-truckhauler
                    'collectorTruckHaulerpercentage',
                    'totalTruckHaulerCount',
                    'totalCompAdminsCount', //company admins
                    'currentMonthCountCompAdmins',
                    'companyAdminpercentage',
                    'totalRequestsCount',
                    'todayCountRequests',
                    'requestsPercentage',
                    'kitchenWasteWeigh',
                    'recWasteWeigh',
                    'electronicWasteWeigh',
                    'residualWasteWeigh',
                    'hazardWasteWeigh',
                    'bulkWasteWeigh'
                    )
        );
    }
}



// $lastMonthCount = UserAccount::where('created_at', '<=', Carbon::now()->subMonth())
        // ->where('type', '=', 'household')->count();

