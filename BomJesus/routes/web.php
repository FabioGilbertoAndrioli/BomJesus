<?php

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


Route::get('/', 'Web\DashboardController@index')->name('dashboard');
// Route::group(['prefix' => 'dashboard','namespace' => 'Web'/*,'middleware' => 'auth'*/], function () {
//     Route::get('/', 'DashboardController@index')->name('dashboard');
// });

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

/* --- Reserve -- */
Route::resource('reserve', 'Web\ReserveController');
Route::get('reserve/confirmDelete/{reserve}', 'Web\ReserveController@confirmDelete')->name('reserve.confirm.delete');
Route::get('reserve/delete/{reserve}', 'Web\ReserveController@delete')->name('reserve.delete');

/* --- Sala -- */
Route::resource('room', 'Web\RoomController');

/* --- Usuário --*/
Route::resource('user', 'Web\UserController');
Route::get('user/confirmDelete/{user}', 'Web\UserController@confirmDelete')->name('user.confirm.delete');
Route::get('user/delete/{user}', 'Web\userController@delete')->name('user.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
