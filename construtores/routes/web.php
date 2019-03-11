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

Route::get('/nome', 'MeuController@getNome');

Route::get('/idade', 'MeuController@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuController@multiplicar');

Route::get('/nomes/{id}', 'MeuController@getNomeByID');

// Cria todas as rotas referente aos clientes automaticamente
Route::resource('/clientes', 'ClientesController');