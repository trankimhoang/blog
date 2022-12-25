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
Route::get('index', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('index');



Route::middleware(['guest:web'])->group(function (){
    Route::get('user/register', [\App\Http\Controllers\Web\AuthController::class, 'showFormRegister'])->name('register');
    Route::post('user/register', [\App\Http\Controllers\Web\AuthController::class, 'register'])->name('register.post');

    Route::get('user/login', [\App\Http\Controllers\Web\AuthController::class, 'showFormLogin'])->name('login');
    Route::post('user/login', [\App\Http\Controllers\Web\AuthController::class, 'login'])->name('login.post');

});

Route::middleware(['auth:web'])->group(function (){
    Route::get('user/logout', [\App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');
});








