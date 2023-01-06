<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\RequestInterface;

class StudentController extends Controller
{
    //[POST]
    public function store(Request $id) 
    {
        return response() -> json(Student::create($id->all()));
    }

    //[PUT]
      public function update(Request $request, $id){
        $student = Student::find($id);
        $student -> update($request -> all());
        return response() -> json($student);
    }
    //[GET]
    public function show(Request $id) {
        return response() -> json(Student::where('id', $id) -> first());
    }

    //[DELETE]
    public function detele($id) {
        $data =Student::find($id);
        $data -> delete();
        return response() -> json($data);
    }
}
