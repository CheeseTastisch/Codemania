<?php

namespace App\Notifications\Team\Leave;

use App\Models\User;
use App\View\Components\Public\Team;
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
        public User $left,
        public \App\Models\Team $team,
        public User $newAdmin
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
            ->line('Da dein Team nun keinen Admin mehr hat, wurde ' . $this->newAdmin->display_name . ' als Admin ausgewählt.')
            ->line('Melde dich bei ' . $this->newAdmin->display_name . ', um weitere Informationen zu erhalten.')
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
