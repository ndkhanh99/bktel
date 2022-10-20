<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // [POST] /student/store
    public function store(Request $request){
        return response()->json(Student::create ($request -> all()));
    }

    // [GET] / student/find
    public function show($id){
        return Student::find($id);
    }

    // [PUT] / student/update
    public function update(Request $request,$id){
        $student = Student::findOrFail($id);
        $student -> update($request -> all());
        return $student;
    }

    // [DELETE] / student/delete
    public function delete(Request $request,$id){
        $student = Student::findOrFail($id);
        $student -> delete();
        return 204;
    }

}
