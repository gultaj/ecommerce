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

// Route::get('admin/categories', 'CategoriesController@index');

Route::group(['prefix' => 'admin'], function()
{
	Route::resource('products', 'AdminProductsController', ['except' => 'show']);
  Route::resource('categories', 'AdminCategoriesController', ['except' => 'show']);
});
