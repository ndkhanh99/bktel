<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;  
use App\Models\User;
use DB;


class UserController extends Controller
{
    // show name on navbar
    public function show_name(User $user ){
        $name = Auth::user()->name;
        return ($name);
    }

    // show user image on sidebar
    public function show_image()
    {
        $image = Auth::user()->profile_image_url;
        info($image);
        return ($image);
    }

    // upload user image
    public function uploadimage(Request $request)
    {
        $user = Auth::user();
        $file = file($request ->file('file')->getRealPath());
        $files = $request ->file('file');
        $realname= $files->getCLientOriginalName();
        $file_extension = $files -> getClientOriginalExtension();
        $reallink = 'images/'.date('yymmdd_hhmmss').".".$file_extension;
        $filename = public_path('images/'.date('yymmdd_hhmmss').".".$file_extension);
        file_put_contents($filename,$file);
        $user = User::updateOrCreate(
            ['id'=>$user->id],
            [
                'profile_image_url'=>  $reallink,
           ]
        );
    }
}
