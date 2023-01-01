<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;

use App\Imports\TeachersImport;
use App\Jobs\FileJob;
use App\Jobs\StudentJob;
use Illuminate\Support\Facades\DB;
use App\Jobs\SubjectJob;
class FileController extends Controller
{
    //Upload Teacher File
    public static function upload( Request $request){
        $request->validate([
            'path' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);

        $file =  File::create($request->all());

         if($request->hasFile('path')){
            $file_name = time().'_'. $request->file('path')->getClientOriginalName();
            $file_path = $request->file('path') ->storeAs('data', $file_name, 'local');
         }

         $file -> status = "Uploaded" ;
         $file -> save(); 
        FileJob::dispatch($file_name);
         
    }

    //For Show
 public function index(Request $request)  
    {   
        $files = DB::table('files')->orderBy('id', 'ASC')->get();

        return response()->json($files);  
    }
    //Upload Student File
    public static function upload_student( Request $request){
        $request->validate([
            'path' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);

        $file =  File::create($request->all());

         if($request->hasFile('path')){
            $file_name = time().'_'. $request->file('path')->getClientOriginalName();
            $file_path = $request->file('path') ->storeAs('data', $file_name, 'local');
         }

         $file -> status = "Uploaded" ;
         $file -> save(); 
        StudentJob::dispatch($file_name);
    }

    //Upload Subject File
    public static function upload_subject( Request $request){
        $request->validate([
            'path' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);

        $file =  File::create($request->all());

         if($request->hasFile('path')){
            $file_name = time().'_'. $request->file('path')->getClientOriginalName();
            $file_path = $request->file('path') ->storeAs('data', $file_name, 'local');
         }

         $file -> status = "Uploaded" ;
         $file -> save(); 
        SubjectJob::dispatch($file_name);
    }
}
