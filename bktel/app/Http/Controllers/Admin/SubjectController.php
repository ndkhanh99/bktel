<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class SubjectController extends Controller
{
    public function store(Request $request)
    { 
        $request -> validate([
          'name' => 'required|string|max:255',
          'code' => 'required|string|max:255',
          'note' => 'max:255',
        ]);

        $subject = Subject::create($request->all());
    }
}
