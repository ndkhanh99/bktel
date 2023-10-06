<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'Id'=>$this  -> id,
            'Last_name'=>$this ->last_name,
            'First_name'=>$this  -> first_name,
            'Student_code'=>$this  -> student_code,
            'Department'=>$this  -> department,
            'faculty'=>$this  -> faculty,
            'Phone'=>$this  -> phone,
            'Note'=>$this  -> note,
            // 'created_at'=>$this  -> created_at->format('d/m/Y'),
            // 'updated_at'=>$this  -> updated_at->format('d/m/Y'),
        ];

    }
}
