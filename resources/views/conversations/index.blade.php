@extends('layouts.app')

@section('content')

<div class="conversation">

<div class="amis">
       <div class="username">Mes amis</div>
   @include('conversations.users',['users' => $users])
   </div>
   
</div>



@endsection