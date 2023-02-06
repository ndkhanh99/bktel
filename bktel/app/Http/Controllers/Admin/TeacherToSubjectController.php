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
    // searching function for student
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

    //searching for teacher 
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
    
    // export file for admin/teacher
    public function export (Request $request)
    {
        $user = Auth::user();
        $teacher_id = $request -> teacher_id;
        $subject_id = $request -> subject_id;
        $semester = $request -> semester;
        $year = $request -> year;

        $teacher_to_sub= DB::table('teachers_to_subjects')->where([

            ['teacher_id', '=', $teacher_id],

            ['subject_id', '=', $subject_id], 
    
            ['year', '=', $year], 

            ['semester', '=', $semester]
    
        ])->get();

        $teacher_get_name = DB::table('teacher') -> where('teacher_code', '=', $teacher_id)->first();
        $subject_get_name  = DB::table('subjects') -> where('code', '=', $subject_id) ->first();
        $teacher_name = $teacher_get_name -> first_name; 
        $subject_name = $subject_get_name -> name ;
        $teach_sub_id  = $teacher_to_sub -> pluck('id');
        $reports = DB::table('table_report') -> where('teacher_to_subject_id','=',   $teach_sub_id )-> get()->first(); 
        $columns = array(
            'Year',
            'Semester',
            'TeacherId',
            'TeacherName',
            'SubjectId',
            'SubjectName',
            'StudentId',
            'StudentName',
            'SubmitOrNot',
            'Mark');
        $fileName = $teacher_name.'_'.$subject_name;
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
         );
        $paths = $reports ->path;
        $filename = storage_path('app/reports/'.$fileName.'.csv');
        $file = fopen($filename,'w');
        fputcsv($file, $columns);
        $student = DB::table('students') -> where('id', '=',  $reports -> student_id)->first();
        if ($paths == null)
        {
            $submit = "No";
        }
        else
        {
            $submit = "yes";
        }
                $row['Year']  = $year;
                $row['Semester']    = $semester;
                $row['TeacherId']    = $teacher_id;
                $row['TeacherName']  = $teacher_name;
                $row['SubjectId']  = $subject_id;
                $row['SubjectName']  = $subject_name;
                $row['StudentId']  = $reports -> student_id;
                $row['StudentName']  = $student -> first_name;
                $row['SubmitOrNot'] = $submit; 
                $row['Mark'] =  $reports -> mark ; 

                fputcsv($file, array($row['Year'], $row['Semester'], $row['TeacherId'], $row['TeacherName'], $row['SubjectId'],
                $row['SubjectName'],$row['StudentId'],$row['StudentName'],$row['SubmitOrNot'], $row['Mark'] ));
                return response() -> json($paths);
            }

}
