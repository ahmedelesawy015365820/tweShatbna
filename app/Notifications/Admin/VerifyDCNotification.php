<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyDCNotification extends Notification implements ShouldQueue
{
    use Queueable;


    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return  (new MailMessage)
//            ->line('Account verified')
//            ->line('Now you can show your projects to clients and reach your potential clients.')
//            ->line('الان تستطيع عرض مشاريعك للعملاء و الوصول لعملائك المحتملين.');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function toDatabase($notifiable)
    {
        return [
            'verify' => 'verify account',
            'timeDate' => now()->format('jS \of F  h:i')
        ];
    }

    public function  toBroadcast(){
        return new BroadcastMessage([
            'data' => [
                'verify' => 'verify account',
                'timeDate' => now()->format('jS \of F  h:i')
            ]
        ]);
    }

}
