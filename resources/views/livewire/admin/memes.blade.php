<div x-data="{deleteId: @entangle('deleteId').defer}">
    <x-table.x :paginator="$memes">
        <x-slot name="header">
            <x-table.header.simple name="Meme" />
            <x-table.header.simple name="Status" />

            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($memes as $meme)
            <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                <x-table.body.cell>
                    <div class="flex items-center whitespace-nowrap dark:text-white">
                        <img class="h-12 hover:h-64" src="{{ route('public.file', $meme->uploaded_file_id) }}" alt="Logo">
                    </div>
                </x-table.body.cell>

                <x-table.body.cell>
                    @switch($meme->for)
                        @case('accepted')
                            Richtig
                            @break
                        @case('rejected')
                            Falsch
                            @break
                        @case('unknown')
                            Unbekannt
                            @break
                    @endswitch
                </x-table.body.cell>

                <x-table.body.cell>
                    <div class="flex space-x-2">
                        <svg @click="deleteId = @js($meme->id); modal.open('deleteMeme')" class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                    </div>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach

    </x-table.x>

    <x-modal.x
        id="createMeme"
        title="Meme erstellen"
        max-width="xl">
        <x-form.x>
            <x-form.input.file
                id="file" label="Meme"
                accept="image/*"
                :model="\App\Models\Components\Modeled\Model::livewire('file', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.select
                id="for" label="Status"
                :model="\App\Models\Components\Modeled\Model::livewire('for', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
                :options="[
                    ['value' => 'accepted', 'name' => 'Richtig'],
                    ['value' => 'rejected', 'name' => 'Falsch'],
                    ['value' => 'unknown', 'name' => 'Unbekannt'],
                ]" />

            <x-button.big.livewire id="create" action="create" type="submit" full-width>
                Erstellen
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.x>

    <div class="flex justify-end mt-3">
        <x-button.big.modal id="openCreateMeme" modal="createMeme" action="open">
            Meme erstellen
        </x-button.big.modal>
    </div>

    <x-modal.confirm id="deleteMeme">
        <h3 class="text-lg font-medium">Möchtest du dieses Meme wirklich löschen?</h3>
        <p class="mb-2 text-sm text-red-400 dark:text-red-600">Dieser Vorgang kann nicht rückgängig gemacht werden.</p>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="delete" action="delete"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Löschen
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="deleteMeme" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>

</div>
