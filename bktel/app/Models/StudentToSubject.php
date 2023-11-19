<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentToSubject extends Model
{
    use HasFactory;
    protected $table = 'student_to_subjects';

    protected $fillable = [
        'student_id',
        'subject_id',
        'semester',
        'year',
        'note',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

}