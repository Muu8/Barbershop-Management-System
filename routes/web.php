<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::resource('/services', ServiceController::class)->except('show')->middleware(['auth','admin']);

Route::resource('/payments', PaymentController::class)->except('show', 'edit', 'update')->middleware(['auth','admin']);

Route::resource('/sellers', SellerController::class)->middleware(['auth','admin']);

Route::resource('/sales', SalesController::class)->except('show','edit', 'update', 'destroy')->middleware(['auth','user']);
Route::resource('/sales', SalesController::class)->only('destroy', 'edit', 'update')->middleware(['auth','admin']);


Route::resource('/expenses', ExpenseController::class)->except('show')->middleware(['auth','admin']);

