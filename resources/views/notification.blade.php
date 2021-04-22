@extends('layouts.app')

@section('content')
<div class="container-home">
        @unless(auth()->user()->unreadNotifications->isEmpty())
            @foreach(auth()->user()->unreadNotifications as $notification)
                <div class="tweet">

               <p class="notification"> {{$notification->data['name']}} a poster un commentiare.<br>
               <a href="{{route('tweet.content',[$notification->data['tweetId'],$notification->data['tweet_userId']]) }}">allez voir</a></p>
               <a href="{{route('notificationReload',[$notification->data['tweetId'], $notification] )}}" >Notification lu</a>
               </div>
             @endforeach
        @endunless
</div>
@endsection