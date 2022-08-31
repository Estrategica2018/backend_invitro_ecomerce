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
Route::get('app/seeder', 'App\Http\Controllers\AppController@seeder');

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
	Route::get('/user/find/{email}', 'App\Http\Controllers\UserController@find');
    Route::post('confirm_email', 'App\Http\Controllers\NotifyUserController@confirm_email');
    Route::post('validate_confirm_email', 'App\Http\Controllers\NotifyUserController@validate_confirm_email');
});
//recuperación de contraseña
Route::group(['middleware' => ['api'],'prefix' => 'forgotpassword'], function ($router) {
    Route::post('create', 'App\Http\Controllers\ForgotPasswordController@create');
    Route::post('find', 'App\Http\Controllers\ForgotPasswordController@find');
    Route::post('reset', 'App\Http\Controllers\ForgotPasswordController@reset');
});
//gestión de usuario
Route::group(['middleware' => ['api','auth:api'],'prefix' => 'user'], function ($router) {
    Route::post('update', 'App\Http\Controllers\UserController@update');
});
//gestión de categorias
Route::resource('categories',\App\Http\Controllers\CategoryController::class,['only'=>['store','update']])
    ->middleware('auth');
Route::group(['middleware' => ['api'],'prefix'=>'categories'],function (){
    Route::get('list','App\Http\Controllers\CategoryController@list')->name('categories.list');
});
//gestión de productos
Route::resource('products',\App\Http\Controllers\ProductController::class,['only'=>['store','update']])
    ->middleware('auth:api');
Route::group(['middleware' => ['api'],'prefix'=>'products'],function (){
    Route::get('list','App\Http\Controllers\ProductController@list')->name('products.list');
    Route::get('get/{productId}',[App\Http\Controllers\ProductController::class,'get']);
});
//gestión de servicios
Route::resource('services',\App\Http\Controllers\ServiceController::class,['only'=>['store','update']])
    ->middleware('auth');
Route::group(['middleware' => ['api'],'prefix'=>'services'],function (){
    Route::get('list','App\Http\Controllers\ServiceController@list')->name('services.list');
    Route::get('get/{service}',[App\Http\Controllers\ServiceController::class,'get']);
});
//gestión de resultado del cruce de productos
Route::resource('product_result_crosses',\App\Http\Controllers\ProductResultCrossController::class,['only'=>['store','update']])
    ->middleware('auth');
Route::group(['middleware' => ['api'],'prefix'=>'product_result_crosses'],function (){
    Route::get('list','App\Http\Controllers\ProductResultCrossController@list')->name('product_result_cross.list');
});
//gestión reseña de productos
Route::resource('product_reviews',\App\Http\Controllers\ProductReviewController::class,['only'=>['store','update']])
    ->middleware('auth');
Route::group(['middleware' => ['api'],'prefix'=>'product_reviews'],function (){
    Route::get('list','App\Http\Controllers\ProductReviewController@list')->name('product_review.list');
});
Route::fallback(function(){
    return response()->json([
        'message' => 'Página no encontrada. Si el error persiste, póngase en contacto con ......'], 404);
});
