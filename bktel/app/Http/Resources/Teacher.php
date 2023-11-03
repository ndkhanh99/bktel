<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Teacher extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'ID'=>$this  -> id,
            'HỌ'=>$this ->last_name,
            'TÊN'=>$this  -> first_name,
            'MSGV'=>$this  -> teacher_code,
            'PHÒNG BAN'=>$this  -> department,
            'KHOA '=>$this  -> faculty,
            'SỐ ĐIỆN THOẠI'=>$this  -> phone,
            'GHI CHÚ'=>$this  -> note,
            // 'created_at'=>$this  -> created_at->format('d/m/Y'),
            // 'updated_at'=>$this  -> updated_at->format('d/m/Y'),
        ];

    }
}
