<div class="relative">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">
        {{ $label }}
    </label>
    <input id="{{ $name }}" type="file" accept="{{ $accept }}"
           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
           @error($name) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
           @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif>

    @error($name)
    <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
        {{ $message }}
    </p>
    @enderror

    @if($updatable && session('updated') === $name)
        <svg data-time="{{ now() }}" aria-hidden="true" class="absolute right-2.5 bottom-1.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    @endif

    <div class="absolute right-1 bottom-2" wire:loading wire:target="{{ $name }}">
        <svg aria-hidden="true" fill="none" class="inline w-4 h-4 mr-3 animate-bounce text-amber-500" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
</div>
