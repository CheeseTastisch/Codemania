<div>
    <label for="{{ $name }}-{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="html-editor" id="{{ $name }}-{{ $id }}" wire:ignore
         @if($froalaLoaded) x-on:froala-loaded="{{ $froalaLoaded}}" @endif></div>
    @if($wire)
        <textarea title="" id="{{ $name }}-{{ $id }}-textarea" class="hidden" wire:model="{{ $name }}"></textarea>
    @endif

    @error($name)
        <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>
