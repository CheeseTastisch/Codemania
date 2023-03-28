@extends('layouts.center')

@push('content')
    <div
        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
        role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Stop</span>
            <h3 class="text-lg font-medium">Deine E-Mail-Adresse wurde noch nicht bestätigt.</h3>
        </div>
        <div class="mt-2 mb-4 text-sm">
            <p>Deine Aktion wurde blockiert, da deine E-Mail-Adresse noch nicht bestätigt wurde.</p>
            <p class="mt-1">Bitte bestätige deine E-Mail-Adresse, um deine Aktion fortzusetzen.</p>
            <p class="mt-2">Solltest du keine Bestätigungsmail im Posteingang finden, überprüfe bitte auch den
                Spam-Ordner.</p>
            <p class="mt-1">Solltest du keine Bestätigungsmail erhalten haben, kannst du diese erneut anfordern.</p>
        </div>
        <div class="flex">
            <a type="button" href="{{ route('verification.send') }}"
               class="cursor-pointer text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                E-Mail erneut anfordern
            </a>
            <button type="button" onclick="history.back()"
                    class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                Zurück
            </button>
        </div>
    </div>
@endpush
