<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\TweetController::class, 'index'])->name('tweet');
Route::group(['middleware'=>'App\Http\Middleware\Auth',],function(){
    Route::post('/home', [App\Http\Controllers\TweetController::class, 'store'])->name('tweet.store');
    Route::post('/home/like', [App\Http\Controllers\TweetController::class, 'like'])->name('tweet.like');
    Route::post('/home/unlike', [App\Http\Controllers\TweetController::class, 'unlike'])->name('tweet.unlike');
    Route::get('/home/profile',[App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
    Route::post('/home/profile',[App\Http\Controllers\ProfileController::class, 'update_avatar'])->name('profile.avatar');
    Route::post('/home/profile/bio',[App\Http\Controllers\ProfileController::class, 'update_bio'])->name('profile.bio');
    Route::delete('/home/profile/delete_tweet/{tweet:id}',[App\Http\Controllers\ProfileController::class, 'deleteTweet'])->name('delete.tweet');
    Route::post('/follows/{user:id}',[App\Http\Controllers\TweetController::class, 'follows'])->name('tweet.follows');
    Route::post('/unfollows/{user:id}',[App\Http\Controllers\TweetController::class, 'unfollows'])->name('tweet.unfollows');
    Route::get('/followings',[App\Http\Controllers\TweetController::class, 'followings'])->name('tweet.followings');
    Route::get('/profiles/{user:name}',[App\Http\Controllers\TweetController::class, 'profile'])->name('tweet.profile');
    Route::get('/conversations',[App\Http\Controllers\ConversationsController::class, 'index'])->name('conversation.index');
    Route::get('/conversations/{user}',[App\Http\Controllers\ConversationsController::class, 'show'])->name('conversation.show');
    Route::post('/conversations/{user}',[App\Http\Controllers\ConversationsController::class, 'store'])->name('conversation.store');
    Route::get('/home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/home/tweet/{tweet}/{user}',[App\Http\Controllers\TweetController::class, 'accesTweet'])->name('tweet.content');
    Route::post('/home/tweet/comments/{tweet}/{user}', [App\Http\Controllers\CommentController::class, 'store'])->name('tweet.commente');
    Route::get('/home/notificaiton', [App\Http\Controllers\CommentController::class, 'Nindex'])->name('notification.commente');
    Route::get('/home/ShowFromNotificaiton/{tweet}/{notification}', [App\Http\Controllers\CommentController::class, 'showFromNotification'])->name('notificationReload');
        
});