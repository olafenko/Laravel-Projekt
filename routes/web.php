<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/listings', [ListingController::class,"index"]);

Route::get('/auth/login',[AuthController::class,"loginView"]);
Route::post('/auth/login',[AuthController::class,"login"]);
Route::post('/auth/logout',[AuthController::class,"logout"]);
Route::get('/auth/register',[AuthController::class,"registerView"]);


