<?php

use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ContributorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\', 'prefix' => 'collections'], function () {
    Route::get('/', [CollectionsController::class, 'index']);
    Route::get('/{id}', [CollectionsController::class, 'show'])->where(['id' => '^\d+$']);
    Route::get('/filter/filter-by-left-amount', [CollectionsController::class, 'filterByLeftAmount']);
    Route::get('/filter/filter-by-left-amount/{left_amount}', [CollectionsController::class, 'filterByLeftAmount']);
    Route::get('/filter/filter-by-left-amount/{left_amount}', [CollectionsController::class, 'filterByLeftAmount']);
    Route::post('/', [CollectionsController::class, 'store']);
    Route::delete('/{id}', [CollectionsController::class, 'destroy'])->where(['id' => '^\d+$']);
    Route::patch('/{id}', [CollectionsController::class, 'update'])->where(['id' => '^\d+$']);
});

Route::group(['namespace' => 'App\\Http\\Controllers\\', 'prefix' => 'contributors'], function (){
    Route::post('/', [ContributorsController::class, 'store']);
    Route::delete('/{id}', [ContributorsController::class, 'destroy'])->where(['id' => '^\d+$']);
    Route::patch('/{id}', [ContributorsController::class, 'update'])->where(['id' => '^\d+$']);
});
