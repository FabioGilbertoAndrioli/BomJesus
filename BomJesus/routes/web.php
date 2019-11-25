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

/* -- Cars -- */
Route::resource('car', 'Web\CarController');
Route::get('car/confirmDelete/{car}', 'Web\CarController@confirmDelete')->name('car.confirm.delete');
Route::get('car/delete/{car}', 'Web\CarController@delete')->name('car.delete');

/** Devices */
Route::resource('device', 'Web\DeviceController');
Route::get('device/confirmDelete/{device}', 'Web\DeviceController@confirmDelete')->name('device.confirm.delete');
Route::get('device/delete/{device}', 'Web\DeviceController@delete')->name('device.delete');

/** ROOM */
Route::resource('room', 'Web\RoomController');
Route::get('room/confirmDelete/{room}', 'Web\RoomController@confirmDelete')->name('room.confirm.delete');
Route::get('room/delete/{room}', 'Web\RoomController@delete')->name('room.delete');

Route::resource('chromebook', 'Web\ChromebookController');
Route::get('chromebook/confirmDelete/{chromebook}', 'Web\ChromebookController@confirmDelete')->name('chromebook.confirm.delete');
Route::get('chromebook/delete/{chromebook}', 'Web\chromebookController@delete')->name('chromebook.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
