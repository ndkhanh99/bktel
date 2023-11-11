<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    
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

    public function user()
    {
        return $this->hasOne(User::class, 'teacher_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_to_subjects', 'teacher_id', 'subject_id')
        ->withPivot('semester', 'year', 'note');
    }

}