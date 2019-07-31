<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;

class CompanyController extends Controller
{
    public function index(){
        $sectors_lgu = Company::all()->where('sector_type', '=', 'LGU');

        $sectors_private_sectors = Company::all()->where('sector_type', '=', 'Private Sector');

        return view('admin.dashboardCompanyAndLgu', compact('sectors_lgu', 'sectors_private_sectors'));
    }

    public function sectorAdd(Request $request){

        $newSector = new Company();
        $newSector->sector_name = $request->input('new_sector_name');
        $newSector->sector_location = $request->input('new_sector_location');
        $newSector->sector_type = $request->input('new_sector_type');

        $newSector->save();
        //return $last_id;;
    }

    public function viewSectorInfo(Request $request){
        $id = $request->input('sector_id');

        $sector = DB::table('company_and_lgu')
        // ->join('admin', 'company_and_lgu.id', 'admin.sector_id')
        ->select('company_and_lgu.*')
        ->where('company_and_lgu.id','=', $id)
        ->first();

        $numberOfAdmins = DB::table('admin')
        ->join('company_and_lgu', 'company_and_lgu.id', 'admin.sector_id')
        ->where('company_and_lgu.id','=', $id)
        ->count();

        $numberOfCollectors = DB::table('collector')
        ->join('company_and_lgu', 'company_and_lgu.id', 'collector.sector_id')
        ->where('company_and_lgu.id','=', $id)
        ->count();

        $numberOfCollectorsEA = DB::table('collector')
        ->join('company_and_lgu', 'company_and_lgu.id', 'collector.sector_id')
        ->where('collector.type', '=', 'EcoAide')
        ->where('company_and_lgu.id','=', $id)
        ->count();

        $numberOfCollectorsTH = DB::table('collector')
        ->join('company_and_lgu', 'company_and_lgu.id', 'collector.sector_id')
        ->where('collector.type', '=', 'truckHauler')
        ->where('company_and_lgu.id','=', $id)
        ->count();



        $sectorInfo = array(
            'sector'=> $sector,
            'numberOfAdmins' => $numberOfAdmins,
            'numberOfCollectors' => $numberOfCollectors,
            'numberOfCollectorsEA' => $numberOfCollectorsEA,
            'numberOfCollectorsTH' => $numberOfCollectorsTH
        );

        return json_encode($sectorInfo);
    }

    public function sectorShowByIdToEdit(Request $request){
        $id = $request->input('edit_sector_id');

        $sector = DB::table('company_and_lgu')

        ->join('admin', 'company_and_lgu.id', 'admin.sector_id')
        ->select('company_and_lgu.*')
        ->where('company_and_lgu.id','=', $id)
        ->first();

        return json_encode($sector);
    }

    public function sectorEdit(Request $request){

        $id = $request->input('edit_sector_id');

        $sector = Company::find($id);

        $sector->sector_name = $request->input('edit_sector_name_modal');
        $sector->sector_location = $request->input('edit_sector_location_modal');
        $sector->sector_type = $request->input('edit_sector_type_modal');

        $sector->save();
    }

    public function deleteSector(Request $request){

        $sector_id = $request->input('sectoIdToDelete');
        $sector = Company::find($sector_id)->delete();

    }
}
