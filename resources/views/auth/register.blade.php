@extends('layouts.app')

@section('content')
<div class="register-containt">
<img class="wave" src="{{asset('images/login/wave.png')}}">
<div class="container">
    <div class="img">
        <img src="{{asset('images/login/bg.svg')}}">
    </div>

    <div class="login-content">


        <div class="register-container">
            <form method="POST" action="{{ route('register') }}" class="form">
                @csrf
                <img src="{{asset('images/login/avatar.svg')}}">
                <h2 class="title">{{ __('Register') }}</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="div">
                        <h5>{{ __('Name') }}</h5>
                        <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required
                            autocomplete="name" autofocus>
                        <div class="errors">
                            @error('name')
                            <span class="email" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="div">
                        <h5>{{ __('E-Mail Address') }}</h5>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required
                            autocomplete="email">

                        <div class="errors">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
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
                        <input id="password" type="password" class="input" name="password" required
                            autocomplete="new-password">

                        <div class="errors">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
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
                        <h5>{{ __('Confirm Password') }}</h5>
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required
                            autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection