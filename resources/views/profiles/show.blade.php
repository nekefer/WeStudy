@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="profile-head">
        <img src="{{asset('images/avatar/'.$user->avatar )}}" alt="image-profile" class="image_user">
        <div class="profile_info">
            <div class="profile-bio">
                <form class="modifier-form" enctype="multipart/form-data" action="{{url('/home/profile')}}"
                    method="post">
                    @csrf
                    <label for="">Modifier profil </label>
                    <input type="file" name="avatar">
                    <input type="submit" value="modifier">
                </form>
            </div>
            <div class="info">
                <span>{{$nb_tweets}} plubication(s)</span>
                <span>{{$nb_following}} abonement(s)</span>
                <span> {{$nb_followers}} abonné(s)</span>
            </div>
        </div>
    </div>
    <div class="bio">
        {{Auth::user()->bio}}
        <div class="profile-bio">
            <form class="modifier-form" enctype="multipart/form-data" action="{{route('profile.bio')}}" method="post">
                @csrf
                <textarea name="bio" id="" cols="30" rows="3" placeholder="modifier votre bio"></textarea>
                <input type="submit" value="modifier">
                <div class="errors" id="leserreurs">
                    @error('bio')
                    <span class="email" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </form>

        </div>
    </div>
    <h3>Mes tweets</h3>
    <div class="posts">
        @foreach($tweets_user as $tweet_user)
        <div class="post">
            <div class="container-detail">
                <span>{{$tweet_user->created_at}}</span>
                <form action="{{route('delete.tweet', [ $tweet_user->id ] )}}" enctype="multipart/form-data" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete"><i class="fas fa-trash-alt"></i></button>
            </form>
            </div>
            <p>{{$tweet_user->content}}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection