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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('template.app');
// });

Route::group(["prefix" => "pessoas"], function () {
    Route::get('/', function () {
        return redirect('/pessoas/A');
    });
    Route::get("novo", "PessoasController@novoView");
    Route::post("/store", "PessoasController@store");
    Route::get("/{id}/editar", "PessoasController@editarView");
    Route::post("/update", "PessoasController@update");
    Route::post("/updateTelefone", "PessoasController@updateTelefone");
    Route::post("/busca", "PessoasController@busca");
    Route::get("/{id}/excluir", "PessoasController@excluirView");
    Route::get("/{id}/excluirTelefone", "PessoasController@excluirTelefone");  
    Route::get("/{id}/addTelefone", "PessoasController@addTelefoneView");    
    Route::get("/{id_telefone}/{id}/editTelefone", "PessoasController@editTelefoneView");   
    Route::get("/{id}/destroy", "PessoasController@destroy");
    Route::get("/{letra}", "PessoasController@index");
});