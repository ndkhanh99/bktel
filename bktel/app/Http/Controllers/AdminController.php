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

}