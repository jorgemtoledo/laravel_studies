<?php

// Route::get('/', function () {
//     return view('welcome');
// });

// use App\Http\Middleware\PrimeiroMiddleware;
// Route::get('/usuarios', 'UsuarioController@index')->middleware('primeiro');
Route::get('/usuarios', 'UsuarioController@index');

Route::get('/', function(){
  return 'teste';
});

