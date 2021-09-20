<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function storeLike(request $req)
    {
       $like=new Like();
       $like->user_id=Auth::user()->id;
       $like->post_id=$req->post_id; 
       $like->save();
       return redirect('feed');
    }

     public function destroyLike($id)
    {
        // Like::findOrFail($id)->delete();
        $user=User::find(Auth::user()->id);
        $user->Like()->where('post_id',$id)->delete();
       return redirect('feed');
    }

     
}
