@foreach($users as $user)
<div class="user-conversation">
    <button id="btn-conversation" class="btn btn-primary"> <a id="lien-conversation" href="{{route('conversation.show', [$user->id])}}">{{$user->name}}</a></button>
</div>
@endforeach