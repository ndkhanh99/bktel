<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Models\Students;
Route::resource('students', StudentsController::class);
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix'=>'Students'],function()
{

    Route::get('/{student_id}','Admin\StudentsController@show')->name('StudentsController.show');
    Route::get('/','Admin\StudentsController@index')->name('StudentsController.index');
    Route::post('/','Admin\StudentsController@store')->name('StudentsController.store');
    Route::put('/{student_id}',[StudentCotroller::class,'read']);
    Route::delete('/{student_id}','Admin\StudentsController@destroy')->name('StudentCotroller.destroy');
});
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
