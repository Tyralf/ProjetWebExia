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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/boutique', [
    'uses' => 'CartController@getBoutique',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}',[
    'uses' => 'CartController@addItem',
    'as' => 'product.addToCart'
]);

Route::get('/remove/{id}',[
    'uses' => 'CartController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart',[
    'uses' => 'CartController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/reduce/{id}',[
    'uses' => 'CartController@getReduceOne',
    'as' => 'product.reduceOne'
]);