<x-modal
    id="confirmDelete-{{ $id }}"
    max-width="md">
    <div class="p-6 text-center">
        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

        <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Möchtest du {{ $what }} wirklich löschen?</h3>
        <p class="text-sm text-red-400 dark:text-red-600 mt-1 mb-5">Dieser Vorgang kann nicht rückgängig gemacht werden.</p>

        <x-form.button
            name="Ja, wirklich löschen"
            type="button"
            :wire="$wire"
            :wire-type="$wireType"
            :wire-loading="$wireLoading"
            :full-width="false" />

        <x-form.button
            name="Nein, abbrechen"
            type="button"
            modal="confirmDelete-{{ $id }}"
            modal-action="hide"
            :full-width="false" />
    </div>
</x-modal>
