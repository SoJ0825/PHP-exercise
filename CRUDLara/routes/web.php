<?php

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'UserController@read');

Route::get('C', 'UserController@create');
Route::post('create', 'UserController@create');



Route::get('R', 'UserController@read');

Route::get('U{id}', 'UserController@update');
Route::post('update{id}', 'UserController@update');

Route::get('D{id}', 'UserController@delete');

//Route::view('/welcome', 'welcome');

//Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

//Route::get('posts={post}&comments={comment}', function ($postId, $commentId) {
//    return $postId."  ".$commentId;
//});
//
//Route::get('user/{name?}', function ($name = 'John') {
//    return $name;
//});

//Route::get('user/{id}', function ($id) {
//    return $id;
//})->where('id', '[0-9]+');
//
//Route::get('user/profile', function () {
//
//})->name('profile');