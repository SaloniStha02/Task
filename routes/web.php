<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
// Route::get('/', function () {
//     return view('main.home');
// });

Route::get('/', [StudentController::class, 'index'])->name('student');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/studentlist', [StudentController::class, 'store'])->name('students.store');
Route::any('/editstudent/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::put('/updatestudent/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');
