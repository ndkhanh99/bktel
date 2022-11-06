<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;
use DB;
class Student extends Controller
{  
    // Contruct route 
    // show all student
    public function index()
    {
        $students = DB::table('students')->get();
        return $students;
    }
    // show one student
    public function show()  
    {  
         
        return Student::find($id);
        // return view('student.profile', ['student' => Student::findOrFail($id)]);
    }
    // Create new
    public function store(Request $request)
    {
        return Student::create($request->all());
    }
    // Update
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return $student;
    }

    // Delete
    public function delete($id)
    {
        $del = Student::findOrFail($id);
        $del->delete();

        return 200;
    }



    
}
