<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'teacher_code',
        'department',
        'faculty',
        'address',
        'phone',
        'note'
    ];
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
