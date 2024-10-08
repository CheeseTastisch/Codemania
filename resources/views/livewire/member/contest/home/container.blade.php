<div wire:init="initData" wire:poll.5s>
    @if($loadData)
        @if($running->isNotEmpty())
            <h3 class="text-2xl font-semibold mb-4">Laufende Contests</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
                @foreach($running as $contest)
                    @livewire('member.contest.home.contest.running', ['contest' => $contest], key(array_id([$contest->id, 0])))
                @endforeach
            </div>
        @endif

        @if($upcoming->isNotEmpty())
            @if($running->isNotEmpty())
                <div class="border border-accent-400 dark:border-accent-600 my-4"></div>
            @endif

            <h3 class="text-2xl font-semibold mb-4">Anstehende Contests</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
                @foreach($upcoming as $contest)
                    @livewire('member.contest.home.contest.upcoming', ['contest' => $contest], key(array_id([$contest->id, 1])))
                @endforeach
            </div>
        @endif

        @if($forRegistration->isNotEmpty())
            @if($running->isNotEmpty() || $upcoming->isNotEmpty())
                <div class="border border-accent-400 dark:border-accent-600 my-4"></div>
            @endif

            <h3 class="text-2xl font-semibold mb-4">Für Registrierung offene Contests</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
                @foreach($forRegistration as $contest)
                    @livewire('member.contest.home.contest.for-registration', ['contest' => $contest], key(array_id([$contest->id, 2])))
                @endforeach
            </div>
        @endif

        @if($past->isNotEmpty())
            @if($running->isNotEmpty() || $upcoming->isNotEmpty() || $forRegistration->isNotEmpty())
                <div class="border border-accent-400 dark:border-accent-600 my-4"></div>
            @endif

            <h3 class="text-2xl font-semibold mb-4">Abgeschlossene Contests</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
                @foreach($past as $contest)
                    @livewire('member.contest.home.contest.past', ['contest' => $contest], key(array_id([$contest->id, 3])))
                @endforeach
            </div>
        @endif
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
            <div class="swiper-slide box rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse !h-[148px]">
            </div>

            <div class="swiper-slide box rounded-lg bg-gray-400 dark:bg-gray-600 animate-pulse !h-[148px]">
            </div>
        </div>
    @endif
</div>
