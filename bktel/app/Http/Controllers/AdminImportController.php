<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminImportController extends Controller
{
    public function importteacher()
    {
    return view('import_teacher');
    }



    public function importstudent()
    {
    return view('import_student');
    }

    public function importsubject()
    {
    return view('import_subject');
    }

}