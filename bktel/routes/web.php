<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentsController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('check_student-id');
Route::group(['prefix' => 'students'], function () {
	Route::get('/show',[App\Http\Controllers\Admin\StudentsController::class, 'show'])->name('student.show');
	Route::post('/store',[App\Http\Controllers\Admin\StudentsController::class, 'store'])->name('student.store');
	Route::put('/update',[App\Http\Controllers\Admin\StudentsController::class, 'update'])->name('student.update');
	Route::get('/destroy',[App\Http\Controllers\Admin\StudentsController::class, 'destroy'])->name('student.destroy');
});


