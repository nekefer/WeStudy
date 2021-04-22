<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConversationsController extends Controller
{
  

    public function index(){
        $users = User::where('id', '!=', Auth()->user()->id)->get(); 
       
        return view('conversations/index',compact('users'));
    }

    public function show (User $user){
        $users = User::where('id', '!=', Auth()->user()->id)->get(); 
        $messages= Message:: whereRaw("(from_id = ? AND to_id = $user->id ) OR (from_id = $user->id AND to_id = ?)" ,[ Auth()->user()->id,  Auth()->user()->id])
        ->orderBy('created_at', 'DESC')
        ->get()
        ->reverse();
        return view('conversations/show',compact('users', 'user', 'messages'));
    }
 
    public function store (User $user,Request $request){
        $request->validate([
            'content'=>['required', 'max:500']
        ]);
        $message = new Message;
        $message->content = $request->input('content');
        $message->from_id = auth()->user()->id;
        $message->to_id = $user->id;
        $message->created_at = Carbon::now();
         $message->save();
        return Redirect::route('conversation.show',[$user->id]);
    }

}