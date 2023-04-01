<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <input datepicker type="text" id="{{ $name }}" name="{{ $name }}"
               class="w-full bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600"
               placeholder="Datum auswählen"
               @error($name) aria-describedby="{{ $name }}-error" @enderror
               @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif
               @if($value) value="{{ $value }}" @endif>

        @if($updatable)
            @if(session('updated') === $name)
                <svg aria-hidden="true" class="absolute right-2.5 bottom-2 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        @endif
    </div>

    @error($name)
    <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>
