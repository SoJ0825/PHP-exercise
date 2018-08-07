<?php

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'MemberController@index');

Route::get('C', 'MemberController@create');
Route::post('create', 'MemberController@store');



Route::get('R', 'MemberController@index');

Route::get('U/edit/{id}', 'MemberController@edit');
Route::post('update/{id}', 'MemberController@update');

Route::get('delete/{id}', 'MemberController@destroy');