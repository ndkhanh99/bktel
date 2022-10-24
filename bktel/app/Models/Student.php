<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'first_name',
    ];
    public $primaryKey = 'id';
    
    public function getRouteKeyName(){
        return 'slug';
    }
}
