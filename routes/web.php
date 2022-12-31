<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('index');

Route::get('search', [\App\Http\Controllers\Web\SearchController::class, 'search'])->name('search');

Route::get('detail/{id}', [\App\Http\Controllers\Web\PostController::class, 'detail'])->name('detail');

Route::get('category/{id}', [\App\Http\Controllers\Web\CategoryController::class, 'category'])->name('category.detail');

Route::middleware(['guest:web'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('register', [\App\Http\Controllers\Web\AuthController::class, 'showFormRegister'])->name('register');
        Route::post('register', [\App\Http\Controllers\Web\AuthController::class, 'register'])->name('register.post');

        Route::get('login', [\App\Http\Controllers\Web\AuthController::class, 'showFormLogin'])->name('login');
        Route::post('login', [\App\Http\Controllers\Web\AuthController::class, 'login'])->name('login.post');
    });
});

Route::middleware(['auth:web'])->group(function () {
    Route::post('comment', [\App\Http\Controllers\Web\PostController::class, 'comment'])->name('comment');


    Route::prefix('user')->group(function () {
        Route::get('logout', [\App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');

        Route::get('profile', [\App\Http\Controllers\Web\ProfileController::class, 'showFormProfile'])->name('profile');

        Route::post('profile/{id}', [\App\Http\Controllers\Web\ProfileController::class, 'profile'])->name('profile.post');
    });
});








