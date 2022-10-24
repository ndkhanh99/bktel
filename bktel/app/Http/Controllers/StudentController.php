<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentController extends Controller
{
    // [POST] /students/store
    public function store(Request $request){
        
        return response()->json(Student::create ($request -> all()));
      
    }

    // [GET] /students/{slug}/find/
    public function show($id){
        return response()->json(Student::where('id', $id)->first());
    }

    // [PUT] /students/update
    public function update(Request $request,$id){
        try{

            $student = Student::findOrFail($id);
            $student -> update($request -> all());
            return response() -> json($student);
        }
        catch (ModelNotFoundException $e){
            info($e);
            return response()->json([], 400);
        }
    }

    // [DELETE] / students/delete
    public function delete(Request $request,$id){
        $student = Student::findOrFail($id);
        $student -> delete();
        return response()->json([], 400);
    }
}
