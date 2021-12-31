@php
$route = Route::current()->getName();
@endphp
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <div class="logo me-auto mr-auto p-2">
            <a href="{{ route('welcome')}}"><img src="{{asset('userbackend/panel/assets/img/logo.png')}}" alt="" class="img-fluid" ;></a>
        </div>

        <nav id="navbar" class="navbar">
            @if (Route::has('login'))
            <ul>
                <li><a class="nav-link scrollto {{ ($route == 'welcome') ? 'active':'' }}" href="{{ route('welcome') }}">HOME</a>
                </li>
                <li><a class="nav-link scrollto {{ ($route == 'booking.add') ? 'active':'' }} " href="{{ route('booking.add') }}">BOOK NOW</a>
                </li>
                @auth
                <li><a class="nav-link scrollto {{ ($route == 'pricing') ? 'active':'' }}" href="{{ route('pricing') }}">PRICING & TIMING</a></li>
                <li><a class="nav-link scrollto {{ ($route == 'booking.view') ? 'active':'' }}" href="{{ route('booking.view') }}">BOOKING CHART</a></li>
                <li><a class="nav-link scrollto {{ ($route == 'booking.view') ? 'active':'' }}" href="{{route('user.logout')}}">LOGOUT</a></li>
                @else
                <li><a class="nav-link scrollto {{ ($route == 'pricing') ? 'active':'' }}" href="{{ route('pricing') }}">PRICING & TIMING</a></li>
                <li> <a class="nav-link scrollto {{ ($route == 'booking.view') ? 'active':'' }}" href="{{ route('booking.view') }}">BOOKING CHART</a></li>
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