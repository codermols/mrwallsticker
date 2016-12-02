<?php

use App\Http\Controllers\Admin\addPhoto;

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
Route::group(['middleware' => ['web']], function() 
{

	Route::get('/', function () {
		Session::flash('status', 'hello there');
	    return view('welcome');
	});

	Route::get('/om', function () {
		return view('about.index');
	});

	Route::get('/kontakt', [ 
		'as' 	=> 'contact',
		'uses' 	=> 'ContactController@create'
	]);

	Route::post('/kontakt', [ 
		'as' 	=> 'contact_store',
		'uses' 	=> 'ContactController@store'
	]);

	Route::resource('discounts', 'DiscountsController', ['only' => ['index']]);
	Route::resource('products', 'ProductController', ['only' => ['index', 'show']]);




	// Login Routes...
	Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
	Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

	// Registration Routes...
	Route::get('/opret', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

	// Password Reset Routes...
	Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
	Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
	Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
	Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

	Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() 
	{
	    Route::get('/', 'IndexController@index');
    	Route::post('products/create/photos', 'ProductController@addPhoto');
	    Route::resource('products', 'ProductController');
	});
});



