<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleCategories;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'store'])->name('login');


Route::middleware(['user'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(RoleCategories::class)->prefix('role/category')->group(function () {
        Route::get('/index', 'index')->name('role.category.index');
        Route::post('/store', 'store')->name('role.category.store');
        Route::get('/edit/{id}', 'edit')->name('role.category.edit');
        Route::post('/update', 'update')->name('role.category.update');
        Route::get('/delete/{id}/{roleCategoryName}', 'delete')->name('roleCategory.delete');
    });


    Route::controller(PermissionController::class)->prefix('permission')->group(function () {

        Route::get('index', 'index')->name('permission.index');
        Route::post('store', 'store')->name('permission.store');
        Route::get('edit/{id}', 'edit')->name('permission.edit');
        Route::post('update', 'update')->name('permission.update');
        Route::get('delete/{id}', 'delete')->name('permission.delete');
    });

    Route::controller(RoleController::class)->prefix('role')->group(function () {

        Route::get('index', 'index')->name('role.index');
        Route::post('store', 'store')->name('role.store');
        Route::get('edit/{id}', 'edit')->name('role.edit');
        Route::put('update', 'update')->name('role.update');
        Route::get('delete/{id}/{roleName}', 'delete')->name('role.delete');

        Route::get('assign-permission/{roleId}', 'assignPermission')->name('role.assign.permission');
        Route::post('update/assign/permission', 'updaetAssignPermission')->name('role.update.assign.permission');
    });


    Route::controller(UserController::class)->prefix('user')->group(function () {

        Route::get('index', 'index')->name('user.index');
        Route::post('store', 'store')->name('user.store');
        Route::get('edit/{id}', 'edit')->name('user.edit');
        Route::post('update', 'update')->name('user.update');
        Route::post('assign/role', 'storeAssignRole')->name('user.assign.rolestore');
        Route::get('assign/role/{id}', 'assignRole')->name('user.assign.role');
        Route::get('deactive/{id}', 'deactivate')->name('user.deactive');
    });


    Route::controller(ProjectController::class)->prefix('project')->group(function () {
        Route::get('index', 'index')->name('project.index');
        Route::get('create', 'create')->name('project.create');
        Route::post('store', 'store')->name('project.store');

        Route::get('list', 'projectList')->name('project.list');
    });

    Route::controller(ClientController::class)->prefix('client')->group(function () {

        Route::get('index', 'index')->name('client.index');
        Route::get('project/{id}', 'clientProject')->name('client.project');
    });
});
