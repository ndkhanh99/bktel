<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
   
    protected $table = 'subjects';
    
    protected $fillable = [
       'name',
       'code',
       'note',
    ];
    protected function Subjects()
    {
        return $this->belongsToMany(Teachers::class);
    }
}
