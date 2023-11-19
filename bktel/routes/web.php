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
use App\Http\Controllers\ImportSubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherToSubjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubmitMarkController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\StudentToSubjectController;
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

//student_to_subject
Route::get('/student_to_subject', [ AdminController::class,'studenttosubject'])->name('studenttosubject')->middleware('check.admin_student');

Route::post('/import_student', [ImportStudentController::class,'import']);

// show form_subject
Route::get('/form_subject', [ AdminController::class,'formsubject'])->name('form.subject')->middleware('check.admin');

// import file CSV_subject
Route::get('/import_subject', [ AdminImportController::class,'importsubject'])->name('import.subject')->middleware('check.admin');

Route::post('/import_subject', [ImportSubjectController::class,'import']);

// teacher_to_subject
Route::get('/teacher_to_subject', [ AdminController::class,'teachertosubject'])->name('teachertosubject')->middleware('check.admin');

// upload_report
Route::get('/upload_report', [ AdminController::class,'uploadreport'])->name('form.uploadreport')->middleware('check.admin_student'); // view form upload report 

Route::post('/search',[ ReportController::class,'search']); // tim kiem giao vien muon bao cao 

Route::post('/upload_report_store',[ ReportController::class,'uploadReport_store'])->name('upload.store');// upload file bao cao 

// submit_mark

Route::get('/submit_mark', [ AdminController::class,'submitmark'])->name('submit.mark')->middleware('check.admin_teacher'); // view form submit mark 

Route::post('/search_student',[SubmitMarkController::class,'search_student']); // tim kiem sinh viên 

Route::post('/submit_mark_store',[ SubmitMarkController::class,'submitmark_store'])->name('upload.store');

Route::get('/downfile', [SubmitMarkController::class, 'downloadFile']);

// export

Route::get('/export', [ AdminController::class,'export'])->name('export')->middleware('check.admin_teacher'); // view form export 

Route::post('/search_export_csv',[ ExportController::class,'SearchExportCsv']); // tim kiem sinh viên 

Route::post('/export_data_to_csv',[ExportController::class,'ExportDataToCsv']);

Route::get('/downfilecsv', [ExportController::class, 'downloadFileCsv']);

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


// push list subject to database
Route::group(['prefix' => 'subjects'], function () {
	Route::get('/show',[SubjectController::class, 'show'])->name('subject.show');
	Route::post('/store',[SubjectController::class, 'store'])->name('subject.store');		
	Route::put('/update',[SubjectController::class, 'update'])->name('subject.update');		
	Route::delete('/destroy',[SubjectController::class, 'destroy'])->name('subject.destroy');		
});

// push list teacher_to_subject to database
Route::group(['prefix' => 'teacher_to_subjects'], function () {
	Route::get('/show',[TeacherToSubjectController::class, 'show'])->name('teacher_to_subject.show');
	Route::post('/store',[TeacherToSubjectController::class, 'store'])->name('teacher_to_subject.store');
	Route::put('/update',[TeacherToSubjectController::class, 'update'])->name('teacher_to_subject.update');		
	Route::delete('/destroy',[TeacherToSubjectController::class, 'destroy'])->name('teacher_to_subject.destroy');
});

Route::group(['prefix' => 'student_to_subjects'], function () {
	Route::get('/show',[StudentToSubjectController::class, 'show'])->name('student_to_subjects.show');
	Route::post('/store',[StudentToSubjectController::class, 'store'])->name('student_to_subjects.store');		
	Route::put('/update',[StudentToSubjectController::class, 'update'])->name('student_to_subjects.update');		
	Route::delete('/destroy',[StudentToSubjectController::class, 'destroy'])->name('student_to_subjects.destroy');		
});