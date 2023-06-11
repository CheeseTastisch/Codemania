<div class="flex flex-col items-center text-center" wire:init="initData">
    <p class="text-2xl md:text-3xl font-bold">Vielen Dank für deine Teilnahme am Contest!</p>
    <p class="md:text-xl mt-8">Wir haben einige Statistiken für dich vorbereitet, viel Spaß beim Stöbern!</p>

    <div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 w-full gap-5 mt-3">
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

    <div class="w-full mt-7">
        <p class="text-center md:text-xl my-5">Wir Gratulieren den Gewinnern des Contests!</p>

        <x-table.x>
            <x-slot name="header">
                <x-table.header.simple name="Platz" />
                <x-table.header.simple name="Team" />
                <x-table.header.simple name="Punkte" />
                <x-table.header.simple name="Lösungszeit" />
            </x-slot>

            @if($loadData)
                @foreach($contest->getLeaderboard()->take(3) as $targetTeam)
                    <x-table.body.row hover :stripe="$loop->even" :border="!$loop->last">
                        <x-table.body.cell>{{ $targetTeam->get('place') }}</x-table.body.cell>
                        <x-table.body.cell>{{ $targetTeam->get('name') }}</x-table.body.cell>
                        <x-table.body.cell>{{ $targetTeam->get('points') }}</x-table.body.cell>
                        <x-table.body.cell>{{ $targetTeam->get('human_friendly_total_resolution_time') }}</x-table.body.cell>
                    </x-table.body.row>
                @endforeach
            @else
                @for($i = 0; $i < 3; $i++)
                    <x-table.body.row :stripe="$i % 2 === 0" :border="$i != 3">
                        <x-table.body.cell>
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[30px] w-[50px]">
                            </div>
                        </x-table.body.cell>
                        <x-table.body.cell>
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[30px] w-[150px]">
                            </div>
                        </x-table.body.cell>
                        <x-table.body.cell>
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[30px] w-[50px]">
                            </div>
                        </x-table.body.cell>
                        <x-table.body.cell>
                            <div class="rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse h-[30px] w-[100px]">
                            </div>
                        </x-table.body.cell>
                    </x-table.body.row>
                @endfor
            @endif
        </x-table.x>
    </div>

    <div class="flex justify-end w-full mt-3">
        <x-button.big.link
            id="showLeaderboard"
            href="{{ route('member.contest.leaderboard', $contest) }}">
            Gesamte Rangliste ansehen
        </x-button.big.link>
    </div>

    <p class="text-center md:text-xl mt-8">Du kannst dir deine Abgaben auch nochmal ansehen.</p>

    @if($loadData)
        <div x-data="{selectedTask: @entangle('selectedTask').defer, selectedLevel: @entangle('selectedLevel').defer}"
             class="overflow-hidden rounded-lg border-2 shadow-lg border-accent-400 dark:border-accent-600 h-full grid grid-rows-[1fr,1fr,auto] w-full max-w-4xl">
            <div class="grid lg:grid-cols-variable lg:grid-rows-1 grid-rows-variable"
                 style="--rows: {{ $contest->tasks->count() }}; --columns: var(--rows)">
                @foreach($contest->tasks->sortBy('order') as $task)
                    <div
                        class="flex lg:flex-col justify-center items-center p-4 lg:border-b-0 border-b @if($loop->last) !border-b-0 @else lg:border-r @endif border-accent-200 dark:border-accent-800 hover:bg-accent-300 dark:hover:bg-accent-700 cursor-pointer"
                        @click="selectedTask = {{ $task->id }}; selectedLevel = {{ $task->levels->sortBy('level')->first()->id }}"
                        :class="{'bg-accent-100 dark:bg-accent-900': selectedTask === {{ $task->id }}}">
                        <div>{{ $task->name }}</div>
                        <div>
                            <span class="lg:hidden"> (</span>{{ $task->levels->count() }} Level<span class="lg:hidden">)</span>
                        </div>
                    </div>
                @endforeach
            </div>


            @foreach($contest->tasks as $task)
                <div x-cloak x-show="selectedTask === {{ $task->id}}"
                     class="grid lg:grid-cols-variable lg:grid-rows-1 grid-rows-variable border-y-2 border-accent-400"
                     style="--rows: {{ $task->levels->count() }}; --columns: var(--rows)">
                    @foreach($task->levels->sortBy('level') as $level)
                        <div class="flex items-center p-4 lg:border-b-0 border-b @if($loop->last) !border-b-0 @else lg:border-r @endif border-accent-200 dark:border-accent-800 @if($team->getLevelState($level) != \App\Models\LevelState::LOCKED) cursor-pointer hover:bg-accent-300 dark:hover:bg-accent-700 @endif"
                             @if($team->getLevelState($level) != \App\Models\LevelState::LOCKED) @click="selectedLevel = {{ $level->id }}" @endif
                             :class="{'bg-accent-100 dark:bg-accent-900': selectedLevel === {{ $level->id }}}">
                            <div class="flex justify-center grow">Level {{ $level->level }}</div>

                            <div class="justify-self-end">
                                @switch($team->getLevelState($level))
                                    @case(App\Models\LevelState::ACCEPTED)
                                        <svg class="h-6 text-green-400 dark:text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::REJECTED)
                                        <svg class="h-6 text-red-400 dark:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::SECRETLY_ACCEPTED)
                                    @case(App\Models\LevelState::SECRETLY_REJECTED)
                                        <svg class="h-6 text-amber-400 dark:text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::LOCKED)
                                        <svg class="h-6 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" stroke-linecap="round" stroke-linejoin="round"></path>                                        </svg>
                                        @break
                                    @default
                                        <svg class="h-6 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
                                        </svg>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            @foreach($contest->tasks as $task)
                @foreach($task->levels as $level)
                    @if($team->getLevelState($level) === \App\Models\LevelState::LOCKED)
                        @continue
                    @endif

                    <div x-cloak x-show="selectedLevel === {{ $level->id }}" class="w-full flex items-center justify-center p-4" id="{{ $level->id }}">
                        @php($levelSubmission = $level->levelSubmissions
                                            ->where('team_id', $team->id)
                                            ->sortByDesc('status_changed_at')
                                            ->sortBy(fn($levelSubmission) => $levelSubmission->status === 'checking' || $levelSubmission->status === 'pending' ? 1 : 0)
                                            ->first())

                        <div class="w-full flex-col flex items-center p-1">
                            @switch($team->getLevelState($level))
                                @case(\App\Models\LevelState::ACCEPTED)
                                    <p class="mb-2">Richtige abgabe!</p>

                                    <p class="text-2xl">{{ $level->points }}</p>
                                    <p class="mb-2">Punkte</p>

                                    <img src="{{ route('public.file', $levelSubmission->image_file_id) }}" alt="Meme" class="md:w-2/3 lg:w-1/3 3xl:w-1/4 w-full">

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600 cursor-pointer" wire:click="downloadInputs">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Alles downloaden</p>
                                        </a>
                                    </div>

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $level->description_file_id) }}">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Beschreibung</p>
                                        </a>
                                    </div>
                                    @break
                                @case(\App\Models\LevelState::REJECTED)
                                    <p>Leider falsche abgabe!</p>

                                    <img src="{{ route('public.file', $levelSubmission->image_file_id) }}" alt="Meme" class="md:w-2/3 lg:w-1/3 3xl:w-1/4 w-full">

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600 cursor-pointer" wire:click="downloadInputs">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Alles downloaden</p>
                                        </a>
                                    </div>

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $level->description_file_id) }}">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Beschreibung</p>
                                        </a>
                                    </div>
                                    @break
                                @case(\App\Models\LevelState::SECRETLY_ACCEPTED)
                                @case(\App\Models\LevelState::SECRETLY_REJECTED)
                                    <p>Wir haben die Abgabe bewertet.</p>
                                    <p class="mt-2">Um den Contest spannender zu gestalten, werden die Ergebnisse erst nach der Siegerehrung veröffentlicht.</p>

                                    <img src="{{ route('public.file', $levelSubmission->image_file_id) }}" alt="Meme" class="md:w-2/3 lg:w-1/3 3xl:w-1/4 mt-2 w-full">

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600 cursor-pointer" wire:click="downloadInputs">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Alles downloaden</p>
                                        </a>
                                    </div>

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $level->description_file_id) }}">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Beschreibung</p>
                                        </a>
                                    </div>
                                    @break
                                @default
                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600 cursor-pointer" wire:click="downloadInputs">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Alles downloaden</p>
                                        </a>
                                    </div>

                                    <div class="flex justify-center mt-3">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $level->description_file_id) }}">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Beschreibung</p>
                                        </a>
                                    </div>
                                    @break
                            @endswitch

                            <div class="flex flex-col w-full mt-2">
                                @foreach($level->levelFiles->sortBy('id') as $levelFile)
                                    <div class="flex justify-between items-center p-1 rounded-md @if($loop->even) bg-accent-100 @endif">
                                        <div class="items-center">
                                            <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $levelFile->input_file_id) }}">
                                                <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <p>Eingabe - {{ $loop->index + 1 }}</p>
                                            </a>
                                        </div>
                                        <div class="flex justify-end gap-4 items-center">
                                            @if(($levelFileSubmissions = $levelSubmission->getFileSubmission($levelFile)) !== null)
                                                <div class="hidden md:block">
                                                    <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600" href="{{ route('public.file', $levelFileSubmissions->uploaded_file_id) }}">
                                                        <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        <p>Abgabe - {{ $loop->index + 1 }}</p>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @else
        <div class="overflow-hidden rounded-lg border-2 shadow-lg border-accent-400 dark:border-accent-600 bg-gray-400 dark:bg-gray-600 animate-pulse h-[280px] w-full max-w-4xl">
        </div>
    @endif
</div>
