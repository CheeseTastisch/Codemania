@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <style>
        {{ themeWaves() }}
    </style>
@endpush

@push('content')
    <section id="home">
        <div class="container mx-auto sm:px-4 px-2 pt-10">
            <div>
                <div class="md:text-5xl text-3xl font-bold mt-8">
                    <span class="text-accent-400 dark:text-accent-600">Codemania</span>
                </div>
                <div class="md:text-3xl text-xl mt-6 md:max-w-2xl font-bold">
                    {{ day()?->date?->translatedFormat('d. F Y') ?? 'Noch nicht bekannt' }}
                </div>

                <a type="button" href="{{ route('member.contest.home') }}"
                   class="inline-block md:text-2xl mt-6 bg-accent-400 dark:bg-accent-600 hover:bg-accent-600 dark:hover:bg-accent-400 focus:ring-4 focus:ring-accent-300 dark:focus:ring-accent-700 font-medium rounded-lg text px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                    Jetzt Teilnehmen
                </a>

                <p class="mt-2 text-xl text-pink-300">
                    Bei Fragen kannst du dich jederzeit an uns wenden. Tritt hierzu unserem Discord bei!
                </p>

                <a href="{{ discord_link() }}" target="_blank"
                   class="inline-block md:text-2xl mt-4 bg-accent-400 dark:bg-accent-600 hover:bg-accent-600 dark:hover:bg-accent-400 focus:ring-4 focus:ring-accent-300 dark:focus:ring-accent-700 font-medium rounded-lg text px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                    Discord
                </a>
            </div>
        </div>
    </section>

    <div class="bg-no-repeat pb-40 bg-bottom wave-1">
    </div>

    <section id="sponsors" class="bg-accent-400 dark:bg-accent-600 pb-10">
        <div class="container mx-auto sm:px-4 px-2 pt-10">
            <div class="text-center text-4xl font-bold">
                Sponsoren
            </div>

            <div class="md:text-xl mt-6 md:max-w-3xl mx-auto text-center">
                <div>
                    Großer Dank an unsere Sponsoren die uns bei der Finanzierung des Contests unterstützen.
                </div>
            </div>

            <div class="mt-6 px-20">
                <div class="flex flex-wrap items-center">
                    @livewire('public.home.sponsors')
                </div>
            </div>
        </div>
    </section>

    <section id="contest" class="pt-20 bg-no-repeat wave-2">
        <div class="container mx-auto sm:px-4 px-2 pt-10">
            <div class="text-center text-4xl font-bold">
                Der Contest
            </div>

            <div class="md:text-xl mt-6 md:max-w-3xl mx-auto text-center">
                <div>
                    Die <span class="font-bold underline text-accent-400 dark:text-accent-600">Codemania</span>
                    ist ein Programmierwettbewerb für die Schülerinnen und Schüler der HTL Traun. Die Teilnahme ist
                    kostenlos.
                </div>

                <div class="mt-6">
                    Angetreten wird in <span class="font-bold underline">Teams von 2 bis 4 Personen</span>.
                    Die Teilnehmer können sich bis zum <span
                        class="font-bold underline">{{ day()?->getRegistrationDeadline()?->format('d. F Y')  }}</span>
                    zu Teams
                    zusammenschließen.
                    Teilnehmer, die bis dahin noch kein Team haben, werden in zufällige Teams eingeteilt.
                </div>

                <div class="mt-6">
                    Die Teams sammeln in einem Zeitraum von <span class="font-bold underline">3 Stunden</span> Punkte.
                    Um Punkte zu sammeln, können bis zu <span class="font-bold underline">5 Aufgaben</span> mit jeweils
                    3 Level gelöst werden. Gewinner ist, wer am Ende die meisten Punkte gesammelt hat.
                </div>

                <div class="mt-6">
                    Für die besten Teams gibt es <span class="font-bold underline">tolle Preise</span> zu gewinnen.
                </div>
            </div>
        </div>

        <div class="container mx-auto sm:px-4 px-2 pt-12">
            <div class="text-center text-2xl font-bold">
                Über Uns
            </div>

            <div class="md:text-xl mt-6 md:max-w-3xl mx-auto text-center">
                <div>
                    Die <span class="font-bold underline text-accent-400 dark:text-accent-600">Codemania</span>
                    wird von 3 Schülern der HTL Traun organisiert.
                </div>

                <div class="mt-6">
                    Die Idee dazu kam uns, als wir selbst bei mehreren Programmierwettbewerben teilnahmen.
                    Zuerst witzelten wir, dass wir selbst einmal einen Coding Contest veranstalten könnten.
                    Nach einiger Zeit fanden wir den Witz aber sehr spannend und entschieden uns dazu, die
                    <span class="font-bold underline text-accent-400 dark:text-accent-600">Codemania</span>
                    tatsächlich zu organisieren.
                </div>

                <div class="mt-6">
                    Wir hoffen, dass euch unser Wettbewerb viel Spaß macht und freuen uns auf eure Teilnahme!
                </div>
            </div>

            <div class="text-center text-xl font-bold mt-8 mb-4">
                Das Team
            </div>

            <div class="flex flex-wrap justify-center">
                <x-public.team
                    name="Lisa Buchendorfer"
                    image="{{ asset('storage/img/team/lisa.png') }}"
                    description="Als kreativer Kopf bin ich dafür zuständig, Aufgaben zu planen, zu strukturieren und zu definieren, um sicherzustellen, dass sie effektiv und effizient erledigt werden können." />
                <x-public.team
                    name="Lian Hörschläger"
                    image="{{ asset('storage/img/team/lian.png') }}"
                    description="Als Designer und Entwickler bin ich dafür zuständig, die Website und die Online-Plattform zu gestalten und mit Funktionen auszustatten." />
                <x-public.team
                    name="Elmedin Zukic"
                    image="{{ asset('storage/img/team/elmedin.png') }}"
                    description="Als Business Man übernehme ich die Verantwortung für das Sponsoring und Marketing. Meine Expertise und Erfahrung im Bereich des Marketings ermöglicht es mir, effektive und zielgerichtete Kampagnen zu entwerfen" />
            </div>
        </div>
    </section>

    <div class="bg-no-repeat pb-40 bg-bottom wave-3">
    </div>

    <section id="faq" class="bg-accent-400 dark:bg-accent-600 pb-10">
        <div class="container mx-auto sm:px-4 px-2 pt-10">
            <div class="text-center text-4xl font-bold">
                FAQ
            </div>

            <div class="md:text-xl mt-6 md:max-w-3xl mx-auto text-center">
                <div>
                    Hier findest du die häufigsten Fragen zum Contest.
                </div>
            </div>

            @livewire('public.home.faq')
        </div>
    </section>

    <section id="training" class="pt-20 bg-no-repeat wave-4">
        <div class="container mx-auto sm:px-4 px-2 pt-10">
            <div class="text-center text-4xl font-bold">
                Training
            </div>

            <div class="md:text-xl mt-6 md:max-w-3xl mx-auto text-center">
                <div>
                    Hier findest du alle Contests, welche bereits stattgefunden haben.
                    Du kannst dir die Ergebnisse und Gewinner anschauen.
                </div>
                <div class="mt-1">
                    Du kannst dich auf kommende Contests vorbereiten, indem du die Aufgaben der vorherigen Contests
                    löst.
                </div>
            </div>

            <div class="mt-6 px-2 text-center md:text-2xl text-xl font-bold">
                Leider sind noch keine Trainings-Aufgaben verfügbar.
                Wir versuchen schnellstmöglich Trainings-Aufgaben bereitzustellen.
                Bitte schau in ein paar Tagen nochmal vorbei!
            </div>
{{--            @livewire('public.home.contests')--}}
        </div>
    </section>
@endpush
