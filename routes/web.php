<?php

use Illuminate\Support\Facades\Route;

/**
 * Laravel start page
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Routes for collections
 */
Route::group(['namespace' => 'App\\Http\\Controllers\\', 'prefix' => 'collections'], function () {
    Route::get('/', 'CollectionsController@index');
});
