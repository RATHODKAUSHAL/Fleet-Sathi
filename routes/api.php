<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\ApiCityController;
use App\Http\Controllers\Api\ApiStateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('api')->group(function () {
    // Authentication routes
    Route::post('login', [AdminAuthController::class, 'login'])->name('api.admin.auth.login');
    Route::post('logout', [AdminAuthController::class, 'logout'])->middleware('auth:api')->name('api.admin.auth.logout');

    // Public search routes
    Route::get('states/search', [ApiStateController::class, 'search'])->name('api.admin.states.search');
    Route::get('cities/search', [ApiCityController::class, 'search'])->name('api.admin.cities.search');
});

// Protected API routes with authentication middleware
    // Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // States resource routes
    Route::resource('states', ApiStateController::class)->except(['create', 'edit']);
    Route::get('find-state', [ApiStateController::class, 'findState'])->name('find.state');

    // Cities resource routes
    Route::resource('cities', ApiCityController::class)->except(['create', 'edit']);
