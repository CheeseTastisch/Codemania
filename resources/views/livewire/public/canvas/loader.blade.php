<div wire:init="initData" class="w-screen h-screen flex justify-center items-center">
    @if($loadData)
        @livewire(match ($this->viewId) {
            1, 4 => 'public.canvas.contest.time-till-start',
            2, 5 => 'public.canvas.contest.time-till-end',
            6, 7 => 'public.canvas.contest.leaderboard',
            default => 'public.canvas.sponsors',
        }, [
            'contestDay' => $contestDay,
            'contest' => $for,
        ])
    @endif
</div>
