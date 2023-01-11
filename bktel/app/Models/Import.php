<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class Import extends Model
{
    use HasFactory;
    protected $table = 'imports';
    
    protected $fillable = [
        'name',
        'path',
        'status',
        'created_by',
    ];
}
