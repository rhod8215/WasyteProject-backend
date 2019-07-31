<?php

use Illuminate\Http\Request;
use App\UserAccount;
use App\Collector;
use App\Requests;
use App\Household;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard/users', function () {
//     return view('admin.dashboardUsers');
// });

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Route::post('/login/custom',[
//     'uses' => 'LoginController@login',
//     'as' => 'login',
// ], function (){
//     return view('auth.login');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard/users', 'HouseholdController@index');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/transactions', 'TransactionController@index')->name('dashboard.transactions');

//Company Admin
Route::get('/company-admin-dashboard', 'CompanyAdminDashboardController@index')->name('company.admin.dashboard');

Route::post('/dashboard/householdAdd', 'HouseholdController@householdAdd')->name('householdAdd');

// Route::post('/dashboard/householdEdit/{id}', 'householdController@householdShowByIdToEdit')->name('householdEdit');

Route::get('/dashboard/householdEdit', 'HouseholdController@householdShowByIdToEdit')->name('householdEdit');

Route::post('/dashboard/householdEditSave', 'HouseholdController@householdEdit')->name('householdEditSave');

Route::post('/dashboard/activateUserAcct', 'UserAccountController@activateUser')->name('activateUserAcct');

Route::post('/dashboard/deactivateUserAcct', 'UserAccountController@deactivateUser')->name('deactivateUserAcct');

Route::get('/dashboard/otherInfo', 'HouseholdController@viewInfo')->name('householdInfo');

//collector part

Route::post('/dashboard/collectorAdd', 'CollectorController@collectorAdd')->name('collectorAdd');

Route::get('/dashboard/otherInfoCollector', 'CollectorController@viewInfo')->name('collectorInfo');

Route::get('/dashboard/collectorEdit', 'CollectorController@collectorShowByIdToEdit')->name('collectorEdit');

Route::post('/dashboard/collectorEditSave', 'CollectorController@collectorEdit')->name('collectorEditSave');

//Admin part

Route::post('/dashboard/adminAdd', 'AdminController@adminAdd')->name('adminAdd');

Route::get('/dashboard/otherInfoadmin', 'AdminController@viewInfo')->name('adminInfo');

Route::get('/dashboard/adminEdit', 'AdminController@adminShowByIdToEdit')->name('adminEdit');

Route::post('/dashboard/adminEditSave', 'AdminController@adminEdit')->name('adminEditSave');


//testing part // for graph part

Route::get('/test', 'DashboardController@getMonthlyUserFinalData');

Route::get('/test2', 'DashboardController@getMonthlyRequestsFinalData');

Route::get('/test3', 'DashboardController@theFinalDataEveryType');

Route::get('/test4', 'DashboardController@getNameAndWeighOfEachWasteType');

//company part
Route::get('/dashboard/sectors', 'CompanyController@index')->name('dashboard.sectors');

Route::post('/dashboard/sectorAdd', 'CompanyController@sectorAdd')->name('sectorAdd');

Route::get('/dashboard/otherInfoSector', 'CompanyController@viewSectorInfo')->name('sectorInfo');

Route::get('/dashboard/sectorEdit', 'CompanyController@sectorShowByIdToEdit')->name('sectorEdit');

Route::post('/dashboard/sectorEditSave', 'CompanyController@sectorEdit')->name('sectorEditSave');

Route::post('/dashboard/deleteSector', 'CompanyController@deleteSector')->name('deleteSector');

//company part
Route::get('/dashboard/wastes', 'WasteController@index');
