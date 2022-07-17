<?php

namespace App\Notifications\Web;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrustDesignNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

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
            'design_id' => $this->user->id,
            'name_user' => substr($this->user->name,0, 15),
            'image' => $this->user->imagePath,
            'timeDate' => now()->format('jS \of F  h:i'),
            'name' => 'showDesign'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => [
                'design_id' => $this->user->id,
                'name_user' => substr($this->user->name,0, 15),
                'image' => $this->user->imagePath,
                'timeDate' => now()->format('jS \of F  h:i'),
                'name' => 'showDesign'
            ]
        ]);
    }
}
