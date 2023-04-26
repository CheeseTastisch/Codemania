<div class="w-screen h-screen flex flex-col gap-5 justify-center items-center"
     x-data="{minutes: @entangle('minutes').defer, seconds: @entangle('seconds').defer}"
     x-init="
        setInterval(() => {
            if (seconds > 0) seconds--;
            else if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else $wire.emitUp('next');
        }, 1000);
     ">
    <p class="text-4xl">Noch</p>
    <p class="text-9xl">
        <span x-text="minutes.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>:<span x-text="seconds.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></span>
    </p>
    <p class="text-4xl">bis zum Start von</p>
    <p class="text-7xl">{{ $names }}</p>
</div>
