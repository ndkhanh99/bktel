<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}