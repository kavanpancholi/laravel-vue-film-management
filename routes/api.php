<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login')->name('login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
});

Route::group(['before' => 'auth'], function () {
    Route::resource('film', 'FilmController');
    Route::resource('comment', 'CommentController');
    Route::get('country/list', 'CountryController@list');
    Route::resource('country', 'CountryController');
    Route::get('genre/list', 'GenreController@list');
    Route::resource('genre', 'GenreController');
});