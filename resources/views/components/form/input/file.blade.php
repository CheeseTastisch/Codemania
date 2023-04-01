<div>
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
</div>
