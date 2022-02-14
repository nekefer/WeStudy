@extends('layouts.app')

@section('content')

<div class="conversation">

   <div class="amis">
       <div class="username">Mes amis</div>
   @include('conversations.users',['users' => $users])
   </div>
    <div class="message">
        <div class="username">{{$user->name}}</div>
        <div>
            @foreach($messages as $message )
            <div class="msg">
                <p class="msg-p">
                    @if($message->from->id != $user->id)
                    <div class="text-user">{{$message->content}}</div>
                    @else
                    {{$message->content}}
                    @endif
                </p>
            </div>
            @endforeach
            <form class="envoyer" action="{{ route('conversation.store', [$user])}}" method="post">
                @csrf
                <button id="msg-envoyer" class="btn btn-primary" type="submit">Envoyer</button>
            </form>
        </div>
    </div>


</div>



@endsection