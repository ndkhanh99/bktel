<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Import;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;
class ProcessCsvUploadStudent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $import; // Đảm bảo bạn đã khai báo biến $import
    public function __construct(Import $import)
    {
        $this->import = $import; // Gán tham số vào biến $import
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 1. Đọc tệp CSV từ đường dẫn path trong bảng imports
    $import = Import::find($this->import->id);


    // 2. Thực hiện quá trình import dữ liệu từ tệp CSV

    // 3. Cập nhật status cho import
    // $import->status = 2; // Hoàn thành mà không có lỗi
    if ($import) {
        // Cập nhật trạng thái import thành "processing" (1)
        $import->update(['status' => 1]);

        try {
            $csvData = array_map('str_getcsv', file($import->path));
            foreach ($csvData as $row) {
                $validator = Validator::make([  
                    'last_name' => $row[0],
                    'first_name' => $row[1],
                    'student_code' => $row[2],
                    'student_email' => $row[3],
                    'default_password' => $row[4],
                    'department' => $row[5],
                    'faculty' => $row[6],
                    'address' => $row[7],
                    'phone' => $row[8],
                    'note' => $row[9],   

                ], [
                    'last_name' => 'required|string',
                    'first_name' => 'required|string',
                    'student_code' => 'required||unique:students',
                    'student_email' => 'required|email|ends_with:@hcmut.edu.vn',
                    'default_password' => 'required',
                    'department' => 'required|string',
                    'faculty' => 'required|string',
                    'address' => 'required|string',
                    'phone' => 'required',
                    'note' => 'nullable|string',
                    
                ]);
                if ($validator->fails()) {
                    // Ghi log lỗi
                    Log::error('Lỗi kiểm tra dữ liệu cho dòng: ' . implode(', ', $row));
                    continue; // Bỏ qua dòng dữ liệu này và tiếp tục với dòng dữ liệu khác
                }

                // Tạo bản ghi sinh viên (students)
                $student = new Student([
                    'last_name' => $row[0], // last_name
                    'first_name' => $row[1], // first_name
                    'student_code' => $row[2], // student_code
                    'student_email'=>$row[3],
                    'department' => $row[5], // department
                    'faculty' => $row[6], // faculty
                    'address'=>$row[7], 
                    'phone'=>$row[8],
                     'note'=>$row[9],

                ]);
                $student->save();

                // Tạo bản ghi người dùng (users)
                $user = new User([
                    'name' => $row[0] . ' ' . $row[1], // Tạo tên từ last_name và first_name
                    'email' => $row[3], // email
                    'password' => Hash::make($row[4]), // default password
                    'role_id' => 4,
                    'student_id'=>  $student ->id ,
                ]);

                $user->role_id=4;
                $user->student_id=$student->id;
                $user->save();
            }
            // Cập nhật trạng thái import thành "finished without error" (2)
            $import->update(['status' => 2]);
        } catch (Exception $e) {
            // Xử lý lỗi nếu có lỗi xảy ra trong quá trình import
            // Cập nhật trạng thái import thành "finished with error" (3)
            $import->update(['status' => 3]);
        }
    }
    $import->save();
    }
}