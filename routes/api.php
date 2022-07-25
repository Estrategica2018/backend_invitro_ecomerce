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

Route::get('app', 'App\Http\Controllers\AppController@configuration');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//autenticación
Route::group(['middleware' => ['api'], 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});

//validación y confirmación de cuenta
Route::group(['middleware' => ['api']], function ($router) {
    Route::post('confirm_email', 'App\Http\Controllers\NotifyUserController@confirm_email');
    Route::post('validate_confirm_email', 'App\Http\Controllers\NotifyUserController@validate_confirm_email');
});
//recuperación de contraseña
Route::group(['middleware' => ['api'],'prefix' => 'forgotpassword'], function ($router) {
    Route::post('create', 'App\Http\Controllers\ForgotPasswordController@create');
    Route::get('find', 'App\Http\Controllers\ForgotPasswordController@find');
    Route::post('reset', 'App\Http\Controllers\ForgotPasswordController@reset');
});
Route::fallback(function(){
    return response()->json([
        'message' => 'Página no encontrada. Si el error persiste, póngase en contacto con ......'], 404);
});
