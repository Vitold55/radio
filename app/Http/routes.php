<?php

Route::get('/', [
    'as' => 'page:index',
    'uses' => 'PageController@index'
]);

Route::get('{alias}-page', [
    'as' => 'page:page',
    'uses' => 'PageController@page'
]);
