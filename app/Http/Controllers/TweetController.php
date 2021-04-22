<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Like;
use App\Models\User;
use App\Models\Tweet;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    public function index(){
        $tweets= Tweet::with([
            'user' => fn ($query) => $query -> withCount([
                'followers as is_followed' => fn($query) 
                => $query->where('followeur_id', auth()->user()->id)
            ])
            ->withCasts(['is_followed'=> 'boolean'])
        ])
        ->orderBY('created_at','DESC')
        ->get();
        return view('home',compact('tweets'));
    }
    public function store(Request $request){
        $request->validate([
            'content'=>['required', 'max:280'],
            'user_id'=> ['exists:users, id']
        ]);
        $idUser=auth()->user()->id;
       $tweet= new Tweet;
       $tweet->content=$request->input('content');
       $tweet->user_id= $idUser;
       $tweet->save();
       return Redirect::route('tweet');
    }
    public function followings(){
        $followings = Tweet::with('user')
        ->whereIn('user_id', auth()->user()->followings->pluck('id')->toArray())
       ->orderBy('created_at', 'DESC') 
        ->get();
        
        return view('following', compact('followings'));
    }
    public function follows (User $user){
        auth()->user()->followings()->attach($user->id); 
        return Redirect()->back(); 
    }
    public function unfollows (User $user){
        auth()->user()->followings()->detach($user->id);
        return Redirect()->back(); 
    }
    public function profile(User $user){
        $profileUser = $user->loadCount([
            'followings as is_following_you' => 
            fn ($q) => $q->where('following_id', auth()->user()->id)
            ->withCasts(['is_following_you' =>'boolean']),
            'followers as is_followed' => 
            fn($q) =>$q->where('followeur_id', auth()->user()->id)
            ->withCasts(['is_followed' =>'boolean'])
        ]);

        $tweets = $user->tweets;
        
        return view('profileOfOtheruser', compact('tweets','profileUser'));
    }
    public function accesTweet(Tweet $tweet,User $user){
        $users = User::where('id', $user->id)->first();
        $tweets = Tweet::where('id', $tweet->id)->first();
        $comments =comment::where('tweet_id',$tweet->id)->get();
     
      
       
     return view('tweet', array(
         'user'=> $users,
         'tweet'=> $tweets,
         'comments'=> $comments,
        //  'user_comment'=> $names ,
        //  'id'=>$id
     ));
    }

     
        
}