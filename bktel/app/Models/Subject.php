<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Teacher;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    
    protected $fillable = [
        'name',
        'subject_code',
        'note',
    ];

    public function user()
    {
         return $this->hasOne(User::class, 'subject_id');
     }


     public function teachers()
{
    return $this->belongsToMany(Teacher::class, 'teacher_to_subjects', 'subject_id', 'teacher_id')
        ->withPivot('semester', 'year', 'note');
}


// public function teachers(){
//     return $this->belongsToMany(Teacher::class);
// }
}
