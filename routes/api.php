<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
    Route::get('/account-verify/{token}','verifyAccount');
    Route::post('login','login');
});

Route::controller(UserController::class)->middleware(['auth:sanctum'])->group(function(){
    Route::get('logout','logout');
    Route::post('list','list');
});

Route::controller(CountryController::class)->prefix('country')->group(function(){
    Route::post('list','list');
    Route::get('get/{id}','get');
});

Route::controller(StateController::class)->prefix('state')->group(function(){
    Route::post('list','list');
    Route::get('get/{id}','get');
});

Route::controller(CityController::class)->prefix('city')->group(function(){
    Route::post('list','list');
    Route::get('get/{id}','get');
});
