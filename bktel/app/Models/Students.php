<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    //protected $table = 'my_students ';
    protected $fillable = 
    [
        'firstname',
        'lastname',
        'student_code',
        'department',
        'faculty',
        'address',
        'phone',
        'note'
    ];
}
