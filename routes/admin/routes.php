<?php

use App\Http\Controllers\Admin\AdminStateController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');


Route::resource('states',AdminStateController::class);


