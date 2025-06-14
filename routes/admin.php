<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleCategories;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'store']);

Route::get('admin-login', [AuthController::class, 'adminLogin'])->name('admin.login');

// Admin-only routes
Route::middleware(['admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::controller(RoleCategories::class)->prefix('role/category')->group(function () {
        Route::get('/index', 'index')->name('role.category.index');
        Route::post('/store', 'store')->name('admin.role.category.store');
        Route::get('/edit/{id}', 'edit')->name('admin.role.category.edit');
        Route::post('/update', 'update')->name('admin.role.category.update');
        Route::get('/delete/{id}/{roleCategoryName}', 'delete')->name('roleCategory.delete');
    });


    Route::controller(RoleController::class)->prefix('role')->group(function () {

        Route::get('index', 'index')->name('role.index');
        Route::post('store', 'store')->name('role.store');
        Route::get('edit/{id}', 'edit')->name('role.edit');
        Route::put('update', 'update')->name('role.update');
        Route::get('delete/{id}/{roleName}', 'delete')->name('role.delete');
    });
});
