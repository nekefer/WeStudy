<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Tweet;
use App\Models\comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewCommentPosted extends Notification
{
    use Queueable;
    
    protected $user;
    protected $tweet;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet, User $user)
    {
        $this->tweet = $tweet;
        $this->user =$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'tweetTitle' => $this->tweet->content,
            'tweetId' =>$this->tweet->id,
            'tweet_userId' =>$this->tweet->user->id,
            'name' => $this->user->name
        ];
    }
}
