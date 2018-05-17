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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){

	Route::get('/',function(){
		return view('admin.index');
	})->name('admin.inicio');

	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'=>'users.destroy'
	]);

	Route::resource('aviones','AvionController');
	Route::get('aviones/{id}/destroy',[
		'uses'=>'AvionController@destroy',
		'as'=>'aviones.destroy'
	]);

	Route::resource('reservas','ReservasController');
	Route::get('reservas/{id}/destroy',[
		'uses'=>'ReservasController@destroy',
		'as'=>'reservas.destroy'
	]);


});

Route::get('/', 'HomeController@index');

Auth::routes();