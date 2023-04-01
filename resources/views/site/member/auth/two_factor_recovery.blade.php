@extends('layouts.center')

@section('title', 'Zwei Faktor Authentifizierung')

@push('content')
    <x-alert.complex type="info" title="Zwei Faktor Authentifizierung Backup Codes" sr-info="Info">
        <p>Du hast einen Backup-Code für die Zwei Faktor Authentifizierung benutzt. Dieser Code ist nur einmalig gültig und wurde ersetzt.</p>
        <p class="mt-2">Deine neuen Backup-Codes findest du unten.</p>
        <div class="grid grid-rows-4 grid-cols-2">
            @foreach(session('2fa.new_codes') as $code)
                @if($code == session('2fa.new'))
                    <div>
                        <span class="line-through">
                            {{ session('2fa.old') }}
                        </span>
                        <span class="text-accent-400 dark:text-accent-600 ml-2">
                            {{ $code }}
                        </span>
                    </div>
                @else
                    <span class="blur-sm hover:blur-none">
                        {{ $code }}
                    </span>
                @endif
            @endforeach
        </div>
        <p class="mt-2">Bitte bewahre diese Codes sicher auf. Du kannst sie jederzeit erneut anfordern.</p>
        <x-slot name="actions">
            <x-alert.action.link :href="route('member.dashboard')" type="info">
                Ich habe die Codes gespeichert
            </x-alert.action.link>
        </x-slot>
    </x-alert.complex>
@endpush
