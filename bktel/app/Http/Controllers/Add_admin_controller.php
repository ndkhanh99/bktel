<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Add_admin_controller extends Controller
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

    public function studenttosubject()
    {
    return view('student_to_subject');
    }


    public function formuploadreport()
    {
        return view('upload_report')   ;     
    }

    
    public function formsubmitmark()
    {
        return view('submit_mark')   ;     
    }

    public function export()
    {
        return view('export')   ;     
    }
   
}