<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [LoginController::class, 'show_login'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/trombi', [UserController::class, 'show_trombi'])->middleware('auth')->name('trombi');
Route::get('/trombi/{service}', [UserController::class, 'show_service'])->middleware('auth')->name('service');
Route::get('/admin', [UserController::class, 'show_admin'])->middleware('auth')->name('admin');
Route::get('/admin/{service}', [UserController::class, 'show_admin2'])->middleware('auth');
Route::post('/admin', [UserController::class, 'store'])->middleware('auth')->name('admin');

Route::get('/profile/{login}',[ProfileController::class, 'show_profile'])->middleware('auth');
Route::get('/profile/{login}/update',[ProfileController::class, 'show_update'])->middleware('auth');
Route::post('/profile/{login}/update', [ProfileController::class, 'update'])->middleware('auth')->name('update');

Route::post('/profile/{login}/remove', [ProfileController::class, 'remove'])->middleware('auth')->name('remove');