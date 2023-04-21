@extends('layouts.center')

@push('content')
    <main class="flex flex-col justify-center items-center">
        <div class="flex justify-center relative">
            <h1 class="text-9xl font-extrabold tracking-widest">@yield('code')</h1>
            <div class="bg-accent-400 dark:bg-accent-600 px-2 text-sm rounded rotate-[10deg] absolute bottom-6">
                @yield('message')
            </div>
        </div>

        <p class="text-center mt-4">@hasSection('description') @yield('description') @else Es ist ein Fehler aufgetreten. Bitte melde dich bei den Organisatoren. @endif</p>

        <button class="mt-6">
            <a href="{{ url()->previous() }}"
                class="relative inline-block text-sm font-medium text-accent-400 dark:text-accent-600 group active:text-accent-500 focus:outline-none focus:ring">
                <span class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-accent-500 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                <span class="relative block px-8 py-3 bg-slate-200 dark:bg-slate-800 border border-current">
                    Zurück
                </span>
            </a>

            <a href="{{ route('public.home') }}" class="ml-4 relative inline-block text-sm font-medium text-accent-400 dark:text-accent-600 group active:text-accent-500 focus:outline-none focus:ring">
                <span class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-accent-500 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                <span class="relative block px-8 py-3 bg-slate-200 dark:bg-slate-800 border border-current">
                    Home
                </span>
            </a>
        </button>
    </main>
@endpush
