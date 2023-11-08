<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use DB;

class SubjectController extends Controller
{
    public function store(Request $request, User $user) { 

        $input = $request->all(); 
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'subject_code' => 'required|string|unique:subjects',
            'note' => 'nullable|string',
         ]);


         $subject = subject:: create($request->all());
        $subject->save();
        
     
    }
}
