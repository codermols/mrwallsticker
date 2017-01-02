<?php

use App\Category;

Route::group(['middleware' => ['web']], function() 
{

	Route::get('/', ['as' => 'Forside', 'uses' => 'HomeController@index']);

	Route::get('/om', function () {
		return view('about.index');
	})->name('om');

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
	Route::get('products/{name}', 'ProductController@show');

	Route::post('purchases', 'PurchasesController@store');

	Route::group(['prefix' => 'products'], function()
	{
		Route::resource('reviews', 'ReviewController', ['only' => ['show']]);
		Route::post('{product_id}/reviews/create', 'ReviewController@store')->middleware('auth');
	});

	// Cart Routes...
	Route::get('cart', 'CartController@index');
	Route::get('/add-to-cart/{id}', [
		'uses' => 'ProductController@getAddToCart',
		'as'   => 'product.addToCart'
	]);
	// Route::post('cart/store', 'CartController@store');
	Route::get('cart/remove/{id}', 'ProductController@getRemoveByOne');

	//Route::post('checkout', 'PurchasesController@index');

	Route::post('cart/complete', [
	    'as' => 'cart.complete',
        'uses' => 'CartController@complete'
    ]);

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
	
	Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
	{
		Route::resource('products', 'Admin\ProductController', [
			'as' 	=> 'admin'
		]);
	});

	Route::group(['as' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() 
	{
	    Route::get('/', 'IndexController@index');
	    Route::get('categories', 'CategoryController@index');
	    Route::post('categories/create', 'CategoryController@store');
	    Route::get('categories/create', 'CategoryController@create');
	    Route::post('products/{id}/photos', 'ProductController@addPhoto');
	    Route::get('products/{name}', 'ProductController@show');
	});
});



