<?php

Route::get('/', function () {
    return view('index');
});

// Produtos
Route::get('/produtos', 'ControllerProduto@index');
Route::get('/produtos/novo', 'ControllerProduto@create');
Route::post('/produtos', 'ControllerProduto@store');
Route::get("/produtos/apagar/{id}", "ControllerProduto@destroy");
Route::get("/produtos/editar/{id}", "ControllerProduto@edit");
Route::post('/produtos/{id}', 'ControllerProduto@update');

// Categorias
Route::get('/categorias', 'ControllerCategoria@index');
Route::get('/categorias/novo', 'ControllerCategoria@create');
Route::post('/categorias', 'ControllerCategoria@store');
Route::get("/categorias/apagar/{id}", "ControllerCategoria@destroy");
Route::get("/categorias/editar/{id}", "ControllerCategoria@edit");
Route::post('/categorias/{id}', 'ControllerCategoria@update');
