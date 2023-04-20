<div x-data="{blockTeamId: @entangle('blockTeamId').defer, blockReason: @entangle('block_reason').defer, unblockTeamId: @entangle('unblockTeamId').defer, teamName: null}">
    <x-table.x :paginator="$teams" searchable>
        <x-slot name="header">
            <x-table.header.sortable
                name="Team"
                :current-field="$sortField"
                :current-direction="$sortDirection"
                field="name" />

            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($teams as $team)
            <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                <x-table.body.cell>
                    <div class="flex items-center whitespace-nowrap dark:text-white">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center">
                            <img class="w-10" src="{{ route('public.file', $team->logo_file_id) }}" alt="Logo">
                        </div>
                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $team->name }}</div>
                            @if($team->is_blocked)
                                <div class="text-xs text-red-400 dark:text-red-600">
                                    <p>Blockiert von {{ $team->blockedBy?->display_name }}</p>
                                    <p>{{ $team->block_reason }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </x-table.body.cell>

                <x-table.body.cell>
                    <div class="flex space-x-2">
                        <a>
                            <svg class="w-6 h-6 hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                        </a>

                        @if($team->is_blocked)
                            <svg @click="unblockTeamId = {{ $team->id }}; teamName = '{{ $team->name}}'; modal.open('unblock')" data-tooltip-target="tooltip-unblock-{{ $team->id }}" class="w-6 h-6 cursor-pointer hover:text-green-400 dark:hover:text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"> <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                            <div id="tooltip-unblock-{{ $team->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                Team freigeben
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @else
                            <svg @click="blockTeamId = {{ $team->id }}; teamName = '{{ $team->name}}'; modal.open('block')" data-tooltip-target="tooltip-block-{{ $team->id }}" class="w-6 h-6 cursor-pointer hover:text-red-400 dark:hover:text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"> <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" stroke-linecap="round" stroke-linejoin="round"></path> </svg>
                            <div id="tooltip-block-{{ $team->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-600 text-center">
                                Team blockieren
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    </div>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach
    </x-table.x>

    <x-modal.confirm id="unblock">
        <h3 class="text-lg font-medium">Möchtest du <span x-text="teamName"></span> wirklich freigeben?</h3>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="unblock" action="unblock"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledSuccess">
                Freigeben
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="delete" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedSuccess">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>

    <x-modal.confirm id="block">
        <h3 class="text-lg mb-5 font-normal text-gray-500 dark:text-gray-400"><span x-text="teamName"></span> blockieren</h3>

        <x-form.x>
            <x-form.input.textarea
                id="block_reason" label="Grund"
                :model="\App\Models\Components\Modeled\Model::alpineJs('blockReason')"/>

            <x-button.big.livewire
                id="block" action="block"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Team blockieren
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.confirm>
</div>
