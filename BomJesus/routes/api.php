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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });





Route::group(['prefix' => 'dashboard'], function () {
    Route::resource('reserves','Api\ReserveController');
    Route::resource('users','Api\UserController');
    Route::get('reserve_user/{id}','Api\ReserveController@showUser');
});

Route::post('subscribe', [
    'as'    =>  'register-interest',
    'uses'  =>  'Web\ReserveController@subscribe',
]);

Route::post('unsubscribe', [
    'as'    =>  'remove-interest',
    'uses'  =>  'Web\ReserveControlle@unsubscribe',
]);
