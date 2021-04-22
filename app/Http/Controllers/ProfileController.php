<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index(){
        $user_followings=DB::table('followings')->where('followeur_id', '=', auth()->user()->id)->get();
        $nb_following= $user_followings->count();
        $user_followers=DB::table('followings')->where('following_id', '=', auth()->user()->id)->get();
        $nb_followers= $user_followers->count();
        $tweets_user=Tweet::where('user_id', '=', auth()->user()->id)->get()->reverse();
        $nb_tweets = $tweets_user->count();
        return view ('profiles.show')
        ->with('user', Auth::user())
            ->with('nb_following',$nb_following)
            ->with('nb_followers',$nb_followers)
            ->with('tweets_user', $tweets_user)
            ->with('nb_tweets',$nb_tweets);
    }
    public function update_avatar(Request $request ){
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension= $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move(public_path('images/avatar/'), $filename);
            $user= Auth::user();
            $user->avatar=$filename;
            $user->save();
        }
        return  Redirect::route('profile.show')
        ->with('user',Auth::user());

    }
    public function update_bio(Request $request){
        $request->validate([
            'bio'=>['required', 'max:280'],
        ]);
        $user= new User;
        $user->bio = $request->input('bio');
        DB::update('update users set bio = ? where id = ?', [$user->bio, auth()->user()->id]);
        return Redirect::route('profile.show');
    }
    public function deleteTweet(int $tweet_id){
        $tweet_delete=DB::table('tweets')->where('id', '=', $tweet_id)->delete();
        return back();
    }
}
