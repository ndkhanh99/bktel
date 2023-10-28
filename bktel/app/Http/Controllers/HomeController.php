<?php

namespace App\Http\Controllers;
use App\Models\Student;
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
        
        // Lấy giá trị trường "student_id" của người dùng
        $studentId = $user->student_id;
        // Tìm sinh viên trong bảng "student" dựa trên "id" (primary key) của người dùng
        $student = Student::find($studentId);
        if ($student) {
            // Sử dụng $student để truy cập thông tin sinh viên
            $studentLastname= $student-> last_name;
            $studentFirstname =$student-> first_name;
            $studentCode = $student->student_code;
        } else {
            // Không tìm thấy sinh viên tương ứng
        }
        
        
        return view('home', ['userName' => $userName,'studentCode'=>$studentCode,'studentFirstname'=>$studentFirstname,'studentLastname'=>$studentLastname]);
    }
}
