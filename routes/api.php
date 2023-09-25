<?php

use App\Http\Controllers\PersonalAccessTokenController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'auth'], function (){
    Route::post('/register', [\App\Http\Controllers\Api\Auth\RegisterController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Api\Auth\LoginController::class, 'login']);

    Route::post('/logout', [\App\Http\Controllers\Api\Auth\LogoutController::class, 'logout'])->middleware('auth:sanctum');

    Route::delete('/user', [\App\Http\Controllers\Api\Auth\DeleteUserController::class, 'destroy'])->middleware('auth:sanctum');

    Route::post('/password/email', [\App\Http\Controllers\Api\Auth\PasswordResetController::class, 'sendPasswordResetLink']);
    Route::post('/password/reset', [\App\Http\Controllers\Api\Auth\PasswordResetController::class, 'reset']);

});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/get', [\App\Http\Controllers\GetController::class, '__invoke']);
});

Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);

Route::get('/product-attributes', [\App\Http\Controllers\ProductAttributeController::class, 'index']);
Route::post('/product-attributes', [\App\Http\Controllers\ProductAttributeController::class, 'store']);
Route::delete('/product-attributes/{id}', [\App\Http\Controllers\ProductAttributeController::class, 'destroy']);
