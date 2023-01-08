<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher; 
use App\Models\Subject;
use App\Models\TeacherToSubject;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;
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
        return response()->json("...");
    }
    public function search_for_teach(Request $request)
    {   
        $user = Auth :: user(); 
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
        $data = [$reports ,200];
        
        return response()->json($data);

    


    }
        //show search infor 
        
}
