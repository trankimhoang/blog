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

Route::middleware(['guest:web'])->group(function (){
    Route::get('user/register', [\App\Http\Controllers\Web\AuthController::class, 'showFormRegister'])->name('register');
    Route::post('user/register', [\App\Http\Controllers\Web\AuthController::class, 'register'])->name('register.post');

    Route::get('user/login', [\App\Http\Controllers\Web\AuthController::class, 'showFormLogin'])->name('login');
    Route::post('user/login', [\App\Http\Controllers\Web\AuthController::class, 'login'])->name('login.post');

});

Route::middleware(['auth:web'])->group(function (){
    Route::get('user/logout', [\App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');

    Route::post('comment', [\App\Http\Controllers\Web\PostController::class, 'comment'])->name('comment');

});








