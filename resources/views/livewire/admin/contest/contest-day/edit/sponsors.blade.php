<div x-data="{deleteId: @entangle('deleteId').defer, deleteName: null, updateId: @entangle('updateId').defer, updating: null}">
    <x-table.x :paginator="$sponsors" searchable>
        <x-slot name="header">
            <x-table.header.sortable
                name="Sponsor"
                :current-field="$sortField"
                :current-direction="$sortDirection"
                field="name" />

            <x-table.header.sr name="Aktionen" />
        </x-slot>

        @foreach($sponsors as $sponsor)
            <x-table.body.row :stripe="$loop->even" :border="!$loop->last">
                <x-table.body.cell>
                    <div class="flex items-center whitespace-nowrap dark:text-white">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center
                            @if($sponsor->background == 'light') bg-slate-200 @elseif($sponsor->background == 'dark') bg-slate-800 @endif">
                            <img class="w-10" src="{{ route('public.file', $sponsor->logo_id) }}" alt="Logo">
                        </div>
                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $sponsor->name }}</div>
                            <div class="font-normal text-gray-500">{{ $sponsor->url }}</div>
                        </div>
                    </div>
                </x-table.body.cell>

                <x-table.body.cell>
                    <div class="flex space-x-2">
                        <svg wire:click="prepareUpdate({{ $sponsor->id }})" wire:loading.class="text-amber-500 animate-bounce" wire:target="prepareUpdate({{ $sponsor->id }})" class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path></svg>
                        <svg @click="deleteId = {{ $sponsor->id }}; deleteName = '{{ $sponsor->name }}'; modal.open('deleteSponsor')" class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path></svg>
                    </div>
                </x-table.body.cell>
            </x-table.body.row>
        @endforeach
    </x-table.x>

    <x-modal.x
        id="createSponsor"
        title="Sponsor erstellen"
        max-width="xl">
        <x-form.x>
            <x-form.input.x
                id="createSponsor.name" label="Name"
                :model="\App\Models\Components\Modeled\Model::livewire('createSponsor.name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.x
                id="createSponsor.url" label="URL"
                :model="\App\Models\Components\Modeled\Model::livewire('createSponsor.url', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.select
                id="createSponsor.background" label="Hintergrund"
                :model="\App\Models\Components\Modeled\Model::livewire('createSponsor.background', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
                :options="[
                    ['value' => 'light', 'name' => 'Hell'],
                    ['value' => 'dark', 'name' => 'Dunkel'],
                ]" />

            <x-form.input.file
                id="createSponsor.logo" label="Logo"
                accept="image/*"
                :model="\App\Models\Components\Modeled\Model::livewire('createSponsor.logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-button.big.livewire
                id="create" action="create"
                prevent loading full-width>
                Erstellen
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.x>

    <div class="flex justify-end mt-3">
        <x-button.big.modal id="createSponsor" modal="createSponsor" action="open">
            Neuen Sponsor erstellen
        </x-button.big.modal>
    </div>

    <x-modal.x
        id="updateSponsor"
        title="Sponsor bearbeiten"
        max-width="xl">
        <x-form.x>
            <x-form.input.x
                id="updateSponsor.name" label="Name"
                :model="\App\Models\Components\Modeled\Model::livewire('updateSponsor.name', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.x
                id="updateSponsor.url" label="URL"
                :model="\App\Models\Components\Modeled\Model::livewire('updateSponsor.url', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-form.input.select
                id="updateSponsor.background" label="Hintergrund"
                :model="\App\Models\Components\Modeled\Model::livewire('updateSponsor.background', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)"
                :options="[
                    ['value' => 'light', 'name' => 'Hell'],
                    ['value' => 'dark', 'name' => 'Dunkel'],
                ]" />

            <x-form.input.file
                id="updateSponsor.logo" label="Logo"
                accept="image/*"
                :model="\App\Models\Components\Modeled\Model::livewire('updateSponsor.logo', \App\Models\Components\Modeled\Livewire\LivewireUpdate::Defer)" />

            <x-button.big.livewire
                id="update" action="update"
                prevent loading full-width>
                Speichern
            </x-button.big.livewire>
        </x-form.x>
    </x-modal.x>

    <x-modal.confirm id="deleteSponsor">
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
