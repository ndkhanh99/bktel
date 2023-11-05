<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Import;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
class ImportJob implements ShouldQueue
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
                // Tạo bản ghi giáo viên (teachers)
                $teacher = new Teacher([
                    'last_name' => $row[0], // last_name
                    'first_name' => $row[1], // first_name
                    'teacher_code' => $row[2], // teacher_code
                    'teacher_email'=>$row[3],
                    'department' => $row[5], // department
                    'faculty' => $row[6], // faculty
                    'address'=>$row[7], 
                    'phone'=>$row[8],
                     'note'=>$row[9],
                       
                    //Thêm các trường còn lại của bảng teachers tại đây
                ]);
                $teacher->save();

                // Tạo bản ghi người dùng (users)
                $user = new User([
                    'name' => $row[0] . ' ' . $row[1], // Tạo tên từ last_name và first_name
                    'email' => $row[3], // email
                    'password' => Hash::make($row[4]), // default password
                    'role_id' => 3,
                     'teacher_id'=>  $teacher ->id ,
                ]);
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
