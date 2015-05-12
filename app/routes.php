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

Route::get('/', ['uses' => 'StoreController@index']);
Route::resource('store', 'StoreController');

// Route::get('admin/categories', 'CategoriesController@index');

Route::group(['prefix' => 'admin'], function()
{
	Route::resource('products', 'AdminProductsController', ['except' => 'show']);
  Route::resource('categories', 'AdminCategoriesController', ['except' => 'show']);
});
