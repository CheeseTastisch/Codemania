<div>
    <x-table.container
        with-pagination
        with-search>

        <x-slot name="header">
            <x-table.header.field
                name="name"
                label="Sponsor"
                sortable
                :sort-field="$sortField"
                :sort-direction="$sortDirection" />

            <x-table.header.field name="Aktionen" sr-only/>
        </x-slot>

        <x-slot name="pagination">
            {{ $sponsors->links('layouts.pagination.table') }}
        </x-slot>

        @foreach($sponsors as $sponsor)
            <x-table.content.row with-hover :with-stripe="$loop->even" :with-border="!$loop->last">
                <x-table.content.column class="flex items-center whitespace-nowrap dark:text-white">
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center
                        @if($sponsor->background == 'light') bg-slate-200 @elseif($sponsor->background == 'dark') bg-slate-800 @endif">
                        <img class="w-10" src="{{ route('public.file', $sponsor->logo_id) }}" alt="Logo">
                    </div>
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{ $sponsor->name }}</div>
                        <div class="font-normal text-gray-500">{{ $sponsor->url }}</div>
                    </div>
                </x-table.content.column>

                <x-table.content.column>
                    <div class="flex space-x-2">
                        <svg wire:click="prepareUpdate({{ $sponsor->id }})"
                            class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none"
                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                        </svg>

                        <svg wire:click="delete({{ $sponsor->id }})"
                             data-modal-target="confirmDelete-sponsor"
                             data-modal-show="confirmDelete-sponsor"
                            class="w-6 h-6 cursor-pointer hover:text-accent-400 dark:hover:text-accent-600" fill="none"
                             stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                        </svg>
                    </div>
                </x-table.content.column>
            </x-table.content.row>
        @endforeach
    </x-table.container>

    <div class="flex justify-end mt-3">
        <x-form.button
            name="Neuen Sponsor erstellen"
            modal="create-sponsor"
            :full-width="false" />
    </div>

    <x-modal
        id="update-sponsor"
        title="Sponsor bearbeiten"
        max-width="xl">
        <x-form.form>
            <x-form.input.simple
                name="updateSponsor.name"
                label="Name"
                wire />

            <x-form.input.simple
                name="updateSponsor.url"
                label="URL"
                wire />

            <x-form.input.dropdown
                name="updateSponsor.background"
                label="Hintergrund"
                wire>
                <option value="light">Hell</option>
                <option value="dark">Dunkel</option>
            </x-form.input.dropdown>

            <x-form.input.file
                name="updateSponsor.logo"
                label="Logo"
                wire />

            <x-form.button
                name="Speichern"
                wire="updateSponsor" />
        </x-form.form>
    </x-modal>

    <x-modal
        id="create-sponsor"
        title="Sponsor erstellen"
        max-width="xl">
        <x-form.form>
            <x-form.input.simple
                name="createSponsor.name"
                label="Name"
                wire />

            <x-form.input.simple
                name="createSponsor.url"
                label="URL"
                wire />

            <x-form.input.dropdown
                name="createSponsor.background"
                label="Hintergrund"
                wire>
                <x-form.input.option value="light" name="Hell" />
                <x-form.input.option value="dark" name="Dunkel" />
            </x-form.input.dropdown>

            <x-form.input.file
                name="createSponsor.logo"
                label="Logo"
                wire />

            <x-form.button
                name="Erstellen"
                wire="createSponsor" />
        </x-form.form>
    </x-modal>

    <x-crud.confirm-delete
        id="sponsor"
        what="{{ $deleteSponsor?->name }}"
        wire="confirmedDelete"/>
</div>
