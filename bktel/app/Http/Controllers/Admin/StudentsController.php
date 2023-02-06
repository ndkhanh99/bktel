<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
         
    // }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // store Student function
    public function store(Request $request)
    { 
      $request -> validate([
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'student_code' => 'required|min:7|regex:/[0-9]/',
        'department' =>'required|string|max:255',
        'faculty' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|numeric|min:10',
      ]);
      $user = Auth::user();
      $student = Student::create(
        [
          'last_name'=> $request -> last_name,
          'first_name'=> $request -> first_name,
          'student_code'=> $request -> student_code,
          'faculty'=> $request -> faculty,
          'department'=> $request -> department,
          'address'=> $request -> address,
          'student_email'=> $user -> email,
          'phone'=> $request -> phone,
          'note'=> $request -> note,
        ]
    );
     
      $user ->student_id = $student -> id;
      $user -> save();
      $student->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        $name = Student::where('id',  '>',  0 )->get();
        return response()->json($name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        
    }       

    // validator
    
}

