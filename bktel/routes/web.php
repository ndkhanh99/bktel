<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentsController;
use App\Models\Import;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware([('check_admin-role'),('check_student-id')]);

Route::get('/add-teacher',function(){
	return view('form_teacher') ;
})->middleware('check_admin');

Route::get('/up-image',function(){
	return view('upimage');
});

Route::get('/add-teacher',function(){
	return view('form_teacher') ;
})->middleware('check_admin');

Route::get('/export',function(){
	return view('export') ;
});

Route::get('/enroll-teacher',function(){
	return view('TeachertoSubject') ;
})->middleware('check_admin');

Route::get('/upload_report',function(){
	return view('UploadReport'); 
});

Route::get('/add-subject',function(){
	return view('form_subject') ;
})->middleware('check_admin');

Route::get('/add-student',function(){
	return view('form_student') ;
})->middleware('check_admin');

Route::get('/import-teacher',function(){
	return view('import_teacher');
})->middleware('check_admin');

Route::get('/submit-mark',function(){
	return view('SubmitMark');
});


Route::get('/import-subject',function(){
	return view('import_subject');
})->middleware('check_admin');

Route::get('/import-student',function(){
	return view('import_student');
})->middleware('check_admin');

Route::post('/import_teacher_store',[App\Http\Controllers\Admin\ImportTeacher::class,'store'])->name('import.store');

Route::post('/import_student_store',[App\Http\Controllers\Admin\ImportStudent::class,'store'])->name('import.store');

Route::post('/upload_store',[App\Http\Controllers\Admin\ReportController::class,'store'])->name('upload.store');

Route::post('/submitmark',[App\Http\Controllers\Admin\ReportController::class,'submitmark'])->name('submitmark');

Route::post('/import_subject_store',[App\Http\Controllers\Admin\ImportSubjectController::class,'store'])->name('import.store');

Route::get('/show_name',[App\Http\Controllers\Admin\UserController::class, 'show_name'])->name('user.show_name');

Route::get('/show_image',[App\Http\Controllers\Admin\UserController::class, 'show_image'])->name('user.show_image');

Route::get('/search',[App\Http\Controllers\Admin\TeacherToSubjectController::class, 'search'])->name('search');

Route::post('/search_for_teacher',[App\Http\Controllers\Admin\TeacherToSubjectController::class, 'search_for_teacher'])->name('search_for_teacher');

Route::get('/downfile',[App\Http\Controllers\Admin\ReportController::class, 'downfile'])->name('downfile');

Route::group(['prefix' => 'students'], function () {		
	Route::get('/show',[App\Http\Controllers\Admin\StudentsController::class, 'show'])->name('student.show');
	Route::post('/store',[App\Http\Controllers\Admin\StudentsController::class, 'store'])->name('student.store');
	Route::put('/update',[App\Http\Controllers\Admin\StudentsController::class, 'update'])->name('student.update');
	Route::get('/destroy',[App\Http\Controllers\Admin\StudentsController::class, 'destroy'])->name('student.destroy');
});

Route::group(['prefix' => 'teachers'], function () {
	Route::get('/show',[App\Http\Controllers\Admin\TeacherController::class, 'show'])->name('teacher.show');
	Route::post('/store',[App\Http\Controllers\Admin\TeacherController::class, 'store'])->name('teacher.store');
	Route::put('/update',[App\Http\Controllers\Admin\TeacherController::class, 'update'])->name('teacher.update');
	Route::get('/destroy',[App\Http\Controllers\Admin\TeacherController::class, 'destroy'])->name('teacher.destroy');
});

Route::group(['prefix' => 'subjects'], function () {
	Route::get('/show',[App\Http\Controllers\Admin\SubjectController::class, 'show'])->name('teacher.show');
	Route::post('/store',[App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('teacher.store');
	Route::put('/update',[App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('teacher.update');
	Route::get('/destroy',[App\Http\Controllers\Admin\SubjectController::class, 'destroy'])->name('teacher.destroy');
});

Route::group(['prefix' => 'TeachertoSubjects'], function () {
	Route::post('/store',[App\Http\Controllers\Admin\TeacherToSubjectController::class, 'store'])->name('enroll.store');
	Route::post('/search',[App\Http\Controllers\Admin\TeacherToSubjectController::class, 'search'])->name('search');
});

Route::post('/export ',[App\Http\Controllers\Admin\TeacherToSubjectController::class, 'export'])->name('export');
Route::post('/upload-image',[App\Http\Controllers\Admin\UserController::class, 'uploadimage'])->name('uploadimage');

