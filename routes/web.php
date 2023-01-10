<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// create data & show data file upload
Route::get('/create',[StudentController::class, 'create'])->name('student.create');
Route::post('/store', [StudentController::class, 'store'])->name('store.student');
Route::get('/show', [StudentController::class, 'index'])->name('show.student');

// edit Data
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit.data');
Route::put('/update_data/{id}', [StudentController::class, 'update'])->name('update.data');

// delete data
Route::get('/destroy/{id}', [StudentController::class, 'delete'])->name('delete.data');
