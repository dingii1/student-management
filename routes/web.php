<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentGradeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes for Student
Route::get('/students', [StudentsController::class, 'index'])->name('students.index'); // Display a list of students
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create'); // Show the create student form
Route::post('/students', [StudentsController::class, 'store'])->name('students.store'); // Store a new student
Route::get('/students/{id}', [StudentsController::class, 'show'])->name('students.show'); // Display a single student
Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit'); // Show the edit student form
Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update'); // Update a student
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy'); // Delete a student

// Routes for Course
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

// Create a grade for a student
Route::get('/grades/create/{student}', [StudentGradeController::class, 'create'])->name('grades.create');
Route::post('/grades/store', [StudentGradeController::class, 'store'])->name('grades.store');