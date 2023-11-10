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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::namespace('App\Http\Controllers')->group(function () {
    Route::name('main.')->namespace('Main')->group(function () {
        Route::namespace('Home')->group(function () {
            Route::get('/', IndexController::class)->name('home.index');
        });
        Route::prefix('blog')->namespace('Blog')->group(function () {
            Route::get('/', IndexController::class)->name('blog.index');
        });
    });
    Route::prefix('personal')->name('personal.')->namespace('Personal')->middleware(['auth', 'verified'])->group(function () {
        Route::name('dashboard.')->namespace('Dashboard')->group(function () {
            Route::get('/', IndexController::class)->name('index');
        });
        Route::prefix('comments')->name('comment.')->namespace('Comment')->group(function () {
            Route::get('/', IndexController::class)->name('index');
            Route::get('/{comment}/edit', EditController::class)->name('edit');
            Route::patch('/{comment}', UpdateController::class)->name('update');
            Route::delete('/{comment}', DestroyController::class)->name('destroy');
        });
        Route::prefix('likes')->name('like.')->namespace('Like')->group(function () {
            Route::get('/', IndexController::class)->name('index');
            Route::delete('/{like}', DestroyController::class)->name('destroy');
        });
    });
    Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
        Route::name('dashboard.')->namespace('Dashboard')->group(function () {
            Route::get('/', IndexController::class)->name('index');
        });
        Route::prefix('users')->name('user.')->namespace('User')->group(function () {
            Route::get('/', IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
            Route::post('/', StoreController::class)->name('store');
            Route::get('/{user}', ShowController::class)->name('show');
            Route::get('/{user}/edit', EditController::class)->name('edit');
            Route::patch('/{user}', UpdateController::class)->name('update');
            Route::delete('/{user}', DestroyController::class)->name('destroy');
        });
        Route::prefix('categories')->name('category.')->namespace('Category')->group(function () {
            Route::get('/', IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
            Route::post('/', StoreController::class)->name('store');
            Route::get('/{category}', ShowController::class)->name('show');
            Route::get('/{category}/edit', EditController::class)->name('edit');
            Route::patch('/{category}', UpdateController::class)->name('update');
            Route::delete('/{category}', DestroyController::class)->name('destroy');
        });
        Route::prefix('tags')->name('tag.')->namespace('Tag')->group(function () {
            Route::get('/', IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
            Route::post('/', StoreController::class)->name('store');
            Route::get('/{tag}', ShowController::class)->name('show');
            Route::get('/{tag}/edit', EditController::class)->name('edit');
            Route::patch('/{tag}', UpdateController::class)->name('update');
            Route::delete('/{tag}', DestroyController::class)->name('destroy');
        });
        Route::prefix('posts')->name('post.')->namespace('Post')->group(function () {
            Route::get('/', IndexController::class)->name('index');
            Route::get('/create', CreateController::class)->name('create');
            Route::post('/', StoreController::class)->name('store');
            Route::get('/{post}', ShowController::class)->name('show');
            Route::get('/{post}/edit', EditController::class)->name('edit');
            Route::patch('/{post}', UpdateController::class)->name('update');
            Route::delete('/{post}', DestroyController::class)->name('destroy');
        });
    });
});

Auth::routes(['verify' => true]);
