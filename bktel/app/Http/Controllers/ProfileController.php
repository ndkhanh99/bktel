<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;  
use App\Models\User;
use App\Models\Import;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessCsvUploadSubject;

class ProfileController extends Controller
{
    public function upload_image(Request $request)
{

    $user= Auth::user();

    
    $request->validate([
        'path' => 'required|ends_with:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $originalName = $request->file('file')->getClientOriginalName();

    $newFileName = $user->student_id . '_' . now()->format('Ymd_His') . '_' . $originalName;


    $filePath = $request->file('file')->storeAs('/public/profile_image', $newFileName);

    $file = file($request->file('file')->getRealPath());
    $filename = public_path('images/' .$newFileName);
    file_put_contents($filename, $file);

    $id=$user->id;
    $user_update = User::find($id);
    $role_id= $user->role_id;
    if($role_id ==1 )
    {
        
        $user_update->profile_image_url=null;
    }
    else
    {
        $filePath_new ='storage/app/'.$filePath;
        $user_update->profile_image_url = $filePath_new;
    }


    
    $user_update->save();



    




    return response()->json(['success' => true]);
}


    public function show_image()
    {
        $user = Auth::user()->profile_image_url;
        info($user);
        return ($user);
    }
    
}