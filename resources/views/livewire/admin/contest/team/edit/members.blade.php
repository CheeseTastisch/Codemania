<div x-data="{
    removeMemberId: @entangle('remove_member_id').defer, removeMemberName: null,
    addMemberId: @entangle('add_member_id').defer, addMemberName: null,
    upgradeMemberId: @entangle('upgrade_member_id').defer, upgradeMemberName: null,
    downgradeMemberId: @entangle('downgrade_member_id').defer, downgradeMemberName: null }">
    <x-table.x searchable :paginator="$members">
        <x-slot name="header">
            <x-table.header.simple name="Mitglied" />
            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($members as $member)
            <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                <x-table.body.cell>
                    <div class="flex items-center whitespace-nowrap dark:text-white">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center">
                            @if($member->profile_picture_id)
                                <img class="w-10 h-10" src="{{ route('public.file', $member->profile_picture_id) }}" alt="Logo">
                            @else
                                <div class="relative rounded-lg overflow-hidden w-10 h-10">
                                    <div class="bg-gray-100 dark:bg-gray-600 w-full h-full">
                                        <svg class="absolute w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $member->display_name }}</div>
                            <div class="text-sm">
                                {{
                                    match($team->users()->where('user_id', $member->id)->first()->pivot->role) {
                                        'admin' => 'Administrator',
                                        default => 'Mitglied',
                                    }
                                }}
                            </div>
                        </div>
                    </div>
                </x-table.body.cell>


                <x-table.body.cell>
                    <div class="flex space-x-2">
                        <svg @click="removeMemberId = @js($member->id); removeMemberName = @js($member->display_name); modal.open('removeMember')" data-tooltip-target="tooltip-remove-{{ $member->id }}" class="w-6 h-6 cursor-pointer hover:text-red-400 dark:hover:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <div id="tooltip-remove-{{ $member->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                            Entfernen
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        @if($team->users()->where('user_id', $member->id)->first()->pivot->role === 'admin')
                            <svg @click="downgradeMemberId = @js($member->id); downgradeMemberName = @js($member->display_name); modal.open('downgradeMember')" data-tooltip-target="tooltip-downgrade-{{ $member->id }}" class="w-6 h-6 cursor-pointer hover:text-red-400 dark:hover:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            <div data-tooltip id="tooltip-downgrade-{{ $member->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                Zum Benutzer herabstufen
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @else
                            <svg @click="upgradeMemberId = @js($member->id); upgradeMemberName = @js($member->display_name); modal.open('upgradeMember')" data-tooltip-target="tooltip-upgrade-{{ $member->id }}" class="w-6 h-6 cursor-pointer hover:text-green-400 dark:hover:text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            <div data-tooltip id="tooltip-upgrade-{{ $member->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                Zum Administrator befördern
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    </div>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach
    </x-table.x>

    <x-modal.x title="Mitglied hinzufügen" id="addMemberTable">
        <x-table.x searchable :paginator="$others">
            <x-slot name="header">
                <x-table.header.simple name="Benutzer" />
                <x-table.header.sr name="Aktionen" />
            </x-slot>

            @foreach($others as $user)
                <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                    <x-table.body.cell>
                        <div class="flex items-center whitespace-nowrap dark:text-white">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center">
                                @if($user->profile_picture_id)
                                    <img class="w-10 h-10" src="{{ route('public.file', $user->profile_picture_id) }}" alt="Logo">
                                @else
                                    <div class="relative rounded-lg overflow-hidden w-10 h-10">
                                        <div class="bg-gray-100 dark:bg-gray-600 w-full h-full">
                                            <svg class="absolute w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $user->display_name }}</div>
                                <div class="text-sm">{{ $user->getTeamForContest($team->contest)?->name ?? 'Kein Team' }}</div>
                            </div>
                        </div>
                    </x-table.body.cell>

                    <x-table.body.cell>
                        <div class="flex space-x-2">
                            <svg @click="addMemberId = @js($user->id); addMemberName = @js($user->display_name); modal.open('addMember'); modal.close('addMemberTable')" data-tooltip-target="tooltip-add-{{ $user->id }}" class="w-6 h-6 cursor-pointer hover:text-green-400 dark:hover:text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"> <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                            <div id="tooltip-add-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                Hinzufügen
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </x-table.body.cell>
                </x-table.body.row>
            @endforeach
        </x-table.x>
    </x-modal.x>

    <x-modal.confirm id="addMember">
        <h3 class="text-lg font-medium mb-2">Möchtest du <span x-text="addMemberName"></span> wirklich hinzufügen?</h3>
        <p class="mb-5">Sollte dieser Benutzer in einem anderen Team sein, wird er/sie automatisch aus diesem entfernt.</p>

        <x-form.input.select
            id="role" label="Rolle"
            :model="\App\Models\Components\Modeled\Model::livewire('role', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
            :options="[
                ['value' => 'member', 'name' => 'Mitglied'],
                ['value' => 'admin', 'name' => 'Administrator'],
            ]" />

        <div class="flex justify-center mt-7 space-x-2">
            <x-button.big.livewire
                id="addMember" action="addMember"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Hinzufügen
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="addMember" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>

    <div class="flex justify-end mt-3">
        <x-button.big.modal
            id="openAddMemberTable" modal="addMemberTable" action="open">
            Benutzer hinzufügen
        </x-button.big.modal>
    </div>

    <x-modal.confirm id="removeMember">
        <h3 class="text-lg font-medium">Möchtest du <span x-text="removeMemberName"></span> wirklich entfernen?</h3>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="removeMember" action="removeMember"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Entfernen
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="removeMember" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>

    <x-modal.confirm id="upgradeMember">
        <h3 class="text-lg font-medium">Möchtest du <span x-text="upgradeMemberName"></span> wirklich zum Administrator machen?</h3>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="upgradeMember" action="upgradeMember"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledSuccess">
                Befördern
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="upgradeMember" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedSuccess">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>

    <x-modal.confirm id="downgradeMember">
        <h3 class="text-lg font-medium">Möchtest du <span x-text="downgradeMemberName"></span> wirklich zum Mitglied machen?</h3>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="downgradeMember" action="downgradeMember"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Degradieren
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="downgradeMember" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>
</div>
