@extends('layouts.app')

@section('title', 'Registrieren')

@push('content')
    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto pt:mt-0">
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 rounded-lg border-2 border-accent-500 dark:border-accent-600 shadow">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Registrieren</h2>

            @livewire('member.auth.register.form')
        </div>
    </div>
@endpush

@push('scripts')
    <x-form.input.password.indicator-script for="password" />
@endpush
