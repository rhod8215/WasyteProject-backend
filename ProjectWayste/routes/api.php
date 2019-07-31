<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, x-xsrf-token');
header('Content-Type', 'text/json');

use Illuminate\Http\Request;
use App\UserAccount;
use App\Collector;
use App\Requests;
use App\Household;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//user-part

Route::post('/user-create', 'UserApiController@create');

Route::get('/user-show', 'UserApiController@show');

Route::get('/user-showbyid/{id}', 'UserApiController@showid');

Route::put('/user-update/{id}', 'UserApiController@userUpdate');

Route::get('/user-show/{email}/{password}', 'UserApiController@showByUsernamePassword');

Route::post('/user-post', 'UserApiController@postByUsernamePassword');

//household-part
Route::post('/household-create', 'HouseholdApiController@create');

Route::get('/household-show', 'HouseholdApiController@show');

Route::get('/household-showbyid/{id}', 'HouseholdApiController@showid');

Route::put('/household-update/{id}', 'HouseholdApiController@userUpdate');


//collector-part

Route::post('/collector-create', 'CollectorApiController@create');

Route::get('/collector-show', 'CollectorApiController@show');

Route::get('/collector-showbyid/{id}', 'CollectorApiController@showid');

Route::put('/collector-updatebyid/{id}', 'CollectorApiController@collectorUpdate');

Route::put('/collector-updateactivestatus/{id}', 'CollectorApiController@collectorUpdateActiveStatus');


//requests-part

Route::post('/request-create', 'RequestsApiController@create');

Route::get('/request-show', 'RequestsApiController@show');

Route::get('/request-showbyid/{id}', 'RequestsApiController@showid');

Route::put('/request-updatebyid/{id}', 'RequestsApiController@requestUpdate');

//join-household-request-collector-user

Route::get('/request-show-all', 'JoinTblApiController@showCollectorUserRequestAll');

Route::get('/request-show-by-household-id/{id}', 'JoinTblApiController@showCollectorUserRequestByHouseholdId');

Route::get('/request-show-by-collector-id/{id}', 'JoinTblApiController@showCollectorUserRequestByCollectorId');

Route::get('/request-show-by-request-id/{id}', 'JoinTblApiController@showCollectorUserRequestByRequestId');

Route::get('/show-all-completed-requests', 'JoinTblApiController@showAllCompletedRequests');

Route::get('/show-all-uncompleted-requests', 'JoinTblApiController@showAllUncompletedRequests');

Route::get('/show-all-accepted-requests', 'JoinTblApiController@showAllAcceptedRequests');

Route::get('/show-all-unaccepted-requests', 'JoinTblApiController@showAllUnacceptedRequests');

//all accepted request by collector id
Route::get('/show-all-accepted-requests-of-collector/{id}', 'JoinTblApiController@showAllAcceptedRequestsOfCollector');

//waste part
Route::get('/waste-show', 'WasteApiController@show');
