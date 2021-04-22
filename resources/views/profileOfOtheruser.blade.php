@extends('layouts.app')

@section('content')
<div class="sub-head">
    <div>
        <h2 class="profileName">Profile de {{$profileUser->name}}</h2>
        <span>{{$profileUser->bio}}</span><br>
        @if($profileUser->is_following_you)
        <span class="info">Cet utilisateur vous suit</span>
        @endif
    </div>
    @if($profileUser->id !== Auth::user()->id )
    @if(!$profileUser->is_followed)
    <a href="{{route('conversation.show',[$profileUser])}}" class="messagerie"><i class="far fa-comments"></i></a>

    <form class="Otheruser" action="{{ route('tweet.follows',[$profileUser->id]) }}" method="post">
        @csrf
        <button id="btnOtheruser" class="btn btn-primary r" type="submit" preserve-scroll>S'abonner</button>
    </form>
    @else
    <form class="Otheruser" action="{{ route('tweet.unfollows',[$profileUser->id]) }}" method="post">
        @csrf
        <button id="btnOtheruser" class="btn btn-primary" type="submit" preserve-scroll>Se désabonner</button>
    </form>
    @endif
    @endif
</div>
<div class="container-home">
    @foreach ($tweets as $tweet)
    <div class="tweet">
        <img src="{{asset('images/avatar/'.$profileUser->avatar)}}" alt="image-profile" class="avatar-tweet">
        <p>
            <span>{{$tweet->created_at}}</span>
        </p>
        <p> {{$tweet->content}}</p>

    </div>

    @endforeach

    @endsection