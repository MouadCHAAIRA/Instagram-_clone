<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  public function indexComment(){
    $comments=Comment::all();
    return view('feed',['comments'=>$comments]);
   }
      public function storeComment(Request $req)
   {
       $comment=new Comment();
       $comment->content=$req->content; 
       $comment->user_id=Auth::user()->id;
       $comment->post_id=$req->post_id; 
       $comment->save();
       return redirect('feed');
   }
}
