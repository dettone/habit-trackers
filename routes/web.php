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
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');


    Route::get('/dashboard/habits/create', [HabitsController::class, 'create'])->name('habits.create');
    Route::post('/dashboard/habits', [HabitsController::class, 'store'])->name('habits.store');
    Route::delete('/dashboard/habits/{habit}', [HabitsController::class, 'destroy'])->name('habits.destroy');
    Route::get('/dashboard/habits/{habit}/edit', [HabitsController::class, 'edit'])->name('habits.edit');
    Route::put('/dashboard/habits/{habit}', [HabitsController::class, 'update'])->name('habits.update');
    
});