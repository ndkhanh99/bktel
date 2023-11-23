<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $userName = $user->name; // Lấy tên người dùng
        $role= $user->role_id;

        



        if($role == 4)
        { 
     
            $id_role  = $user->student_id;
            $homeImage= $user->profile_image_url;

          

            if(!($homeImage))
            {
                $homeImage = 'images/user2-160x160.jpg';
            }


            $prefix = 'storage/app/public/profile_image/';

          
            if (strpos($homeImage, $prefix) === 0) {
                // Nếu có, loại bỏ tiền tố đó
                $filename = substr($homeImage, strlen($prefix));
            
   
                $homeImage='images/'.$filename;
            }
 
            $student = Student::find($id_role);
            $adminName='';
            if ($student) 
            {
                // Sử dụng $student để truy cập thông tin sinh viên
                $homeLastname= $student-> last_name;
                $homeFirstname =$student-> first_name;
                $homeCode = $student->student_code;
                return view('home', ['userName' => $userName,'homeCode'=>$homeCode,'homeFirstname'=>$homeFirstname,'homeLastname'=>$homeLastname,'adminName'=>$adminName,'homeImage'=> $homeImage ]);
            
            } 
       
        }



        else if($role==1)

        {        
            $homeCode='';
            $homeFirstname='';
            $homeLastname='';
            $adminName = 'Admin Page';
            $homeImage= $user->profile_image_url;
            if($homeImage==null)
            {
                $homeImage = 'images/user2-160x160.jpg';
            }

            $prefix = 'storage/app/public/profile_image/';
            if (strpos($homeImage, $prefix) === 0) {
                $filename = substr($homeImage, strlen($prefix));
                $homeImage='images/'.$filename;
            }
         

            
            return view('home', ['userName' => $userName,'homeCode'=>$homeCode,'homeFirstname'=>$homeFirstname,'homeLastname'=>$homeLastname,'adminName'=>$adminName,'homeImage'=>$homeImage]);

        }

        else if($role == 3)
        {
            $id_role = $user -> teacher_id ;
            $teacher= Teacher::find($id_role);
            $adminName='';
            $homeImage= $user->profile_image_url;
            if($homeImage==null)
            {
                $homeImage = 'images/user2-160x160.jpg';
            }


            $prefix = 'storage/app/public/profile_image/';
            if (strpos($homeImage, $prefix) === 0) {
                $filename = substr($homeImage, strlen($prefix));
                $homeImage='images/'.$filename;
            }


            if($teacher)
            {
                $homeLastname= $teacher-> last_name;
                $homeFirstname =$teacher-> first_name;
                $homeCode = $teacher->teacher_code;
                return view('home', ['userName' => $userName,'homeCode'=>$homeCode,'homeFirstname'=>$homeFirstname,'homeLastname'=>$homeLastname,'adminName'=>$adminName,'homeImage'=>$homeImage]);
            }



            
        }
        

        else if($role ==2)
        {}
        
        
        
    }
}
