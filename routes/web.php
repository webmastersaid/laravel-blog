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

Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::name('dashboard.')->namespace('Dashboard')->group(function () {
        Route::get('/', IndexController::class)->name('index');
    });
    Route::prefix('categories')->name('category.')->namespace('Category')->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{category}', ShowController::class)->name('show');
        Route::get('/{category}/edit', EditController::class)->name('edit');
        Route::patch('/{category}', UpdateController::class)->name('update');
        Route::delete('{category}', DestroyController::class)->name('destroy');
    });
    Route::prefix('tags')->name('tag.')->namespace('Tag')->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{tag}', ShowController::class)->name('show');
        Route::get('/{tag}/edit', EditController::class)->name('edit');
        Route::patch('/{tag}', UpdateController::class)->name('update');
        Route::delete('{tag}', DestroyController::class)->name('destroy');
    });
});

Auth::routes();