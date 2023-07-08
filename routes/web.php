<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Library\AhspTaskController;
use App\Http\Controllers\Library\BaseItemCategoryController;
use App\Http\Controllers\Library\BaseItemController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\UserProfileController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/authenticate', 'authenticate')->name('auth.authenticate');;
    Route::get('/auth/logout', 'logout')->name('logout');
});

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/registration/register', 'register')->name('register');
    Route::post('/registration/process', 'process')->name('process_registration');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::singleton('user-profile', UserProfileController::class);

    Route::resource('projects', ProjectController::class);

    Route::resource('library/base-item-categories', BaseItemCategoryController::class);

    Route::controller(TaskController::class)->group(function(){
        Route::get('/projects/{project_id}/tasks', 'index');
    });

    Route::controller(TaskCategoryController::class)->group(function(){
        Route::get('/projects/{project_id}/task-categories', 'index');
        Route::get('/projects/{project_id}/task-categories/add', 'add');
        Route::get('/projects/{project_id}/task-categories/edit/{id}', 'edit');
        Route::post('/projects/{project_id}/task-categories/update', 'update');
        Route::put('/projects/{project_id}/task-categories/update/{id}', 'update');
        Route::post('/projects/{project_id}/task-categories/do/{id}', 'process');
    });
});
