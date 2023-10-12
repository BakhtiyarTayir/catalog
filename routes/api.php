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

Route::group(['namespace' => 'product'], function () {
    Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('/products/{id}', [\App\Http\Controllers\Api\ProductController::class,'show']);
    Route::post('/products', [\App\Http\Controllers\Api\ProductController::class,'store']);
    Route::put('/products/{id}', [\App\Http\Controllers\Api\ProductController::class, 'update']);
    Route::delete('/products/{id}', [\App\Http\Controllers\Api\ProductController::class, 'destroy']);

    Route::get('products', [\App\Http\Controllers\Api\ProductController::class, 'getProducts']);
    Route::get('products-slug/{slug}', [\App\Http\Controllers\Api\ProductController::class, 'getProductBySlug']);

});

Route::group(['namespace' => 'category'], function () {
    Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/categories/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'show']);
    Route::post('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'store']);
    Route::put('/categories/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'destroy']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/cart/add', [\App\Http\Controllers\Api\CartController::class, 'addToCart']);
    Route::put('/cart/item/{itemId}',[\App\Http\Controllers\Api\CartController::class, 'updateCartItem']);
    Route::delete('/cart/item/{itemId}', [\App\Http\Controllers\Api\CartController::class, 'removeCartItem']);
});



Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);

Route::get('/product-attributes', [\App\Http\Controllers\ProductAttributeController::class, 'index']);
Route::post('/product-attributes', [\App\Http\Controllers\ProductAttributeController::class, 'store']);
Route::delete('/product-attributes/{id}', [\App\Http\Controllers\ProductAttributeController::class, 'destroy']);
