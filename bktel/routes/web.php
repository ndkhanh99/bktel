<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/form_student', function () {
    return view('form_student');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('check.student');

Route::get('/showdashboard', function()
{

    return view('dashboard');
});







Route::group(['prefix' => 'students'], function () {
	Route::get('/show',[StudentController::class, 'show'])->name('student.show');
	Route::post('/store',[StudentController::class, 'store'])->name('student.store');		
	Route::put('/update',[StudentController::class, 'update'])->name('student.update');		
	Route::delete('/destroy',[StudentController::class, 'destroy'])->name('student.destroy');		
});