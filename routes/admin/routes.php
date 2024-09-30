<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\Admin\AdminStateController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [AdminAuthController::class, 'login'])->name('admin.auth.login');
Route::post('admin/login-submit', [AdminAuthController::class, 'loginSubmit'])->name('admin.auth.login.submit');


Route::resource('states',AdminStateController::class);
Route::resource('cities',AdminCityController::class);


