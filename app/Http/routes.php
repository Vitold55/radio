<?php

Route::get('/', [
    'as' => 'stations:player',
    'uses' => 'StationsController@player'
]);

Route::get('/stations', [
    'as' => 'stations:index',
    'uses' => 'StationsController@index'
]);

Route::get('/tt', [
    'as' => 'post',
    'uses' => 'PostController@index'
]);

Route::get('/user/{name}/{id}', [
    'as' => 'user',
    'uses' => 'PostController@user'
])->where('name', '[A-Za-z]+')->where('id', '[0-9]+');

Route::get('/player', [
    'as' => 'stations:player',
    'uses' => 'StationsController@player'
]);
