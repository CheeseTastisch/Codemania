@extends('layouts.center')

@push('content')
    <x-alert.complex title="Deine E-Mail-Adresse wurde noch nicht bestätigt." sr-info="E-Mail nicht bestätigt" type="danger">
        <x-slot name="actions">
            <x-alert.action.button outlined click="history.back()" type="danger">
                Zurück
            </x-alert.action.button>
        </x-slot>

        <p>Deine Aktion wurde blockiert, da deine E-Mail-Adresse noch nicht bestätigt wurde.</p>
        <p class="mt-1">Bitte bestätige deine E-Mail-Adresse, um deine Aktion fortzusetzen.</p>
        <p class="mt-2">Solltest du keine Bestätigungsmail im Posteingang finden, überprüfe bitte auch den Spam-Ordner.</p>
        <p class="mt-1">Solltest du keine Bestätigungsmail erhalten haben, kannst du diese erneut anfordern.</p>
    </x-alert.complex>
@endpush
