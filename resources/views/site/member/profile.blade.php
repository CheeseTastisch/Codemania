@extends('layouts.app')

@section('title', 'Profile')

@push('content')
    <div class="container mx-auto sm:px-4 px-2">
        <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-2 xl:gap-4">
            <x-card
                title="Einstellungen"
                class="mb-4 xl:mb-0 col-span-full xl:col-auto">
                @livewire('member.profile.settings-form')
            </x-card>

            <x-card
                title="Persönliche Informationen"
                class="mb-4 xl:mb-0 col-span-full xl:col-auto">
                @livewire('member.profile.personal-form')
            </x-card>
        </div>
    </div>
@endpush

@push('scripts')
    <x-form.input.password.indicator-script for="password" />

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            $('#theme').on('change', function () {
                setTheme($(this).val());
            })
        });
    </script>
@endpush
