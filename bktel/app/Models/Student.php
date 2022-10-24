<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'first_name', 'last_name', 'student_code', 'department',
        'faculty', 'address', 'phone','note'
    ];
    public $primaryKey = 'id';

    public function getRouteKeyName(){
        return 'slug';
    }
}
