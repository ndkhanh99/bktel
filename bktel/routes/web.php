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

Route::get('/import-teacher',function(){
	return view('import_teacher');
})->middleware('check_admin');

Route::post('/import_teacher_store',[App\Http\Controllers\Admin\ImportTeacher::class,'store'])->name('import.store');

Route::get('/show_name',[App\Http\Controllers\Admin\User::class, 'show_name'])->name('user.show_name');


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


