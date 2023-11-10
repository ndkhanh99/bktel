<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Subject ;
class TeacherToSubject extends Model
{


    use HasFactory;
    protected $table = 'teacher_to_subjects';



    protected $fillable = [
        'teacher_id',
        'subject_id',
        'semester',
        'year',
        'note',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }


    
}
