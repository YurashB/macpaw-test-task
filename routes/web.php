<?php

use App\Http\Controllers\CollectionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\', 'prefix' => 'collections'], function () {
    Route::get('/', [CollectionsController::class, 'index']);
    Route::post('/', [CollectionsController::class, 'store']);
});
