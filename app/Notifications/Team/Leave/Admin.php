<?php

namespace App\Notifications\Team\Leave;

use App\Models\Team;
use App\Models\User;
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
        public User $left,
        public Team $team
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
            ->subject('Team')
            ->greeting('Hallo' . ($notifiable->display_name ? " $notifiable->display_name" : '') . ',')
            ->line($this->left->display_name . ' hat das Team ' . $this->team->name . ' verlassen.')
            ->line('Da dein Team nun keinen Admin mehr hat, wurdest du zufällig als Admin ausgewählt.')
            ->line('Also ist es deine Aufgabe, dein Team zu organisieren und zu leiten.')
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
