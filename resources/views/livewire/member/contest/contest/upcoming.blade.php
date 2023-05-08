<div class="flex flex-col items-center text-center">
    <p class="text-2xl md:text-4xl font-bold">Vielen Dank für deine Teilnahme am Contest!</p>

    <p class="md:text-xl mt-5">Der Contest beginnt in</p>

    <div class="mx-auto grid grid-cols-2 md:grid-cols-4 gap-9 mt-3"
         x-data="{days: @entangle('days').defer, hours: @entangle('hours').defer, minutes: @entangle('minutes').defer, seconds: @entangle('seconds').defer}"
         x-init="
         setInterval(() => {
                 if (seconds > 0) seconds--;
                 else if (minutes > 0) {
                     seconds = 59;
                     minutes--;
                 } else if (hours > 0) {
                     seconds = 59;
                     minutes = 59;
                     hours--;
                 } else if (days > 0) {
                     seconds = 59;
                     minutes = 59;
                     hours = 23;
                     days--;
                 } else $wire.refresh();
                }, 1000);
         ">
        <div>
            <div class="text-2xl md:text-3xl font-bold" x-text="days.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
            <div class="md:text-xl">Tage</div>
        </div>

        <div>
            <div class="text-2xl md:text-3xl font-bold" x-text="hours.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
            <div class="md:text-xl">Stunden</div>
        </div>

        <div>
            <div class="text-2xl md:text-3xl font-bold" x-text="minutes.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
            <div class="md:text-xl">Minuten</div>
        </div>

        <div>
            <div class="text-2xl md:text-3xl font-bold" x-text="seconds.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
            <div class="md:text-xl">Sekunden</div>
        </div>
    </div>

    <p class="md:text-xl mt-5">Wir wünschen dir viel Spaß und Erfolg!</p>
</div>
