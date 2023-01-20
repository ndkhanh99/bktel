<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\TeacherToSubject;
use App\Models\Teacher;
use App\Models\Subject;
use Exception;
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
    public function search(Request $request)
    {
            $user = Auth::user();

        $teacher_id = $request -> teacher_id; 
        $subject_id = $request -> subject_id; 
        $semester = $request ->semester ; 
        $year = $request ->year; 
        $teacher_to_sub= DB::table('teachers_to_subjects')->where([

            ['teacher_id', '=', $teacher_id],
    
            ['subject_id', '=', $subject_id], 
            
            ['year', '=', $year], 

            ['semester', '=', $semester]
            
        ])->get();
        return response() -> json($teacher_to_sub);
    }
}
