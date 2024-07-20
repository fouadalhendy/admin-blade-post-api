<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\AuthoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/home/tags',[TagController::class,'index'])->name('tag.index');
    Route::get('/home/creat',[TagController::class,'create'])->name('tag.create');
    Route::get('/home/tagedite/{tag}',[TagController::class,'edit'])->name('tag.ediet');
    Route::post('/home/tagupdate/{tag}',[TagController::class,'update'])->name('tag.update');
    Route::post('/home/tagstore',[tagController::class,'store'])->name('tag.store');
    Route::delete('/home/tagdestroy/{tag}',[tagController::class,'destroy'])->name('tag.destroy');



    Route::get('/home',[CategoryController::class,'index'])->name('cate.index');
    Route::get('/home/create',[CategoryController::class,'create'])->name('cate.create');
    Route::get('/home/edit/{category}',[CategoryController::class,'edit'])->name('cate.edit');
    Route::post('/home/update/{category}',[CategoryController::class,'update'])->name('cate.update');
    Route::post('/home/store',[CategoryController::class,'store'])->name('cate.store');
    Route::delete('/home/destroy/{category}',[CategoryController::class,'destroy'])->name('cate.destroy');


    Route::get('/home/user',[UserController::class,'index'])->name('user.index');
    Route::get('/home/user/block/{user}',[UserController::class,'block'])->name('user.block');
    Route::get('/home/user/unblck/{user}',[UserController::class,'unblck'])->name('user.unblck');
    Route::delete('/home/user/{user}',[UserController::class,'destroy'])->name('user.destroy');

    Route::get('/loguot',[AuthoController::class,'logout'])->name('auth.logout');
});
Route::middleware(['guest'])->group(function () {
    Route::get('/',[AuthoController::class,'logi']);
    Route::post('/',[AuthoController::class,'login'])->name('auth.login');

});
