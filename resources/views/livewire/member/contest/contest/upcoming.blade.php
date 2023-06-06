<div class="flex flex-col items-center" x-data="{
    removeMemberId: @entangle('remove_member_id').defer, removeMemberName: null,
    upgradeMemberId: @entangle('upgrade_member_id').defer, upgradeMemberName: null,
    downgradeMemberId: @entangle('downgrade_member_id').defer, downgradeMemberName: null }">
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

                <x-button.big.livewire id="createTeam" action="createTeam" type="submit" full-width>
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
                    @if($contest->contestDay->registration_deadline?->isFuture() ?? true)
                        <x-form.input.x
                            id="name" label="Name"
                            :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
                            updatable />
                    @endif

                    <x-form.x type="container" y-space="space-y-3">
                        <x-form.input.file
                            id="logo" label="Logo" accept="image/*"
                            :model="\App\Models\Components\Modeled\Model::livewire('logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
                            updatable />

                        <x-button.big.livewire id="removeLogo" action="removeLogo" full-width>
                            Logo entfernen
                        </x-button.big.livewire>
                    </x-form.x>
                </x-form.x>
            </div>
        @endif

        <div class="mt-4 lg:min-w-md">
            <x-table.x>
                <x-slot name="header">
                    <x-table.header.simple name="Name"/>
                    <x-table.header.simple name="Rolle"/>
                    @if($isAdmin && $contest->contestDay->registration_deadline?->isFuture() ?? true)
                        <x-table.header.sr name="Aktionen"/>
                    @endif
                </x-slot>

                @foreach($team->users()->wherePivot('role', '!=', 'invited')->get() as $user)
                    <x-table.body.row :border="!$loop->last" :stripe="$loop->even">
                        <x-table.body.cell>{{ $user->display_name }}</x-table.body.cell>
                        <x-table.body.cell>{{ $user->pivot->role === 'admin' ? 'Administrator' : 'Mitglied' }}</x-table.body.cell>

                        @if($isAdmin && $contest->contestDay->registration_deadline?->isFuture() ?? true)
                            <x-table.body.cell>
                                @if($user->id !== auth()->user()->id)
                                    <div class="flex space-x-2">
                                        <svg @click="removeMemberId = @js($user->id); removeMemberName = @js($user->display_name); modal.open('removeMember')" data-tooltip-target="tooltip-remove-{{ $user->id }}" class="w-6 h-6 cursor-pointer hover:text-red-400 dark:hover:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        <div id="tooltip-remove-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                            Entfernen
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>

                                        @if($team->users()->where('user_id', $user->id)->first()->pivot->role === 'admin')
                                            <svg @click="downgradeMemberId = @js($user->id); downgradeMemberName = @js($user->display_name); modal.open('downgradeMember')" data-tooltip-target="tooltip-downgrade-{{ $user->id }}" class="w-6 h-6 cursor-pointer hover:text-red-400 dark:hover:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                            <div data-tooltip id="tooltip-downgrade-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                                Zum Benutzer herabstufen
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        @else
                                            <svg @click="upgradeMemberId = @js($user->id); upgradeMemberName = @js($user->display_name); modal.open('upgradeMember')" data-tooltip-target="tooltip-upgrade-{{ $user->id }}" class="w-6 h-6 cursor-pointer hover:text-green-400 dark:hover:text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                            <div data-tooltip id="tooltip-upgrade-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                                Zum Administrator befördern
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </x-table.body.cell>
                        @endif
                    </x-table.body.row>
                @endforeach
            </x-table.x>

            @if($isAdmin && $contest->contestDay->registration_deadline?->isFuture() ?? true)
                <div class="flex justify-end mt-2">
                    <x-button.big.modal id="openInviteModal" modal="inviteModal" action="open">
                        Einladen
                    </x-button.big.modal>
                </div>
            @endif

            <x-modal.x id="inviteModal" title="Einladen">
                <x-form.x>
                    <x-form.input.x
                        id="email" name="email" label="E-Mail"
                        :model="\App\Models\Components\Modeled\Model::livewire('email', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

                    <x-button.big.livewire id="invite" action="invite" type="submit" full-width>
                        Einladen
                    </x-button.big.livewire>
                </x-form.x>
            </x-modal.x>

            <x-modal.confirm id="removeMember">
                <h3 class="text-lg font-medium">Möchtest du <span x-text="removeMemberName"></span> wirklich entfernen?</h3>

                <div class="flex justify-center mt-5 space-x-2">
                    <x-button.big.livewire id="removeMember" action="removeMember"
                        :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                        Entfernen
                    </x-button.big.livewire>

                    <x-button.big.modal id="cancel" modal="removeMember" action="close"
                        :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                        Abbrechen
                    </x-button.big.modal>
                </div>
            </x-modal.confirm>

            <x-modal.confirm id="upgradeMember">
                <h3 class="text-lg font-medium">Möchtest du <span x-text="upgradeMemberName"></span> wirklich zum Administrator machen?</h3>

                <div class="flex justify-center mt-5 space-x-2">
                    <x-button.big.livewire id="upgradeMember" action="upgradeMember"
                        :style="\App\Models\Components\Styled\OutlinedStyle::FilledSuccess">
                        Befördern
                    </x-button.big.livewire>

                    <x-button.big.modal id="cancel" modal="upgradeMember" action="close"
                        :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedSuccess">
                        Abbrechen
                    </x-button.big.modal>
                </div>
            </x-modal.confirm>

            <x-modal.confirm id="downgradeMember">
                <h3 class="text-lg font-medium">Möchtest du <span x-text="downgradeMemberName"></span> wirklich zum Mitglied machen?</h3>

                <div class="flex justify-center mt-5 space-x-2">
                    <x-button.big.livewire id="downgradeMember" action="downgradeMember"
                        :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                        Degradieren
                    </x-button.big.livewire>

                    <x-button.big.modal id="cancel" modal="downgradeMember" action="close"
                        :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                        Abbrechen
                    </x-button.big.modal>
                </div>
            </x-modal.confirm>
        </div>
    @endif

    @if($isAdmin && $contest->contestDay->registration_deadline?->isPast())
        <p class="mt-8">Du kannst an deinem Team (Name, Mitglieder) nichts mehr ändern.</p>
        <p class="mt-1">Grund hierfür ist, dass die Anmeldefrist ({{ $contest->contestDay->registration_deadline->format('d.m.Y') }}) bereits abgelaufen ist.</p>
    @endif

    @if($contest->contestDay->registration_deadline !== null)
        <p class="mt-8">Du kannst den Contest bis zum Ende der Anmeldefrist ({{ $contest->contestDay->registration_deadline->format('d.m.Y') }}) verlassen.</p>
        <p class="mt-1">
            Beachte jedoch, dass du den Contest nach der Anmeldefrist
            ({{ $contest->contestDay->registration_deadline->format('d.m.Y') }}) nicht mehr betreten kannst.
        </p>
    @else
        <p class="mt-8">Du kannst den Contest jederzeit verlassen.</p>
    @endif

    <p class="mt-1">Es kann sein, das hierdurch ein Team, mit nur einer Person entsteht.</p>
    <p class="mb-2">
        Diese Person wird dann
        @if($contest->contestDay->registration_deadline !== null) am Ende der Anmeldefrist @else beim Start des Contests @endif
        in ein zufälliges Team eingeteilt.
    </p>

    @if($contest->contestDay->registration_deadline?->isFuture())
        <x-button.big.livewire id="leave-contest" action="leaveContest">
            Contest verlassen
        </x-button.big.livewire>
    @endif
</div>
