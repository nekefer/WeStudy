<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function tweet(){
        return $this->belongsTo(Tweet::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
