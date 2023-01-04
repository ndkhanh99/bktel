<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{

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
         info($teacher_id);
        $teacher_to_sub= DB::table('teacher_to_subjects')->where([

            ['teacher_id', '=', $teacher_id],
    
            ['subject_id', '=', $subject_id], 
            
            ['year', '=', $year], 

            ['semester', '=', $semester]
            
        ])->get();

            $target = 'data/';
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
        $report -> teacher_to_subject_id = $teacher_to_sub -> first() -> id ; 
        $report -> user_id = $user -> id;
        $report -> save();
        
       

    }
}
    public function index_report(Request $request)  
    {   

        $user = Auth::user();

        $reports= DB::table('reports') ->where(
            'user_id','=', $user -> id
            ) ->get();
    
        info($reports);
        return response()->json($reports);  
    }
}
