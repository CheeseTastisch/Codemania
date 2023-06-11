@extends('layouts.components.base')

@section('baseContent')
    <div class="w-screem h-screen flex justify-center flex-col items-center">
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
    </div>
@endsection
