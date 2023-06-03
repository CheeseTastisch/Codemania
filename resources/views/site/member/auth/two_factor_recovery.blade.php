@extends('layouts.center')

@section('title', 'Zwei Faktor Authentifizierung')

@push('content')
    <x-card.x
        title="Zwei Faktor Authentifizierung"
        max-width="xl">

        @if(session()->has('2fa.new'))
            <p>
                Du hast einen Backup-Code für die Zwei Faktor Authentifizierung benutzt.
                Dieser Code ist nur einmalig gültig und wurde ersetzt.
            </p>

            <p class="mt-2">Deine neuen Backup-Codes findest du unten.</p>

            <p class="mt-2 mb-4">
                Es sind alle Backup-Codes unscharf, bis du über sie gehst.
                Dies ist eine Sicherheitsmaßnahme, damit du sie nicht versehentlich aufzeichnest.
            </p>

            @foreach(session('2fa.codes') as $code)
                @if($code == session('2fa.new'))
                    <div class="blur-sm hover:blur-none">
                        <span class="line-through">
                            {{ session('2fa.old') }}
                        </span>
                        <span class="text-accent-400 dark:text-accent-600 ml-2">
                            {{ $code }}
                        </span>
                    </div>
                @else
                    <div>
                        <span class="blur-sm hover:blur-none">
                            {{ $code }}
                        </span>
                    </div>
                @endif
            @endforeach

            <p class="my-4">
                Bitte bewahre diese Codes sicher auf, du kannst auf sie nicht erneut zugreifen.
            </p>

            <a href="{{ session()->has('url.intended') ? session()->pull('url.intended') : route('public.home') }}"
               class="text-accent-400 dark:text-accent-600 hover:underline">
                Ich habe die Codes gespeichert
            </a>
        @else
            <p class="mb-4">
                Du hast dir deine Backup-Codes für die Zwei Faktor Authentifizierung bereits angesehen.
                Deshalb können sie nicht erneut angezeigt werden.
            </p>

            <a href="{{ session()->has('url.intended') ? session()->pull('url.intended') : route('public.home') }}"
               class="text-accent-400 dark:text-accent-600 hover:underline">
                Weiter
            </a>

{{--            <x-button.big.js--}}
{{--                name="Weiter"--}}
{{--                :href="session()->has('url.intended') ? session()->pull('url.intended') : route('public.home')" />--}}
        @endif
    </x-card.x>
@endpush
