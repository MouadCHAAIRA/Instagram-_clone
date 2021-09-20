

<html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
         
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <nav class="navigation">
            <a href="{{route('feed')}}">
                <img 
                
                    src="{{asset('images/navLogo.png')}}"
                    alt="logo"
                    title="logo"
                    class="navigation__logo"
                />
            </a>
            <div class="navigation__search-container">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search">
            </div>
            <div class="navigation__icons">
                <a href="{{route('create_Post')}}" class="navigation__link">
                   <i class="fa fa-plus-circle"></i>
                </a>
                <a href="explore.html" class="navigation__link">
                    <i class="fa fa-compass"></i>
                </a>
                <a href="#" class="navigation__link">
                    <i class="fa fa-heart-o"></i>
                </a>
                <a href="{{route('index')}}" class="navigation__link">
                    <i class="fa fa-user-o"></i>
                    
                </a>
            </div>
        </nav>
         <i style="height:100px;width:100px;color:red" class="fa fas-trash"></i>
       <main class="feed">
        <section class="photo">
           <form action="{{route('delete',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
           <button class="btn">
              <strong>delete</strong>
        </button> 
          </form>
                <header class="photo__header">
                    <div class="photo__header-column">
                      
                   
                        <img
                            class="photo__avatar"
                           src="{{asset('storage/'.$post->User->Profile->photo)}}"
                           alt="img profile"
                        />
                        {{-- @endif
                    @endforeach --}}
                    </div>
                    <div class="photo__header-column">
                        <h4 class="photo__username">{{$post->user->name}}</h4>
                        <h5 class="photo__location">{{$post->title}}</h5>
                    </div>
                </header>
                <div class="photo__file-container">
                    <img
                        class="photo__file"
                        src="{{asset('storage/'.$post->photo)}}"
                    />
                </div>

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
        
        </main>
         <footer class="footer">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">about us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">language</a></li>
                </ul>
            </nav>
            <span class="footer__copyright">© 2017 instagram</span>
        </footer>
    </body>
</html>

             