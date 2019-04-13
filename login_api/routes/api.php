<?php

use Illuminate\Http\Request;
use App\User;

Route::get('/produtos', function(){
    $produtos = User::all();
    return $produtos;
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
    Route::post('registro', 'AutenticadorController@registro');
    Route::post('lgoin', 'AutenticadorController@login');

    Route::middleware('auth.api')->group(function(){
        Route::post('logout', 'AutenticadorController@logout');
    });

    Route::get('protutos', 'ProdutosController@index')
        ->middleware('auth:api');
});