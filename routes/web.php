<?php

use App\Http\Controllers\CollectionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\', 'prefix' => 'collections'], function () {
    Route::get('/', [CollectionsController::class, 'index']);
    Route::get('/{id}', [CollectionsController::class, 'show']);
    Route::post('/', [CollectionsController::class, 'store']);
});

Route::group(['namespace' => 'App\\Http\\Controllers\\', 'prefix' => 'contributors'], function (){
    Route::post('/', [\App\Http\Controllers\ContributorsController::class, 'store']);
});
