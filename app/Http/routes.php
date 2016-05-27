<?php

Route::get('/', [
    'as' => 'stations:index',
    'uses' => 'StationController@index'
]);
