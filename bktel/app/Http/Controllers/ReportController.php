<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{



    //Upload report by student (task11)
    public static function upload_report(Request $request){

        $request->validate([
            'path' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);
         {   

       
        $user = Auth::user();
        $report =  Report::create($request->all());

        $teacher_id = $request -> teacher_id; 
        $subject_id = $request -> subject_id; 
        $semester = $request ->semester ; 
        $year = $request ->year; 
        
        info($teacher_id); // for Debug

        $teacher_to_sub= DB::table('teacher_to_subjects')->where([

            ['teacher_id', '=', $teacher_id],
    
            ['subject_id', '=', $subject_id], 
            
            ['year', '=', $year], 

            ['semester', '=', $semester]
            
        ])->get();

        $target = 'data';
        $target .='/' ; 
        $target .=$year ; 
        $target .= '/';          
        $target .=$semester ; 
        $target .= '/';
        $target .=$subject_id ;   
        info($target); 

        if($request->hasFile('path')){
            $file_name = time().'_'. $request->file('path')->getClientOriginalName();
            $file_path = $request->file('path') ->storeAs($target, $file_name, 'local');
        }   

        $report ->path = $file_path ; 
        $report -> teacher_to_subject_id = $teacher_to_sub -> first() -> id ; 
        $report -> user_id = $user -> id;
        $report -> save();
        
       

    }
}

    //Show all report of current student (task11)
    public function index_report(Request $request)  
    {   
        $user = Auth::user();
        $check = 0;  //variable for showing button at vue
        if($user -> role_id ==4 || $user -> role_id ==1) {$check = 1;}
        if ($user -> role_id == 3 || $user -> role_id ==1) {$check =2;}
        $user = Auth::user();

        $reports= DB::table('reports') ->where(
            'user_id','=', $user -> id
            ) ->get();
        
        $data = [$reports,$check];
        return response()->json($data);   //show to vuejs
    }

    //giving mark by teacher role (task12)
    public function submit_mark(Request $request) {

        foreach($request->report as $report)
        {
     //suposse you have orders table which has user i
            info($report);
            $report_final= DB::table('reports')->where([

            ['title', '=', $report['title']],
    
            ['note', '=',$report['note']], 
            
            ['path', '=',$report['path']]
            
        ])->update(['mark' => $report['mark']]);

        // $report -> mark = $request -> mark ; 
        // $report -> save();
        }
        $data = [$request['mark'],200]; 
        return request() -> json($data) ; 
        }
}
