<?php

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

Route::get('get-category',[App\Http\Controllers\CategoryController::class,'index']);
Route::post('receive-category',[App\Http\Controllers\CategoryController::class,'store']);
Route::delete('delete-category/{id}',[App\Http\Controllers\CategoryController::class,'destroy']);
Route::put('update-category/{id}',[App\Http\Controllers\CategoryController::class,'update']);
Route::get('search-category/{name}',[App\Http\Controllers\CategoryController::class,'show']);
Route::get('product-category/{product}',[App\Http\Controllers\ProductController::class,'index']);
Route::post('create-category',[App\Http\Controllers\ProductController::class,'store']);
Route::put('upprod-category/{id}',[App\Http\Controllers\ProductController::class,'update']);
Route::delete('delprod-category/{id}',[App\Http\Controllers\ProductController::class,'destroy']);
Route::get('srchprod-category/{name}',[App\Http\Controllers\ProductController::class,'show']);
Route::post('rtngprod-category',[App\Http\Controllers\RatingController::class,'store']);
Route::get('rtngprod-category',[App\Http\Controllers\RatingController::class,'index']);
Route::get('rtngprod-category/{id}',[App\Http\Controllers\RatingController::class,'show']);
Route::delete('rtngprod-category/{id}',[App\Http\Controllers\RatingController::class,'destroy']);
Route::put('rtngprod-category/{id}',[App\Http\Controllers\RatingController::class,'update']);
// route register
Route::post('register',[App\Http\Controllers\Api\AuthController::class, 'register']);
