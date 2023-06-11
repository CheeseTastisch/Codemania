@extends('layouts.center')

@push('content')
    <main class="flex flex-col justify-center items-center">
        <div class="flex justify-center relative">
            <h1 class="text-9xl font-extrabold tracking-widest">@yield('code')</h1>
            <div class="bg-accent-400 dark:bg-accent-600 px-2 text-sm rounded rotate-[10deg] absolute bottom-6">
                @yield('message')
            </div>
        </div>

        <div class="text-center mt-4">
            @hasSection('description')
                @yield('description')
            @else
                <p>Es ist ein Fehler aufgetreten.</p>
                <p>Bitte melde dich bei den Organisatoren.</p>
            @endif
        </div>

        <div class="mt-6 space-x-5 flex flex-row">
            <x-button.big.link id="back" :href="url()->previous()" :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedAccent">
                Zurück
            </x-button.big.link>

            <x-button.big.link id="home" :href="route('public.home')" :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedAccent">
                Home
            </x-button.big.link>
        </div>
    </main>
@endpush
