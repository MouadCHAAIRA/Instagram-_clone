<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
     public function index_profile()
    {
        $profile=Profile::where('user_id',Auth::user()->id)->paginate();
        $posts=Post::where('user_id',Auth::user()->id)->paginate();
         $likes=Like::all();
         $comments=Comment::all();

       return view('profile.index',['profile'=>$profile,'posts'=>$posts ,'comments'=>$comments,'likes'=>$likes]);
    }


//   public function index_User_profile()
//     {
       
//          $follow=Like::all();
        

//        return view('profile.index',['follow'=>$profile,'posts'=>$posts ,'comments'=>$comments,'likes'=>$likes]);
//     }

     public function find_profile_user($id)
    {
        $user=Profile::findOrFail($id);
        $posts=Post::all();
        $follow=Follow::where('user_id_1',Auth::user()->id)->paginate();
        $USER=User::all();
       return view('profile.profileUser',['user'=>$user, 'posts'=>$posts,'follows'=>$follow]);
    }

     public function create()
    {
        return view('profile.create');
    }

     public function store(Request $req)
   {
       $profile=new Profile();
       $profile->username=$req->username;
       $profile->website=$req->website;
       $profile->bio=$req->bio;
       $profile->phone=$req->phone;
       $profile->gender=$req->gender;
       $profile->photo=$req->photo;
       $profile->user_id=Auth::user()->id;
       if($req->hasFile('photo'))
       {
           $path=$req->photo->store('image_user','public');
           $profile->photo=$path;
       }
       $profile->save();
       return redirect('index');
   }

 public function editProfile()
    {
      $profile=Profile::where('user_id',Auth::user()->id)->paginate();
  
       return view('profile.edit',['profile'=>$profile]);
    }
    

    public function updateProfile(Request $req,$id)
    {

        $profile=Profile::findOrFail($id);
       $profile->username=$req->username;
       $profile->website=$req->website;
       $profile->bio=$req->bio;
       $profile->phone=$req->phone;
       $profile->gender=$req->gender;
       $profile->photo=$req->photo;
       $profile->user_id=Auth::user()->id;
       if($req->hasFile('photo'))
       {
           $path=$req->photo->store('image_user','public');
           $profile->photo=$path;
       }
       $profile->save();
       return redirect('index');
    }



     public function storeFollow(Request $req)
   {
       $follow=new Follow();
       $follow->user_id_1=Auth::user()->id;
       $follow->user_id_2=$req->user_id_2; 
       $follow->save();
       return back();
   }
  
}

