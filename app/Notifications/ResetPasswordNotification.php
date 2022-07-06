<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public  $url;

    public function __construct($url)
    {
        $this->url = $url;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Forgot Password?')
            ->action('Click to reset', $this->url)
            ->line('Thank you for using our application!');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
