<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $newname = $year."-".$semester."-".$subject_id ;
        $filename = storage_path('app/reports/'.$newname);
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


    public function downfile(Request $request)
    {
        $path = $request -> path;
        return response() -> download($path);
    }

    public function submitmark(Request $request) {

            $title = $request -> title;
            $note = $request -> note;
            $path = $request -> path;
            $mark = $request -> mark;
 
            $report_final= DB::table('table_report')->where([

            ['title', '=', $title],
    
            ['note', '=',$note], 
            
            ['path', '=',$path]
            
        ])->update(['mark' => $mark]);
        }
}
