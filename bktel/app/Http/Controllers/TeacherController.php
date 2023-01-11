<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TeachersImport;
use Illuminate\Support\Facades\Storage;
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
       $user -> role_id = 3;
       $user -> save();

    }
}
