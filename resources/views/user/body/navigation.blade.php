<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="logo me-auto mr-auto p-2">
            <a href="{{ route('welcome')}}"><img src="{{asset('userbackend/panel/assets/img/logo.png')}}" alt="" class="img-fluid" ;></a>
        </div>

        <nav id="navbar" class="navbar ml-auto">
            @if (Route::has('login'))
            <ul>
                @auth
                <li><a class="nav-link scrollto active" href="{{ route('welcome') }}">HOME</a></li>
                <li><a class="nav-link scrollto" href="{{ route('welcome') }}">PRICING & PROMO</a></li>
                <li><a class="nav-link scrollto" href="{{ route('welcome') }}">BOOKING CHART</a></li>
                <li class="dropdown">
                    <a href="#">
                        <img src="{{(!empty(Auth::user()->profile_photo_path)) ? url('upload/user_images/'.Auth::user()->profile_photo_path) : url('upload/no_image.png')}}" alt="{{ Auth::user()->name }}" style="width:20%;" class="bg-info rounded-circle">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href=""> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('user.logout')}}"> Logout</a>
                        </li>
                    </ul>
                </li>
                @else
                <li><a class="nav-link scrollto active" href="{{ route('welcome') }}">HOME</a></li>
                <li><a class="nav-link scrollto" href="{{ route('welcome') }}">PRICING & PROMO</a></li>
                <li><a class="nav-link scrollto" href="{{ route('welcome') }}">BOOKING CHART</a></li>
                <li>
                    <a class="nav-link scrollto" href="{{ route('login') }}">LOGIN</a>
                </li>
                @if (Route::has('register'))
                <li><a class="nav-link scrollto" href="{{ route('register') }}">REGISTER</a></li>
                <li><a class="nav-link scrollto" href="{{ route('admin.login')}}">ADMIN</a></li>
                @endif
                @endauth
            </ul>
            @endif
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>