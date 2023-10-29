<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Http\Resources\Student as StudentResuore;
use App\Models\User;
use App\Http\Controllers\Controller;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['students' => $students]);
    }
    public function create() {}

    public function store(Request $request, User $user) { 
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'student_code' => 'required|string|unique:students',
            'department' => 'required|string',
            'faculty' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
         ]);
        if($validator->fails()){
                $arr = [
                        'success' => false,
                        'message' => 'Lỗi kiểm tra dữ liệu',
                        'data' => $validator->errors()
                ];
                return response()->json($arr, 200);
         }
        
        $student = Student::create($input);

        // tim kiem nguoi dung dung  voi dieu kien la moi dang ky va cot student id la null
        $userWithNullStudentId = User::whereNull('student_id') // tim student id null
        ->orderBy('created_at', 'desc') // tim kiem nguoi dung dan moi dang ky gan day nhat
        ->first(); 
        $userWithNullStudentId->student_id=$student->id; // truy xuat cot id cua hoc sinh vua submit form va gan id vao cot student_id cua nguoi dung moi dang ky gan day
        $userWithNullStudentId->role_id= 4;  // truy xuat cot role_id cua nguoi dung moi dang ky va mac dinh nguoi dung la hoc sinh 
        $userWithNullStudentId->save(); // luu la nguoi dung nay
    
        $arr = [
            'status' => true,
            'message'=>"Học sinh đã lưu thành công",
            'data'=> new StudentResuore($student),
        ];
        return response()->json($arr, 201);
         
    }
    public function show($id) {
        $student = Student::find($id);
        if (is_null($student)) {
           $arr = [
             'success' => false,
             'message' => 'Không có học sinh này',
             'dara' => []
           ];
           return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết học sinh",
          'data'=> new StudentResuore($student)
        ];
        return response()->json($arr, 201);
     }
    public function edit($id) { }
    public function update(Request $request, Student $student){
        $input = $request->all(); 
        $validator = Validator::make($input, [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'student_code' => 'required|string',
            'department' => 'required|string',
            'faculty' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
         ]);
        if($validator->fails()){
                $arr = [
                        'success' => false,
                        'message' => 'Lỗi kiểm tra dữ liệu',
                        'data' => $validator->errors()
                ];
                return response()->json($arr, 200);
         }
        $student ->last_name=$input['last_name'];
        $student ->first_name=$input['first_name'];
        $student ->student_code=$input['student_code'];
        $student ->department=$input['department'];
        $student ->faculty=$input['faculty'];
        $student ->address=$input['address'];
        $student ->phone=$input['phone'];
        $student ->note=$input['note'];
       
        $student ->save();

        
        $arr = [
            'status' => true,
            'message'=>"Học sinh đã cập nhật thành công",
            'data'=>  new StudentResuore($student),
        ];
        return response()->json($arr, 200);
    }
    public function destroy(Student $student) { 
        $student->delete();
        $arr = [
           'status' => true,
           'message' =>'Học sinh này đã được xóa',
        
        ];
        return response()->json($arr, 200);
    }

}
