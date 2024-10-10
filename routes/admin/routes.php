<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminCityController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminStateController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\tc_city_urlsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminAuthController::class, 'login'])->name('admin.auth.login');
Route::post('admin/login-submit', [AdminAuthController::class, 'loginSubmit'])->name('admin.auth.login.submit');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.auth.logout');
Route::get('admin/states-search',[AdminStateController::class,'search'])->name('admin.states.search');
Route::get('admin/cities-search',[AdminCityController::class,'search'])->name('admin.cities.search');


Route::middleware(['admin'])->prefix('admin')->as('admin.')->group(function() {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::resource('states',AdminStateController::class);
    Route::get('find-state',[AdminStateController::class,'findState'])->name('find.state');

    Route::resource('cities',AdminCityController::class);
    Route::get('find-city',[AdminCityController::class,'findCity'])->name('find.city');


    Route::resource('company',AdminCompanyController::class );
    
    Route::resource('users',AdminUserController::class );
    Route::get('users-search',[AdminUserController::class,'search'])->name('users.search');

    Route::resource('tc-city-url', tc_city_urlsController::class );


});



