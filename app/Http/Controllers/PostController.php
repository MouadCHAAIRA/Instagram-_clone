<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

     public function indexPost()
    {
          $posts=Post::all();
       return view('profile.index',['posts'=>$posts]);
    }
    

     public function createPost()
    {
       return view('posts.create');
    }
    
    public function storePost(Request $req)
    {
        $post=new Post();
        $post->title=$req->title;
        $post->photo=$req->photo;
       $post->user_id=Auth::user()->id;
      if($req->hasFile('photoPost'))
       {
           $path=$req->photoPost->store('image_post','public');;
           $post->photo=$path;
       }
     $post->save();
     return redirect('index');
    }

       function detailsPost($id)
   {
       $post=Post::findOrFail($id);
       return view('profile.details',['post'=>$post ]);
   }

     function destroyPost($id)
   {
       Post::findOrFail($id)->delete();
       return redirect('index');
   }
}
