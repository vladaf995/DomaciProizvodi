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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductsController@index')->name('welcome');
Route::get('/products/{id}', 'ProductsController@show')->name('product');
Route::get('/products/{id}/edit', 'ProductsController@edit')->name('edit_product');
Route::patch('/products/{id}', 'ProductsController@update');
Route::delete('/products/{id}', 'ProductsController@destroy');

Route::get('/user/{user}', 'UsersController@index')->name('user.profile');
Route::get('/create_product/{user_id}', 'ProductsController@create')->name('create.product');
Route::post('/store_product', 'ProductsController@store')->name('store_product');

Route::get('/index', 'MessageController@index')->name('messages');
Route::get('/message_show/{product}', 'MessageController@show');
Route::post('/send_message/{product}', 'MessageController@store_message');

