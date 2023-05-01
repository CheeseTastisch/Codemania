<a href="#" wire:poll.5s
    class="rounded-lg bg-gradient-to-tl from-accent-400 dark:from-accent-600 hover:to-accent-600 hover:dark:to-accent-400 p-4" style="{{ $contest->theme_variables }}"
   x-data="{hours: @entangle('hours').defer, minutes: @entangle('minutes').defer, seconds: @entangle('seconds').defer, interval: null}"
   x-init="
        interval = setInterval(() => {
            if (seconds > 0) seconds--;
            else if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else if (hours > 0) {
                hours--;
                minutes = 59;
                seconds = 59;
            } else clearInterval(interval);
        }, 1000);">
    <p class="font-bold text-2xl">{{ $contest->contestDay->name }}</p>
    <p class="font-bold text-xl">{{ $contest->name }}</p>
    <p class="mt-1">Noch <span x-text="hours.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>:<span x-text="minutes.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>:<span x-text="seconds.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span></p>
    <div class="flex justify-between mt-1">
        <p>{{ $this->place }}. Platz</p>
        <p>{{ $this->points }} Punkte</p>
    </div>
    <p class="mt-1">Klicke, um den Contest zu spielen</p>
</a>
