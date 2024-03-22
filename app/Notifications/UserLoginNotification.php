<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserLoginNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail']; // Anda bisa menambahkan 'database' atau 'broadcast' sesuai kebutuhan
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Selamat datang kembali!')
                    ->action('Kunjungi Situs', url('/'))
                    ->line('Terima kasih telah menggunakan layanan kami!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
