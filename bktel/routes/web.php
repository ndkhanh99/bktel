<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminImportController;
use App\Http\Controllers\ImportTeacherController;
use App\Http\Controllers\ImportStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware;

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

// show welcome Laravel
Route::get('/', function () {
    return view('welcome');
});

// show example Laravel
Route::get('/example', function () {
    return view('example');
});

// show form_student 
Route::get('/form_student', function () {
    return view('form_student');
});

// show form_teacher
Route::get('/form_teacher', [ AdminController::class,'formteacher'])->name('form.teacher')->middleware('check.admin');

// import file CSV_Teacher
Route::get('/import_teacher', [ AdminImportController::class,'importteacher'])->name('import.teacher')->middleware('check.admin');

Route::post('/import_teacher', [ImportTeacherController::class,'import']);

// import file CSV_Student
Route::get('/import_student', [ AdminImportController::class,'importstudent'])->name('import.student')->middleware('check.admin');

Route::post('/import_student', [ImportStudentController::class,'import']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('check.student');

Route::get('/showdashboard', function()
{
    return view('dashboard');
});

// push list student to database
Route::group(['prefix' => 'students'], function () {
	Route::get('/show',[StudentController::class, 'show'])->name('student.show');
	Route::post('/store',[StudentController::class, 'store'])->name('student.store');		
	Route::put('/update',[StudentController::class, 'update'])->name('student.update');		
	Route::delete('/destroy',[StudentController::class, 'destroy'])->name('student.destroy');		
});


// push list teacher to database
Route::group(['prefix' => 'teachers'], function () {
	Route::get('/show',[TeacherController::class, 'show'])->name('teacher.show');
	Route::post('/store',[TeacherController::class, 'store'])->name('teacher.store');		
	Route::put('/update',[TeacherController::class, 'update'])->name('teacher.update');		
	Route::delete('/destroy',[TeacherController::class, 'destroy'])->name('teacher.destroy');		
});
