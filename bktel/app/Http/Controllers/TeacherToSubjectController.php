<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher; 
use App\Models\Subject;
use App\Models\TeacherToSubject;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Mockery\Undefined;

class TeacherToSubjectController extends Controller
{
    //
    var $teacher_to_sub;

    public function store(Request $request){
        //get from vuejs 
        $sub_code = $request-> subject_code; 
        $teach_code = $request -> lecture_code;

        //Query for teacher and subject with filled in form 
        $teacher = DB::table('teachers')->where('teacher_code', '=',$teach_code)->first();
        $subject = DB::table('subjects')->where('code','=', $sub_code)->first();

        //get id 
        $id_teach = $teacher -> id; 
        $id_sub = $subject -> id;

        //create 
       $teach_to_sub =  TeacherToSubject::create([
            'teacher_id' => $id_teach ,
            'subject_id' => $id_sub ,
            'year'=> $request -> year, 
            'semester'=> $request -> semester,
            'note' => $request -> note
           ]);
    }

    //For search in home
    public function search(Request $request){

        $user = Auth::user();

        $teacher_id = $request -> teacher_id; 
        $subject_id = $request -> subject_id; 
        $semester = $request ->semester ; 
        $year = $request ->year; 
        $teacher_to_sub= DB::table('teacher_to_subjects')->where([

            ['teacher_id', '=', $teacher_id],
    
            ['subject_id', '=', $subject_id], 
            
            ['year', '=', $year], 

            ['semester', '=', $semester]
            
        ])->get();

        info($teacher_to_sub);
        info(!$teacher_to_sub-> isEmpty()); // For Debug
        
        if(!$teacher_to_sub-> isEmpty()){
        $id_teach_final = $teacher_to_sub-> first() -> teacher_id  ;
        info($id_teach_final);  
        $id_sub_final = $teacher_to_sub -> first() -> subject_id ; 
        
        $teacher = DB::table('teachers')->where('id', '=',$id_teach_final )->first();
        $subject = DB::table('subjects')->where('id','=',  $id_sub_final )->first();
     
        $data = [$teacher,$subject];
        return response()->json($data);
        }
        return response()->json("..."); //if empty return something for showing undefined 
    }

    public function search_for_teach(Request $request)
    {   
        try {  $user = Auth :: user(); 
            $stu_code = $request ->  _stu_code ; 
            $student = DB::table('students') -> where('student_code', '=',  $stu_code )->first();
    
            $stu_id = $student -> id ;
            info($stu_id);
            $user_stu =User::where('student_id',$stu_id) ->first();
            info($user_stu);    
            $use_stu_id = $user_stu -> id;
            info($use_stu_id);
            $sub_code = $request ->  _sub_code; 
            info($sub_code);
            $year = $request -> _year ; 
            $subject = DB::table("subjects") -> where('code', '=',  $sub_code )->get(); 
    
            info($subject);
            $sub_id = $subject -> first() -> id ; 
            $teacher_id = $user -> teacher_id ; 
    
            $teacher_to_sub = DB::table('teacher_to_subjects') -> where([
                ['teacher_id', '=', $teacher_id],
                ['subject_id', '=', $sub_id],
                ['year', '=', $year]
            ])->get(); 
            info($teacher_to_sub); 
    
            $reports = DB::table("reports")->where([
             ['user_id','=', $use_stu_id],
             ['teacher_to_subject_id','=', $teacher_to_sub ->first() -> id ]]
        )->get(); 
            info($reports);
            $data = [$reports ,200];} 
            
        catch(\Exception $e){ 

            $data = new Report ;

            return response()->json( $data);

              
        }

      
        
        return response()->json($data);

    


    }

    public function search_export(Request $request) { 
            $teacher_id = $request -> teacher_id; 
            $subject_id = $request -> subject_id; 
            $semester = $request ->semester ; 
            $year = $request ->year; 
    
            $teacher_to_sub= DB::table('teacher_to_subjects')->where([
    
                ['teacher_id', '=', $teacher_id],
        
                ['subject_id', '=', $subject_id], 
                
                ['year', '=', $year], 
    
                ['semester', '=', $semester]
                
            ])->get();
            $teach_sub_id  = $teacher_to_sub -> pluck('id');
            $reports = DB::table('reports') -> where('teacher_to_subject_id','=',   $teach_sub_id )-> get(); 
            info($reports); 
            $data = [$reports,200]; 
                
   
       
        return response() -> json($data);
    }

    public function export_file(Request $request){ 
   //Query 

   try{   $teacher_id = $request -> teacher_id; 
    $subject_id = $request -> subject_id; 
    $semester = $request ->semester ; 
    $year = $request ->year; 
    $teacher_to_sub= DB::table('teacher_to_subjects')->where([

        ['teacher_id', '=', $teacher_id],

        ['subject_id', '=', $subject_id], 
        
        ['year', '=', $year], 

        ['semester', '=', $semester]
        
    ])->get();

    $teacher_get_name = DB::table('teachers') -> where('id', '=', $teacher_id)->first();
    $subject_get_name  = DB::table('subjects') -> where('id', '=', $subject_id) ->first();
    $teacher_name = $teacher_get_name -> first_name; 
    $subject_name = $subject_get_name -> name ;
    $teach_sub_id  = $teacher_to_sub -> pluck('id');
    $reports = DB::table('reports') -> where('teacher_to_subject_id','=',   $teach_sub_id )-> get(); 
    
    $fileName = $teacher_name.'_'.$subject_name;

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

    $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $path = 'data'.'\\'.$subject_id.'\\'.$year.'\\'.$semester.'\\'.$fileName.'.csv' ;
      
            $file = fopen('C:\Users\admin\Documents\bktel-feature-student-crud-quocthinh\bktel\storage\app\data'.'\\'.$subject_id.'\\'.$year.'\\'.$semester.'\\'.$fileName.'.csv','w');
            fputcsv($file, $columns);

            foreach ($reports as $report) {

                if($report-> path == NULL) {
                    $submit = false;
                }
                $submit = true ; 
                $re_user_id = $report ->user_id;
                $user = DB::table('users') ->where('id','=', $re_user_id ) -> first();
                
                $stu_ids = $user -> student_id;
                $student = DB::table('students') -> where('id', '=',  $stu_ids)->first(); 
                $teacher = DB::table('teachers') -> where('id', '=', $teacher_id)->first();
                $subject = DB::table('subjects') -> where('id', '=', $subject_id) ->first();

                
                $row['Year']  = $year;
                $row['Semester']    = $semester;
                $row['TeacherId']    = $teacher_id;
                $row['TeacherName']  = $teacher -> first_name;
                $row['SubjectId']  = $subject_id;
                $row['SubjectName']  = $subject -> name;
                $row['StudentId']  = $stu_ids;
                $row['StudentName']  = $student -> first_name;
                $row['SubmitOrNot'] = $submit ; 
                $row['Mark'] = $submit ; 

                fputcsv($file, array($row['Year'], $row['Semester'], $row['TeacherId'], $row['TeacherName'], $row['SubjectId'],
                $row['SubjectName'],$row['StudentId'],$row['StudentName'],$row['SubmitOrNot'], $row['Mark'] ));
     
            }
        
            fclose($file);} catch(\Exception $e){ 
                 
                return response() -> json('Null');
               }
           

                return response() -> json($path);
    }


        //show search infor 
        
}
