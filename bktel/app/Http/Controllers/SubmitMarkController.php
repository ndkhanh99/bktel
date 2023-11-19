<?php

namespace App\Http\Controllers;

use App\Models\Teacher; 
use App\Models\Student; 
use App\Models\Subject;
use App\Models\Report;
use App\Models\TeacherToSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubmitMarkController extends Controller
{
    public function search_student(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|exists:subjects,subject_code',
            'student_code'=> 'required|exists:students,student_code',
            'semester' => 'required|in:HK1,HK2,HK3',
            'year' => 'required|integer|between:2021,2023',
        ]);

        // Lấy các thông số từ request
        $subject_code = $request->input('subject_code');
        $semester = $request->input('semester');
        $year = $request->input('year');
        $student_code = $request->input('student_code');

        // Lấy đối tượng Subject và Student từ bảng subjects và students
        $subject = Subject::where('subject_code', $subject_code)->first();
        $student = Student::where('student_code', $student_code)->first(); 

        // Kiểm tra xem Subject và Student có tồn tại hay không
        if (!$subject || !$student) {
            $results='';
            return response()->json($results);  
        }

        $subject_id = $subject->id;
        $student_id = $student->id;

        $user = Auth::user();
        $teacher_id = $user->teacher_id;

        if (!$teacher_id) 
        {
            $results='Chỉ có giáo viên mới có thể tìm kiếm';
            return response()->json(['message' => $results]);
        }

        // Truy vấn dữ liệu từ bảng teacher_to_subjects dựa trên các thông số
        $teacher_to_subject = TeacherToSubject::where('teacher_id', $teacher_id)
            ->where('subject_id', $subject_id)
            ->where('semester', $semester)
            ->where('year', $year)
            ->first();

        // Kiểm tra xem TeacherToSubject có tồn tại hay không
        if (!$teacher_to_subject) {
            $results='';
            return response()->json($results);  
        }

        $teacher_to_subject_id = $teacher_to_subject->id;

        // Truy vấn dữ liệu từ bảng reports dựa trên các thông số
        $results = Report::where('teacher_to_subject_id', $teacher_to_subject_id)
            ->where('student_id', $student_id)
            ->select('title', 'path', 'note', 'teacher_to_subject_id', 'student_id','id')
            ->get();

        // Thêm thông tin động vào kết quả
        $results = $results->map(function ($result) use ($subject, $teacher_to_subject, $student) {
            $result->subject_name = $subject ? $subject->name : '';
            $result->subject_id = $subject ? $subject->id : '';
            $result-> semester = $teacher_to_subject ? $teacher_to_subject->semester:'';
            $result-> year = $teacher_to_subject ? $teacher_to_subject->year:'';
            $result->student_name = $student ? $student->last_name . ' ' . $student->first_name : '';
            $result->file_name = pathinfo($result->path, PATHINFO_FILENAME);
            return $result;
        });

        // Trả về kết quả dưới dạng JSON
        return response()->json($results);  
    }

    public function submitmark_store(Request $request)
    {
       // Thực hiện validate dữ liệu
        $request->validate([
            'mark' => 'required|numeric|between:0,10',
            'report_id' => 'required',
        ]);

        // Lấy dữ liệu từ request
        $report_mark = $request->input('mark');
        $report_id = $request->input('report_id');

        // Tìm báo cáo
        $report_update = Report::find($report_id);

        // Kiểm tra xem báo cáo có tồn tại không
        if (!$report_update) {
            return response()->json(['message' => 'Báo cáo không tồn tại.']);
        }

        // Cập nhật điểm và lưu vào cơ sở dữ liệu
        $report_update->mark = $report_mark;
        $report_update->save();

        // Trả về phản hồi thành công
        return response()->json(['message' => 'Cập nhật điểm thành công.']);
    }

    public function downloadFile(Request $request)
    {
        $path = $request -> path;
        return response() -> download($path);
    }
}