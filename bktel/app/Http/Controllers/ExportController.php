<?php

namespace App\Http\Controllers;

use App\Models\Teacher; 
use App\Models\Student; 
use App\Models\Subject;
use App\Models\Report;
use App\Models\StudentToSubject;
use App\Models\TeacherToSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function searchExportCsv(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|exists:subjects,subject_code',
            'teacher_code' => 'required|exists:teachers,teacher_code',
            'semester' => 'required|in:HK1,HK2,HK3',
            'year' => 'required|integer|between:2021,2023',
        ]);

        // Lấy các thông số từ request
        $subjectCode = $request->input('subject_code');
        $semester = $request->input('semester');
        $year = $request->input('year');
        $teacherCode = $request->input('teacher_code');

        // Lấy đối tượng Subject và Teacher từ bảng subjects và teachers
        $subject = Subject::where('subject_code', $subjectCode)->first();
        $teacher = Teacher::where('teacher_code', $teacherCode)->first(); 

        // Kiểm tra xem Subject và Teacher có tồn tại hay không
        if (!$subject || !$teacher) {
            return response()->json(['results' => []]);  
        }

        $subjectId = $subject->id;
        $teacherId = $teacher->id;

        // Truy vấn dữ liệu từ bảng teacher_to_subjects dựa trên các thông số
        $teacherToSubject = TeacherToSubject::where('teacher_id', $teacherId)
            ->where('subject_id', $subjectId)
            ->where('semester', $semester)
            ->where('year', $year)
            ->first();

        // Kiểm tra xem TeacherToSubject có tồn tại hay không
        if (!$teacherToSubject) {
            return response()->json(['results' => []]);  
        }

        $teacherToSubjectId = $teacherToSubject->id;

        // Truy vấn dữ liệu từ bảng reports dựa trên các thông số
        $results = Report::where('teacher_to_subject_id', $teacherToSubjectId)
            ->select('title', 'path', 'note', 'teacher_to_subject_id', 'student_id', 'id', 'mark')
            ->get();

        // Thêm thông tin động vào kết quả
        $results = $results->map(function ($result) use ($subject, $teacherToSubject, $teacher) {
            $student = Student::find($result->student_id);
            $result->teacher_name = optional($teacher)->last_name . ' ' . optional($teacher)->first_name;
            $result->teacher_id = optional($teacher)->id;
            $result->subject_name = optional($subject)->name;
            $result->subject_id = optional($subject)->id;
            $result->semester = optional($teacherToSubject)->semester;
            $result->year = optional($teacherToSubject)->year;
            $result->student_name = optional($student)->last_name . ' ' . optional($student)->first_name;
            $result->file_name = pathinfo($result->path, PATHINFO_FILENAME);
            $result->submitornot = "đã nộp";
            return $result;
        });

        $studentIds = $results->pluck('student_id')->toArray();

        // Truy vấn dữ liệu từ bảng student_to_subjects cho những sinh viên chưa nộp
        $resultsNoSubmit = StudentToSubject::where('subject_id', $subjectId)
            ->where('semester', $semester)
            ->where('year', $year)
            ->whereNotIn('student_id', $studentIds)
            ->get();

        // Thêm thông tin động vào kết quả chưa nộp
        $resultsNoSubmit = $resultsNoSubmit->map(function ($result) use ($subject, $teacherToSubject, $teacher) {
            $studentNoSubmit = Student::find($result->student_id);

            $result->teacher_name = optional($teacher)->last_name . ' ' . optional($teacher)->first_name;
            $result->teacher_id = optional($teacher)->id;          
            $result->subject_name = optional($subject)->name;
            $result->semester = optional($teacherToSubject)->semester;
            $result->year = optional($teacherToSubject)->year;
            $result->student_name = optional($studentNoSubmit)->last_name . ' ' . optional($studentNoSubmit)->first_name;
            $result->submitornot = "chưa nộp";
            $result->mark=0;
            return $result;
        }); 

        // Trả về kết quả dưới dạng JSON
        return response()->json([
            'results' => $results,
            'results_no_submit' => $resultsNoSubmit,
        ]);
    }

    public function ExportDataToCsv(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|exists:subjects,subject_code',
            'teacher_code' => 'required|exists:teachers,teacher_code',
            'semester' => 'required|in:HK1,HK2,HK3',
            'year' => 'required|integer|between:2021,2023',
        ]);

        // Lấy các thông số từ request
        $subjectCode = $request->input('subject_code');
        $semester = $request->input('semester');
        $year = $request->input('year');
        $teacherCode = $request->input('teacher_code');

        // Lấy đối tượng Subject và Teacher từ bảng subjects và teachers
        $subject = Subject::where('subject_code', $subjectCode)->first();
        $teacher = Teacher::where('teacher_code', $teacherCode)->first(); 

        // Kiểm tra xem Subject và Teacher có tồn tại hay không
        if (!$subject || !$teacher) {
            return response()->json(['results' => []]);  
        }

        $subjectId = $subject->id;
        $teacherId = $teacher->id;

        // Truy vấn dữ liệu từ bảng teacher_to_subjects dựa trên các thông số
        $teacherToSubject = TeacherToSubject::where('teacher_id', $teacherId)
            ->where('subject_id', $subjectId)
            ->where('semester', $semester)
            ->where('year', $year)
            ->first();

        // Kiểm tra xem TeacherToSubject có tồn tại hay không
        if (!$teacherToSubject) {
            return response()->json(['results' => []]);  
        }

        $teacherToSubjectId = $teacherToSubject->id;

        // Truy vấn dữ liệu từ bảng reports dựa trên các thông số
        $results = Report::where('teacher_to_subject_id', $teacherToSubjectId)
            ->select('title', 'path', 'note', 'teacher_to_subject_id', 'student_id', 'id', 'mark')
            ->get();

        // Thêm thông tin động vào kết quả
        $results = $results->map(function ($result) use ($subject, $teacherToSubject, $teacher) {
            $student = Student::find($result->student_id);
            $result->teacher_name = optional($teacher)->last_name . ' ' . optional($teacher)->first_name;
            $result->teacher_id = optional($teacher)->id;
            $result->subject_name = optional($subject)->name;
            $result->subject_id = optional($subject)->id;
            $result->semester = optional($teacherToSubject)->semester;
            $result->year = optional($teacherToSubject)->year;
            $result->student_name = optional($student)->last_name . ' ' . optional($student)->first_name;
            $result->file_name = pathinfo($result->path, PATHINFO_FILENAME);
            $result->submitornot = "đã nộp";
            return $result;
        });

        $studentIds = $results->pluck('student_id')->toArray();

        // Truy vấn dữ liệu từ bảng student_to_subjects cho những sinh viên chưa nộp
        $resultsNoSubmit = StudentToSubject::where('subject_id', $subjectId)
            ->where('semester', $semester)
            ->where('year', $year)
            ->whereNotIn('student_id', $studentIds)
            ->get();

        // Thêm thông tin động vào kết quả chưa nộp
        $resultsNoSubmit = $resultsNoSubmit->map(function ($result) use ($subject, $teacherToSubject, $teacher) {
        $studentNoSubmit = Student::find($result->student_id);

        $result->teacher_name = optional($teacher)->last_name . ' ' . optional($teacher)->first_name;
        $result->teacher_id = optional($teacher)->id;      
        $result->subject_name = optional($subject)->name;
        $result->semester = optional($teacherToSubject)->semester;
        $result->year = optional($teacherToSubject)->year;
        $result->student_name = optional($studentNoSubmit)->last_name . ' ' . optional($studentNoSubmit)->first_name;
        $result->submitornot = "chưa nộp";
        $result->mark=0;
        return $result;
    }); 

    // Xử lý xuất dữ liệu ra file CSV
    $columns = array(
        'Student ID',
        'Họ và Tên Sinh viên',
        'Teacher ID',
        'Họ và Tên Giáo viên',
        'Subject ID',
        'Môn học',
        'Học kỳ',
        'Năm',
        'SubmitOrNot',
        'Mark',
    );

    $fileName = $teacherCode.'-'.$subjectCode.'-'.$semester.'-'.$year;
    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
     );
    $filePath = storage_path('app/reports/' . $fileName . '.csv');

    $file = fopen($filePath, 'w');
    fputcsv($file, $columns);

    foreach ($results as $result) {
        $row['Student ID']  = $result->student_id;
        $row['Họ và Tên Sinh viên']   = $result->student_name;
        $row['Teacher ID']    = $result->teacher_id;
        $row['Họ và Tên Giáo viên']  = $result->teacher_name;
        $row['Subject ID']  =  $result->subject_id;
        $row['Môn học']  = $result->subject_name;
        $row['Học kỳ']  = $result->semester;
        $row['Năm']  = $result->year;
        $row['SubmitOrNot'] = $result->submitornot; 
        $row['Mark'] =  $result->mark ; 

        fputcsv($file, array($row['Student ID'], $row['Họ và Tên Sinh viên'], $row['Teacher ID'], $row['Họ và Tên Giáo viên'], $row['Subject ID'],
        $row['Môn học'],$row['Học kỳ'],$row['Năm'],$row['SubmitOrNot'], $row['Mark'] ));
    }

    foreach ($resultsNoSubmit as $result) {
        $row['Student ID']  = $result->student_id;
        $row['Họ và Tên Sinh viên']   = $result->student_name;
        $row['Teacher ID']    = $result->teacher_id;
        $row['Họ và Tên Giáo viên']  = $result->teacher_name;
        $row['Subject ID']  =  $result->subject_id;
        $row['Môn học']  = $result->subject_name;
        $row['Học kỳ']  = $result->semester;
        $row['Năm']  = $result->year;
        $row['SubmitOrNot'] = $result->submitornot; 
        $row['Mark'] =  $result->mark ; 

        fputcsv($file, array($row['Student ID'], $row['Họ và Tên Sinh viên'], $row['Teacher ID'], $row['Họ và Tên Giáo viên'], $row['Subject ID'],
        $row['Môn học'],$row['Học kỳ'],$row['Năm'],$row['SubmitOrNot'], $row['Mark'] ));
    }

        fclose($file);
            return  response()->json([
                'filePath' => $filePath,
                'fileName' => $fileName,
            ]);
    // Trả về response với header và file đã xuất
    // return response()->download($filePath, $fileName . '.csv')->deleteFileAfterSend(true);
    }


    public function downloadFileCsv(Request $request)
        {
            $path = $request -> path;
            return response() -> download($path);
        }
}