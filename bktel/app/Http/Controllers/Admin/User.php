<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;   
use DB;


class User extends Controller
{
    public function show_name(User $user ){
        $name = Auth::user()->name;
        return ($name);
    }
}
