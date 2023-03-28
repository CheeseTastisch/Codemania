<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(StorageFileProvider::class, fn ($app) => new StorageFileProvider);
        $this->app->singleton(TwoFactorAuthenticationProvider::class, fn ($app) => new TwoFactorAuthenticationProvider);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(fn (object $notifiable, string $url) => (new MailMessage)
            ->subject('Verifizierung deiner E-Mail-Adresse')
            ->greeting('Hallo' . ($notifiable->display_name ? " $notifiable->display_name" : '') . ',')
            ->line('Bitte bestätige deine E-Mail-Adresse, indem du auf den folgenden Button klickst:')
            ->action('E-Mail-Adresse bestätigen', $url)
            ->line('Solltest du dich nicht bei uns registriert haben, kannst du diese E-Mail einfach ignorieren.')
            ->salutation('Dein Codemania-Team')
        );
    }
}
