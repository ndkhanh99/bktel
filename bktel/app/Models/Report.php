<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'table_report';
    protected $fillable =[
        'student_id',
        'teacher_to_subject_id',
        'path',
        'note',
        'title',
        'mark',
    ];
}
