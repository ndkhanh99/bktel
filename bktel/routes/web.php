<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Add_admin_controller;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherToSubjectController;
use  App\Http\Controllers\StudentToSubjectController;
use App\Http\Controllers\SubmitMarkController;
use App\Http\Controllers\AdminImportController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportStudentController;
use App\Http\Controllers\ImportSubjectController;
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

Route::get('/example', function () {
    return view('example');
});

// show form_student 
Route::get('/form_student', function () {
    return view('form_student');
});

// show form_teacher 
Route::get('/form_teacher', [ Add_admin_controller::class,'formteacher'])->middleware('check.admin');

// show form_subject
Route::get('/form_subject', [  Add_admin_controller::class,'formsubject'])->name('form.subject')->middleware('check.admin');


// teacher_to_subject
Route::get('/teacher_to_subject', [ Add_admin_controller::class,'teachertosubject'])->name('teachertosubject')->middleware('check.admin');


//student_to_subject
Route::get('/student_to_subject', [ Add_admin_controller::class,'studenttosubject'])->name('studenttosubject')->middleware('check.student_or_admin');




// upload_report (task_11)

Route::get('/upload_report', [ Add_admin_controller::class,'formuploadreport'])->name('form.uploadreport')->middleware('check.student_or_admin'); // view form upload report 

Route::post('/search',[TeacherToSubjectController::class,'search']); // tim kiem giao vien muon bao cao 

Route::post('/upload_report_store',[ ReportController::class,'uploadReport_store'])->name('upload.store');// upload file bao cao 



// submit_mark (task_12)

Route::get('/submit_mark', [ Add_admin_controller::class,'formsubmitmark'])->name('form.submitmark')->middleware('check.teacher_or_admin'); // view form upload report 

Route::post('/search_student',[SubmitMarkController::class,'search_student']); // tim kiem giao vien muon bao cao 

Route::post('/submit_mark_store',[ SubmitMarkController::class,'submitmark_store'])->name('upload.store');// upload file bao cao 

Route::get('/downfile', [SubmitMarkController::class, 'downloadFile']);

// submit_mark (task_13)

Route::get('/export', [ Add_admin_controller::class,'export'])->name('export.file')->middleware('check.teacher_or_admin'); // view form upload report 

Route::post('/search_export_csv',[ExportController::class,'searchExportCsv']); // tim kiem giao vien muon bao cao 

Route::post('/export_data_to_csv',[ExportController::class,'ExportDataToCsv']); // tim kiem giao vien muon bao cao 	
Route::get('/downfilecsv', [ExportController::class, 'downloadFileCsv']);

// Route::post('/submit_mark_store',[ SubmitMarkController::class,'submitmark_store'])->name('upload.store');// upload file bao cao 

// Route::get('/downfile', [SubmitMarkController::class, 'downloadFile']);


///////////////////////////////////////////////////////////////////////////////////////////////
// import file CSV_Teacher
Route::get('/import_teacher', [ AdminImportController::class,'importteacher'])->name('import.teacher')->middleware('check.admin');
Route::post('/import_teacher', [ImportController::class,'import']);



// import file CSV_Student
Route::get('/import_student', [ AdminImportController::class,'importstudent'])->name('import.student')->middleware('check.admin');

Route::post('/import_student', [ImportStudentController::class,'import']);


// import file CSV_subject
Route::get('/import_subject', [ AdminImportController::class,'importsubject'])->name('import.subject')->middleware('check.admin');

Route::post('/import_subject', [ImportSubjectController::class,'import']);









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


Route::group(['prefix' => 'teacher_to_subjects'], function () {
	// Route::get('/show',[TeacherToSubjectController::class, 'show'])->name('teacher_to_subjects.show');
	Route::post('/store',[TeacherToSubjectController::class, 'store'])->name('teacher_to_subjects.store');		
	// Route::put('/update',[TeacherToSubjectController::class, 'update'])->name('teacher_to_subjects.update');		
	// Route::delete('/destroy',[TeacherToSubjectController::class, 'destroy'])->name('teacher_to_subjects.destroy');		
});
Route::group(['prefix' => 'student_to_subjects'], function () {
	// Route::get('/show',[TeacherToSubjectController::class, 'show'])->name('teacher_to_subjects.show');
	Route::post('/store',[StudentToSubjectController::class, 'store'])->name('student_to_subjects.store');		
	// Route::put('/update',[TeacherToSubjectController::class, 'update'])->name('teacher_to_subjects.update');		
	// Route::delete('/destroy',[TeacherToSubjectController::class, 'destroy'])->name('teacher_to_subjects.destroy');		
});
