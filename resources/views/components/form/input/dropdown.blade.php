<div>
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="relative">
        <select class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent-400 focus:border-accent-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent-600 dark:focus:border-accent-600 @error($name) !border-red-400 dark:!border-red-600 @enderror"
                id="{{ $name }}" @error($name) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
                @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif>
            {{ $slot }}
        </select>

        @if($updatable)
            @if(session('updated') === $name)
                <svg aria-hidden="true" class="absolute right-8 bottom-2 text-green-400 dark:text-green-600 w-7 h-7 animate-hide"
                     fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round"
                          stroke-linejoin="round"></path>
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
