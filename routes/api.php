<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HandoutController;
use App\Http\Controllers\LibraryBgController;
use App\Http\Controllers\LibraryButtonsController;
use App\Http\Controllers\PagesController;
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

// * Library Backgrounds
Route::get('/librarybg', [LibraryBgController::class, 'index'])->name('librarybg.all');
Route::get('/librarybg/{id}', [LibraryBgController::class, 'show'])->name('librarybg.show');


// * Library Buttons
Route::get('/librarybuttons', [LibraryButtonsController::class, 'index'])->name('librarybuttons.all');


// * Banners
Route::get('/banners', [BannersController::class, 'index'])->name('banners.all');
Route::get('/banners/{id}', [BannersController::class, 'show'])->where('id', '[0-9]+')->name('banners.show');
Route::get('/banners/{page}/{section}', [BannersController::class, 'showBySection'])->where('page', '[0-9]+')->where('section', '[0-9]+')->name('banners.showBySection');


// * Pages
Route::get('/pages', [PagesController::class, 'index'])->name('pages.all');
Route::get('/pages/{slug}', [PagesController::class, 'slug'])->name('pages.slug');
Route::get('/pagesWithId/{id}', [PagesController::class, 'show'])->name('pages.show');
