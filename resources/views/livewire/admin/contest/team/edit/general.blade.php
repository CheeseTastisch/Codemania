<div x-data="{blockReason: @entangle('block_reason').defer}">
    <x-form.x type="container">
        <x-form.input.x
            id="name" label="Name"
            :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
            updatable/>

        <x-form.input.file
            id="logo" label="Logo"
            :model="\App\Models\Components\Modeled\Model::livewire('logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Lazy)"
            updatable accept="image/*"/>

        <div>
            @if($team->is_blocked)
                <x-alert.x
                    title="Team gesperrt"
                    sr-info="Team gesperrt"
                    :style="\App\Models\Components\Styled\Style::Danger">
                    <p class="text-red-500 my-2">{{ $team->block_reason }}</p>
                    <p class="text-red-500 text-xs mb-6">von {{ $team->blockedBy?->display_name }}</p>

                    <x-button.big.modal
                        id="openUnblockTeam" modal="unblockTeam" action="open" full-width
                        :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedSuccess">
                        Team freigeben
                    </x-button.big.modal>
                </x-alert.x>
            @else
                <x-button.big.modal
                    id="openBlockTeam" modal="blockTeam" action="open" full-width
                    :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                    Team blockieren
                </x-button.big.modal>
            @endif
        </div>

        <x-modal.confirm id="unblockTeam">
            <h3 class="text-lg font-medium">Möchtest du das Team wirklich freigeben?</h3>

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

        <x-modal.confirm id="blockTeam">
            <h3 class="text-lg mb-5 font-normal text-gray-500 dark:text-gray-400">Team blockieren</h3>

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
    </x-form.x>
</div>
