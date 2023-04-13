@extends('layouts.app')

@section('title', 'Zwei Faktor Authentifizierung')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card
            title="Zwei Faktor Authentifizierung"
            class="w-full max-w-xl">
            @livewire('member.auth.two-factor.form')
        </x-card>
    </div>
@endpush
