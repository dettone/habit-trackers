<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HabitsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');


Route::get('/register', [RegisterController::class, 'register'])->name('site.register');
Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');


Route::middleware('auth')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard/habit', [SiteController::class, 'dashboard'])->name('site.dashboard');
    Route::resource('/dashboard/habits', HabitsController::class)->except(['show']);    
    Route::get('/dashboard/habits/history', [HabitsController::class, 'history'])->name('habits.history');
    Route::post('/dashboard/habits/{habit}/check', [HabitsController::class, 'check'])->name('habits.check');

});