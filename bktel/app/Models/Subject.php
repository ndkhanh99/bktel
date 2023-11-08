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
        'subject_code',
        'note',
    ];

    public function user()
    {
         return $this->hasOne(User::class, 'subject_id');
     }
}
