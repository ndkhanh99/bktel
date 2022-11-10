<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('after', function () {
    return view('after');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/sign', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Student route 

// Route::group(['prefix' => 'students'], function () {
//     Route::get('/index',[App\Http\Controllers\Student::class, 'index'])->name('student.index');
// 	Route::get('/show',[App\Http\Controllers\Student::class, 'show'])->name('student.show');
// 	Route::post('/store',[App\Http\Controllers\Student::class, 'store'])->name('student.store');
// 	Route::put('/update',[App\Http\Controllers\Student::class, 'update'])->name('student.update');
// 	Route::get('/destroy',[App\Http\Controllers\Student::class, 'destroy'])->name('student.destroy');
// });
Route::get('student_index',[App\Http\Controllers\Student::class, 'index'])->name('students.index');
Route::post('student_store',[App\Http\Controllers\Student::class, 'store'])->name('students.store');
Route::get('student_show',[App\Http\Controllers\Student::class, 'show'])->name('students.show');
Route::put('student_update', [App\Http\Controllers\Student::class, 'update'])->name('students.update');
Route::delete('students_delete', [App\Http\Controllers\Student::class, 'delete'])->name('students.delete');

// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
