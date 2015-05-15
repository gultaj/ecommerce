<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::pattern('id', '[0-9]+');

Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);
Route::get('/store/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
Route::get('/store/category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('/store/search', ['as' => 'store.search', 'uses' => 'StoreController@search']);

Route::get('/store/cart', ['as' => 'store.cart', 'uses' => 'StoreController@getCart']);
Route::post('/store/addtocart', ['as' => 'store.addtocart', 'uses' => 'StoreController@postAddToCart']);
Route::get('/store/removeitem/{ids}', ['as' => 'store.removeitem', 'uses' => 'StoreController@getRemoveItem']);

Route::resource('users', 'UsersController', ['except' => 'index']);

Route::get('login', ['as' => 'auth.login.get', 'uses' => 'AuthController@getLogin']);
Route::post('login', ['as' => 'auth.login.post', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);

Route::group(['prefix' => 'admin', 'before' => 'admin'], function()
{
	Route::resource('products', 'AdminProductsController', ['except' => 'show']);
  Route::resource('categories', 'AdminCategoriesController', ['except' => 'show']);
});
