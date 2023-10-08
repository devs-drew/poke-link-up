<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::post('auth/register', 'App\Http\Controllers\UsersController@store');

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::apiResource('users', UsersController::class);

    Route::get('profiles', 'ProfilesController@index');
    Route::get('users/{user}/profile', 'ProfilesController@show');
    Route::put('users/{user}/profile', 'ProfilesController@update');
    Route::put('users/{user}/theme/', 'ProfilesController@theme');

    Route::get('users/{user}/favorites', 'FavoritesController@index');
    Route::post('users/{user}/favorites', 'FavoritesController@store');
    Route::delete('users/{user}/favorites/{favorite}', 'FavoritesController@destroy');
    // Route::get('users/{user}/favorites{favorite}', 'FavoritesController@show');
});
