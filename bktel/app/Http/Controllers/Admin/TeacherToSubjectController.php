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
use App\Models\Student;
use Exception;
use DB;

class TeacherToSubjectController extends Controller
{
    public function store(Request $request)
    {
        $request ->validate([
            'teacher_id'=> 'required|min:7',
            'subject_id'=> 'required',
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

    public function search_for_teacher(Request $request)
    {
        $user = Auth::user();
        $student_code = $request -> student_code;
        $subject_id = $request -> subject_id;
        $semester = $request -> semester;
        $year = $request -> year;
        $student_info = DB::table('students') -> where([
            ['student_code', '=', $student_code],
        ])->first();
        $student_id = $student_info -> id;
        $report_info = DB::table('table_report') -> where([
            ['student_id', '=', $student_id],
        ])->get()->all();
        return response()->json($report_info);
        
    }

}
