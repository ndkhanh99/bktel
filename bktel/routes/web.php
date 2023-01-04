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
//Student Route
Route::get('student_index',[App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
Route::post('student_store',[App\Http\Controllers\StudentController::class, 'store'])->name('students.store');
Route::post('student_show',[App\Http\Controllers\StudentController::class, 'show'])->name('students.show');
Route::put('student_update', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
Route::delete('students_delete', [App\Http\Controllers\StudentController::class, 'delete'])->name('students.delete');

Route::post('teacher_store',[App\Http\Controllers\TeacherController::class, 'store'])->name('teacher.store');

//Upload File
Route::post('upload_file',[App\Http\Controllers\FileController::class, 'upload']);
Route::post('upload_file_stu',[App\Http\Controllers\FileController::class, 'upload_student']);
Route::post('upload_file_sub',[App\Http\Controllers\FileController::class, 'upload_subject']);
Route::post('upload_report',[App\Http\Controllers\ReportController::class, 'upload_report']);

//Create
Route::post('subject_store',[App\Http\Controllers\SubjectController::class, 'store']);
Route::post('teach_to_sub',[App\Http\Controllers\TeacherToSubjectController::class, 'store']);
//Show all File 
Route::post('file_index',[App\Http\Controllers\FileController::class, 'index']);
Route::post('file_index_report',[App\Http\Controllers\ReportController::class, 'index_report']);


//Search And Show
Route::post('search_sub',[App\Http\Controllers\TeacherToSubjectController::class, 'search']);
Route::post('teach_sub_show',[App\Http\Controllers\TeacherToSubjectController::class, 'show']);

