<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/welcomeStyle.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>{{ config('app.name') }}</title>
</head>

<body class="">
    <style>
    #page {
        background: url('{{asset('images/ressources/background.jpg')}}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;
    }
    </style>
    <div id="loader">    
        <spam class="letter">C</spam>
        <spam class="letter">H</spam>
        <spam class="letter">A</spam>
        <spam class="letter">R</spam>
        <spam class="letter">G</spam>
        <spam class="letter">E</spam>
        <spam class="letter">M</spam>
        <spam class="letter">E</spam>
        <spam class="letter">N</spam>
        <spam class="letter">T</spam>
    </div>
    <div id="page">
        <div class="lignes">
            <div class="l1"></div>
            <div class="l2"></div>
        </div>
        <div class="container-first">
            <!-- phrase de bienvenu-->
            <h1><span>Rejoignez </span><span>WeStudy </span><span>dès </span><span>aujourd'hui.</span></h1>
            <!-- bouton d'inscription et de -->
            @if (Route::has('login'))
            <div class="container-btns">
                @auth
                <a href="{{ url('/home') }}" class="btn-first">Home</a>
                @else
                <a href="{{ route('login') }}" class="btn-first b1">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-first b2">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="{{asset('js/welcomeJs.js') }}"></script>
</body>

</html>