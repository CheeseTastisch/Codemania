@extends('layouts.center')

@push('content')
    <x-alert.x title="Deine E-Mail-Adresse wurde noch nicht bestätigt." sr-info="E-Mail nicht bestätigt" :style="\App\Models\Components\Styled\Style::Danger">
        <x-slot name="actions">
            <x-alert.actions.link :href="session()->previousUrl()" :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Zurück
            </x-alert.actions.link>

            <x-alert.actions.link :href="route('verification.send')" :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Bestätigungsmail erneut senden
            </x-alert.actions.link>
        </x-slot>

        <p>Deine Aktion wurde blockiert, da deine E-Mail-Adresse noch nicht bestätigt wurde.</p>
        <p class="mt-1">Bitte bestätige deine E-Mail-Adresse, um deine Aktion fortzusetzen.</p>

        <p class="mt-3">Solltest du keine Bestätigungsmail im Posteingang finden, überprüfe bitte auch den Spam-Ordner.</p>
        <p class="mt-1">Solltest du keine Bestätigungsmail erhalten haben, kannst du diese erneut anfordern.</p>

        <p class="mt-3">Sollte {{ auth()->user()->email }} nicht deine E-Mail-Adresse sein, kannst du diese
            <a href="{{ route('member.profile') }}" class="text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 underline">hier</a>
            ändern.</p>
    </x-alert.x>
@endpush
