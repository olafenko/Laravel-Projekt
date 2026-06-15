<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class,"index"]);
Route::get('/listings', [ListingController::class,"index"]);

Route::get('/auth/login',[AuthController::class,"loginView"]);
Route::post('/auth/login',[AuthController::class,"login"]);
Route::post('/auth/logout',[AuthController::class,"logout"]);

Route::get('/auth/register',[AuthController::class,"registerView"]);
Route::post('/auth/register',[AuthController::class,"register"]);

Route::get('/listings/create',[ListingController::class,"createView"]);
Route::post('/listings/create',[ListingController::class,"create"]);

Route::post('/listings/delete/{id}',[ListingController::class,"delete"]);


