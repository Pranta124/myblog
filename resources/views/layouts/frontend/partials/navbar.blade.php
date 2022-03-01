
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Blog</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/posts" class="nav-item nav-link">Posts</a>
                <a href="/categories" class="nav-item nav-link">Categories</a>
                <a href="/#about" class="nav-item nav-link">About</a>
            </div>
            @if(Route::has('login'))
            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                        <span class="dropdown-item dropdown-header"></span>
                        <div class="dropdown-divider"></div>
                        @if ( Auth::user()->role->id == 1)
                        <a href="{{route('admin.index')}}" class="dropdown-item">
                            <i class="fa fa-tv" aria-hiden="true"></i>Dashboard
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <a href="{{route('admin.profile')}}" class="dropdown-item" target="_blank">
                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{Auth::user()->name}}</a>
                        @elseif ( Auth::user()->role->id == 2)
                        <a href="{{route('user.index')}}" class="dropdown-item">
                            <i class="fa fa-tv" aria-hiden="true">Dashboard</i>
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <a href="{{route('user.like.posts')}}" class="dropdown-item">
                            <i class="fa fa-heart" aria-hiden="true">Favourite-list</i>
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        @else
                        null;
                  
                  
                        @endif
                        
                        
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="fas fa-power-off" aria-hiden="true">{{ __('Logout')}}</i>
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                                @csrf
                        </form>

                    </div>
                </li>
            </ul>        
            @else
                <li><a href="{{route('login')}}">Login</a></li>
            @if(Route::has('register'))
                <li><a href="{{route('register')}}">Register</a></li>
            @endif
            @endauth
            @endif
        </div>
    </nav>
    <!-- Navbar End -->

