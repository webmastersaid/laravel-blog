<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DestroyController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
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
    Route::prefix('categories')->name('admin.category.')->namespace('Category')->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/create', CreateController::class)->name('create');
        Route::post('/', StoreController::class)->name('store');
        Route::get('/{category}', ShowController::class)->name('show');
        Route::get('/{category}/edit', EditController::class)->name('edit');
        Route::patch('/{category}', UpdateController::class)->name('update');
        Route::delete('{category}', DestroyController::class)->name('destroy');
    });
});

Auth::routes();