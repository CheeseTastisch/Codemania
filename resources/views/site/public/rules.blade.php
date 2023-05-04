@extends('layouts.app')

@push('content')
    <div class="container mx-auto sm:px-4 px-2 pt-10">
        <div class="dark:text-white">
            <div class="md:text-5xl text-3xl font-bold my-8">
                <span class="text-accent-400 dark:text-accent-600">Codemania</span> Regelwerk
            </div>

            <section id="toc" class="my-8 dark:text-white">
                <div class="md:text-3xl text-2xl mb-1">Inhaltsverzeichnis</div>
                <ol class="pl-6 list-decimal marker:text-accent-400 dark:marker:text-accent-600">
                    <li>
                        <a href="#participants"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Teilnehmer
                        </a>
                    </li>
                    <li>
                        <a href="#teams"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Teams
                        </a>


                        <ol class="pl-6 list-[lower-alpha]">
                            <li>
                                <a href="#team_building"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Teambildung
                                </a>
                            </li>

                            <li>
                                <a href="#team_size"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Teamgröße
                                </a>
                            </li>

                            <li>
                                <a href="#team_random"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    zufällige Teams
                                </a>
                            </li>

                            <li>
                                <a href="#team_not_starting"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    nicht antreten
                                </a>
                            </li>

                            <li>
                                <a href="#team_starting_alone"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    alleine antreten
                                </a>
                            </li>
                        </ol>
                    </li>

                    <li>
                        <a href="#rating"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Wertung
                        </a>

                        <ol class="pl-6 list-[lower-alpha]">
                            <li>
                                <a href="#rating_points"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Punkte
                                </a>
                            </li>

                            <li>
                                <a href="#rating_level_three"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Level 3
                                </a>
                            </li>

                            <li>
                                <a href="#rating_places"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Platzierung
                                </a>
                            </li>

                            <li>
                                <a href="#rating_leaderboard"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Leaderboard
                                </a>
                            </li>

                            <li>
                                <a href="#rating_leaderboard_freeze"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    einfrieren des Leaderboards
                                </a>
                            </li>
                        </ol>
                    </li>

                    <li>
                        <a href="#submission"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Abgabe
                        </a>

                        <ol class="pl-6 list-[lower-alpha]">
                            <li>
                                <a href="#submission_complete"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    vollständige Abgabe
                                </a>
                            </li>

                            <li>
                                <a href="#submission_multiple"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    mehrfache Abgabe
                                </a>
                            </li>

                            <li>
                                <a href="#submission_help"
                                   class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                                    Hilfen
                                </a>
                            </li>
                        </ol>
                    </li>

                    <li>
                        <a href="#prices"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Preise
                        </a>
                    </li>

                    <li>
                        <a href="#blocking"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Ausschluss vom Wettbewerb
                        </a>
                    </li>

                    <li>
                        <a href="#changes"
                           class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                            Änderungen
                        </a>
                    </li>
                </ol>
            </section>

            <section id="participants" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">1. Teilnehmer</div>
                <p>
                    Am Contest dürfen nur Personen teilnehmen, welche zum Zeitpunkt des Contests die HTL Traun besuchen
                    oder im Schuljahr des Contests an der HTL Traun maturiert haben.
                </p>
            </section>

            <section id="teams" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">2. Teams</div>

                <div id="team_building" class="md:text-2xl text-xl mb-1">2a. Teambildung</div>
                <p>
                    Teilnehmer können ab dem Zeitpunkt der Registrierung bis zur Anmeldefrist ein Team bilden.
                </p>

                <div id="team_size" class="md:text-2xl text-xl mt-3 mb-1">2b. Teamgröße</div>
                <p>
                    Ein Team besteht aus mindestens 2 und maximal 4 Teilnehmern.
                </p>

                <div id="team_random" class="md:text-2xl text-xl mt-3 mb-1">2c. zufällige Teams</div>
                <p>
                    Teilnehmer, welche bis zum Ende der Anmeldefrist kein Team gebildet haben oder alleine in einem
                    Team sind, werden zufällig einem Team zugeteilt.
                </p>

                <p class="mt-1">
                    Die Teams können danach nicht mehr verändert werden.
                </p>

                <div id="team_not_starting" class="md:text-2xl text-xl mt-3 mb-1">2d. nicht antreten</div>
                <p>
                    Ein Team oder ein Teilnehmer kann sich jederzeit dazu entscheiden nicht anzutreten.
                    Eine Abmeldung ist nicht notwendig.
                </p>

                <div id="team_starting_alone" class="md:text-2xl text-xl mt-3 mb-1">2e. alleine antreten</div>
                <p>
                    Entscheiden sich alle Teilnehmer, außer einem dazu nicht anzutreten, so kann der verbleibende
                    Teilnehmer alleine antreten.
                </p>
            </section>

            <section id="rating" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">3. Wertung</div>

                <div id="rating_points" class="md:text-2xl text-xl mt-3 mb-1">3a. Punkte</div>
                <p>
                    Für die eine korrekte,
                    <a href="#submission_complete" class="underline text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 visited:text-accent-700 dark:visited:text-accent-300">
                        vollständige Abgabe
                    </a>
                    eines Levels werden folgende Punkte vergeben:
                </p>

                <ul class="pl-6 list-disc">
                    <li>
                        Level 1: 100 Punkt
                    </li>
                    <li>
                        Level 2: 200 Punkte
                    </li>
                    <li>
                        Level 3: 300 Punkte
                    </li>
                </ul>

                <div id="rating_level_three" class="md:text-2xl text-xl mt-3 mb-1">3b. Level 3</div>
                <p>
                    Das dritte Level jeder Aufgabe wird erst nach dem Contest gewertet,
                    dementsprechend werden auch erst nach dem Contest die Punkte vergeben.
                </p>

                <div id="rating_places" class="md:text-2xl text-xl mt-3 mb-1">3c. Platzierung</div>
                <p>
                    Teams werden nach ihren Punkten bewertet. Je mehr Punkte ein Team erreicht, desto höher ist die Platzierung.
                </p>

                <p class="mt-1">
                    Haben zwei Teams dieselben Punkte wird nach der Gesamtlösungszeit gewertet.
                    Diese ist die Summe aller Zeiten, zu denen ein Level korrekt abgegeben wurde.
                </p>

                <div id="rating_leaderboard" class="md:text-2xl text-xl mt-3 mb-1">3d. Leaderboard</div>
                <p>
                    Während des Contests kann jeder das Leaderboard mit der Platzierung,
                    den derzeitigen Punkten und der Gesamtlösungszeit einsehen.
                </p>

                <div id="rating_leaderboard_freeze" class="md:text-2xl text-xl mt-3 mb-1">3e. einfrieren des Leaderboards</div>
                <p>
                    Das Leaderboard wird eine Stunde vor Ende des Contests eingefroren.
                    Ab diesem Zeitpunkt wird es nicht mehr aktualisiert.
                </p>
            </section>

            <section id="submission" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">4. Abgabe</div>

                <div id="submission_complete" class="md:text-2xl text-xl mt-3 mb-1">4a. vollständige Abgabe</div>
                <p>
                    Um eine Abgabe als vollständig werten zu können, muss für jede Eingabe-Datei eine Ausgabe-Datei
                    sowie der Source-Code abgegeben werden.
                </p>

                <div id="submission_multiple" class="md:text-2xl text-xl mt-3 mb-1">4b. mehrfache Abgaben</div>
                <p>
                    Jedes Level kann mehrfach abgegeben werden.
                    Für eine falsche Abgabe werden fünf Minuten zur Gesamtlösungszeit addiert.
                </p>

                <p class="mt-1">
                    Wird ein Level korrekt abgegeben, kann es nicht erneut abgegeben werden,
                    das dritte Level kann immer erneut abgegeben werden.
                </p>

                <p class="mt-1">
                    Beim dritten Level wird die letzte Abgabe gewertet.
                    Ist die letzte Abgabe falsch und eine Abgabe zuvor korrekt, wird das Level als falsch gewertet.
                </p>

                <div id="submission_help" class="md:text-2xl text-xl mt-3 mb-1">4c. Hilfe</div>
                <p>
                    Das Level muss von dem Teilnehmer selbst gelöst werden.
                    Der Code hierfür muss von den Teilnehmern selbst geschrieben sein.
                </p>

                <p class="mt-1">
                    Die Organisatoren des Contests dürfen nur beim Verständnis der Aufgaben helfen,
                    jedoch nicht bei der Lösung.
                </p>

                <p class="mt-1">
                    Tools wie ChatGPT, Github Copilot oder ähnliche dürfen nur für einfache Hilfestellungen verwendet werden.
                    Den Code müssen die Teilnehmer selbst schreiben.
                </p>
            </section>

            <section id="prices" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">5. Preise</div>

                <p>
                    Die Teams entscheiden selbst, wie sie die Preise aufteilen.
                    Die Organisatoren des Contests können hier bei eventuellem Streit nicht helfen.
                </p>
            </section>

            <section id="blocking" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">6. Ausschluss vom Wettbewerb</div>

                <p>
                    Die Organisationen behält sich vor jedes Team oder jeden Teilnehmer,
                    ohne Angabe eines Grundes aus dem Contest auszuschließen.
                </p>

                <p class="mt-1">
                    Die Organisatoren müssen keine Auskunft über eventuelle Gründe geben oder einen Regelverstoß nachweisen.
                </p>
            </section>

            <section id="changes" class="mb-8 dark:text-white">
                <div class="md:text-3xl text-2xl font-bold mb-1">6. Regeländerungen</div>

                <p>
                    Die Organisatoren behalten sich vor, dass Regelwerk jederzeit zu ändern.
                </p>

                <p class="mt-1">
                    Teilnehmer müssen sich über Änderungen des Regelwerks selbst auf dem Laufenden halten.
                </p>
            </section>
        </div>
    </div>
@endpush
