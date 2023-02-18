<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserProductController;


    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::group(['prefix' => 'register'],function()
    {
        Route::post('email',[AuthController::class,'registerByEmail']);
        Route::post('phone',[AuthController::class,'registerByPhone']);
    });

    Route::group(['prefix' => 'user','middleware' => 'auth.guard:user-api'],function()
    {

        Route::get('profile',[UserController::class,'getProfile']);
        Route::put('update-info',[UserController::class,'updateInformationUser']);
        Route::put('change-password',[UserController::class,'changePassword']);
        Route::get('get-products',[UserProductController::class,'getProductsForUser']);

    });
    Route::group(['middleware' => 'auth.guard:user-api'],function()
    {
        Route::post('logout',[AuthController::class,'logout']);
    });

    Route::group(['prefix' => 'admin','middleware' => 'auth.guard:user-api'],function()
    {

        Route::get('get-users',[UserController::class,'index']);
        Route::post('add-user',[UserController::class,'store']);
        Route::put('update-user/{user_id}',[UserController::class,'update']);
        Route::delete('delete-user/{user_id}',[UserController::class,'destroy']);
        Route::post('add-product-user',[UserProductController::class,'addProductToUser']);


    });

    Route::group(['prefix' => 'product'],function()
    {
        Route::post('store',[ProductController::class,'store']);
        Route::post('update/{id}',[ProductController::class,'update']);
        Route::delete('delete/{id}',[ProductController::class,'destroy']);
    });


