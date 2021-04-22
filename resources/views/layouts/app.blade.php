<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/appStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/emailStyle.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>{{ config('app.name') }}</title>
</head>

<body>

    <div class="head" id="haut">
        <a class="nom-app" href="{{ url('/') }}"> {{ config('app.name', 'WeStudy') }} </a>
        
        @guest
        @if (Route::has('login'))
        <a class="login-app" href="{{ route('login') }}">{{ __('Login') }}</a>
        @endif

        @if (Route::has('register'))
        <a class="register-app" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
        @else
        <form action="{{route('search')}}" method="get" class="search-form">
            <input type="search" name="search" id="search" class="search" placeholder="Rechercher une personne">
            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
    </div>
    
    <div class="menu">
    
        <a id="sub-menu" href="{{route('tweet')}}">Home</a>
        <a id="sub-menu" href="{{route('tweet.followings')}}">Mes abonnement </a>
        <a id="sub-menu" href="{{route('conversation.index')}}">Mes messages</a>
        <a id="sub-menu" href="{{route('notification.commente')}}">Mes notifications({{auth()->user()->unreadNotifications->count()}})</a>        
    </div>
    <div ><a href="#haut" class="haut">TOP</a></div>
    <div class="user-logout">
        <p class="name-profile">
            {{ Auth::user()->name }}

        <div class="i-profile">
            <i class="fas fa-angle-down "></i>
        </div>
        </p>

        <div class="profile-ap" aria-labelledby="navbarDropdown">

            <p class="manager-compte">Manage account</p>
            <a id="navbarDropdown" href="{{route('profile.show')}}" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                Profile
            </a>
            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
            </form>
        </div>
    </div>


    @endguest
    </div>
    <main class="">
        @yield('content')
    </main>
    <!-- Scripts -->
    <script src="{{ asset('js/loginJs.js') }}"></script>
</body>

</html>