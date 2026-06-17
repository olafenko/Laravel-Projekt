<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class,"index"]);
Route::get('/auth/login',[AuthController::class,"loginView"])->name("login")->middleware("guest");
Route::post('/auth/login',[AuthController::class,"login"])->middleware("guest");

Route::post('/auth/logout',[AuthController::class,"logout"])->middleware("auth");

Route::get('/auth/register',[AuthController::class,"registerView"])->middleware("guest");
Route::post('/auth/register',[AuthController::class,"register"])->middleware("guest");

Route::get('/listings', [ListingController::class,"index"]);

Route::get('/user/profile/{id}', [UserController::class,"profile"])->middleware("auth");

Route::get('/user/profile/edit/{id}', [UserController::class,"editProfileView"])->middleware("auth");
Route::post('/user/profile/edit/{id}', [UserController::class,"editProfile"])->middleware("auth");

Route::get('/user/profile/password-change/{id}', [UserController::class,"passwordChangeView"])->middleware("auth");
Route::post('/user/profile/password-change/{id}', [UserController::class,"passwordChange"])->middleware("auth");

Route::get('/listings/create',[ListingController::class,"listingForm"])->middleware("auth");
Route::post('/listings/create',[ListingController::class,"create"])->middleware("auth");

Route::get('/listings/favourites',[FavouriteController::class,"index"])->middleware("auth");
Route::post('/listings/favourites/toggle/{id}',[FavouriteController::class,"toggle"])->middleware("auth");

Route::get('/listings/{id}', [ListingController::class,"listingDetails"]);

Route::get('/listings/edit/{id}',[ListingController::class,"listingForm"])->middleware("auth");
Route::post('/listings/edit/{id}',[ListingController::class,"edit"])->middleware("auth");

Route::post('/listings/delete/{id}',[ListingController::class,"delete"])->middleware("auth");






