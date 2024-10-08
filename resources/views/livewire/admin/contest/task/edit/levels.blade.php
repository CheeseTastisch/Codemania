<div x-data="{deleteId: @entangle('deleteId').defer, deleteLevel: null}">
    <x-table.x :paginator="$levels" searchable>
        <x-slot name="header">
            <x-table.header.sortable
                name="Level"
                :current-field="$sortField"
                :current-direction="$sortDirection"
                field="level" />

            <x-table.header.sortable
                name="Punkte"
                :current-field="$sortField"
                :current-direction="$sortDirection"
                field="points" />

            <x-table.header.simple name="Sofort gewertet" />

            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($levels as $level)
            <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                <x-table.body.cell>{{ $level->level }}</x-table.body.cell>
                <x-table.body.cell>{{ $level->points }}</x-table.body.cell>
                <x-table.body.cell>{{ $level->instantly_rated ? 'Ja' : 'Nein' }}</x-table.body.cell>

                <x-table.body.cell>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.contest.level.edit', $level) }}">
                            <svg class="w-6 h-6 hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path></svg>
                        </a>

                        <svg @click="deleteId = @js($level->id); deleteLevel = @js($level->level); modal.open('deleteLevel')" class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                    </div>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach
    </x-table.x>

    <x-modal.x
        title="Level erstellen"
        id="createLevel">
        <x-form.x>
            <x-form.input.x
                id="level" label="Level"
                :model="\App\Models\Components\Modeled\Model::livewire('level', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"/>

            <x-form.input.x
                id="points" label="Punkte"
                :model="\App\Models\Components\Modeled\Model::livewire('points', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"/>

            <x-form.input.file
                id="description_file" label="Beschreibung"
                accept="application/pdf"
                :model="\App\Models\Components\Modeled\Model::livewire('description_file', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"/>

            <x-button.big.livewire id="create" action="create" type="submit"  full-width>
                Erstellen
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.x>

    <div class="flex justify-end mt-3">
        <x-button.big.modal id="openCreateLevel" modal="createLevel" action="open">
            Level erstellen
        </x-button.big.modal>
    </div>

    <x-modal.confirm id="deleteLevel">
        <h3 class="text-lg font-medium">Möchtest du <span x-text="deleteLevel"></span> wirklich löschen?</h3>
        <p class="mb-2 text-sm text-red-400 dark:text-red-600">Dieser Vorgang kann nicht rückgängig gemacht werden.</p>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="delete" action="delete"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Löschen
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="deleteLevel" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>
</div>
