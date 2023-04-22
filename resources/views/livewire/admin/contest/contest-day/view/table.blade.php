<div x-data="{deleteId: @entangle('deleteId').defer, deleteName: null}">
    <x-table.x
        searchable
        :paginator="$contests">
        <x-slot name="header">
            <x-table.header.simple name="#" />

            <x-table.header.sortable
                name="name"
                :current-field="$sortField"
                :current-direction="$sortDirection"
                field="name" />

            <x-table.header.sortable
                name="date"
                :current-field="$sortField"
                :current-direction="$sortDirection"
                field="date" />

            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($contests as $contest)
            <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                <x-table.body.cell header>{{ $contest->id }}</x-table.body.cell>
                <x-table.body.cell>{{ $contest->name }}</x-table.body.cell>

                <x-table.body.cell>
                    @if($contest->training_only)
                        Nur Training
                    @else
                        {{ $contest->date->format('d. m. Y') }}
                    @endif
                </x-table.body.cell>

                <x-table.body.cell>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.contest.contest-day.edit', $contest->id) }}">
                            <svg class="w-6 h-6 hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path></svg>
                        </a>

                        <svg @click="deleteId = @js($contest->id); deleteName = @js($contest->name); modal.open('deleteContestDay')" class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                    </div>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach
    </x-table.x>

    <x-modal.x
        id="createContestDay"
        title="Neuen Tag erstellen"
        max-width="2xl">
        <x-form.x>
            <x-form.input.x
                id="name" label="Name"
                :model="\App\Models\Components\Modeled\Model::livewire('name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.date
                id="date" label="Datum"
                :model="\App\Models\Components\Modeled\Model::livewire('date', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.date
                id="registration_deadline" label="Anmeldefrist"
                :model="\App\Models\Components\Modeled\Model::livewire('registration_deadline', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-button.big.livewire
                id="create" action="create"
                prevent loading full-width>
                Erstellen
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.x>

    <div class="flex justify-end mt-3">
        <x-button.big.modal id="createContestDay" modal="createContestDay" action="open">
            Neuen Tag erstellen
        </x-button.big.modal>
    </div>

    <x-modal.confirm id="deleteContestDay">
        <h3 class="text-lg font-medium">Möchtest du <span x-text="deleteName"></span> wirklich löschen?</h3>
        <p class="mb-2 text-sm text-red-400 dark:text-red-600">Dieser Vorgang kann nicht rückgängig gemacht werden.</p>

        <div class="flex justify-center mt-5 space-x-2">
            <x-button.big.livewire
                id="delete" action="delete"
                prevent loading
                :style="\App\Models\Components\Styled\OutlinedStyle::FilledDanger">
                Löschen
            </x-button.big.livewire>

            <x-button.big.modal
                id="cancle" modal="delete" action="close"
                :style="\App\Models\Components\Styled\OutlinedStyle::OutlinedDanger">
                Abbrechen
            </x-button.big.modal>
        </div>
    </x-modal.confirm>
</div>
