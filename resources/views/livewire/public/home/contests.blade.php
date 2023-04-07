<div class="swiper" id="contests-swiper" wire:init="initData">
    @if($loadData)
        <div class="swiper-wrapper">
            @foreach($contests as $contest)
                <a class="swiper-slide box rounded-lg bg-gradient-to-tl from-accent-400 dark:from-accent-600 p-4" style="{{ $contest->theme_variables }}" href="#">
                    @if($contest->contestDay->training_only)
                        <p class="font-bold text-2xl">
                            {{ $contest->name }}
                        </p>
                        <p class="font-bold text-xl">Viel Spaß</p>
                        <p class="mt-1">Dieser Contest dient nur als Training</p>
                        <div class="flex justify-between mt-1">
                            <p>{{ $contest->tasks->count() }} Aufgaben</p>
                            <p>{{ $contest->tasks->flatMap(fn ($task) => $task->levels)->map(fn ($level) => $level->points)->sum() }} mögliche Punkte</p>
                        </div>
                    @else
                        <p class="font-bold text-2xl">
                            {{ $contest->contestDay->name }}
                        </p>
                        <p class="font-bold text-xl">
                            {{ $contest->name }}
                        </p>
                        <p class="mt-1">{{ $contest->contestDay->date->format('d. m. Y') }}</p>
                        <div class="flex justify-between mt-1">
                            <p>{{ $contest->tasks->count() }} Aufgaben</p>
                            <p>{{ $contest->tasks->flatMap(fn ($task) => $task->levels)->map(fn ($level) => $level->points)->sum() }} mögliche Punkte</p>
                        </div>
                    @endif
                </a>
            @endforeach
        </div>
    @endif
</div>
