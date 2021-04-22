@extends('layouts.app')

@section('content')
<div class="password-reset">
<div class="card-header">{{ __('Reset Password') }}</div>
<div class="login-content">


    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection