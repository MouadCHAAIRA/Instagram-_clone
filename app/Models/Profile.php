<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->hasOne(User::class);
    }
    public function Post()
    {
        return $this->hasMany(Post::class);
    }

     public function Follow()
    {
        return $this->hasMany(Follow::class);
    }
    
}
