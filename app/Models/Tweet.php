<?php

namespace App\Models;
use Carbon\Carbon;
use App\Models\Like;
use App\Models\User;
use App\Models\comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tweet extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d M, Y');
    }
    public function commentTweetId (){
        return $this->belongsTo(comment::class);
    }
}