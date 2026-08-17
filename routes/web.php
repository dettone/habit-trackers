<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');

Route::middleware('auth')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');
});