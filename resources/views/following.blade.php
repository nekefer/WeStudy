@extends('layouts.app')

@section('content')
    <div class="container-home">
    @foreach ($followings as $following)
    <div class="tweet">
        <img src="{{asset('images/avatar/'.$following->user->avatar )}}" alt="image-profile" class="avatar-tweet">
        <p> <a class="other-user" href="{{route('tweet.profile',[$following->user->name])}}" >{{$following->user->name}}</a>
          <span>{{$following->created_at}}</span>
        </p>
        <p> {{$following->content}}</p>

    </div>

    @endforeach
    </div>

@endsection