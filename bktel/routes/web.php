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



Route::get('/home_admin', [App\Http\Controllers\HomeController::class, 'index'])->withoutMiddleware(['is_student']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('is_student');
// Route::get('/sign', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Student route 

// Route::group(['prefix' => 'students'], function () {
//     Route::get('/index',[App\Http\Controllers\Student::class, 'index'])->name('student.index');
// 	Route::get('/show',[App\Http\Controllers\Student::class, 'show'])->name('student.show');
// 	Route::post('/store',[App\Http\Controllers\Student::class, 'store'])->name('student.store');
// 	Route::put('/update',[App\Http\Controllers\Student::class, 'update'])->name('student.update');
// 	Route::get('/destroy',[App\Http\Controllers\Student::class, 'destroy'])->name('student.destroy');
// });
Route::get('student_index',[App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
Route::post('student_store',[App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
Route::post('student_show',[App\Http\Controllers\StudentController::class, 'show'])->name('students.show');
Route::put('student_update', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
Route::delete('students_delete', [App\Http\Controllers\StudentController::class, 'delete'])->name('students.delete');

Route::post('teacher_store',[App\Http\Controllers\TeacherController::class, 'store'])->name('teacher.store');
// Route::get('getImages', [ ImageUploadController::class, 'getImages' ])->name('image.upload');
// Route::post('postUpload', [ ImageUploadController::class, 'postUpload' ])->name('image.upload.post');
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
