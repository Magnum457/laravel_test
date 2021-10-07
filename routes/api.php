<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Courses
Route::get('courses', [CourseController::class, 'index']);
Route::get('course/{id}', [CourseController::class], 'show');
Route::post('course', [CourseController::class, 'store']);
Route::put('course/{id}', [CourseController::class, 'update']);
Route::delete('course/{id}', [CourseController::class, 'destroy']);

// Schools
Route::get('schools', [SchoolController::class, 'index']);
Route::get('school/{id}', [SchoolController::class], 'show');
Route::post('school', [SchoolController::class, 'store']);
Route::put('school/{id}', [SchoolController::class, 'update']);
Route::delete('school/{id}', [SchoolController::class, 'destroy']);

// Students
Route::get('students', [StudentController::class, 'index']);
Route::get('student/{id}', [StudentController::class], 'show');
Route::post('student', [StudentController::class, 'store']);
Route::put('student/{id}', [StudentController::class, 'update']);
Route::delete('student/{id}', [StudentController::class, 'destroy']);
