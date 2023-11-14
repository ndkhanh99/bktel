<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Import;
use App\Models\Report;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherToSubject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function uploadReport_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'semester' => 'required|in:HK1,HK2,HK3',
            'year' => 'required|integer|between:2021,2023',
            'note' => 'nullable|string',
            'file' => 'required', // Thay đổi định dạng file nếu cần // cho phép nộp tất cả các file báo cáo
        ]);

    
                    // Lưu file vào thư mục chỉ định
                    $year = $request->input('year');
                    $semester = $request->input('semester');
                    $subjectId = $request->input('subject_id');
                    $teacherId = $request->input('teacher_id');
                    $title = $request->input('title');
                    $note = $request->input('note');

                    $directoryPath = "reports/{$year}/{$semester}/{$subjectId}";

                    // Kiểm tra xem thư mục đã tồn tại chưa
                    if (!Storage::exists($directoryPath)) {
                        // Nếu không, tạo thư mục
                        Storage::makeDirectory($directoryPath);
                    }



                    $path = $request->file('file')->storeAs(
                        "reports/{$year}/{$semester}/{$subjectId}",
                        $request->input('title') . '.' . $request->file('file')->extension()
                    );

       // Ghi log thông tin đường dẫn thư mục và đường dẫn đầy đủ
       Log::info('Directory path: ' . $directoryPath);
       Log::info('Full path: ' . $path);
                     // Lấy teacher_to_subject gần đây nhất
                        $teacher_to_subject = TeacherToSubject::where('teacher_id', $teacherId)
                        ->where('subject_id', $subjectId)
                        ->where('semester', $semester)
                        ->where('year', $year)
                        ->latest()
                        ->first();


                     if ($teacher_to_subject) {
                        // Lưu vào database
                        $user = Auth::user();
                        $teacher_to_subject_id = $teacher_to_subject->id;
                        $student_id = $user->student_id;
                        Report::create([
                            'student_id' => $student_id,
                            'teacher_to_subject_id' => $teacher_to_subject_id,
                            'title' => $title,
                            'path' => $path,
                            'note' => $note,
                            'mark' => null, // hoặc để trống, tùy thuộc vào cấu trúc của cột trong cơ sở dữ liệu
        ]);
    }






               
                
    }
}
