<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/students/store',[App\Http\Controllers\StudentController::class, 'store']);
Route::get('/students/{id}/find',[App\Http\Controllers\StudentController::class, 'show'])->name('student.get');
Route::put('/students/{id}/update',[App\Http\Controllers\StudentController::class, 'update']);
Route::delete('/students/{id}/delete',[App\Http\Controllers\StudentController::class, 'delete']);

