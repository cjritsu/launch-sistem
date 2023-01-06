<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IncomingReport extends Notification
{
    use Queueable;
    public $notify_izin, $notify_absen, $notify_cuti;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notify_izin)
    {
        $this->notify_izin = $notify_izin;
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
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->name($this->offerData['name'])
    //                 ->line($this->offerData['body'])
    //                 ->action($this->offerData['offerText'], $this->offerData['offerUrl'])
    //                 ->line($this->offerData['thanks']);
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->notify_izin['id'],
            'user_id' => $this->notify_izin['user_id'],
            'name' => $this->notify_izin->User['name'],
            'surat' => $this->notify_izin->Jenis_Izin['name']
        ];
    }
}
