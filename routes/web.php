<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class,"index"]);
Route::get('/auth/login',[AuthController::class,"loginView"])->name("login")->middleware("guest");
Route::post('/auth/login',[AuthController::class,"login"])->middleware("guest");

Route::post('/auth/logout',[AuthController::class,"logout"])->middleware("auth");

Route::get('/auth/register',[AuthController::class,"registerView"])->middleware("guest");
Route::post('/auth/register',[AuthController::class,"register"])->middleware("guest");

Route::get('/listings', [ListingController::class,"index"]);

Route::get('/listings/{id}', [ListingController::class,"listingDetails"]);

Route::get('/listings/create',[ListingController::class,"listingForm"])->middleware("auth");
Route::post('/listings/create',[ListingController::class,"create"])->middleware("auth");;

Route::get('/listings/edit/{id}',[ListingController::class,"listingForm"])->middleware("auth");;
Route::post('/listings/edit/{id}',[ListingController::class,"edit"])->middleware("auth");;

Route::post('/listings/delete/{id}',[ListingController::class,"delete"])->middleware("auth");;


