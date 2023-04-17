<div>
    <div class="relative">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">
            {{ $label }}
        </label>

        <textarea id="{{ $name }}" rows="4"
               class="block p-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 dark:text-white dark:border-gray-600 focus:ring-accent-200 focus:border-accent-400 dark:focus:ring-accent-800 dark:focus:border-accent-600 @error($name) !border-red-400 dark:!border-red-600 @enderror"
               @error($name) aria-describedby="{{ $name }}-error" aria-invalid="true" @enderror
               @if($wire && $wireType) wire:model.{{ $wireType }}="{{ $name }}" @elseif($wire) wire:model="{{ $name }}" @endif>
            @if($value) {{ $value }} @endif
        </textarea>
        @if($updatable)
            @if(session('updated') === $name)
                <svg data-time="{{ now() }}" aria-hidden="true" class="absolute right-2.5 bottom-2.5 text-green-400 dark:text-green-600 w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            @endif
        @endif
    </div>
    @if($multipleErrors)
        @if(count($errors->get($name)) > 1)
            <ul id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600 list-disc ml-4">
                @foreach($errors->get($name) as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @elseif($errors->has($name))
            <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
                {{ $errors->first('password') }}
            </p>
        @endif
    @else
        @error($name)
        <p id="{{ $name }}-error" class="mt-2 text-xs text-red-400 dark:text-red-600">
            {{ $message }}
        </p>
        @enderror
    @endif
</div>
