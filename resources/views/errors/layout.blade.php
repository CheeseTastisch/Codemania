@extends('layouts.center')

@push('content')
    <x-alert.complex title="Fehler" type="danger" sr-info="Fehler">
        <x-slot name="actions">
            <x-alert.action.link :href="route('public.home')" type="danger">
                Zurück zur Startseite
            </x-alert.action.link>
        </x-slot>

        <p>@yield('code') | @yield('message')</p>
        @hasSection('description')
            @yield('description')
        @else
            <p class="mt-1"> Es ist ein Fehler aufgetreten. Bitte melde dich bei den Organisatoren.</p>
        @endif
    </x-alert.complex>
@endpush
