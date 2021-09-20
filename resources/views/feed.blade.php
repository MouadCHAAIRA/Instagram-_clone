@extends('layouts.master')
@section('content')

    
    <main class="feed">
        <section class="photo">
            @forelse ($posts as $post)
                <header class="photo__header">
                    <div class="photo__header-column">
                        {{-- @foreach ($profiles as $profile)
                          @if ($post->user_id ==$profile->user_id) --}}
                        <img
                            class="photo__avatar"
                           src="{{asset('storage/'.$post->User->Profile->photo)}}"
                           alt="img profile"
                        />
                        {{-- @endif
                    @endforeach --}}
                    </div>
                    <div class="photo__header-column">
                        @if ($post->User->id != Auth::user()->id) 
                          <form action="{{route('profileUser',$post->User->Profile->id)}}" method="get">
                            @csrf
                        <button class="btn"><h4 class="photo__username">{{$post->user->name}}</h4></button>
                        </form>  
                        @else
                         <h4 class="photo__username">{{$post->user->name}}</h4>   
                        @endif
                        
                        <h5 class="photo__location">{{$post->title}}</h5>
                    </div>
                </header>
                <div class="photo__file-container">
                    <img
                        class="photo__file"
                        src="{{asset('storage/'.$post->photo)}}"
                    />
                </div>
                <div class="photo__info">

    
                  {{-- @if ($likes->where('user_id',Auth::user()->id)->count()==0 || $likes->where('post_id',$post->id)->count()==0) --}}
                  @if (!$likes->where('user_id',Auth::user()->id)->where('post_id',$post->id)->first())
                      
                        <form action="{{route('storeLike')}}" method="POST" id="heart" >
                    @csrf
                     <div class="photo__icons">
                      <input id="post_id" type="hidden" value="{{$post->id}}" name="post_id" >
                        <span class="photo__icon">
                           <button id=#btn class="btn"><i class="fa fa-heart-o heart fa-lg"></i></button> 
                        </span>
                        </form>

                         @else
                         {{-- @foreach ($likes as $like) --}}
                      <form action="{{route('deleteLike',$post->id)}}" method="POST" id="heart">
                        @csrf
                        @method('DELETE')
                       <div class="photo__icons">
                        <span class="photo__icon">
                           <button  id=#btn  class="btn "><svg  style="height:30px; width:30px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="red" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg></button> 
                        </span>
                   </form>
                   {{-- @endforeach --}}
                       @endif
                        
                        <span class="photo__icon">
                            <i class="fa fa-comment-o fa-lg"></i>
                        </span>
                    </div>
                    
                   
                    <span id="count-js" class="photo__likes"> {{$post->Like->where('post_id',$post->id)->count()}} likes</span>  
                     
                    
                    <ul class="photo__comments">
                      
                   @foreach ($post->Comment as $comment) 
                          <li class="photo__comment">
                             @if ($post->id==$comment->post_id)
                               <span class="photo__comment-author">{{$comment->user->name}}</span>{{$comment->content}}  
                            <span class="photo__time-ago">{{$comment->created_at->diffforhumans()}}</span>
                               @endif
                            
                        </li>  
                        @endforeach
                 
                    </ul>
                    
                    <div class="photo__add-comment-container">
                          <form action="{{route('storeComment')}}"  method="POST" class="edit-profile__form" >
                    @csrf
                        <textarea placeholder="Add a comment..." class="photo__add-comment"  name="content"></textarea>
                        <input type="hidden" value="{{$post->id}}" name="post_id" >
                       
                        <i> <button class="btn btn-primary ">submit</button></i>
                          </form>
                    </div>
                </div>
                  @empty
      <h1>this is feed page</h1>  
    @endforelse
           </section>
    </main>
  
     <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
        <script src="js/app.js"></script>
        
 // to add ajax in next modifification
        <script>
       const forms=document.querySelectorAll('#heart');
    

       forms.forEach((form) => {
           form.addEventListener('submit',(e)=>{
               e.preventDefault();
               const url=form.getAttribute('action');
                const token=document.querySelector('meta[name="csrf-token"]');
                const postId=document.querySelector("#post_id");
                 
              fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            method: 'post',
            body: JSON.stringify({
                id: postId
            })
        }).then(response).then(data => {
                count.innerHTML = data.count + ' Like(s)';
            })
        }).catch(error => {
            console.log(error);
        });
           });
       });
        </script>
@endsection
     