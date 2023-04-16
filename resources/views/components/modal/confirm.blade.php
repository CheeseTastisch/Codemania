<x-modal.modal
    id="confirm-{{ $id }}"
    :max-width="$maxWidth"
    :close-button="$closeButton">

    <div class="p-6 text-center">
        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

        {{ $slot }}

        <x-form.button
            name="Ja, wirklich {{ $action }}"
            type="button"
            :wire="$wire"
            :wire-type="$wireType"
            :wire-loading="$wireLoading"
            :full-width="false" />

        <x-form.button
            name="Nein, abbrechen"
            type="button"
            modal="confirm-{{ $id }}"
            modal-action="hide"
            :full-width="false" />
    </div>
</x-modal.modal>
