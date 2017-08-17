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
Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

Route::group(['middleware'=>'auth'],function(){
	
	Route::get('/','DashboardController@index');
	Route::get('pelanggan','PelangganController@index');
	Route::delete('pelanggan/{id}','PelangganController@destroy')->name('pelanggan.destroy');
	Route::get('tukang','TukangController@index');
	Route::get('tukang/topup/{id}','TukangController@topup');
	Route::put('tukang/topup/{id}','TukangController@doTopup')->name('tukang.topup');


	Route::get('tukang/tambah','TukangController@create');
	Route::post('tukang','TukangController@store');
	Route::delete('tukang/{id}','TukangController@destroy')->name('tukang.destroy');
	Route::get('pemesanan','OrdersController@index');
	Route::post('pemesanan/map','OrdersController@getMap');
});



