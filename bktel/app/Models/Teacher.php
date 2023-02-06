<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';
    
    protected $fillable = [
        'last_name',
        'first_name',
        'teacher_email',
        'teacher_code',
        'department',
        'faculty',
        'address',
        'phone',
        'note',
    ];

    // set Relationships Many to Many
    public function Subjects(){
        return $this-> hasMany(Subject::class); 
    }
}

