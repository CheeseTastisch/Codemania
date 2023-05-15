<?php

namespace App\Notifications\Team\Random;

use App\Models\Team;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Member extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private readonly Team $team,
        public readonly User $admin
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
            ->line($this->admin->display_name . ' wurde als Admin ausgewählt.')
            ->line('Melde dich bei ' . $this->admin->display_name . ', um weitere Informationen zu erhalten.')
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
