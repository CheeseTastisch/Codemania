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

        <div class="flex justify-center gap-5 mt-3">
            <x-button.big.link
                id="utility-description-download"
                href="#">
                <div class="flex items-center gap-3">
                    <svg class="h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>Beschreibung</p>
                </div>
            </x-button.big.link>

            <x-button.big.link
                id="utility-class-download"
                href="#">
                <div class="flex items-center gap-3">
                    <svg class="h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>Java-Klasse</p>
                </div>
            </x-button.big.link>
        </div>

        <p class="text-center mt-8">
            Solltest du noch Fragen haben, melde dich bitte auf unserem
            <a class="text-accent-400 dark:text-accent-600 hover:text-accent-600 dark:hover:text-accent-400 underline"
               href="{{ discord_link() }}" target="_blank">Discord-Server</a>.
        </p>

        @livewire('member.contest.contest.running.container', ['contest' => $contest, 'team' => $team])
    @endif
</div>
