@extends('layouts.app')

@section('title', $contest->name)

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <p class="text-center font-bold md:text-3xl text-2xl">{{ $contest->name }} (Training)</p>

        <p class="text-center mt-8">
            Im Training kannst du Aufgaben von anderen Contest üben und Punkte sammeln.
            Anders als beim Wettkampf gibt es hier keine Zeitbeschränkung und du kannst die Aufgaben so oft du willst lösen,
            und auch eine korrekte Abgabe erneut einreichen.
        </p>

        <p class="text-center mt-3">
            Hierdurch kannst du dich auf die Wettkämpfe vorbereiten und deine Fähigkeiten verbessern.
            Des Weiteren lernst du auch unser System kennen und kannst dich mit der Bedienung vertraut machen.
        </p>

        <p class="text-center mt-8">
            Um dir etwas Arbeit abzunehmen und den Contest etwas fairer zu gestalten, haben wir eine Java-Klasse bereitgestellt,
            welche das Einlesen der Eingabedatei übernimmt.
        </p>

        <p class="text-center mt-2">
            Lies dir hierzu die Beschreibung durch und lade dir die Klasse herunter:
        </p>

        @livewire('public.contest.file-scanner')

        <p class="text-center mt-8">
            Solltest du noch Fragen zum Training oder zu den Aufgaben haben, melde dich bitte auf unserem
            <a class="text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 underline"
               href="{{ discord_link() }}" target="_blank">Discord-Server</a>
            im TRAINING bereich.
        </p>

        @livewire('member.contest.training.container', ['contest' => $contest])
    </div>
@endpush
