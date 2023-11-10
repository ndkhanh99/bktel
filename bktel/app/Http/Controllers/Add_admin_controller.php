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


    public function search_teachertosubject()
    {
        return view('search_teacher_to_subject')   ;     
    }



   
}