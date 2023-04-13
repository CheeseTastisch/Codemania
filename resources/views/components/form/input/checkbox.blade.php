<div class="relative">
    <div class="flex">
        <div class="flex items-center @error($name) mb-4 @enderror">
            <input id="{{ $name }}" type="checkbox" name="{{ $name }}"
                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-accent-400 dark:focus:ring-accent-600 dark:ring-offset-gray-800 focus:ring-2 bg-slate-200 dark:bg-slate-800 dark:border-gray-600 checked:!bg-accent-400 dark:checked:!bg-accent-600"
                   @error($name) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
                   @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif
                   @if($checked) checked @endif>
        </div>
        <div class="ml-2 text-sm">
            <label for="{{ $name }}" class="text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $slot }}
            </label>

            @error($name)
            <p id="{{ $name }}-error" class="text-xs font-normal text-red-400 dark:text-red-600">
                {{ $message }}
            </p>
            @enderror
        </div>
    </div>

    @if($updatable)
        @if(session('updated') === $name)
            <svg data-time={{ now() }} aria-hidden="true" class="absolute right-2.5 -bottom-1 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        @endif
    @endif
</div>
