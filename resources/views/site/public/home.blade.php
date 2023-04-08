@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <style>
        {{ waveClass(1) }}
        {{ waveClass(2) }}
        {{ waveClass(3) }}
        {{ waveClass(4) }}
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
                <a type="button" href="#"
                   class="inline-block md:text-2xl mt-6 bg-accent-400 dark:bg-accent-600 hover:bg-accent-600 dark:hover:bg-accent-400 focus:ring-4 focus:ring-accent-300 dark:focus:ring-accent-700 font-medium rounded-lg text px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                    Jetzt Teilnehmen
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
                    Zuerst witzelten wir das wir selbst einmal einen Coding Contest veranstalten könnten.
                    Nach einiger Zeit fanden wir den Witz aber sehr spannend und entschieden uns dazu, die
                    <span class="font-bold underline text-accent-400 dark:text-accent-600">Codemania</span>
                    tatsächlich zu organisieren.
                </div>

                <div class="mt-6">
                    Wir hoffen, dass euch unser Wettbewerb viel Spaß macht und freuen uns auf eure Teilnahme!
                </div>
            </div>

            <div class="text-center text-xl font-bold mt-8 mb-6">
                Das Team
            </div>

            <div class="md:flex md:flex-wrap">
                <div class="md:w-1/3 pr-4 pl-4 md:mt-0 mt-6">
                    <div class="relative w-full h-full">
                        <div class="inset-0 z-0 bg-accent-300 dark:bg-accent-700 p-2">
                            <div>
                                <img class="mx-auto" src="https://placehold.co/450x450" alt="Lisa Buchendorfer">
                            </div>
                            <div class="text-center mt-2">
                                Lisa Buchendorfer
                            </div>
                        </div>
                        <div
                            class="opacity-0 hover:opacity-100 focus:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center bg-accent-400 dark:bg-accent-600 !bg-opacity-70 text-xl font-bold px-5"
                            tabindex="0">
                            Als kreativer Kopf bin ich dafür zuständig, Aufgaben zu planen, zu strukturieren und zu
                            definieren, um sicherzustellen, dass sie effektiv und effizient erledigt werden können.
                        </div>
                    </div>
                </div>
                <div class="md:w-1/3 pr-4 pl-4 md:mt-0 mt-6">
                    <div class="relative w-full h-full">
                        <div class="inset-0 z-0 bg-accent-300 dark:bg-accent-700 p-2">
                            <div>
                                <img class="mx-auto" src="https://placehold.co/450x450" alt="Lian Hörschläger">
                            </div>
                            <div class="text-center mt-2">
                                Lian Hörschläger
                            </div>
                        </div>
                        <div
                            class="opacity-0 hover:opacity-100 focus:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center bg-accent-400 dark:bg-accent-600 !bg-opacity-70 text-xl font-bold px-5"
                            tabindex="0">
                            Als Designer und Entwickler bin ich dafür zuständig, die Website und die Online-Plattform zu
                            gestalten und mit Funktionen auszustatten.
                        </div>
                    </div>
                </div>
                <div class="md:w-1/3 pr-4 pl-4 md:mt-0 mt-6">
                    <div class="relative w-full h-full">
                        <div class="inset-0 z-0 bg-accent-300 dark:bg-accent-700 p-2">
                            <div>
                                <img class="mx-auto" src="https://placehold.co/450x450" alt="Elmedin Zukic">
                            </div>
                            <div class="text-center mt-2">
                                Elmedin Zukic
                            </div>
                        </div>
                        <div
                            class="opacity-0 hover:opacity-100 focus:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center items-center text-center bg-accent-400 dark:bg-accent-600 !bg-opacity-70 text-xl font-bold px-5"
                            tabindex="0">
                            Als Business Man übernehme ich die Verantwortung für das Sponsoring und Marketing. Meine
                            Expertise und Erfahrung im Bereich des Marketings ermöglicht es mir, effektive und
                            zielgerichtete Kampagnen zu entwerfen
                        </div>
                    </div>
                </div>
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
                    Du kannst dich auf komente Contests vorbereiten, indem du die Aufgaben der vorherigen Contests
                    löst.
                </div>
            </div>

            <div class="mt-6 px-2">
                <div class="flex flex-wrap items-center">
                    @livewire('public.home.contests')
                </div>
            </div>
        </div>
    </section>
@endpush
