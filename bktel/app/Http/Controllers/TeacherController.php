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
         $validatedData = $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'teacher_email' => 'required|email|ends_with:@hcmut.edu.vn',
            'teacher_code' => 'required|string|unique:teachers',
            'department' => 'required|string',
            'faculty' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
        ]);
        
            // Lấy thông tin từ validatedData
            $last_name = $validatedData['last_name'];
            $first_name = $validatedData['first_name'];
            $teacher_email = $validatedData['teacher_email'];
            $teacher_code = $validatedData['teacher_code'];
            $department = $validatedData['department'];
            $faculty = $validatedData['faculty'];
            $address = $validatedData['address'];
            $phone = $validatedData['phone'];
            $note = $validatedData['note'];

        
            $teacher=  Teacher::create([
                'last_name'=> $last_name,
                'first_name'=> $first_name,
                'teacher_email'=> $teacher_email,
                'teacher_code'=> $teacher_code,
                'department'=> $department,
                'faculty'=> $faculty,
                'address'=> $address,
                'phone'=> $phone,
                'note'=> $note,
            ]);

            $teacher_id=$teacher->id;

        // tim kiem nguoi dung dung  voi dieu kien la moi dang ky va cot student id la null
        $user = User::create(
            [      
                'name'  => $last_name .' '. $first_name,
                'email' => $teacher_email,
                'password'=> Hash::make('Bmvt@2022')]        
            );
                     
            $user->role_id=3;
            $user->teacher_id =$teacher_id;

        if($user&&$teacher)
            {
                $user->save();// luu la nguoi dung nay
                $teacher->save();            
            }  
    }
}