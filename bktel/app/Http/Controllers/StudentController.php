<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\Student as StudentResuore;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['students' => $students]);
    }
    public function create() {}

    public function store(Request $request) { 
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
        $arr = [
            'status' => true,
            'message'=>"Học sinh đã lưu thành công",
            'data'=> new StudentResuore($student),
        ];
        return response()->json($arr, 201);
        // return response()->json(['student' => $student], 201); 
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
