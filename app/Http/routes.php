<?php

Route::get('/', [
    'as' => 'page:index',
    'uses' => 'PageController@index'
]);

Route::get('{alias}-page', [
    'as' => 'page:page',
    'uses' => 'PageController@page'
]);

Route::get('{alias}-stations', [
    'as' => 'page:category',
    'uses' => 'PageController@category'
]);


// Ajax requests routes
Route::post('saveStToCat', [
    'uses' => 'StationController@saveStationToCategories'
]);