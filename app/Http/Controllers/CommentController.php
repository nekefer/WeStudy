<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use App\Models\comment;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewCommentPosted;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Notifications\DatabaseNotification;



class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store (Tweet $tweet, User $user){
        request()->validate([
            'content' =>'required|min:5'
        ]);
        $comment = new comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;
        $comment->tweet_id = $tweet->id;
        $comment->save();
            // dd($comment);
        $tweet->user->notify(new NewCommentPosted($tweet, auth()->user()));
        return Redirect::route('tweet.content', [$tweet, $user]);
    }

    // notification
    public function Nindex(){ 

        return view ('notification');
    }
    public function showFromNotification(int $tweet, DatabaseNotification $notification){
        $notification->markAsRead();
        return view ('notification');
    }
}
