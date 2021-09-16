<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    function index(){
    $posts=Post::orderBy('created_at', 'DESC')->get();
    $users=User::all();
    $comments=Comment::all();
    $profiles=Profile::all();
    $likes=Like::all();
    return view('feed',['posts'=>$posts,'users'=>$users,'profiles'=>$profiles,'comments'=>$comments,'likes'=>$likes]);
   }

}

