<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachertoSubject extends Model
{
    use HasFactory;
    public $table = "teacher_to_subjects";
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'note',
        'semester',
        'year'
    ];
}
