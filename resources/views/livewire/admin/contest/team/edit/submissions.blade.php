<div wire:init="initData" @if($loadData) wire:pool.5s @endif>
    @if($loadData)
        <div x-data="{selectedTask: @entangle('selectedTask').defer, selectedLevel: @entangle('selectedLevel').defer}"
             class="overflow-hidden rounded-lg border-2 shadow-lg border-accent-400 dark:border-accent-600 h-full grid grid-rows-[1fr,1fr,auto] w-full">
            <div class="grid lg:grid-cols-variable lg:grid-rows-1 grid-rows-variable"
                 style="--rows: {{ $contest->tasks->count() ?? 1 }}; --columns: var(--rows)">
                @forelse($contest->tasks->sortBy('order') as $task)
                    <div
                        class="flex lg:flex-col justify-center items-center p-4 lg:border-b-0 border-b @if($loop->last) !border-b-0 @else lg:border-r @endif border-accent-200 dark:border-accent-800 hover:bg-accent-300 dark:hover:bg-accent-700 cursor-pointer"
                        @click="selectedTask = {{ $task->id }}; selectedLevel = {{ $task->levels->sortBy('level')->first()->id ?? -1 }}"
                        :class="{'bg-accent-100 dark:bg-accent-900': selectedTask === {{ $task->id }}}">
                        <div>{{ $task->name }}</div>
                        <div>
                            <span class="lg:hidden"> (</span>{{ $task->levels->count() }} Level<span
                                class="lg:hidden">)</span>
                        </div>
                    </div>
                @empty
                    <div class="flex text-red-400 dark:text-red-600 justify-center items-center p-2">
                        Dieser Contest hat keine Aufgaben
                    </div>
                @endforelse
            </div>

            @foreach($contest->tasks as $task)
                <div x-cloak x-show="selectedTask === {{ $task->id}}"
                     class="grid lg:grid-cols-variable lg:grid-rows-1 grid-rows-variable border-y-2 border-accent-400"
                     style="--rows: {{ $task->levels->count() ?? 1 }}; --columns: var(--rows)">
                    @forelse($task->levels->sortBy('level') as $level)
                        <div
                            class="flex items-center p-4 lg:border-b-0 border-b @if($loop->last) !border-b-0 @else lg:border-r @endif border-accent-200 dark:border-accent-800 cursor-pointer hover:bg-accent-300 dark:hover:bg-accent-700"
                            @click="selectedLevel = {{ $level->id }}"
                            :class="{'bg-accent-100 dark:bg-accent-900': selectedLevel === {{ $level->id }}}">
                            <div class="flex justify-center grow">Level {{ $level->level }}</div>

                            <div class="justify-self-end">
                                @switch($team->getLevelState($level))
                                    @case(App\Models\LevelState::ACCEPTED)
                                        <svg class="h-6 text-green-400 dark:text-green-600" fill="none"
                                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::REJECTED)
                                        <svg class="h-6 text-red-400 dark:text-red-600" fill="none"
                                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::SECRETLY_ACCEPTED)
                                        <svg class="h-6 text-amber-400 dark:text-green-600" fill="none"
                                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::SECRETLY_REJECTED)
                                        <svg class="h-6 text-amber-400 dark:text-red-600" fill="none"
                                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        @break
                                    @case(App\Models\LevelState::LOCKED)
                                        <svg class="h-6 text-gray-400 dark:text-gray-600" fill="none"
                                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path
                                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        @break
                                    @default
                                        <svg class="h-6 text-gray-400 dark:text-gray-600" fill="none"
                                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
                                        </svg>
                                        @break
                                @endswitch
                            </div>
                        </div>
                    @empty
                        <div class="flex text-red-400 dark:text-red-600 justify-center items-center p-2">
                            Diese Aufgabe hat keine Levels.
                        </div>
                    @endforelse
                </div>
            @endforeach

            @foreach($contest->tasks as $task)
                @foreach($task->levels as $level)
                    <div x-cloak x-show="selectedLevel === {{ $level->id }}"
                         class="w-full flex flex-col items-center justify-center p-4" id="{{ $level->id }}">
                        @php($levelSubmission = $level->levelSubmissions
                                            ->where('team_id', $team->id)
                                            ->sortByDesc('status_changed_at')
                                            ->sortBy(fn($levelSubmission) => $levelSubmission->status === 'checking' || $levelSubmission->status === 'pending' ? 1 : 0)
                                            ->first())
                        <div class="flex flex-col w-full mt-2">
                            @foreach($level->levelFiles->sortBy('id') as $levelFile)
                                <div
                                    class="flex justify-between items-center p-1 rounded-md @if($loop->even) bg-accent-100 dark:bg-accent-900 @endif">
                                    <div class="items-center">
                                        <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600"
                                           href="{{ route('public.file', $levelFile->input_file_id) }}">
                                            <svg class="h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                                 stroke-width="1.5" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>Eingabe - {{ $loop->index + 1 }}</p>
                                        </a>
                                    </div>
                                    <div class="flex justify-end gap-4 items-center">
                                        @if(($levelFileSubmissions = $levelSubmission?->getFileSubmission($levelFile)) !== null)
                                            <a class="flex items-center gap-2 hover:text-accent-400 dark:hover:text-accent-600"
                                               href="{{ route('public.file', $levelFileSubmissions->uploaded_file_id) }}">
                                                <svg class="h-4" aria-hidden="true" fill="none"
                                                     stroke="currentColor" stroke-width="1.5"
                                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <p>Abgabe - {{ $loop->index + 1 }}</p>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($levelSubmission?->source_file_id !== null)
                            <a class="flex items-center gap-2"
                               href="{{ route('public.file', $levelSubmission?->source_file_id) }}">
                                <svg class="h-4" aria-hidden="true" fill="none"
                                     stroke="currentColor" stroke-width="1.5"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p>Source-Code</p>
                            </a>
                        @endif
                    </div>
                @endforeach
            @endforeach
        </div>
    @else
        <div
            class="overflow-hidden rounded-lg border-2 shadow-lg border-accent-400 dark:border-accent-600 bg-gray-400 dark:bg-gray-600 animate-pulse h-[280px] w-full">
        </div>
    @endif
</div>
