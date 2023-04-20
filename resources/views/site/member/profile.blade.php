@extends('layouts.app')

@section('title', 'Profile')

@push('content')
    <div class="container mx-auto sm:px-4 px-2">
        <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-2 xl:gap-4">
            <div class="mb-4 xl:mb-0 col-span-full xl:col-auto">
                <x-card.x title="Einstellungen">
                    @livewire('member.profile.settings-form')
                </x-card.x>
            </div>

            <div class="mb-4 xl:mb-0 col-span-full xl:col-auto">
                <x-card.x title="Persönliche Informationen">
                    @livewire('member.profile.personal-form')
                </x-card.x>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            document.getElementById('theme').addEventListener('change', function () {
                setTheme(this.value);
            });
        });
    </script>
@endpush
