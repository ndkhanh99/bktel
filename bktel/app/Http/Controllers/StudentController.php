<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // [POST] /students/store
    public function store(Request $request){
        Student::create ($request -> all());
        
        return response()->json('bao',200);
    }

    // [GET] /students/{slug}/find/
    public function show($slug){
        return response()->json(Student::where('slug', $slug)->first());
    }

    // [PUT] /students/update
    public function update(Request $request,$id){
        $student = Student::findOrFail($id);
        $student -> update($request -> all());
        return response() -> json($student);
    }

    // [DELETE] / students/delete
    public function delete(Request $request,$id){
        $student = Student::findOrFail($id);
        $student -> delete();
        return response(204);
    }
}
