<?php

namespace App\Notifications\Web;

use App\Models\Company;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrustCompanyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'company_id' => $this->user->id,
            'image' => $this->user->media()->file_name,
            'timeDate' => now()->diffForHumans(),
            'name' => 'trustCompany'
        ];
    }

    public function  toBroadcast(){
        return new BroadcastMessage([
            'data' => [
                'company_id' => $this->user->id,
                'image' => $this->user->media()->file_name,
                'timeDate' => now()->diffForHumans(),
                'name' => 'trustCompany'
            ]
        ]);
    }
}
