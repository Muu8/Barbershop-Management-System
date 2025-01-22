<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [AuthController::class, 'index'])->name('auth.index')->middleware(['auth','admin']);
Route::get('/users/{user}/edit', [AuthController::class, 'edit'])->name('auth.edit')->middleware(['auth','admin']);
Route::put('/users/{user}', [AuthController::class, 'update'])->name('auth.update')->middleware(['auth','admin']);
Route::delete('/users/{user}', [AuthController::class, 'destroy'])->name('auth.destroy')->middleware(['auth','admin']);


Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

