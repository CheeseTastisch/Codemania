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

        <x-button.big.modal id="openCreateTeamModal" modal="createTeamModal" action="open">
            Neues Team erstellen
        </x-button.big.modal>

        <x-modal.x
            id="createTeamModal"
            title="Team erstellen">
            <x-form.x>
                <x-form.input.x
                    id="name" label="Name"
                    :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

                <x-form.input.file
                    id="logo" label="Logo" accept="image/*"
                    :model="\App\Models\Components\Modeled\Model::livewire('logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

                <x-button.big.livewire
                    id="createTeam" action="createTeam"
                    full-width>
                    Team erstellen
                </x-button.big.livewire>
            </x-form.x>
        </x-modal.x>
    @else
        <p class="md:text-xl mt-3">{{ $team->name }}</p>

        <div class="w-12 h-12 md:w-32 md:h-32 rounded-lg flex items-center justify-center">
            @if($team->logo_file_id)
                <img class="max-w-10 max-h-10 md:max-w-28 md:max-h-28" src="{{ route('public.file', $team->logo_file_id) }}" alt="Logo">
            @else
                <div class="relative rounded-lg overflow-hidden w-10 h-10 md:w-28 md:h-28">
                    <div class="bg-gray-100 dark:bg-gray-600 w-full h-full">
                        <svg class="absolute w-10 h-10 md:w-28 md:h-28 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" fill-rule="evenodd"></path></svg>
                    </div>
                </div>
            @endif
        </div>

        @if($isAdmin)
            <div class="mt-6 lg:min-w-md">
                <x-form.x type="container">
                    <x-form.input.x
                        id="name" label="Name"
                        :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
                        updatable />

                        <x-form.x type="container" y-space="space-y-3">
                            <x-form.input.file
                                id="logo" label="Logo" accept="image/*"
                                :model="\App\Models\Components\Modeled\Model::livewire('logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
                                updatable />

                            <x-button.big.livewire
                                id="removeLogo" action="removeLogo"
                                full-width>
                                Logo entfernen
                            </x-button.big.livewire>
                        </x-form.x>
                </x-form.x>
            </div>
        @endif
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

    <x-button.big.livewire id="leave-contest" action="leaveContest">
        Contest verlassen
    </x-button.big.livewire>
</div>
