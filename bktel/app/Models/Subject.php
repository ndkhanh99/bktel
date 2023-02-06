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
    
    // set Relationships Many to Many
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teachers_to_subjects');
    }
}
