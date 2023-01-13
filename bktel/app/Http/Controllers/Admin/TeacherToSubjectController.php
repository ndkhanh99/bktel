<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\TeacherToSubject;
use DB;

class TeacherToSubjectController extends Controller
{
    public function store(Request $request)
    {
        $request ->validate([
            'teacher_id'=> 'required|min:7',
            'subject_id'=> 'required|min:7',
            'year'=> 'required',
            'semester'=> 'required',
        ]);

        $teachertosubject = TeacherToSubject::create($request->all());

    }
}
