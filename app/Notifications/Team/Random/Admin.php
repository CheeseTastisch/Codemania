<?php

namespace App\Notifications\Team\Random;

use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Admin extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private readonly Team $team
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
            ->subject('Zufälliges Team')
            ->greeting('Hallo' . ($notifiable->display_name ? " $notifiable->display_name" : '') . ',')
            ->line('Da du dich bis jetzt noch nicht für ein Team angemeldet hast, haben wir dich einem zufälligen Team zugewiesen.')
            ->line('Dein Team heißt ' . $this->team->name . '.')
            ->line('Du wurdest zufällig als Admin ausgewählt. Also solcher ist es deine Aufgabe, dein Team zu organisieren und zu leiten.')
            ->action('Zum Contest', route('member.contest.contest', $this->team->contest))
            ->line('Viel Spaß beim Contest!')
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
