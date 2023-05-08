<div class="flex flex-col items-center">
    <p class="text-xl md:text-2xl font-bold">Vielen Dank für deine Teilnahme am Contest!</p>

    <p class="md:text-xl mt-5">Der Contest beginnt in</p>

    <div class="mx-auto grid grid-cols-2 md:grid-cols-4 gap-9 mt-3 text-center"
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
            <div class="text-xl md:text-2xl font-bold" x-text="days.toLocaleString('de-DE', {minimumIntegerDigits: 2})"></div>
            <div>Tage</div>
        </div>

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

    <p class="md:text-xl mt-5">Wir wünschen dir viel Spaß und Erfolg!</p>

    <p class="text-xl md:text-2xl font-bold mt-8">Team</p>
    @if($team === null)
        <p class="mt-1">Du bist in noch keinem Team.</p>
        <p class="text-center">Möchtest du einem Team beitreten, melde dich bei dessen Administrator.</p>

        <p class="mt-1 mb-2">Du kannst auch ein neues Team erstellen und andere Teilnehmer einladen.</p>

        <x-button.big.modal id="openCreateTeam" modal="createTeam" action="open">
            Neues Team erstellen
        </x-button.big.modal>

        <x-modal.x
            id="createTeam"
            title="Team erstellen">
            <x-form.x>
                <x-form.input.x
                    id="name" label="Name"
                    :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

                <x-form.input.file
                    id="logo" label="Logo" action="image/*"
                    :model="\App\Models\Components\Modeled\Model::livewire('logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

                <x-button.big.livewire
                    id="createTeam" action="createTeam"
                    full-width>
                    Team erstellen
                </x-button.big.livewire>
            </x-form.x>
        </x-modal.x>
    @else
        {{-- TODO: Insert update form --}}
    @endif

    <p class="mt-8">Du kannst den Contest jederzeit verlassen.</p>
    @if($contest->contestDay->registration_deadline !== null)
        <p class="mt-1">
            Beachte jedoch, dass du den Contest nach der Anmeldefrist
            ({{ $contest->contestDay->registration_deadline->format('d.m.Y') }}) nicht mehr betreten kannst.
        </p>
    @endif

    <p class="mt-1">Es kann sein, das hierdurch ein Team, mit nur einer Person entsteht.</p>
    <p class="mb-2">
        Diese Person wird dann
        @if($contest->contestDay->registration_deadline !== null) am Ende der Anmeldefrist @else beim Start des Contests @endif
        in ein zufälliges Team eingeteilt.
    </p>

    <x-button.big.js id="leave-contest" action="leaveContest">
        Contest verlassen
    </x-button.big.js>
</div>
