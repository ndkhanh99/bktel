<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function formteacher()
    {
    return view('form_teacher');
    }

    public function formsubject()
    {
    return view('form_subject');
    }

    public function teachertosubject()
    {
    return view('teacher_to_subject');
    }

    public function uploadreport()
    {
    return view('upload_report');     
    }
   
    public function submitmark()
    {
    return view('submit_mark');     
    }

    public function studenttosubject()
    {
    return view('student_to_subject');
    }

    public function export()
    {
    return view('export');     
    }

    public function uploadimage()
    {
    return view('upload_image');     
    }

}