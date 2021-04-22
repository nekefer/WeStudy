@extends('layouts.app')

@section('content')
<div class="container-home">
    <div class="tweet">
        <img src="{{asset('images/avatar/'.$tweet->user->avatar)}}" alt="image-profile" class="avatar-tweet">
        <p>
            <a class="other-user">{{$tweet->user->name}} </a>   
            <span>{{$tweet->created_at}}</span>
        </p>
        <p> {{$tweet->content}}</p>
        <h5 class="post-comment">Commentaire</h5>
        @forelse($comments as $comment)
        <div class="comment">
            <p >{{$comment->content}}</p>
        </div>

        @empty
        <p class="no-comment">aucun commentaire</p>
        @endforelse

        <form id="from-comment" action="{{route('tweet.commente', [$tweet, $tweet->user ])}}" method="post">
            @csrf
            <label for="content">Votre commentaire:</label>
            <textarea name="content" id="content" cols="10" rows="4" class="form-tweet"
                placeholder="Poster un commentaire"></textarea>
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

    @endsection