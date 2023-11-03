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
            // Lấy giá trị trường "student_id" của người dùng
            $id_role  = $user->student_id;
            // Tìm sinh viên trong bảng "student" dựa trên "id" (primary key) của người dùng
            $student = Student::find($id_role);
            $adminName='';
            if ($student) 
            {
                // Sử dụng $student để truy cập thông tin sinh viên
                $homeLastname= $student-> last_name;
                $homeFirstname =$student-> first_name;
                $homeCode = $student->student_code;
                return view('home', ['userName' => $userName,'homeCode'=>$homeCode,'homeFirstname'=>$homeFirstname,'homeLastname'=>$homeLastname,'adminName'=>$adminName]);
            
            } 
       
        }

        else if($role==1)
        {        
            $homeCode='';
            $homeFirstname='';
            $homeLastname='';
            $adminName = 'Admin Page';
            
            return view('home', ['userName' => $userName,'homeCode'=>$homeCode,'homeFirstname'=>$homeFirstname,'homeLastname'=>$homeLastname,'adminName'=>$adminName]);
        }

        else if($role == 3)
        {
            $id_role = $user -> teacher_id ;
            $teacher= Teacher::find($id_role);
            $adminName='';
            if($teacher)
            {
                $homeLastname= $teacher-> last_name;
                $homeFirstname =$teacher-> first_name;
                $homeCode = $teacher->teacher_code;
                return view('home', ['userName' => $userName,'homeCode'=>$homeCode,'homeFirstname'=>$homeFirstname,'homeLastname'=>$homeLastname,'adminName'=>$adminName]);
            }  
        }
        else if($role ==2)
        {
            //
        }
    }
}
