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

Route::post('upload_file',[App\Http\Controllers\FileController::class, 'upload'])->name('upload');
Route::post('upload_file_stu',[App\Http\Controllers\FileController::class, 'upload_student'])->name('upload');
Route::post('upload_file_sub',[App\Http\Controllers\FileController::class, 'upload_subject'])->name('upload');
//Show all File 

Route::post('subject_store',[App\Http\Controllers\SubjectController::class, 'store']);
Route::post('file_index',[App\Http\Controllers\FileController::class, 'index']);


Route::post('teach_to_sub',[App\Http\Controllers\TeacherToSubjectController::class, 'store']);
Route::post('search_sub',[App\Http\Controllers\TeacherToSubjectController::class, 'search']);
Route::post('teach_sub_show',[App\Http\Controllers\TeacherToSubjectController::class, 'show']);
// Route::get('getImages', [ ImageUploadController::class, 'getImages' ])->name('image.upload');
// Route::post('postUpload', [ ImageUploadController::class, 'postUpload' ])->name('image.upload.post');
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);
