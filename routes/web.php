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


Route::domain(env('SITE_URL', 'websocketprueba.test'))->group(function () {
	Route::get('/', function () {
	    return view('welcome');
	});   
});

Route::group(['prefix'=>'commerce','middleware'=>['auth']], function(){
	Route::get('/{commerceSlug}', 'CommerceController@commerce')->name('commerce.subdomain');
	Route::resource('board','BoardController');
	Route::get('print',[
		'uses'=>'BoardController@pdfPrint',
		'as'=>'board.pdfPrint'
	]);
	Route::resource('category','CategoryController');
	Route::resource('product','ProductController');
	Route::get('product/{slug}/delete',[
		'uses'=>'ProductController@destroy',
		'as'=>'products.destroy'
	]);
});


Route::get('/home',[
	'as'=>'home'
]);
Route::get('perfil',[
	'uses'=>'UserController@show',
	'as'=>'user.perfil'
]);

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){

	Route::get('home',function(){
		return view('admin.index');
	})->name('admin.inicio');

	Route::resource('user','UserController');
	Route::get('user/{email}/delete',[
		'uses'=>'UserController@destroy',
		'as'=>'user.destroy'
	]);

	Route::resource('plan','PlanController');

	Route::resource('commerce','CommerceController');
	Route::resource('order','OrderController');



});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
