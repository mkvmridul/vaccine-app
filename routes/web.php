<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Auth\VolunteerController::class, 'home']);
Route::match(['get', 'post'], 'all_result', [\App\Http\Controllers\Auth\VolunteerController::class, 'all_result']);
Route::match(['get', 'post'], 'vaccine/result', [\App\Http\Controllers\Auth\VolunteerController::class, 'result']);

Route::group(['prefix' => 'volunteer'], function () {
    Route::match(['get', 'post'], 'signup', [\App\Http\Controllers\Auth\VolunteerController::class, 'signup']);
    Route::match(['get', 'post'], 'signin', [\App\Http\Controllers\Auth\VolunteerController::class, 'signin']);
    Route::match(['get', 'post'], '', [\App\Http\Controllers\Auth\VolunteerController::class, 'index']);
    Route::match(['get', 'post'], 'profile', [\App\Http\Controllers\Auth\VolunteerController::class, 'profile']);
    Route::match(['get', 'post'], 'verify', [\App\Http\Controllers\Auth\VolunteerController::class, 'verify']);
    Route::match(['get', 'post'], 'positive', [\App\Http\Controllers\Auth\VolunteerController::class, 'positive']);
    Route::match(['get', 'post'], 'signout', [\App\Http\Controllers\Auth\VolunteerController::class, 'signout']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::match(['get', 'post'], '', [\App\Http\Controllers\Auth\AdminController::class, 'index']);
    Route::match(['get', 'post'], 'signin', [\App\Http\Controllers\Auth\AdminController::class, 'signin']);
    Route::match(['get', 'post'], 'signout', [\App\Http\Controllers\Auth\AdminController::class, 'signout']);
});
