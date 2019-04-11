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

Route::post('/vueitems', 'MainController@storeItem' );
Route::get('/vueitems', 'MainController@readItems' );
Route::post('/vueitems/{id}', 'MainController@deleteItem' );
Route::post('/edititems/{id}', 'MainController@editItem' );