<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Report;
// use App\Models\TeacherToSubject;
use DB;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $teacher_id = $request -> teacher_id; 
        info($teacher_id);
        $subject_id = $request -> subject_id; 
        $semester = $request ->semester ; 
        $year = $request ->year; 
        $teacher_to_sub= DB::table('teachers_to_subjects')->where([

            ['teacher_id', '=', $teacher_id],
    
            ['subject_id', '=', $subject_id], 
            
            ['year', '=', $year], 

            ['semester', '=', $semester]
            
        ])->get();
        $file = file($request ->file('file')->getRealPath());
        $filename = storage_path('app/data/reports/'.date('yymmdd_hhmmss_{old_name}'));
        file_put_contents($filename,$file);
        $report = Report::create(
            [
                 "title" => $request -> title,
                 "student_id" => $user -> student_id,
                 "teacher_to_subject_id" => $teacher_to_sub -> first() -> id,
                 "path" => $filename,
            ]
            );
    }
}
