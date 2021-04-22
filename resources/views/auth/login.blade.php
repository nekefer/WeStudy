@extends('layouts.app')

@section('content')
<img class="wave" src="{{asset('images/login/wave.png')}}" />
<div class="container">
    <div class="img">
        <img src="{{asset('images/login/bg.svg')}}">
    </div>

    <div class="login-content">
        <form method="POST" action="{{ route('login') }}" class="form">
            <img src="{{asset('images/login/avatar.svg')}}">
            <h2 class="title">{{ __('Login') }}</h2>
            @csrf
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="div">
                    <h5>{{ __('E-Mail Address') }}</h5>
                    <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>
                    <div class="errors">
                        @error('email')
                        <span class="email-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>{{ __('Password') }}</h5>
                    <input id="password"² type="password" class="input" name="password" required
                        autocomplete="current-password">
                    <div class="errors">
                        @error('password')
                        <span class="password-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            <div class="remember-forgot">
                <div class="remember">
                    <input class="" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div>
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection