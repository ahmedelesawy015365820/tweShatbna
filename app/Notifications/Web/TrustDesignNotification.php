<?php

namespace App\Notifications\Web;

use App\Models\Designer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrustDesignNotification extends Notification
{
    use Queueable;

    protected $designer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Designer $designer)
    {
        $this->designer = $designer;
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
    public function toArray($notifiable)
    {
        return [
            'design_id' => $this->designer->id,
            'amount' => $this->designer->updated_at->format('jS \of F Y h:i A'),
            'name' => 'trustDesign'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => [
                'design_id' => $this->designer->id,
                'amount' => $this->designer->updated_at->format('jS \of F Y h:i A'),
                'name' => 'trustDesign'
            ]
        ]);
    }
}
