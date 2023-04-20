@extends('layouts.app')

@section('title', 'Zwei Faktor Authentifizierung')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card.x
            title="Zwei Faktor Authentifizierung"
            max-width="xl">
            @livewire('member.auth.two-factor.form')
        </x-card.x>
    </div>
@endpush
