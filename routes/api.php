<?php

use App\Http\Controllers\AuthoController;
use App\Http\Controllers\PostController;
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



Route::post('register',[ AuthoController::class,'register']);
Route::post('login',[ AuthoController::class,'login']);


Route::middleware(['auth:sanctum'])->group(function () {

Route::post('logout',[ AuthoController::class,'logout']);

Route::get('/post',[PostController::class,'index']);
Route::get('/post/{post}',[PostController::class,'show']);
Route::put('/post/{post}',[PostController::class,'update']);
Route::delete('/post/{post}',[PostController::class,'destroy']);
Route::post('/post',[PostController::class,'store']);
});
