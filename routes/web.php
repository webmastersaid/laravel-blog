<?php

use Illuminate\Support\Facades\Auth;
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

Route::name('main.')->namespace('App\Http\Controllers\Main')->group(function () {
    Route::namespace('Home')->group(function(){
        Route::get('/', IndexController::class)->name('home.index');
    });
    Route::prefix('blog')->namespace('Blog')->group(function(){
        Route::get('/', IndexController::class)->name('blog.index');
    });
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::namespace('Blog')->group(function () {
        Route::get('/', IndexController::class)->name('admin.index');
    });
    Route::prefix('categories')->namespace('Category')->group(function () {
        Route::get('/', IndexController::class)->name('category.index');
    });
});

Auth::routes();