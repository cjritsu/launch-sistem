<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IncomingAbsen extends Notification
{
    use Queueable;
    public $notify_absen;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notify_absen)
    {
        $this->notify_absen = $notify_absen;
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
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
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
            'id' => $this->notify_absen['id'],
            'user_id' => $this->notify_absen['user_id'],
            'name' => $this->notify_absen->User['name'],
            'unit_kerja' => $this->notify_absen->Unit_Kerja['name'],
            'surat' => 'Absen',
        ];
    }
}
