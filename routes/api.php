<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HandoutController;
use App\Http\Controllers\TherapistController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// * Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.all');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');


// * Handouts
Route::get('/handouts', [HandoutController::class, 'index'])->name('handouts.all');
Route::get('/handouts/{id}', [HandoutController::class, 'show'])->name('handouts.show');

// * Therapists
Route::get('/therapists', [TherapistController::class, 'index'])->name('therapists.all');
Route::get('/therapists/{id}', [TherapistController::class, 'show'])->name('therapists.show');