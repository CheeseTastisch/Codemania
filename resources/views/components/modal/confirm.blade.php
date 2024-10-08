<x-modal.x
    :id="$id"
    :max-width="$maxWidth"
    :close-button="$closeButton">
    @if($footer ?? false)
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endif

    <div class="p-6 text-center">
        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

        {{ $slot }}
    </div>
</x-modal.x>
