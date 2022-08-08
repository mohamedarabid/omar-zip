<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('')->namespace('API')->group(function () {
    Route::post('register', "UserApiAuthController@register");
    Route::post('login', "UserApiAuthController@login");
    Route::get('/login/{provider}', "UserApiAuthController@redirectToProvider");
    Route::get('/login/{provider}/callback', "UserApiAuthController@handleProviderCallback");
});
Route::prefix('')->middleware('auth:user')->namespace('API')->group(function () {
    Route::post('update-profile', "UserApiAuthController@updateProfile");
    Route::get('profile', "UserApiAuthController@profile");
    Route::apiresource('/scroll', ScrollController::class);
    Route::apiresource('/sound', SoundController::class);
    Route::apiresource('/book', BookController::class);
    Route::apiresource('/video', VideoController::class);
});
