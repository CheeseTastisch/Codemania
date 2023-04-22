<div x-data="{deleteId: @entangle('deleteId').defer}">
    <x-table.x :paginator="$files">
        <x-slot name="header">
            <x-table.header.simple name="Input" />
            <x-table.header.simple name="Richtige Lösung" />
            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($files as $file)
            <x-table.body.row>
                <x-table.body.cell>
                    <a href="{{ route('public.file', $file->inputFile->id) }}" download>
                        <svg class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm5.25-9.25a.75.75 0 00-1.5 0v4.59l-1.95-2.1a.75.75 0 10-1.1 1.02l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V7.75z" fill-rule="evenodd"></path></svg>
                    </a>
                </x-table.body.cell>

                <x-table.body.cell>
                    <a href="{{ route('public.file', $file->solutionFile->id) }}" download>
                        <svg class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm5.25-9.25a.75.75 0 00-1.5 0v4.59l-1.95-2.1a.75.75 0 10-1.1 1.02l3.25 3.5a.75.75 0 001.1 0l3.25-3.5a.75.75 0 10-1.1-1.02l-1.95 2.1V7.75z" fill-rule="evenodd"></path></svg>
                    </a>
                </x-table.body.cell>

                <x-table.body.cell>
                    <svg @click="deleteId = @js($file->id); modal.open('deleteFile')" class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach
    </x-table.x>

    <x-modal.x
        id="createFile"
        title="Neue Abgabe erstellen"
        max-width="2xl">
        <x-form.x>
            <x-form.input.file
                id="input_file" label="Eingabedatei"
                :model="\App\Models\Components\Modeled\Model::livewire('input_file', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
                accept="text/plain" />

            <x-form.input.file
                id="solution_file" label="Lösungsdatei"
                :model="\App\Models\Components\Modeled\Model::livewire('solution_file', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
                accept="text/plain" />

            <x-button.big.livewire
                id="createFile" action="create"
                prevent loading full-width>
                Neue Abgabe erstellen
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.x>


    <div class="flex justify-end mt-3">
        <x-button.big.modal id="openCreateFile" modal="createFile" action="open">
            Neue Abgabe erstellen
        </x-button.big.modal>
    </div>

    <x-modal.confirm id="deleteFile">
        <h3 class="text-lg font-medium">Möchtest du die Abgabe wirklich löschen?</h3>
        <p class="mb-2 text-sm text-red-400 dark:text-red-600">Dieser Vorgang kann nicht rückgängig gemacht werden.</p>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="delete" action="delete"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Löschen
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancel" modal="delete" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>
</div>
