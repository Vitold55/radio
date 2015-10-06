<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tt', [
    'as' => 'post',
    'uses' => 'PostController@index'
]);

Route::get('/user/{name}/{id}', [
    'as' => 'user',
    'uses' => 'PostController@user'
])->where('name', '[A-Za-z]+')->where('id', '[0-9]+');