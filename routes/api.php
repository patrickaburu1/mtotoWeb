<?php

use Illuminate\Http\Request;

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
//show list of all mothers
Route::get('/mothers','ApiController@mothers');

//register mother
Route::post('/registerMother','ApiController@registerMother');

//register child
Route::post('/registerChild','ApiController@registerChild');

//list of children
Route::get('/children','ApiController@children');

//get child height
Route::get('/height/{child_id}','ApiController@height');

//get child weight
Route::get('/weight/{child_id}','ApiController@weight');

//get immunization
Route::get('/immunization','ApiController@getImmunization');

//give immunization
Route::post('/giveimmunization','ApiController@giveImmunization');

//record weight
Route::post('/recordWeight','ApiController@recordWeight');

//record height
Route::post('/recordHeight','ApiController@recordHeight');

//add user
Route::post('/addUser','ApiController@addUser');

//login
Route::post('/login','UserController@login');

//get mother id
Route::post('/getMotherId/{person_id}','UserController@getMotherId');

//get list of children attached to certain mother
Route::get('/getMothersChildren/{mother_id}','ApiController@getMothersChildren');

//get last immunization given to the child
Route::post('/getLastImmunizationGiven/{child_id}','ApiController@lastImmunizationGiven');

//get all immunization given to a child
Route::get('/allImmunizationGiven/{child_id}','ApiController@allImmunizationGiven');

//get all immunization not given
Route::get('/immunizationdNotGiven/{child_id}','ApiController@immunizationdNotGiven');

//send sms once immunization given
Route::post('/sms','SmsController@sendSms');


// post message in forum
Route::post('/postForum/{mother_id}','ForumController@postForum');

//get forum messages
Route::get('/getMessages','ForumController@getMessages');

//next visit
Route::post('/nextVisit/{mother_id}','ReportController@getNextVisit');

//montly report
Route::get('/report','ReportController@test');

//test
Route::get('/test','ReportController@test');

