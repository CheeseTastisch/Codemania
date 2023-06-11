<div class="flex flex-col items-center text-center" wire:init="initData">
    <p class="text-2xl md:text-3xl font-bold">Vielen Dank für deine Teilnahme am Contest!</p>
    <p class="text-xl md:text-2xl my-5">Wir haben einige Statistiken für dich vorbereitet, viel Spaß beim Stöbern!</p>

    <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 w-full gap-5 mt-5">
        <x-card.x>
            <p class="text-accent-400 dark:text-accent-600 text-3xl md:text-4xl font-bold">Dein Team</p>

            <div class="bg-accent-100 dark:bg-accent-900 rounded-lg mt-8 py-3">
                <div class="grid grid-cols-1 xl:grid-cols-3 xl:gap-12 gap-3 text-center">
                    <div>
                        <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                            @if($loadData)
                                {{ $points }}
                            @else
                                <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                                </div>
                            @endif
                        </div>
                        <div class="text-xl md:text-2xl">Punkte</div>
                    </div>

                    <div>
                        <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                            @if($loadData)
                                {{ $place }}.
                            @else
                                <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                                </div>
                            @endif
                        </div>
                        <div class="text-xl md:text-2xl">Platz</div>
                    </div>

                    <div>
                        <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                            @if($loadData)
                                {{ $resolutionTime }}
                            @else
                                <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                                </div>
                            @endif
                        </div>
                        <div class="text-xl md:text-2xl">Lösungszeit</div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8 text-accent-400 dark:text-accent-600 flex justify-center items-center gap-3 text-xl md:text-2xl">
                <div class="font-bold">
                    @if($loadData)
                        {{ $submissions }}
                    @else
                        <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                        </div>
                    @endif
                </div>
                <div>Abgaben</div>
            </div>

            <div class="grid grid-cols-1 2xl:grid-cols-5 2xl:gap-7 gap-3 text-center mt-3">
                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $accepted }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>richtig</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $rejected }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>falsch</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $ratedLater }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>später bewertet</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $submittedFiles }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>abgegebene Dateien</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $solvedTasks }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>gelöst Aufgaben</div>
                </div>
            </div>

            <div class="text-center mt-8 rounded-lg bg-gradient-to-r from-accent-400 dark:from-accent-600 via-white dark:via-black to-accent-400 dark:to-accent-600 py-3">
                <div class="text-2xl md:text-3xl font-bold">1</div>
                <div class="text-xl md:text-2xl">super Team</div>
            </div>
        </x-card.x>

        <x-card.x>
            <p class="text-accent-400 dark:text-accent-600 text-3xl md:text-4xl font-bold">Gesamt</p>

            <div class="bg-accent-100 dark:bg-accent-900 rounded-lg mt-8 py-3">
                <div class="grid grid-cols-1 xl:grid-cols-3 xl:gap-12 gap-3 text-center">
                    <div>
                        <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                            @if($loadData)
                                {{ $totalPoints }}
                            @else
                                <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                                </div>
                            @endif
                        </div>
                        <div class="text-xl md:text-2xl">Punkte</div>
                    </div>

                    <div>
                        <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                            @if($loadData)
                                {{ $participants }}
                            @else
                                <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                                </div>
                            @endif
                        </div>
                        <div class="text-xl md:text-2xl">Teilnehmer</div>
                    </div>

                    <div>
                        <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                            @if($loadData)
                                {{ $totalResolutionTime }}
                            @else
                                <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                                </div>
                            @endif
                        </div>
                        <div class="text-xl md:text-2xl">Lösungszeit</div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8 text-accent-400 dark:text-accent-600 flex justify-center items-center gap-3 text-xl md:text-2xl">
                <div class="font-bold">
                    @if($loadData)
                        {{ $totalSubmissions }}
                    @else
                        <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                        </div>
                    @endif
                </div>
                <div>Abgaben</div>
            </div>

            <div class="grid grid-cols-1 2xl:grid-cols-5 2xl:gap-7 gap-3 text-center mt-3">
                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $totalAccepted }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>richtig</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $totalRejected }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>falsch</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $totalRatedLater }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>später bewertet</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $totalSubmittedFiles }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>abgegebene Dateien</div>
                </div>

                <div class="border-2 border-accent-400 rounded-lg flex flex-col justify-start items-center py-2">
                    <div class="font-bold flex justify-center items-center">
                        @if($loadData)
                            {{ $totalSolvedTasks }}
                        @else
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[25px] w-[35px]">
                            </div>
                        @endif
                    </div>
                    <div>gelöst Aufgaben</div>
                </div>
            </div>

            <div class="text-center mt-8 rounded-lg bg-gradient-to-r from-accent-400 dark:from-accent-600 via-white dark:via-black to-accent-400 dark:to-accent-600 py-3">
                <div class="text-2xl md:text-3xl font-bold flex justify-center items-center">
                    @if($loadData)
                        {{ $teams }}
                    @else
                        <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[35px] w-[48px]">
                        </div>
                    @endif
                </div>
                <div class="text-xl md:text-2xl">großartige Teams</div>
            </div>
        </x-card.x>
    </div>
</div>
