<?php

namespace App\Notifications\Team;

use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Invited extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public readonly Team $team,
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
            ->subject('Team einladung')
            ->greeting('Hallo' . ($notifiable->display_name ? " $notifiable->display_name" : '') . ',')
            ->line('Du wurdest in das Team ' . $this->team->name . ' eingeladen.')
            ->action('Team beitreten', '#') // TODO: Add route
            ->line('Solltest du die Einladung innerhalb von 24 Stunden nicht annehmen, wird sie ungültig.')
            ->line('Bitte beachte auch, dass du dein derzeitiges Team verlassen musst, um dem neuen beizutreten.')
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
