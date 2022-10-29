<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return //view('students.index'); 
        Students::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' =>'required',
            'lastname' => 'required',
            'student_code'=>'required'
        ]);
       return //view('students.create') ;
       Students::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function read(Request $request,$id)
    {
        $student = Students::find($id);
        $student->update($request->all());
        return //view('students.create');
        $student;
    }
    public function show($id)
    {
        //
        //return (new Students($students))->response();
        return Students::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return 200;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student=Students::find($id);
        Students::destroy($id);
        return $student;
    }
    public function search($firstname)
    {
        //
        return Students::where('firstname','like','%'.$firstname.'%')->get();
    }
}
