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
