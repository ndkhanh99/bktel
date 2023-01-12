<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class SubjectController extends Controller
{
    //task8
    public function store(Request $request)  
    {   
        $subject = Subject::create($request->all());         // return view('student.profile', ['student' => Student::findOrFail($id)]);
    }
}
