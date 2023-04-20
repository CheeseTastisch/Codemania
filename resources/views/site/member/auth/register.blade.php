@extends('layouts.app')

@section('title', 'Registrieren')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card.x
            title="Registrieren"
            max-width="xl">
            @livewire('member.auth.register.form')
        </x-card.x>
    </div>
@endpush
