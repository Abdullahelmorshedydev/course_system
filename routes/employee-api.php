<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Employee\GroupController;
use App\Http\Controllers\Api\Employee\MajorController;
use App\Http\Controllers\Api\Employee\CourseController;
use App\Http\Controllers\Api\Employee\SessionController;
use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\Employee\LocationController;
use App\Http\Controllers\Api\Employee\SettingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('locations', LocationController::class);
Route::apiResource('majors', MajorController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('groups', GroupController::class);
Route::apiResource('sessions', SessionController::class);

Route::prefix('/settings')->as('settigns.')->group(function(){

    Route::controller(SettingsController::class)->prefix('/general')->as('general.')->group(function(){
        Route::get('/', 'index');
        Route::put('/', 'update');
    });
});