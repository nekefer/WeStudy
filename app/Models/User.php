<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tweets(){
        return $this->hasMany(Tweet::class)->orderBy('created_at');
    }
    public function followings(){
        return $this->belongsToMany(
            User::class,
            'followings',
            'followeur_id',
            'following_id'

        );
    }
    public function followers(){
        return $this->belongsToMany(
            User::class,
            'followings',
            'following_id',
            'followeur_id'
        );
    }
    public function comment_user_id (){
        return $this->hasMany(comment::class, 'user_id');
    }
}
