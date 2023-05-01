@extends('layouts.center')

@section('title', 'Contest beitreten')

@push('content')
    <div class="flex flex-col items-center max-w-xl gap-5">
        <p class="text-center">
            Um dich für {{ $contest->contestDay->name }} ({{ $contest->name }}) anzumelden,
            musst entweder ein Team erstellen, einem Team beitreten oder in ein zufälliges Team eingeteilt werden.
        </p>

        <div class="w-full flex flex-col gap-3">
            <a class="bg-accent-400 dark:bg-accent-600 hover:bg-accent-500 p-5 rounded-lg flex items-center w-full">
                <svg class="w-10 mr-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p>Team erstellen</p>
            </a>

            <a class="bg-accent-400 dark:bg-accent-600 hover:bg-accent-500 p-5 rounded-lg flex items-center w-full">
                <svg class="w-10 mr-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p>Team beitreten</p>
            </a>

            <a class="bg-accent-400 dark:bg-accent-600 hover:bg-accent-500 p-5 rounded-lg flex items-center w-full">
                <svg class="w-10 mr-5" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p>Zufälliges Team</p>
            </a>
        </div>

        <div class="flex flex-col w-full gap-3">
            <p class="text-center">
                Du kannst deine Entscheidung bis
                @if($contest->contestDay->registration_deadline != null)
                    zur Anmeldefrist ({{ $contest->contestDay->registration_deadline->format('d.m.Y') }}
                    um {{ $contest->contestDay->registration_deadline->format('H:i') }} Uhr)
                @else
                    zum Contest ({{ $contest->contestDay->date->format('d.m.Y') }}
                    um {{ $contest->start_time->format('H:i') }} Uhr)
                @endif
                jederzeit ändern.
            </p>

            <p class="text-center">
                Du kannst dein Team bis zum oben angeführten Datum jederzeit verlassen, ein neues Team erstellen oder
                einem anderen Team beitreten.
            </p>

            <p class="text-center">
                Solltest du bis zum oben angeführten Datum keinem Team beigetreten sein oder in einem Team mit nur einem
                Mitglied sein,
                wirst du automatisch in ein zufälliges Team eingeteilt.
            </p>
        </div>
    </div>
@endpush
