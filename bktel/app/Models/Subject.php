<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Subject extends Model
{
    use HasFactory;
   
    protected $table = 'subjects';
    
    protected $fillable = [
       'name',
       'code',
       'note',
    ];
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teachers_to_subjects');
    }
}
