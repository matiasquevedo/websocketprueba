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

Route::get('/ordenes/{commerceSlug}',[
	'uses'=>'Api\OrderController@index'
]);

// Route::domain('{commerceSlug}.' . env('SITE_URL', 'cartamovil.test'))->group(function () {

// 	Route::resource('product','Api\ProductController');
// 	Route::resource('orders','Api\OrderController');   

// });



Route::resource('orders','Api\OrderController');
