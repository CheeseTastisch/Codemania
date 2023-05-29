<div
    class="grid gap-4 sm:px-4 px-2 pt-10
        lg:grid-rows-1 lg:grid-cols-[1fr,4fr]
        grid-rows-[auto,auto] grid-cols-1">

    <div class="overflow-hidden p-4 rounded-lg border-2 shadow-lg border-accent-400 dark:border-accent-600 h-full">
        <div class="px-4 py-3 grid grid-cols-2 grid-rows-1 lg:grid-cols-1 lg:grid-rows-2 gap-5 h-full">
            <div class="flex flex-col justify-center items-center">
                <div class="lg:text-2xl text-xl font-bold">{{ $team->getPoints(true, $contest) }}</div>
                <div>Punkte</div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <div class="lg:text-2xl text-xl font-bold">{{ $contest->getMaxPoints() }}</div>
                <div>Punkte möglich</div>
            </div>
        </div>
    </div>

    <div x-data="{selectedTask: @entangle('selectedTask'), selectedLevel: @entangle('selectedLevel')}"
         class="overflow-hidden rounded-lg border-2 shadow-lg border-accent-400 dark:border-accent-600 h-full grid grid-rows-[1fr,1fr,auto]">
        <div class="grid lg:grid-cols-variable lg:grid-rows-1 grid-rows-variable"
             style="--rows: {{ $contest->tasks->count() }}; --columns: var(--rows)">
            @foreach($contest->tasks->sortBy('order') as $task)
                <div
                    class="flex lg:flex-col justify-center items-center p-4 lg:border-b-0 border-b @if($loop->last) !border-b-0 @else lg:border-r @endif border-accent-200 dark:border-accent-800 hover:bg-accent-300 dark:hover:bg-accent-700 cursor-pointer"
                    @click="selectedTask = {{ $task->id }}"
                    :class="{'bg-accent-100 dark:bg-accent-900': selectedTask === {{ $task->id }}}">
                    <div>{{ $task->name }}</div>
                    <div>
                        <span class="lg:hidden"> (</span>{{ $task->levels->count() }} Level<span class="lg:hidden">)</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid lg:grid-cols-variable lg:grid-rows-1 grid-rows-variable border-y-2 border-accent-400"
             style="--rows: {{ \App\Models\Task::whereId($selectedTask)->first()->levels->count() }}; --columns: var(--rows)">
            @foreach(\App\Models\Task::whereId($selectedTask)->first()->levels->sortBy('level') as $level)
                <div class="flex items-center p-4 lg:border-b-0 border-b @if($loop->last) !border-b-0 @else lg:border-r @endif border-accent-200 dark:border-accent-800 hover:bg-accent-300 dark:hover:bg-accent-700 cursor-pointer"
                     @click="selectedLevel = {{ $level->id }}"
                     :class="{'bg-accent-100 dark:bg-accent-900': selectedLevel === {{ $level->id }}}">
                    <div class="flex justify-center grow">Level {{ $level->level }}</div>
                    @if($levelSubmission = $level->levelSubmissions
                            ->where('team_id', $team->id)
                            ->sortByDesc('status_changed_at')
                            ->sortBy(fn($levelSubmission) => $levelSubmission->status === 'checking' || $levelSubmission->status === 'pending' ? 1 : 0)
                            ->first())
                        @switch($levelSubmission->status)
                            @case('checking')
                                <div class="justify-self-end">
                                    <svg class="h-6 text-purple-400 dark:text-purple-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                @break
                            @case('accepted')
                                <div class="justify-self-end">
                                    <svg class="h-6 text-green-400 dark:text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                @break
                            @case('rejected')
                                <div class="justify-self-end">
                                    <svg class="h-6 text-red-400 dark:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                @break
                            @default
                                <div class="justify-self-end">
                                    <svg class="h-6 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
                                    </svg>
                                </div>
                                @break
                        @endswitch
                    @else
                        <div class="justify-self-end">
                            <svg class="h-6 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div>
            @php($level = \App\Models\Level::whereId($selectedLevel)->first())

            <div class="w-full flex items-center justify-center p-4">
                @if($levelSubmission = $level->levelSubmissions
                        ->where('team_id', $team->id)
                        ->sortByDesc('status_changed_at')
                        ->sortBy(fn($levelSubmission) => $levelSubmission->status === 'checking' || $levelSubmission->status === 'pending' ? 1 : 0)
                        ->first())
                    @switch($levelSubmission->status)
                        @case('accepted')
                            @livewire('member.contest.training.accepted', [
                                    'level' => $level,
                                    'levelSubmission' => $levelSubmission,
                                    'team' => $team,
                                ], key(now()->timestamp))
                            @break
                        @case('rejected')
                            @livewire('member.contest.training.rejected', [
                                    'level' => $level,
                                    'levelSubmission' => $levelSubmission,
                                    'team' => $team,
                                ], key(now()->timestamp))
                            @break
                        @default
                            @livewire('member.contest.training.pending', [
                                    'level' => $level,
                                    'levelSubmission' => $levelSubmission,
                                    'team' => $team,
                                ], key(now()->timestamp))
                            @break
                    @endswitch
                @else
                    @livewire('member.contest.training.pending', [
                            'level' => $level,
                            'levelSubmission' => null,
                            'team' => $team,
                                ], key(now()->timestamp))
                @endif
            </div>
        </div>
    </div>
</div>
