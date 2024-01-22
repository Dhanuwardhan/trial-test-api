<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// API JOBS
Route::get('jobs', [\App\Http\Controllers\JobsController::class, 'index']);
Route::post('jobs', [\App\Http\Controllers\JobsController::class, 'create']);
Route::put('jobs/{id}', [\App\Http\Controllers\JobsController::class, 'update']);
Route::delete('jobs/{id}', [\App\Http\Controllers\JobsController::class, 'destroy']);
Route::get('jobs/{id}', [\App\Http\Controllers\JobsController::class, 'show']);
//API ROLE
Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index']);
Route::post('roles', [\App\Http\Controllers\RolesController::class, 'create']);
Route::put('roles/{id}', [\App\Http\Controllers\RolesController::class, 'update']);
Route::delete('roles/{id}', [\App\Http\Controllers\RolesController::class, 'destroy']);
Route::get('roles/{id}', [\App\Http\Controllers\RolesController::class, 'show']);
// API TEAMS
Route::get('teams', [\App\Http\Controllers\TeamsController::class, 'index']);
Route::post('teams', [\App\Http\Controllers\TeamsController::class, 'create']);
Route::put('teams/{id}', [\App\Http\Controllers\TeamsController::class, 'update']);
Route::delete('teams/{id}', [\App\Http\Controllers\TeamsController::class, 'destroy']);
Route::get('teams/{id}', [\App\Http\Controllers\TeamsController::class, 'show']);

//API EMPLOYEE
Route::post('employees', [\App\Http\Controllers\EmployeeController::class, 'create']);
Route::put('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);
Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'show']);
Route::delete('employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'destroy']);


