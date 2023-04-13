@extends('layouts.app')

@section('title', 'Registrieren')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <x-card
            title="Registrieren"
            class="w-full max-w-xl">
            @livewire('member.auth.register.form')
        </x-card>
    </div>
@endpush

@push('scripts')
    <x-form.input.password.indicator-script for="password" />
@endpush
