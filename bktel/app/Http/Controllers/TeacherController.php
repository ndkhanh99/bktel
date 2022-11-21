<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class TeacherController extends Controller
{
    public function store(Request $request)
    {   

       $teacher = Teacher::create($request->all());

       $user = User::create([
        'name' => $request -> first_name,
        'email' => $request -> email,
        'password' =>  Hash::make('Bmvt@hcmut'),
       ]);
       $user -> teacher_id = $teacher -> id ;


    }
}
