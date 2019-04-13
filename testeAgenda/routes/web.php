<?php

Route::get('/', function () {
    return redirect('contacts/A');
});

Route::group(["prefix" => "contacts"], function () {
    Route::get("create", "ContactController@create");
    Route::get('/', function () {
        return redirect('contacts/A');
    });
    Route::post("store", "ContactController@store");
    Route::get("/{id}/edit", "ContactController@edit");
    Route::post("/update", "ContactController@update");
    Route::post("/updatePhone", "ContactController@updatePhone");
    Route::post("/busca", "ContactController@busca");
    Route::get("/{id}/delete", "ContactController@deleteContact");
    Route::get("/{id}/destroy", "ContactController@destroy");
    Route::get("/{id}/excluirPhone", "ContactController@excluirPhone");  
    Route::get("/{id}/addPhone", "ContactController@addPhoneView");    
    Route::get("/{id_phone}/{id}/editPhone", "ContactController@editPhoneView");   
    Route::get("/{letra}", "ContactController@index");
});