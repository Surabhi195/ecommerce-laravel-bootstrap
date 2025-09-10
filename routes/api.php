<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('me',[AuthController::class,'me']);
    Route::post('logout',[AuthController::class,'logout']);

    Route::apiResource('items', ItemController::class);
    Route::post('cart/add', [CartController::class,'add']);
    Route::get('cart', [CartController::class,'index']);
    Route::delete('cart/{id}', [CartController::class,'remove']);
});

