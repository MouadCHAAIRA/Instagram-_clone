<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    static function userFeed(){
        $posts=User::all();
           foreach ($posts as $post){
               $user_id=$post['user_id'];
              return $user_id;
           }
       
    }
  public  function User()
    {
        return $this->belongsTo(User::class);
    }
  public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function Like()
    {
        return $this->hasMany(Like::class);
    }

     public function isLikedByLoggedInUser()
    {
        return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false : true;
    }
}
