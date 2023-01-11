<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\TeachersImport;
use App\Jobs\FileJob;
use App\Jobs\StudentJob;
use Illuminate\Support\Facades\DB;
use App\Jobs\SubjectJob;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Carbon;
use App\Models\User;
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

    //For Show

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
            info($file_path);
         }
       
         $file -> status = "Uploaded" ;
         
         $file -> save(); 
        SubjectJob::dispatch($file_name);
    }
    public function download(Request $request){
   
     $path = $request['path'];
    info($path);

    return response() -> download('C:\Users\admin\Documents\bktel-feature-student-crud-quocthinh\bktel\storage\app\\'.$path);

       
    }
    public function upload_img(Request $request){

        $request->validate([
            'path' => 'required|mimes:jpg,jpeg,png|max:2048'
         ]);


         $user_id = Auth::user()->id;
         $user = User::where('id',$user_id )->first();
        $stu_id = $user -> student_id ;
        info($stu_id);
        $now = Carbon::now()->toDateString();

     
        $student = Student::where('id','=',$stu_id)->first();
        $stu_code = $student -> student_code ;
        
        info($stu_code);
         if($request->hasFile('path')){
            $file_name = time().'_'. $request->file('path')->getClientOriginalName();
            $file_path = $request->file('path') ->storeAs('data/profile_image/'.$stu_code.'/'.$now, $file_name, 'public');
            info($file_path);
         }
         $user -> profile_image_url =  $file_path ; 
         $user ->save();
        //  return response() -> json('C:/Users/admin/Documents/bktel-feature-student-crud-quocthinh/bktel/storage/app/public'.$file_path);

    }
    public function show_img(Request $request){ 

        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id )->first();
        $url =  $user -> profile_image_url ; 
        return response() -> json('/storage/'.$url);
    }


}
