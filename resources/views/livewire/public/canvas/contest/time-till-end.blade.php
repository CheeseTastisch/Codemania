<div class="w-screen h-screen flex flex-col gap-5 justify-center items-center"
     x-data="{hours: @entangle('hours').defer,minutes: @entangle('minutes').defer, seconds: @entangle('seconds').defer}"
     x-init="
        setInterval(() => {
            if (seconds > 0) seconds--;
            else if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else if (hours > 0) {
                hours--;
                minutes = 59;
                seconds = 59;
            } else $wire.emitUp('next');
        }, 1000);
     ">
    <p class="text-4xl">Noch</p>
    <p class="text-9xl">
        <span x-text="hours.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>:<span x-text="minutes.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>:<span x-text="seconds.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>
    </p>
    <p class="text-4xl">bis zum Ende von</p>
    <p class="text-7xl">{{ $names }}</p>
</div>
