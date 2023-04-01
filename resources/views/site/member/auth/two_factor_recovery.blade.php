@extends('layouts.center')

@section('title', 'Zwei Faktor Authentifizierung')

@push('content')
    <div id="alert-additional-content-1"
         class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
         role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">
                Zwei Faktor Authentifizierung Backup Codes
            </h3>
        </div>
        <div class="mt-2 mb-4 text-sm">
            <p>
                Du hast einen Backup-Code für die Zwei Faktor Authentifizierung benutzt. Dieser Code ist nur einmalig
                gültig und wurde ersetzt.
            </p>
            <p class="mt-2">
                Deine neuen Backup-Codes findest du unten.
            </p>
            <div class="grid grid-rows-4 grid-cols-2">
                @foreach(auth()->user()->get2FaRecoveryCodes() as $code)
                    @if($code == session('2fa.new'))
                        <div>
                            <span class="line-through">
                                {{ session('2fa.old') }}
                            </span>
                            <span class="text-accent-400 dark:text-accent-600 ml-2">
                                {{ $code }}
                            </span>
                        </div>
                    @else
                        <span class="blur-sm hover:blur-none">
                            {{ $code }}
                        </span>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="flex">
            <a href="{{ route('member.dashboard') }}" type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                Ich habe die Codes notiert
            </a>
        </div>
    </div>
@endpush
