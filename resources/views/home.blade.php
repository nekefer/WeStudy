@extends('layouts.app')

@section('content')
<div class="container-home">
    <div class="new-tweet">
        <form action="{{route('tweet')}}" method="POST">
            @csrf
            <textarea name="content" id="content" cols="30" rows="8" class="form-tweet"
                placeholder="Poster un nouveau Tweet"></textarea>
            <div class="errors">
                @error('content')
                <span class="email" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button id="poster" type="submit" class="btn btn-primary">Poster</button>
        </form>

    </div>
    @foreach ($tweets as $tweet)
    <div class="tweet" onclick="location.href='{{route('tweet.content',[$tweet, $tweet->user ] )}}';">
        <img src="{{asset('images/avatar/'.$tweet->user->avatar )}}" alt="image-profile" class="avatar-tweet">
        @if($tweet->user->id !== Auth::user()->id )
        <p>
            <a href="profiles/{{$tweet->user->name}}" class="other-user">{{$tweet->user->name}}</a>
            @else
        <p>
            <a class="noOther-user">{{$tweet->user->name}}</a>
            @endif
            <span>{{$tweet->created_at}}</span>
        </p>
        <br>
        <p> {{$tweet->content}}</p>
    </div>
    @endforeach
</div>
@endsection