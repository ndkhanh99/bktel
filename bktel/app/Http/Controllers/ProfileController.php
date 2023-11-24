<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;  
use App\Models\User;
use App\Models\Import;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function upload_image(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'path' => 'required|ends_with:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Lấy tên tệp gốc
        $originalName = $request->file('file')->getClientOriginalName();

        // Tạo tên mới cho tệp
        $newFileName = $user->student_id . '' . now()->format('Ymd_His') . '' . $originalName;

        // Lưu tệp vào thư mục storage/app/public/profile_image
        $filePath = $request->file('file')->storeAs('public/profile_image', $newFileName);

        $file = file($request->file('file')->getRealPath());
        $filename = public_path('images/' .$newFileName);
        file_put_contents($filename, $file);
        
        // 3. Lưu thông tin pfofile_image_url vào bảng "users"       
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

        // 4. Gửi thông báo hoặc redirect người dùng sau khi upload thành công
        return response()->json(['success' => true]);
    }

    public function show_image()
    {
        $user = Auth::user()->profile_image_url;
        info($user);
        return ($user);
    }
    
}