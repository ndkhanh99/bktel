<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher; 
use App\Models\Subject;
use App\Models\TeacherToSubject;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;
class TeacherToSubjectController extends Controller
{   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lecture_code' => 'required|exists:teachers,teacher_code',
            'subject_code' => 'required|exists:subjects,subject_code',
            'semester' => 'required|in:HK1,HK2,HK3',
            'year' => 'required|integer|between:2021,2023', // Ví dụ cho năm từ 2021 đến 2023
            'note' => 'nullable', // Cho phép trường note là optional (không bắt buộc)
        ]);

        // Lấy thông tin từ validatedData
        $teacherCode = $validatedData['lecture_code'];
        $subjectCode = $validatedData['subject_code'];
        $semester = $validatedData['semester'];
        $year = $validatedData['year'];
        $note = $validatedData['note'];

    // Tìm giảng viên và môn học
        $teacher = Teacher::where('teacher_code', $teacherCode)->first();
        $subject = Subject::where('subject_code', $subjectCode)->first();

    // Kiểm tra xem giảng viên và môn học có tồn tại không


    // Lấy ID của giảng viên và môn học
        $teacherId = $teacher->id;
        $subjectId = $subject->id;

    // Check if a record with the same values already exists
        $existingRecord = TeacherToSubject::where([
            'teacher_id' => $teacherId,
            'subject_id' => $subjectId,
            'semester' => $semester,
            'year' => $year,
        ])->first();    

        // If the record doesn't exist, create and save a new one
        if (!$existingRecord) {
            TeacherToSubject::create([
                'teacher_id' => $teacherId,
                'subject_id' => $subjectId,
                'semester' => $semester,
                'year' => $year,
                'note' => $note,
            ])->save();
        } else {        
        // Handle the case where the record already exists
        // You can update the existing record or perform other actions.
        // For now, I'm just logging a message.
        $results='Đăng ký không thành công. Thông tin mà bạn muốn đăng ký đã tồn tại';
        return response()->json(['message' => $results]);
        }
    }
}