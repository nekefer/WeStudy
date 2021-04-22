<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search (Request $request){
        $search = $request->get('search');
        $user = User::select('name')->where('name','=', $search)->first();
        if($user){
            return Redirect::route('tweet.profile',[$user]);
        }else{
            return view('ProfileNotExist', compact('search'));
        }
       
    }
}
