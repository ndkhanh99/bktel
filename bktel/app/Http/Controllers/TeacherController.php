<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use DB;
class TeacherController extends Controller
{
   


    public function store(Request $request, User $user) { 
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'teacher_email' => 'required|email|ends_with:@hcmut.edu.vn',
            'teacher_code' => 'required|string|unique:students',
            'department' => 'required|string',
            'faculty' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
         ]);

        
        
         $teacher = Teacher::create($request->all());

        // tim kiem nguoi dung dung  voi dieu kien la moi dang ky va cot student id la null
        $user = User::create(
                         [
                     
                        'name'  => $teacher-> last_name .' '. $teacher->first_name,
                        'email' =>$teacher -> teacher_email,
                        'password'=> Hash::make('Bmvt@2022')]        
                     );
                     
        $user->role_id=3;
        $user->teacher_id=$teacher->id;

        $user->save();// luu la nguoi dung nay
        $teacher->save();
    
     
         
    }
    }