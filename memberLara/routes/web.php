<?php
use App\User;
//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'MemberController@index');


Route::post('signup', 'MemberController@create');
//Route::get('store', 'MemberController@index');
Route::post('store', 'MemberController@store');

Route::get('R', 'MemberController@index');

Route::get('edit/{id?}', 'MemberController@edit');
//Route::get('update', 'MemberController@index');
Route::post('update/{id?}', 'MemberController@update');


//Route::get('delete', 'MemberController@destroy');
Route::get('delete/{id?}', 'MemberController@destroy');

Route::post('login', 'MemberController@login');
Route::get('welcome', 'MemberController@welcome');
Route::get('logout', 'MemberController@logout');
Route::get('show', 'MemberController@show');