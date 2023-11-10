<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class Import extends Model
{
    use HasFactory;
    protected $table = 'imports'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'name',         // Tên gợi nhớ cho lần import
        'path',         // Đường dẫn tới tệp
        'status',       // Trạng thái (0: uploaded, 1: processing, 2: finished without error, 3: finished with error)
        'created_by',   // Người dùng tạo import
        'note',         // Ghi chú
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
