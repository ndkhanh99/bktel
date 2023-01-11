<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use DB;


class TeacherController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request -> validate([
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'teacher_code' => 'required|min:7|regex:/[0-9]/',
        'department' =>'required|string|max:255',
        'faculty' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|numeric|min:10',
        'teacher_email' => 'required|email|ends_with:@hcmut.edu.vn',
      ]);
      $teacher = Teacher::create($request->all());
      $user = User::create(
        [
        'teacher_id' => $teacher->id,
        'role_id' => 3,
       'name'  => $teacher-> last_name,
       'email' =>$teacher -> teacher_email,
       'password'=> Hash::make('Bmvt@2022')]        
    );
      $user->save();
      $teacher->save();
    }

}
