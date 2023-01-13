<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Teacher;


class TeacherToSubject extends Model
{
    use HasFactory;

    protected $table = 'teachers_to_subjects';
    protected  $fillable = [
        'teacher_id',
        'subject_id',
        'year',
        'semester',
    ];
}
