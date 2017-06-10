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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix'=>'v1'],function(){
	Route::post('auth/signin','Api\V1\AuthController@signIn');
	Route::post('/registercustomer','Api\V1\RegisterController@storeCustomer');
	Route::post('/registertukang','Api\V1\RegisterController@storeTukang');
	
	Route::post('/order','Api\V1\OrdersController@doOrder');
	Route::post('/ordered','Api\V1\OrdersController@myOrder');
	Route::post('/cancelorder','Api\V1\OrdersController@cancelOrder');
	Route::post('/acceptpayment','Api\V1\OrdersController@acceptpayment');


	Route::get('/tukang','Api\V1\HomeController@getTukang');
});