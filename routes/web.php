<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/offices', [PublicController::class, 'offices'])->name('offices');
Route::get('/teachers', [PublicController::class, 'teachers'])->name('teachers');
Route::get('/teachers/{id}', [PublicController::class, 'teacherProfile'])->name('teachers.profile');
Route::get('/courses', [PublicController::class, 'courses'])->name('courses');
Route::get('/courses/{id}', [PublicController::class, 'courseDetail'])->name('courses.detail');
Route::get('/enroll', [PublicController::class, 'enroll'])->name('enroll');
Route::get('/tutorials', [PublicController::class, 'tutorials'])->name('tutorials');
Route::get('/reviews', [PublicController::class, 'reviews'])->name('reviews');
