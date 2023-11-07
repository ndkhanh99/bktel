<?php

namespace App\Http\Controllers;
use App\Jobs\ProcessCsvUpload;
use Illuminate\Http\Request;
use App\Models\Import;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class ImportTeacherController extends Controller
{


    public function import(Request $request)
    {
        // 1. Kiểm tra và xác thực tệp CSV từ request
        $request->validate([
            'name' => 'required',
            'path' => 'required|ends_with:.csv'
        ]);

        // Lấy tên tệp gốc
        $originalName = $request->file('file')->getClientOriginalName();

        // Tạo tên mới cho tệp
        $newFileName = now()->format('Ymd_His') . '_' . $originalName;

        // Lưu tệp vào thư mục storage/app/data
        $request->file('file')->storeAs('data', $newFileName);

        // 3. Lưu thông tin import vào bảng "imports"
        $import = new Import();
        $import->name = $request->input('name');
        $import->path = storage_path('app/data/' .$newFileName);
        $import->note = $request->input('note'); // Thêm ghi chú (nếu có)
        $import->status = 0; // Trạng thái "0" (uploaded)
        $import->created_by = auth()->user()->id; // Điều này đòi hỏi người dùng đã đăng nhập
        $import->save();


        dispatch(new ProcessCsvUpload($import));
        // 4. Gửi thông báo hoặc redirect người dùng sau khi import thành công
        return response()->json(['success' => true]);
    }

}