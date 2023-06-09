<?php

namespace App\Notifications\Password;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Reset extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $url,
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Passwort zurücksetzen')
            ->greeting('Hallo' . ($notifiable->display_name ? " $notifiable->display_name" : '') . ',')
            ->line('Wir haben eine Anfrage erhalten, dein Passwort zurückzusetzen.')
            ->line('Wenn du diese Anfrage nicht gestellt hast, kannst du diese E-Mail einfach ignorieren.')
            ->action('Passwort zurücksetzen', $this->url)
            ->line('Der Link ist für 30 Minuten gültig.')
            ->salutation('Dein Codemania-Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
