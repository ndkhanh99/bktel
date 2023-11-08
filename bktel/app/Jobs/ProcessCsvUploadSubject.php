<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Import;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;
class ProcessCsvUploadSubject implements ShouldQueue
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
            $skipFirstRow = true; // Biến để theo dõi xem chúng ta đang ở hàng đầu tiên (dòng tiêu đề) hay không.
            foreach ($csvData as $row) {


                if ($skipFirstRow) {
                    $skipFirstRow = false; // Đánh dấu rằng chúng ta đã bỏ qua hàng đầu tiên và sẽ không làm gì với nó.
                    continue; // Bỏ qua hàng đầu tiên và tiếp tục với các hàng tiếp theo.
                }
                $validator = Validator::make([  
                    'name' => $row[0],
                    'subject_code' => $row[1],
                    'note' => $row[2],   

                ], [
                    'name' => 'required|string',
                    'subject_code' => 'required|unique:subjects',
                    'note' => 'nullable|string',
                    
                ]);
                if ($validator->fails()) {
                    // Ghi log lỗi
                    Log::error('Lỗi kiểm tra dữ liệu cho dòng: ' . implode(', ', $row));
                    continue; // Bỏ qua dòng dữ liệu này và tiếp tục với dòng dữ liệu khác
                }

                // Tạo bản ghi môn học (subjects)
                $subject = new Subject([
                    'name' => $row[0], // name
                    'subject_code' => $row[1], // subject_code
                    'note'=> $row[2],

                ]);
                $subject->save();

           
            
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