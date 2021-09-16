@extends('layouts.master')
@section('content')
   <main class="profile-container">
     @forelse ($profile as $user)
         
            <section class="profile">
                <header class="profile__header">
                    <div class="profile__avatar-container">
                        <img 
                           src="{{asset('storage/'.$user->photo)}}"
                            alt='...'
                             class="profile__avatar"
                        />
                    </div>
                    <div class="profile__info">
                        <div class="profile__name">
                            <h1 class="profile__title">{{$user->username}}</h1>
                            <a href="{{route('edit_Profile')}}" class="profile__button u-fat-text">Edit profile</a>
                            <i class="fa fa-cog fa-2x" id="cog"></i>
                        </div>
                        <ul class="profile__numbers">
                            <li class="profile__posts">
                                <span class="profile__number u-fat-text">{{count($posts)}} </span> posts
                            </li>
                            <li class="profile__followers">
                                <span class="profile__number u-fat-text">40</span> followers
                            </li>
                            <li class="profile__following">
                                <span class="profile__number u-fat-text">134</span> following
                            </li>
                        </ul>
                        <div class="profile__bio">
                            <span class="profile__full-name u-fat-text">{{$user->username}}</span>
                            <p class="profile__full-bio">{{$user->bio}}</p>
                        </br>
                            <a href="http://serranoarevalo.com" class="profile__link u-fat-text">{{$user->website}}</a>
                        </div>
                    </div>
                </header>
                 @empty
      <h2>no data</h2>   
     @endforelse

    
         
                <div class="profile__pictures">
                    
                     @forelse ($posts as $post)
                     
                    <a href="{{route('details_Post',$post->id)}}"  class="profile-picture">
                        <img
                            src="{{asset('storage/'.$post->photo)}}"
                            class="profile-picture__picture"
                        />
                        
                        <div class="profile-picture__overlay">
                            <span class="profile-picture__number">
                                <i class="fa fa-heart"></i> {{$likes->where('post_id',$post->id)->count()}}
                            </span>
                            <span class="profile-picture__number">
                                <i class="fa fa-comment"></i>{{$comments->where('post_id',$post->id)->count()}}
                            </span>
                        </div>
                    </a>
                        @empty
         <h2>no post</h2>
     @endforelse
     
                </div>
            
            </section>
   </main>

       
      <div class="popUp">
            <i class="fa fa-times fa-2x" id="closePopUp"></i>
            <div class="popUp__container">
                <div class="popUp__buttons">
                    <form  action="{{ route('logout') }}" method="POST" >
                        @csrf
                    <button  class="popUp__button">Log Out</button>
                    </form>
                    <a href="#" class="popUp__button" id="cancelPopUp">Cancel</a>
                </div>
            </div>
        </div>
     <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
        <script src="js/app.js"></script>

@endsection
     