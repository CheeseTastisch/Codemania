@extends('layouts.center')

@push('content')
    <x-alert.complex title="Fehler" type="danger" sr-info="Fehler">
        <x-slot name="actions">
            <x-alert.action.link :href="route('public.home')" type="danger">
                Zurück zur Startseite
            </x-alert.action.link>
        </x-slot>

        <p>@yield('code') | @yield('message')</p>
        <p class="mt-1">@hasSection('description') @yield('description') @else Es ist ein Fehler aufgetreten. Bitte melde dich bei den Organisatoren. @endif</p>
    </x-alert.complex>
@endpush
