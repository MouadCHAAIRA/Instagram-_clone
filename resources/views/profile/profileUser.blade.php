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
        </nav>)
   <main class="profile-container">
     
         
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
                            {{-- {{-- @foreach ($follows as $follow) --}}
                                @if ($follows->count()==0) 
                         <form action="{{route('storeFollow')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->user_id}}" name="user_id_2">
                            <button class="profile__button u-fat-text">follow</button>
                           </form>   
                            
                     @else
                     
                          <button class="profile__button u-fat-text">Unfollow</button>
                      @endif
                       
                           
                        </div>
                        <ul class="profile__numbers">
                          
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
                

    <div class="profile__pictures">
                    
                     
                     @foreach ($posts as $post)
                     @if ($post->user_id==$user->user_id)
                         
                        <a href="#"  class="profile-picture">
                        <img
                            src="{{asset('storage/'.$post->photo)}}"
                            class="profile-picture__picture"
                        />
                        
                    </a>
                     @endif
                       
                     @endforeach
                   
        
     

    
         
                
     
                </div>
            
            </section>
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
     