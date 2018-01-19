<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $data;
    protected $model_type;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $user, $model_type)
    {
        $this->data = $data;
        $this->user = $user;
        $this->model_type = $model_type;
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

    public function toDatabase($notifiable)
    {
        return [
            "PersonInCharge" => $this->user,
            "Data" => $this->data,
            "Time" => Carbon::now(),
            "ModelType" => $this->model_type
        ];
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
            
        ];
    }
}
