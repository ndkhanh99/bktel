<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\TeacherToSubject;
class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    
    protected $fillable = [
        'student_id',
        'teacher_to_subject_id',
        'title',
        'path',
        'mark',
        'note',
    ];

       // Mối quan hệ với sinh viên
       public function student()
       {
           return $this->belongsTo(Student::class);
       }
   
       // Mối quan hệ với giảng viên-môn học
       public function teacherToSubject()
       {
           return $this->belongsTo(TeacherToSubject::class);
       }
}