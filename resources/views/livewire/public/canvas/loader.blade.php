<div wire:poll.keep-alive.60s="next">
    @livewire($view, [
        'day' => $contestDay,
        'target' => $target,
    ], key($key))
</div>
