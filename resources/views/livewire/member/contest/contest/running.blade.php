<div class="flex flex-col items-center w-full">
    @if($team->is_blocked)
        <x-alert.x
            title="Blockiert"
            :style="\App\Models\Components\Styled\Style::Danger">
            <p>Dein Team wurde blockiert.</p>
            <p class="mt-1">Bitte wende dich an einen Organisator, um weitere Informationen zu erhalten.</p>
        </x-alert.x>
    @else
        <p class="text-center font-bold md:text-3xl text-2xl">{{ $contest->contestDay->name }}</p>
        <p class="text-center font-bold md:text-2xl text-xl">{{ $contest->name }}</p>

        <p class="text-center mt-5">Noch</p>
        <div class="mx-auto grid grid-cols-3 gap-9 mt-3 text-center"
             x-data="{hours: @entangle('hours').defer, minutes: @entangle('minutes').defer, seconds: @entangle('seconds').defer}"
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
                 } else location.reload();
             }, 1000);
             ">
            <div>
                <div class="text-xl md:text-2xl font-bold" x-text="hours.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
                <div>Stunden</div>
            </div>

            <div>
                <div class="text-xl md:text-2xl font-bold" x-text="minutes.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
                <div>Minuten</div>
            </div>

            <div>
                <div class="text-xl md:text-2xl font-bold" x-text="seconds.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
                <div>Sekunden</div>
            </div>
        </div>


        <p class="text-center mt-8">
            Um dir etwas Arbeit abzunehmen und den Contest etwas fairer zu gestalten, haben wir eine Java-Klasse bereitgestellt,
            welche das Einlesen der Eingabedatei übernimmt.
        </p>

        <p class="text-center mt-2">
            Lies dir hierzu die Beschreibung durch und lade dir die Klasse herunter:
        </p>

        @livewire('public.contest.file-scanner')

        <p class="text-center mt-8">
            Solltest du noch Fragen haben, melde dich bitte auf unserem
            <a class="text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 underline"
               href="{{ discord_link() }}" target="_blank">Discord-Server</a>.
        </p>

        @livewire('member.contest.contest.running.container', ['contest' => $contest, 'team' => $team])
    @endif
</div>
