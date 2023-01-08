<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{  
    // Contruct route 
    // show all student
    public function index()
    {
        $students = DB::table('students')->get();
        return $students;
    }
    // show one student
    public function show(Request $request)  
    {   
        $user = Auth::user();
        $user_id = $user -> student_id; 
        $student = Student::where('id' , $user_id) ->first();  
        return response()->json($student);      // return view('student.profile', ['student' => Student::findOrFail($id)]);
    }
    // Create new
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return $student;
    }
    public function store(Request $request)
    {   
        $request->validate([
            'student_code' => 'unique:students'
         ]);

        $user = Auth::user();
        $student = Student::create($request->all());
        $user -> student_id = $student -> id;
        
        $user->save();
    }
    // Update


    // Delete
    public function delete($id)
    {
        $del = Student::findOrFail($id);
        $del->delete();

        return 200;
    }
    //validate 

    
    
}
